<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__, 2) . '/proxy/api-cache.php';

$api_url = API_BASE_URL;

function fetchMultipleApiData($endpoints)
{
    $baseUrl = rtrim(API_BASE_URL, '/') . '/api';
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];

    // Fresh cache hits skip the network entirely.
    foreach ($endpoints as $key => $endpoint) {
        $cached = allenkids_api_cache_read($endpoint);
        if ($cached !== null) {
            $responses[$key] = $cached;
        }
    }

    // Create curl handles only for expired/missing endpoints
    foreach ($endpoints as $key => $endpoint) {
        if (array_key_exists($key, $responses)) {
            continue;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST , ((!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')) ? 2 : 0));
        curl_multi_add_handle($mh, $ch);
        $curlHandles[$key] = $ch;
    }
    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);

        if ($status > CURLM_OK) {
             break;
        }
        curl_multi_select($mh);
        usleep(10000);
    } while ($running > 0);

    // Collect responses
    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $decoded = is_string($content) ? json_decode($content, true) : null;
        if ($decoded === null) {
            // Upstream failed/timed out — serve stale cache if we have it.
            $decoded = allenkids_api_cache_read($endpoints[$key], true);
        } else {
            allenkids_api_cache_write($endpoints[$key], $content);
        }
        $responses[$key] = $decoded;
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    return $responses;
}
$endpoints = [
   'landing_data' =>'/pages/landing-page-swaroop-nagar',
   'layoutParts' => '/public/branches/4/layout-parts/',
  ];

$data = fetchMultipleApiData($endpoints);
$landing_data = $data['landing_data'];
$layoutParts = $data['layoutParts'];
?>
