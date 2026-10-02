<?php
$page = "events";
require_once "proxy/config.php";
include_once "proxy/api.php";
include_once "proxy/apis.php";

$eventsPage = fetchApiData("api/pages/events-swaroop-nagar");

// Sort events by created_at descending (newest first)
if (!empty($eventData['data']) && is_array($eventData['data'])) {
    usort($eventData['data'], function($a, $b) {
        // Fallback to very old date if missing/invalid
        $dateA = !empty($a['created_at']) && strtotime($a['created_at']) !== false 
               ? $a['created_at'] 
               : '1970-01-01 00:00:00';

        $dateB = !empty($b['created_at']) && strtotime($b['created_at']) !== false 
               ? $b['created_at'] 
               : '1970-01-01 00:00:00';

        $timeA = strtotime($dateA);
        $timeB = strtotime($dateB);

        // Newest first → $b before $a
        return $timeB <=> $timeA;
    });
}
?>

<?php
function strip_html_tags($html) {
    $html = preg_replace('/<head[^>]*>.*?<\/head>/si', '', $html);
    $html = preg_replace('/<style[^>]*>.*?<\/style>/si', '', $html);
    $html = preg_replace('/<script[^>]*>.*?<\/script>/si', '', $html);
    $html = preg_replace('/<[^>]*>/', ' ', $html); // Remove all tags
    $html = preg_replace('/\s+/', ' ', $html);     // Collapse whitespace
    return trim($html);
}

function fully_clean_text($text) {
    if (empty($text)) return '';
    
    // Fully decode any encoded entities repeatedly
    $decoded = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $prev = '';
    while ($prev !== $decoded) {
        $prev = $decoded;
        $decoded = html_entity_decode($decoded, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    
    // Strip all HTML tags robustly
    return strip_html_tags($decoded);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($eventsPage['data']['title'] ?? (ALLENKIDS_SITE_NAME . ' | Events')) ?></title>
    <meta name="description" content="<?= htmlspecialchars($eventsPage['data']['meta_description'] ?? '') ?>">
    <?php include "includes/head.php"; ?>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
        <!-- Bradcrumb -->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Events</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">Events</a></li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!--==== EVENT START =====-->
        <section class="mb-20 py-10">
            <div class="comman-container-1280">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-10 mx-4">
                    <?php 
                    if (empty($eventData['data'])) {
                        echo '<p class="text-center text-gray-600 col-span-full">No events found.</p>';
                    } else {
                        foreach($eventData['data'] as $data){ 
                            // Clean title
                            $cleanTitle = fully_clean_text($data['heading'] ?? 'Untitled Event');
                            
                            // Clean description (prefer 'description' or 'content' field if exists)
                            $descField = $data['description'] ?? $data['content'] ?? $data['heading'] ?? '';
                            $cleanDesc = fully_clean_text($descField);
                            $truncatedDesc = substr($cleanDesc, 0, 140) . (strlen($cleanDesc) > 140 ? '...' : '');
                    ?>
                        <a href="/event/<?php echo $data['id']; ?>" class="group block transition-all duration-300">
                            <div class="bg-white rounded-2xl overflow-hidden flex flex-col h-full">
                                <!-- Image -->
                                <div class="relative overflow-hidden">
                                    <img 
                                        src="<?php echo $api_url; ?>/<?php echo $data['media'][0]['media_file'] ?? 'assets/images/placeholder.jpg'; ?>" 
                                        alt="<?= htmlspecialchars($data['media']['media_alt_text'] ?? 'Event') ?>" 
                                        class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110"
                                    />
                                    <div class="absolute bottom-0 left-0 right-0">
                                        <img src="assets/images/events/pink-bg.webp" class="w-full h-auto" alt="">
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="bg-[#DD5AC4] px-6 pt-6 pb-8 flex flex-col flex-grow rounded-b-2xl">
                                    <div class="flex justify-between text-white text-sm mb-4">
                                        <span class="flex items-center gap-2">
                                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.625 9H3.375C3.15625 9 3 8.84375 3 8.625V7.375C3 7.1875 3.15625 7 3.375 7H4.625C4.8125 7 5 7.1875 5 7.375V8.625C5 8.84375 4.8125 9 4.625 9ZM8 8.625C8 8.84375 7.8125 9 7.625 9H6.375C6.15625 9 6 8.84375 6 8.625V7.375C6 7.1875 6.15625 7 6.375 7H7.625C7.8125 7 8 7.1875 8 7.375V8.625ZM11 8.625C11 8.84375 10.8125 9 10.625 9H9.375C9.15625 9 9 8.84375 9 8.625V7.375C9 7.1875 9.15625 7 9.375 7H10.625C10.8125 7 11 7.1875 11 7.375V8.625ZM8 11.625C8 11.8438 7.8125 12 7.625 12H6.375C6.15625 12 6 11.8438 6 11.625V10.375C6 10.1875 6.15625 10 6.375 10H7.625C7.8125 10 8 10.1875 8 10.375V11.625ZM5 11.625C5 11.8438 4.8125 12 4.625 12H3.375C3.15625 12 3 11.8438 3 11.625V10.375C3 10.1875 3.15625 10 3.375 10H4.625C4.8125 10 5 10.1875 5 10.375V11.625ZM11 11.625C11 11.8438 10.8125 12 10.625 12H9.375C9.15625 12 9 11.8438 9 11.625V10.375C9 10.1875 9.15625 10 9.375 10H10.625C10.8125 10 11 10.1875 11 10.375V11.625ZM14 3.5V14.5C14 15.3438 13.3125 16 12.5 16H1.5C0.65625 16 0 15.3438 0 14.5V3.5C0 2.6875 0.65625 2 1.5 2H3V0.375C3 0.1875 3.15625 0 3.375 0H4.625C4.8125 0 5 0.1875 5 0.375V2H9V0.375C9 0.1875 9.15625 0 9.375 0H10.625C10.8125 0 11 0.1875 11 0.375V2H12.5C13.3125 2 14 2.6875 14 3.5ZM12.5 14.3125V5H1.5V14.3125C1.5 14.4375 1.5625 14.5 1.6875 14.5H12.3125C12.4062 14.5 12.5 14.4375 12.5 14.3125Z" fill="#fff"/>
                                            </svg>
                                            <?php echo date("M d, Y", strtotime($data['created_at'] ?? 'now')); ?>
                                        </span>
                                        <span class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                                <path d="M2.56836 5.93848L2.57324 5.92871C2.78173 5.53505 3.06293 5.21579 3.42383 4.99414C3.73959 4.80025 4.09596 4.69339 4.48047 4.66211L4.64648 4.65332H13.7373V3.7832C13.7223 3.52174 13.6344 3.31617 13.4785 3.14258C13.3049 2.98665 13.0994 2.89883 12.8379 2.88379H8.0293L7.88281 2.7373L6.18359 1.03711H1.7998C1.53377 1.05041 1.32418 1.13732 1.14844 1.29492C0.992154 1.4686 0.90476 1.67485 0.889648 1.93652V9.27832L2.56836 5.93848ZM13.2646 12.9619C13.4493 12.9509 13.5768 12.8779 13.6855 12.6973L16.4404 7.1875C16.5078 7.04312 16.5122 6.94419 16.4824 6.86035L16.4424 6.7793C16.3696 6.66618 16.2595 6.58834 16.0283 6.57617H4.68457C4.52142 6.58433 4.41519 6.63075 4.33594 6.72266L4.26465 6.83008L1.19824 12.9619H13.2646Z" stroke="#fff"/>
                                            </svg>
                                            Event
                                        </span>
                                    </div>

                                    <!-- Title -->
                                    <h2 class="text-2xl text-white font-medium leading-tight mb-3 line-clamp-2">
                                        <?php echo htmlspecialchars($cleanTitle, ENT_QUOTES, 'UTF-8'); ?>
                                    </h2>

                                    <!-- Description -->
                                    <p class="text-base text-white opacity-90 flex-grow line-clamp-3">
                                        <?php echo htmlspecialchars($truncatedDesc, ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                </div>

                                <!-- Fixed Arrow Button -->
                                <div class="flex justify-center mt-[-24px] pb-4">
                                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 group-hover:bg-[#DD5AC4]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" class="fill-[#DD5AC4] group-hover:fill-white transition-colors">
                                            <path fill-rule="evenodd" d="M10.159 10.72a.75.75 0 1 0 1.06 1.06l3.25-3.25L15 8l-.53-.53l-3.25-3.25a.75.75 0 0 0-1.061 1.06l1.97 1.97H1.75a.75.75 0 1 0 0 1.5h10.379z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php 
                        }
                    } 
                    ?>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--====Legacy START ====-->
        <?php include "includes/legacy.php" ?>
        <!--==== END ====-->

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/kids.js" async></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>