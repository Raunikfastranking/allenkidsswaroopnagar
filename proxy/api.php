<?php
require_once 'config.php';

function fetchApiData($endpoint) {
    $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/') . '?cb=' . time();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, ALLENKIDS_VERIFY_SSL);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        error_log('cURL Error: ' . curl_error($ch) . ' | URL: ' . $url);
        curl_close($ch);
        return null;
    }
    curl_close($ch);

    return json_decode($response, true);
}
