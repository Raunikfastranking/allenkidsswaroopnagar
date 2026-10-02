<?php
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = parse_url($requestUri, PHP_URL_PATH);
$requestPath = trim($requestPath, '/');

// Legacy root slugs -> new nested URLs (301 redirects)
$legacyToCanonical = [
    'school-calendar'        => 'parent-resources/school-calendar',
    'daily-routine'          => 'parent-resources/daily-routine',
    'tips-for-parent'        => 'parent-resources/tips-for-parents',
    'health-safety-policies' => 'parent-resources/health-safety-policies',
    'testimonial'            => 'parent-resources/testimonials',
    'photos'                 => 'gallery/photos',
    'videos'                 => 'gallery/videos',
    'student-work-sample'    => 'gallery/student-work-sample',
    'photo-gallery'          => 'gallery/photos',
    'student-work-samples'   => 'gallery/student-work-sample',
];

if (isset($legacyToCanonical[$requestPath])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: /' . $legacyToCanonical[$requestPath]);
    exit;
}

// New nested URLs -> CMS page slug
$nestedToSlug = [
    'parent-resources/school-calendar'        => 'school-calendar',
    'parent-resources/daily-routine'          => 'daily-routine',
    'parent-resources/tips-for-parents'        => 'tips-for-parent',
    'parent-resources/health-safety-policies' => 'health-safety-policies',
    'parent-resources/testimonials'           => 'testimonial',
    'gallery/photos'                          => 'photos',
    'gallery/videos'                          => 'videos',
    'gallery/student-work-sample'             => 'student-work-sample',
];

if (isset($nestedToSlug[$requestPath])) {
    $page = $nestedToSlug[$requestPath];
} else {
    $page = $_GET['page'] ?? 'home';
    $page = preg_replace('/\.php$/i', '', $page);
    $page = trim($page, '/');
}

require_once __DIR__ . '/includes/program-config.php';
if (allenkids_is_program_slug($page)) {
    header('Location: ' . allenkids_program_public_path($page), true, 301);
    exit;
}

// If a matching standalone PHP page file exists, include it directly
$protectedPages = ['page-template', 'index', '404', 'sitemap', 'program-single', 'blog-detail', 'event-detail', 'gallery-detail'];
if ($page !== 'home' && !in_array($page, $protectedPages, true) && file_exists(__DIR__ . '/' . $page . '.php')) {
    include __DIR__ . '/' . $page . '.php';
    exit;
}

require_once __DIR__ . '/proxy/config.php';
require_once 'layouts/layout-function.php';

$pageSlug = $page;
$api_url = API_BASE_URL;

$pageApiUrl = rtrim(API_BASE_URL, '/') . "/api/pages/$pageSlug";
$pageCh = curl_init($pageApiUrl);
curl_setopt_array($pageCh, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_SSL_VERIFYPEER => (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')),
    CURLOPT_HTTPHEADER     => api_auth_headers(),
]);
$pageResponse = curl_exec($pageCh);
$pageHttpCode = curl_getinfo($pageCh, CURLINFO_HTTP_CODE);
curl_close($pageCh);

if ($pageResponse === false || empty($pageResponse) || $pageHttpCode !== 200) {
    header('HTTP/1.0 404 Not Found');
    if (file_exists(__DIR__ . '/404.php')) {
        include '404.php';
    }
    exit;
}

$pageData2 = json_decode($pageResponse, true);
if (!isset($pageData2['data']) || empty($pageData2['data'])) {
    header('HTTP/1.0 404 Not Found');
    if (file_exists(__DIR__ . '/404.php')) {
        include '404.php';
    }
    exit;
}

$heading = $pageData2['data']['sections'][0]['content_heading'] ?? '';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageData2['data']['title'] ?? '') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageData2['data']['meta_description']) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($pageData2['data']['meta_keywords']) ?>">
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
         <section class="about-brudcrumb md:h-[300px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white"><?= $pageData2['data']['title'] ?></h1>
             </div>
        </section>
       <?php
        // Render all sections dynamically
         renderDynamicSections($pageData2, $api_url);
        ?>
        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <?php include "includes/foot.php" ?>
    <script src="assets/js/kids.js" async></script>
 
</body>

</html>