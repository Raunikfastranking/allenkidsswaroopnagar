<?php
// Central config for API base URL, branch ID, and JWT auth
define('API_BASE_URL', 'https://allenkids.allenhouseschools.com');
define('ALLENKIDS_SWAROOPNAGAR_BRANCH_ID', 4);
define('ALLENKIDS_BRANCH_ID', ALLENKIDS_SWAROOPNAGAR_BRANCH_ID);
define('ALLENKIDS_SITE_NAME', 'Allen Kids Swaroop Nagar');
define('API_JWT_TOKEN', 'hgutuyg758374tg5f3738y87gusdfjhgjh$@.hgjgjhikj');

// SSL verification: disabled for local Docker/LAN testing, enabled on the live production domains.
$__localHosts = ['localhost', '127.0.0.1', '192.168.1.195'];
$__currentHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
if (!defined('ALLENKIDS_VERIFY_SSL')) {
    define('ALLENKIDS_VERIFY_SSL', !in_array($__currentHost, $__localHosts, true) && !preg_match('/\.localhost$/i', $__currentHost));
}

if (!function_exists('api_auth_headers')) {
    /**
     * @param string[] $extra e.g. ['Content-Type: application/json']
     * @return string[]
     */
    function api_auth_headers(array $extra = []): array
    {
        $headers = ['Authorization: Bearer ' . API_JWT_TOKEN];
        foreach ($extra as $header) {
            $headers[] = $header;
        }
        return $headers;
    }
}

if (!function_exists('proxy_api_post')) {
    function proxy_api_post(string $endpoint, ?array $data): void
    {
        $ch = curl_init(rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/'));
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => api_auth_headers(['Content-Type: application/json']),
            CURLOPT_POSTFIELDS => json_encode($data ?? []),
            CURLOPT_SSL_VERIFYPEER => ALLENKIDS_VERIFY_SSL,
            CURLOPT_SSL_VERIFYHOST => (ALLENKIDS_VERIFY_SSL ? 2 : 0),
        ]);

        $response = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        header('Content-Type: application/json');
        if ($response === false || $status < 100) {
            http_response_code(502);
            echo json_encode([
                'success' => false,
                'message' => 'Upstream API request failed',
                'error' => $error,
            ]);
            return;
        }

        http_response_code($status);
        echo $response;
    }
}

if (!function_exists('proxy_api_multipart_post')) {
    /**
     * @return array{response: string|false, status: int, error: string}
     */
    function proxy_api_multipart_post(string $endpoint, array $postData): array
    {
        $ch = curl_init(rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/'));
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => api_auth_headers(),
            CURLOPT_SSL_VERIFYPEER => ALLENKIDS_VERIFY_SSL,
            CURLOPT_SSL_VERIFYHOST => (ALLENKIDS_VERIFY_SSL ? 2 : 0),
        ]);

        $response = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        return [
            'response' => $response,
            'status' => $status,
            'error' => $error,
        ];
    }
}
