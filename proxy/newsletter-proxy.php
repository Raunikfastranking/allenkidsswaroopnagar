<?php
require_once __DIR__ . '/config.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);
proxy_api_post('api/subscribers', $data);
