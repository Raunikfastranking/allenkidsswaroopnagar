<?php
$page = "event-detail";
require_once "proxy/api.php";

$event = null;
$id = $_GET['id'] ?? null;

if ($id !== null) {
    $eventData = fetchApiData("api/galleries/events/branch/4");

    if (!empty($eventData['data']) && is_array($eventData['data'])) {
        foreach ($eventData['data'] as $item) {
            if ((string)$item['id'] === (string)$id) {
                $event = $item;
                break;
            }
        }
    }
}

// Fallback values
$page_title    = $event['heading'] ?? $event['title'] ?? 'Event';
$description   = $event['content'] ?? $event['description'] ?? 'No description available.';
$meta_desc     = $event['meta_description'] ?? '';
$meta_keywords = $event['meta_keywords'] ?? '';
// Redirect legacy event URLs and handle missing content
if ($id !== null && !empty($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'event-detail') !== false) {
    header('Location: /event/' . rawurlencode($id), true, 301);
    exit;
}

if ($event === null) {
    http_response_code(404);
    include '404.php';
    exit;
}

$canonicalUrl = '/event/' . $id;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allen Kids SwaroopNagar | <?= htmlspecialchars(strip_tags($page_title)) ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-preview {
            height: 300px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
            text-align: center;
            padding: 1.25rem;
        }
        .pdf-preview:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px -4px rgba(220,38,38,0.15);
            border-color: #f87171;
        }
        .pdf-icon {
            font-size: 4rem;
            color: #dc2626;
            margin-bottom: 0.75rem;
        }
        .pdf-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #991b1b;
        }
        .pdf-hint {
            margin-top: 0.75rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <?php include "includes/header.php"; ?>

    <main>

        <!-- Breadcrumb / Hero -->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[36px] md:text-[42px] font-[400] text-white">
                    <?php echo htmlspecialchars(strip_tags($page_title)); ?>
                </h1>
                <ul class="flex items-center gap-3 justify-center mt-4">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[13px]">Home</a></li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg>
                    </li>
                    <li><a href="/events" class="text-white sm:text-[16px] text-[13px]">Events</a></li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg>
                    </li>
                    <li>
                        <span class="text-[#FAB319] sm:text-[16px] text-[13px] truncate max-w-[180px] md:max-w-[300px]">
                            <?php echo htmlspecialchars(strip_tags($page_title)); ?>
                        </span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Main Content -->
        <section class="mt-10 mb-16">
            <div class="xl:w-[1280px] lg:w-[1080px] sm:mx-auto mx-4 px-2">
                <?php if ($event === null): ?>
                    <div class="text-center py-20">
                        <h2 class="text-3xl font-bold text-gray-700 mb-4">Event Not Found</h2>
                        <p class="text-gray-600 mb-8 max-w-xl mx-auto">
                            The requested event could not be found or may have been removed.
                        </p>
                        <a href="/events" class="inline-block px-8 py-3 bg-[#FF454A] text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                            Back to Events
                        </a>
                    </div>
                <?php else: ?>

                    <!-- Description -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-[32px] font-bold text-[#000] mb-5">Description</h2>
                        <p class="text-[#70747F] text-[18px] md:text-[20px] max-w-5xl mx-auto leading-relaxed">
                            <?php echo htmlspecialchars(strip_tags($description)) ?>
                        </p>
                    </div>

                    <!-- Media Grid -->
                    <?php if (!empty($event['media']) && is_array($event['media'])): ?>
                        <div class="grid gap-4 md:gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                            <?php foreach ($event['media'] as $media): 
                                $url = $media['media_url'] ?? '';
                                if (empty($url)) continue;

                                $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));
                                $is_pdf = $ext === 'pdf';
                            ?>
                                <div class="media-item group">
                                    <?php if ($is_pdf): ?>
                                        <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener noreferrer" class="block no-fancybox">
                                            <div class="pdf-preview">
                                                <div class="pdf-icon">📄</div>
                                                <div class="pdf-label">PDF Document</div>
                                                <div class="pdf-hint">Click to view / download</div>
                                            </div>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= htmlspecialchars($url) ?>" 
                                           data-fancybox="event-gallery" 
                                           data-caption="<?= htmlspecialchars($page_title) ?>">
                                            <img src="<?= htmlspecialchars($url) ?>" 
                                                 alt="<?= htmlspecialchars($media['media_alt_text'] ?? 'Event media') ?>"
                                                 loading="lazy"
                                                 class="rounded-lg shadow-lg w-full h-[300px] object-cover transition-transform duration-300 group-hover:scale-[1.03]">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-16 text-gray-600 text-xl bg-gray-50 rounded-xl border border-gray-200">
                            No media available for this event.
                        </div>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </section>

        <!-- Legacy Section -->
        <?php include "includes/legacy.php"; ?>

    </main>

    <?php include "includes/footer.php"; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/kids.js" async></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="event-gallery"]', {
            Thumbs: { showOnStart: false },
            Images: { initialSize: "fit" }
        });
    </script>

</body>
</html>