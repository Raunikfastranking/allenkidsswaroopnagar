<?php
// Dev router for `php -S` — emulates the .htaccess rewrite rules.
// Usage: php -S localhost:8000 router.php

$docroot = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = '/' . trim($uri, '/');
if ($uri === '/') {
    $uri = '';
}

// Serve existing files and directories (incl. real .php files) as-is.
if ($uri !== '' && (is_file($docroot . $uri) || is_dir($docroot . $uri))) {
    return false;
}

$rewrite = function (string $target) use ($docroot) {
    [$script, $query] = array_pad(explode('?', $target, 2), 2, '');
    if ($query !== '') {
        parse_str($query, $params);
        $_GET = array_merge($_GET, $params);
    }
    $_SERVER['SCRIPT_NAME'] = '/' . $script;
    $_SERVER['SCRIPT_FILENAME'] = $docroot . '/' . $script;
    $_SERVER['PHP_SELF'] = '/' . $script;
    require $docroot . '/' . $script;
    return true;
};

if ($uri === '' || $uri === '/home') {
    return $rewrite('index.php');
}

// Nested SEO slugs → page-template.php
$nested = [
    '/parent-resources/school-calendar' => 'school-calendar',
    '/parent-resources/daily-routine' => 'daily-routine',
    '/parent-resources/tips-for-parents' => 'tips-for-parent',
    '/parent-resources/health-safety-policies' => 'health-safety-policies',
    '/parent-resources/testimonials' => 'testimonial',
    '/gallery/photos' => 'photos',
    '/gallery/videos' => 'videos',
    '/gallery/virtual-tour' => 'virtual-tour',
];
if (isset($nested[$uri])) {
    return $rewrite('page-template.php?page=' . $nested[$uri]);
}

// Legacy root slugs → same content as their 301 destinations
$legacy = [
    '/school-calendar' => 'school-calendar',
    '/daily-routine' => 'daily-routine',
    '/tips-for-parent' => 'tips-for-parent',
    '/health-safety-policies' => 'health-safety-policies',
    '/testimonial' => 'testimonial',
    '/photos' => 'photos',
    '/videos' => 'videos',
    '/virtual-tour' => 'virtual-tour',
];
if (isset($legacy[$uri])) {
    return $rewrite('page-template.php?page=' . $legacy[$uri]);
}

// Program slugs → program-single.php
$programs = [
    '/programs/toodler' => 'best-toddler-program-near-swaroop-nagar-allen-kids',
    '/programs/toddler' => 'best-toddler-program-near-swaroop-nagar-allen-kids',
    '/programs/playgroup-1' => 'best-playgroup-for-toddlers-in-swaroop-nagar-allen-kids',
    '/programs/playgroup-2' => 'allen-kids-best-playgroup-school-in-swaroop-nagar-kanpur',
    '/programs/nursery' => 'early-childhood-nursery-program-allen-kids-swaroop-nagar',
    '/programs/preparatory' => 'preparatory-school-program-in-swaroop-nagar-allen-kids',
];
if (isset($programs[$uri])) {
    return $rewrite('program-single.php?slug=' . $programs[$uri]);
}

// Friendly URL rewrites
if ($uri === '/newsletter') {
    return $rewrite('newsletters.php');
}
if ($uri === '/blogs') {
    return $rewrite('blogs.php');
}
if (preg_match('#^/blog/([A-Za-z0-9-]+)$#', $uri, $m)) {
    return $rewrite('blog-detail.php?slug=' . $m[1]);
}
if (preg_match('#^/view/([A-Za-z0-9-]+)$#', $uri, $m) && is_file($docroot . '/detail-view.php')) {
    return $rewrite('detail-view.php?slug=' . $m[1]);
}
if (preg_match('#^/event/([0-9]+)$#', $uri, $m)) {
    return $rewrite('event-detail.php?id=' . $m[1]);
}
if ($uri === '/gallery' || $uri === '/photo-gallery') {
    return $rewrite('photos.php');
}
if (preg_match('#^/gallery/([0-9]+)$#', $uri, $m)) {
    return $rewrite('gallery-detail.php?id=' . $m[1]);
}
if ($uri === '/student-work-samples') {
    return $rewrite('student-work-sample.php');
}

// Clean URL → file.php (e.g. /about-us → about-us.php, /proxy/api → proxy/api.php)
if (is_file($docroot . $uri . '.php')) {
    return $rewrite(ltrim($uri, '/') . '.php');
}

// CMS dynamic single-segment fallback
if (preg_match('#^/([^/]+)$#', $uri, $m)) {
    return $rewrite('page-template.php?page=' . urlencode($m[1]));
}

http_response_code(404);
require $docroot . '/404.php';
return true;
