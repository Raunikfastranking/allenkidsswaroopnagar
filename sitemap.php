<?php
require_once __DIR__ . '/proxy/config.php';
require_once __DIR__ . '/proxy/api.php';
require_once __DIR__ . '/includes/program-config.php';

$siteConfig = require_once __DIR__ . '/includes/seo-site-config.php';
$defaultHost = (is_array($siteConfig) && !empty($siteConfig['default_host'])) ? $siteConfig['default_host'] : 'localhost';
$requestHost = $_SERVER['HTTP_HOST'] ?? $defaultHost;
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

// Keep the production host for filtering external absolute URLs from the CMS menu.
$host = preg_replace('/^www\./i', '', $defaultHost);

// LAN/Docker fallbacks: do not emit 192.168.x.x or .localhost URLs in production sitemaps.
$isLocalHost = preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $requestHost);
if ($isLocalHost) {
    $requestHost = $defaultHost;
}
$scheme = $isLocalHost ? 'http' : 'https';
$base = $scheme . '://' . preg_replace('/^www\./i', '', $requestHost);

$branchId = defined('ALLENKIDS_BRANCH_ID') ? ALLENKIDS_BRANCH_ID : null;

$homeSlugs = [
    2 => 'kanpurs-best-preschool-kindergarten-learn-play-grow',
    3 => 'best-play-school-in-kakadeo-kanpur-nurturing-little-minds',
    4 => 'best-preschool-in-swaroop-nagar-a-place-to-bloom',
    5 => 'best-preschool-in-bareilly-your-childs-second-home',
];

$urls = [];

function addUrl(&$urls, $loc, $lastmod = null, $priority = '0.5', $changefreq = 'monthly') {
    if (empty($loc) || $loc === '#' || isset($urls[$loc])) {
        return;
    }
    $urls[$loc] = [
        'loc'        => $loc,
        'lastmod'    => $lastmod,
        'priority'   => $priority,
        'changefreq' => $changefreq,
    ];
}

function formatLastmod($value) {
    if (empty($value) || $value === '0000-00-00' || $value === '0000-00-00 00:00:00') {
        return null;
    }
    $ts = is_numeric($value) ? (int) $value : strtotime($value);
    if ($ts === false || $ts <= 0) {
        return null;
    }
    return gmdate('c', $ts);
}

function normalizeMenuUrl($url, $host) {
    $url = trim((string) $url);
    if ($url === '' || $url === '#') {
        return null;
    }

    if (preg_match('/^https?:\/\//i', $url)) {
        $parsed = parse_url($url);
        if (!empty($parsed['host']) && strtolower($parsed['host']) !== strtolower($host)) {
            return null;
        }
        $path = $parsed['path'] ?? '/';
        $query = !empty($parsed['query']) ? '?' . $parsed['query'] : '';
        $url = $path . $query;
    }

    if (preg_match('/^\/?program-single(?:\.php)?\?(?:.*&)?id=([^&]+)/i', $url, $m)) {
        $slug = allenkids_program_slug_for_id(rawurldecode($m[1]));
        return $slug ? allenkids_program_public_path($slug) : null;
    }

    $url = preg_replace('/\.php$/i', '', $url);
    $url = ltrim($url, '/');
    if ($url === '' || $url === '#') {
        return '/';
    }
    return '/' . $url;
}

function collectMenuUrls($items, $host, $base, &$urls) {
    if (empty($items) || !is_array($items)) {
        return;
    }
    foreach ($items as $item) {
        if (!empty($item['url'])) {
            $path = normalizeMenuUrl($item['url'], $host);
            if ($path !== null) {
                addUrl($urls, $base . $path, null, '0.6');
            }
        }
        if (!empty($item['children'])) {
            collectMenuUrls($item['children'], $host, $base, $urls);
        }
    }
}

// Home
addUrl($urls, $base . '/', formatLastmod(filemtime(__DIR__ . '/index.php')), '1.0', 'daily');

// Static pages
$excludeStatic = [
    'index', 'blog-detail', 'event-detail', 'gallery-detail', 'program-single',
    'page-template', '404', 'sitemap', 'test', 'api-test', 'old-program-page', 'index3',
];
foreach (glob(__DIR__ . '/*.php') as $file) {
    $name = basename($file, '.php');
    if (in_array($name, $excludeStatic, true)) {
        continue;
    }
    addUrl($urls, $base . '/' . $name, formatLastmod(filemtime($file)), '0.6');
}

// Programs
foreach (allenkids_all_program_slugs() as $slug) {
    $program = fetchApiData('api/pages/' . $slug);
    $lastmod = null;
    if (!empty($program['data']['updated_at'])) {
        $lastmod = formatLastmod($program['data']['updated_at']);
    } elseif (!empty($program['data']['created_at'])) {
        $lastmod = formatLastmod($program['data']['created_at']);
    }
    addUrl($urls, $base . allenkids_program_public_path($slug), $lastmod, '0.8');
}

// Menu pages
if ($branchId) {
    $menuData = fetchApiData('api/menus/' . $branchId);
    if (!empty($menuData['data']['menu_items']) && is_array($menuData['data']['menu_items'])) {
        collectMenuUrls($menuData['data']['menu_items'], $host, $base, $urls);
    }
}

// Blogs
if ($branchId) {
    $blogData = fetchApiData('api/blogs/branch/' . $branchId);
    if (!empty($blogData['data']) && is_array($blogData['data'])) {
        foreach ($blogData['data'] as $blog) {
            $slug = $blog['slug'] ?? null;
            if (empty($slug)) {
                continue;
            }
            $lastmod = !empty($blog['updated_at']) ? formatLastmod($blog['updated_at'])
                : (!empty($blog['date']) ? formatLastmod($blog['date']) : null);
            addUrl($urls, $base . '/blog/' . $slug, $lastmod, '0.5');
        }
    }
}

// Events
if ($branchId) {
    $eventData = fetchApiData('api/galleries/events/branch/' . $branchId);
    if (!empty($eventData['data']) && is_array($eventData['data'])) {
        foreach ($eventData['data'] as $event) {
            $id = $event['id'] ?? null;
            if (empty($id)) {
                continue;
            }
            $lastmod = !empty($event['updated_at']) ? formatLastmod($event['updated_at'])
                : (!empty($event['date']) ? formatLastmod($event['date'])
                    : (!empty($event['created_at']) ? formatLastmod($event['created_at']) : null));
            addUrl($urls, $base . '/event/' . $id, $lastmod, '0.5');
        }
    }
}

// Galleries
if ($branchId) {
    $galleryData = fetchApiData('api/galleries/branch/' . $branchId);
    if (!empty($galleryData['data']) && is_array($galleryData['data'])) {
        foreach ($galleryData['data'] as $gallery) {
            $id = $gallery['id'] ?? null;
            if (empty($id)) {
                continue;
            }
            $lastmod = !empty($gallery['updated_at']) ? formatLastmod($gallery['updated_at'])
                : (!empty($gallery['date']) ? formatLastmod($gallery['date'])
                    : (!empty($gallery['created_at']) ? formatLastmod($gallery['created_at']) : null));
            addUrl($urls, $base . '/gallery/' . $id, $lastmod, '0.5');
        }
    }
}

// CMS pages
if ($branchId) {
    $pageListData = fetchApiData('api/public/branches/' . $branchId . '/pages');
    if (!empty($pageListData) && is_array($pageListData)) {
        foreach ($pageListData as $page) {
            $slug = $page['slug'] ?? null;
            if (empty($slug) || $slug === '#') {
                continue;
            }
            if (preg_match('/^https?:\/\//i', $slug)) {
                continue;
            }
            if (in_array(strtolower($slug), ['index', 'home'], true)) {
                continue;
            }
            if (isset($homeSlugs[$branchId]) && $slug === $homeSlugs[$branchId]) {
                continue;
            }
            $lastmod = !empty($page['updated_at'])
                ? formatLastmod($page['updated_at'])
                : (!empty($page['created_at']) ? formatLastmod($page['created_at']) : null);
            addUrl($urls, $base . '/' . ltrim($slug, '/'), $lastmod, '0.6');
        }
    }
}

header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $u) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($u['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
    if (!empty($u['lastmod'])) {
        echo "    <lastmod>" . htmlspecialchars($u['lastmod'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</lastmod>\n";
    }
    echo "    <changefreq>" . htmlspecialchars($u['changefreq'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</changefreq>\n";
    echo "    <priority>" . htmlspecialchars($u['priority'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</priority>\n";
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
