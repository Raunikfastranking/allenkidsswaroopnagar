<?php
require_once __DIR__ . '/proxy/api.php';
$d = fetchApiData('api/blogs/branch/4');
foreach (($d['data'] ?? []) as $b) {
    if (($b['slug'] ?? '') === 'preschool-fees-in-kanpur-a-parents-guide') {
        echo $b['blogdetails'][0]['description'] ?? '';
        break;
    }
}