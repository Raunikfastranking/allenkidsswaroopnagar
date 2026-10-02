<?php
require_once dirname(__DIR__) . '/proxy/config.php';

$branchId = ALLENKIDS_SWAROOPNAGAR_BRANCH_ID;
$apiUrl = rtrim(API_BASE_URL, '/') . "/api/grades/{$branchId}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 12);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response !== false && $httpCode === 200) {
    $json = json_decode($response, true);
    if (isset($json['status']) && $json['status'] === 'success') {
        $grades = $json['data']['data'] ?? [];
        foreach ($grades as $grade) {
            $name = trim($grade['grades'] ?? '');
            if ($name !== '') {
                $escaped = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                echo "<option value=\"{$escaped}\">{$escaped}</option>\n";
            }
        }
        return;
    }
}

echo '<option value="">No grades available (API error)</option>';
