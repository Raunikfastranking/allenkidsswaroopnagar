<?php
require_once dirname(__DIR__) . '/proxy/config.php';

$apiUrl = 'https://allenp.superhouseerp.com/api/form-enquiry/get-active-sessions';

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 12,
    CURLOPT_SSL_VERIFYPEER => (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')),
    CURLOPT_HTTPHEADER     => api_auth_headers(),
]);
$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    exit;
}

$data = json_decode($response, true);

if (!is_array($data)) {
    exit;
}

foreach ($data as $item) {
    $sessionName = trim($item['session'] ?? $item['Session'] ?? '');
    if ($sessionName === '') {
        continue;
    }
    echo '<option value="' . htmlspecialchars($sessionName) . '">'
        . htmlspecialchars($sessionName) .
    '</option>';
}
