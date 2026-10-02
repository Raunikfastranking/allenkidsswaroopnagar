<?php
header('Content-Type: application/json; charset=utf-8');

$url = 'https://allenhouseadmin.fastranking.tech/api/print-media/SCLID000006';
$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_SSL_VERIFYPEER => (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')),
]);

$response = curl_exec($ch);
$status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($status > 0 ? $status : 502);
echo $response !== false ? $response : json_encode(['success' => false, 'message' => 'API request failed']);
