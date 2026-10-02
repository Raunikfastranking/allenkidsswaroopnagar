<?php
require_once dirname(__DIR__) . '/proxy/config.php';

if (!function_exists('allenkids_fetch_sessions')) {
    function allenkids_fetch_sessions(): array
    {
        static $sessions = null;
        if (is_array($sessions)) {
            return $sessions;
        }

        $sessions = [];
        $apiUrl = rtrim(API_BASE_URL, '/') . '/api/school-sessions';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 12);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')));
        curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false || $httpCode !== 200) {
            error_log("Sessions API failed - HTTP $httpCode - $error");
            return $sessions;
        }

        $json = json_decode($response, true);
        if (
            json_last_error() === JSON_ERROR_NONE &&
            isset($json['status']) &&
            $json['status'] === 'success'
        ) {
            $sessions = $json['data']['data'] ?? [];
        }

        return $sessions;
    }
}

return allenkids_fetch_sessions();
