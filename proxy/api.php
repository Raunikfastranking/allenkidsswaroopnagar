<?php
require_once 'config.php';
require_once __DIR__ . '/api-cache.php';

function fetchApiData($endpoint) {
    $cached = allenkids_api_cache_read($endpoint);
    if ($cached !== null) {
        return $cached;
    }

    $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/') . '?cb=' . time();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, ALLENKIDS_VERIFY_SSL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, ALLENKIDS_VERIFY_SSL ? 2 : 0);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        error_log('cURL Error: ' . curl_error($ch) . ' | URL: ' . $url);
        curl_close($ch);
        return allenkids_api_cache_read($endpoint, true);
    }
    curl_close($ch);

    $decoded = is_string($response) ? json_decode($response, true) : null;
    if ($decoded === null) {
        return allenkids_api_cache_read($endpoint, true);
    }
    allenkids_api_cache_write($endpoint, $response);
    return $decoded;
}
