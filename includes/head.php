<?php require_once __DIR__ . '/form-proxy-config.php'; ?>
<?php require_once __DIR__ . '/allen-site-root.php'; ?>
<base href="<?php echo ($AllenSiteRoot ? $AllenSiteRoot : '') . '/'; ?>">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="./assets/images/favi.png">

<?php
$__siteConfig = require __DIR__ . '/seo-site-config.php';
$__defaultHost = (is_array($__siteConfig) && !empty($__siteConfig['default_host'])) ? $__siteConfig['default_host'] : ($_SERVER['HTTP_HOST'] ?? 'localhost');
$__host = $_SERVER['HTTP_HOST'] ?? $__defaultHost;
$__host = preg_replace('/^www\./i', '', $__host);
$__localHosts = ['localhost', '127.0.0.1', '192.168.1.195'];
if (in_array($__host, $__localHosts, true) || preg_match('/\.localhost$/i', $__host)) {
    $__host = $__defaultHost;
}
$__canonical = $canonicalUrl ?? ($GLOBALS['canonicalUrl'] ?? null);
if (empty($__canonical)) {
    $__path = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI'] ?? '/');
    $__path = preg_replace('/\.php$/i', '', $__path);
    $__path = preg_replace('/^\/index$/i', '/', $__path);
    $__path = preg_replace('/^\/home$/i', '/', $__path);
    if ($__path === '') {
        $__path = '/';
    }
    $__canonical = 'https://' . $__host . $__path;
} else {
    if (stripos($__canonical, 'http') !== 0) {
        $__canonical = 'https://' . $__host . (str_starts_with($__canonical, '/') ? $__canonical : '/' . $__canonical);
    }
    $__canonical = preg_replace('/^https?:\/\/www\./i', 'https://', $__canonical);
}
$__responseCode = http_response_code();
$__explicitNoindex = !empty($noindex) || !empty($GLOBALS['noindex']);
$__robots = ($__responseCode && $__responseCode !== 200) || $__explicitNoindex ? 'noindex, follow' : 'index, follow';
?>
<meta name="robots" content="<?= htmlspecialchars($__robots) ?>" />
<?php if (!empty($__canonical)): ?>
<link rel="canonical" href="<?= htmlspecialchars($__canonical, ENT_QUOTES, 'UTF-8') ?>" />
<?php endif; ?>
<meta name="google-site-verification" content="zdfW9vnGllU6QkkPlCJqUeyulYU5G5i0mNC-daEIFAE" />
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5FQK929');</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "@id": "https://allenkidsswaroopnagar.in/#website",
  "url": "https://allenkidsswaroopnagar.in/",
  "name": "Allen Kids Swaroop Nagar",
  "alternateName": "Allen Kids Preschool Swaroop Nagar",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://allenkidsswaroopnagar.in/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Preschool",
  "@id": "https://allenkidsswaroopnagar.in/#preschool",
  "name": "Allen Kids Swaroop Nagar",
  "alternateName": "Allen Kids Preschool Swaroop Nagar",
  "url": "https://allenkidsswaroopnagar.in/",
  "logo": "https://allenkids.allenhouseschools.com/upload/images/1756976898_logo_kids.png",
  "image": "https://lh3.googleusercontent.com/p/AF1QipPzOlTyq5RDzePSs2ZGOFW61wzhsw5AF_APwT1f=s680-w680-h510-rw",
  "telephone": "+91-7800661660",
  "email": "contact@allenkidsswaroopnagar.in",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "113/212-213, Swaroop Nagar near Mehrotra Diagnostics Centre",
    "addressLocality": "Kanpur",
    "addressRegion": "Uttar Pradesh",
    "postalCode": "208002",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "26.4815224",
    "longitude": "80.3121135"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday", 
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "17:00"
  },
  "sameAs": [
    "https://www.facebook.com/allenkidsswaroopnagar/",
    "https://www.instagram.com/allenkidsswaroopnagar/",
    "https://www.youtube.com/@allenkidsswaroopnagar"
  ]
}
</script>
<?php
require_once __DIR__ . '/seo.php';
allenkids_render_og_meta_tags();
?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M9CMTWNH');</script>
<!-- End Google Tag Manager -->
