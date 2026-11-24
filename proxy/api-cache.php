<?php
// File-based cache for upstream CMS API responses.
// Keeps page loads fast and resilient: fresh hits skip the network entirely,
// expired/failed fetches fall back to stale cached data.

if (!defined('ALLENKIDS_API_CACHE_TTL')) {
    define('ALLENKIDS_API_CACHE_TTL', 300); // seconds
}
if (!defined('ALLENKIDS_API_CACHE_DIR')) {
    define('ALLENKIDS_API_CACHE_DIR', __DIR__ . '/cache');
}

if (!function_exists('allenkids_api_cache_file')) {
    function allenkids_api_cache_file(string $endpoint): string
    {
        // Normalize so 'api/x', '/api/x' and 'x' share one cache entry.
        $e = '/' . ltrim($endpoint, '/');
        $e = preg_replace('#^/api/#', '/', $e);
        return ALLENKIDS_API_CACHE_DIR . '/' . sha1($e) . '.json';
    }
}

if (!function_exists('allenkids_api_cache_read')) {
    function allenkids_api_cache_read(string $endpoint, bool $allowStale = false)
    {
        $file = allenkids_api_cache_file($endpoint);
        if (!is_file($file)) {
            return null;
        }
        if (!$allowStale && (time() - filemtime($file)) > ALLENKIDS_API_CACHE_TTL) {
            return null;
        }
        $raw = file_get_contents($file);
        if ($raw === false || $raw === '') {
            return null;
        }
        $data = json_decode($raw, true);
        return (json_last_error() === JSON_ERROR_NONE) ? $data : null;
    }
}

if (!function_exists('allenkids_api_cache_write')) {
    function allenkids_api_cache_write(string $endpoint, $raw): void
    {
        if (!is_string($raw) || $raw === '') {
            return;
        }
        json_decode($raw, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return; // only cache valid JSON
        }
        if (!is_dir(ALLENKIDS_API_CACHE_DIR)) {
            @mkdir(ALLENKIDS_API_CACHE_DIR, 0777, true);
        }
        $file = allenkids_api_cache_file($endpoint);
        $tmp = $file . '.' . getmypid() . '.tmp';
        if (@file_put_contents($tmp, $raw, LOCK_EX) !== false) {
            @rename($tmp, $file);
        } else {
            @unlink($tmp);
        }
    }
}
