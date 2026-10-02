<?php 
$page = "student-work-sample";
require_once "proxy/api.php";

// Fetch galleries for this branch
$galleryData = fetchApiData("api/galleries/branch/2");

// Sort galleries by date descending (newest first)
if (!empty($galleryData['data']) && is_array($galleryData['data'])) {
    usort($galleryData['data'], function($a, $b) {
        $dateA_raw = !empty($a['date']) && $a['date'] !== '0000-00-00' && $a['date'] !== '0000-00-00 00:00:00'
                   ? $a['date']
                   : ($a['created_at'] ?? '1970-01-01 00:00:00');

        $dateB_raw = !empty($b['date']) && $b['date'] !== '0000-00-00' && $b['date'] !== '0000-00-00 00:00:00'
                   ? $b['date']
                   : ($b['created_at'] ?? '1970-01-01 00:00:00');

        $timeA = strtotime($dateA_raw);
        $timeB = strtotime($dateB_raw);

        return $timeB <=> $timeA; // newest → oldest
    });
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allen Kids Swaroop Nagar | Student Work Samples</title>
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-preview-card {
            height: 275px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: 10px 10px 0 0;
        }
        .pdf-preview-card:hover {
            background: #e9ecef;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
        <!-- Breadcrumb -->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Student Work Samples</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#fff" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="/photos" class="text-[#fff] sm:text-[16px] text-[12px]">Gallery</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="/student-work-sample" class="text-[#FAB319] sm:text-[16px] text-[12px]">Student Work Samples</a></li>
                </ul>
            </div>
        </section>
        <!-- End Breadcrumb -->

        <!-- Gallery Section -->
        <section class="mt-7 relative">
            <div class="absolute md:left-10 left-2 md:top-[50px] top-0">
                <img src="assets/images/gallery/line-f.webp" alt="Left Background" class="md:w-[150px] w-[50px]" />
            </div>
            <div class="absolute left-0 bottom-0">
                <img src="assets/images/gallery/brush.webp" alt="Left Background" class="md:w-[150px] w-[80px]" />
            </div>
            <div class="absolute right-0 bottom-0">
                <img src="assets/images/gallery/r-arrow.webp" alt="Right Background" class="md:w-[100px] w-[50px]" />
            </div>

            <div class="comman-container relative z-10">
                <div class="absolute md:right-1 right-0 md:top-[50px] top-0">
                    <img src="assets/images/gallery/car.png" alt="Car Background" class="md:w-[150px] w-[50px]" />
                </div>

                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Your SVG pattern here - kept as is -->
                        </svg>
                        Student Work Samples
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Your SVG pattern here - kept as is -->
                        </svg>
                    </h2>
                    <h2 class="md:text-[45px] md:leading-11 leading-9 text-[26px] mt-4 text-[#2C4073]">Explore Our Student Work Samples</h2>
                </div>

                <div class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5 md:mt-10 mt-5">
                    <?php
                    $bgColors = ['#F69D48', '#BF45AA', '#F22F35'];
                    $ribbonImages = [
                        'assets/images/gallery/g-red.webp',
                        'assets/images/gallery/g-green.webp',
                        'assets/images/gallery/g-orange.webp'
                    ];

                    if (!empty($galleryData['data'])) {
                        $i = 0;
                        foreach ($galleryData['data'] as $gallery) {
                            $id       = $gallery['id'];
                            $title    = strip_tags($gallery['heading'] ?? 'Untitled');
                            $content  = $gallery['content'] ?? '';
                            $category = !empty($gallery['categories'][0]['name']) ? $gallery['categories'][0]['name'] : 'Student Work';

                            if (!empty($gallery['media'])) {
                                $media     = $gallery['media'][0];
                                $bgColor   = $bgColors[$i % 3];
                                $ribbonImg = $ribbonImages[$i % 3];
                                $media_url = $media['media_url'] ?? "assets/images/gallery/gallery1.webp";

                                $ext = strtolower(pathinfo($media_url, PATHINFO_EXTENSION));
                                $is_pdf = ($ext === 'pdf');

                                $rawDate = !empty($gallery['date']) && $gallery['date'] !== '0000-00-00' && $gallery['date'] !== '0000-00-00 00:00:00'
                                    ? $gallery['date']
                                    : ($gallery['created_at'] ?? '');

                                if ($rawDate && strtotime($rawDate) !== false) {
                                    $dayMonth = date("d M", strtotime($rawDate));
                                    $year     = date("Y",   strtotime($rawDate));
                                } else {
                                    $dayMonth = '-- --';
                                    $year     = '----';
                                }
                    ?>
                                <div class="relative gallery-item"
                                     data-title="<?= htmlspecialchars(strip_tags(trim($title))) ?>">

                                    <a data-fancybox="gallery<?= $id ?>" data-src="<?= htmlspecialchars($media_url) ?>">
                                        <?php if ($is_pdf): ?>
                                            <div class="pdf-preview-card">
                                                <svg class="w-16 h-20 text-red-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 14h-3v3h-2v-3H8v-2h3v-3h2v3h3v2z"/>
                                                </svg>
                                                <div class="text-sm font-medium text-gray-700">Student Work</div>
                                                <div class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">PDF</div>
                                            </div>
                                        <?php else: ?>
                                            <img src="<?= htmlspecialchars($media_url) ?>"
                                                 class="w-[100%] md:h-[275px] h-[250px] object-cover rounded-[10px]"
                                                 alt="<?= htmlspecialchars($media['media_alt_text'] ?? $media['media_alt'] ?? strip_tags(trim($title))) ?>" />
                                        <?php endif; ?>
                                    </a>

                                    <div class="absolute bottom-[30px] left-0 right-0 p-4 text-white rounded-b-[10px] relative z-10"
                                         style="background: <?= $bgColor ?>;">
                                        <div class="absolute top-[-51px] md:right-[20px] right-[5px]">
                                            <div class="relative">
                                                <img src="<?= $ribbonImg ?>" alt="Ribbon" class="md:w-[100px] w-[75px]" />
                                                <p class="absolute md:top-[28px] top-[22px] left-5 md:text-[19px] text-[15px] md:leading-[24px] leading-[18px] font-semibold text-center">
                                                    <?= htmlspecialchars($dayMonth) ?><br><?= htmlspecialchars($year) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3 border-b-[1px] border-[#e7b78a] pb-[14px]">
                                            <div class="md:text-[16px] text-[14px] font-[400]">
                                                Category : <span class="font-[500]"><?= htmlspecialchars($category) ?></span>
                                            </div>
                                            <div class="md:text-[16px] text-[14px] font-[400]">
                                                Total Item(s) : <span class="font-[500]"><?= count($gallery['media']) ?></span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h2 class="md:text-[24px] text-[22px] md:leading-7 leading-7">
                                                <?= htmlspecialchars($title) ?>
                                            </h2>
                                            <a href="/gallery/<?= urlencode($id) ?>"
                                               class="rounded-[20px] bg-[#F22F35] text-white w-[100%] block text-center h-[47px] text-[17px] mt-[20px] transition-all hover:bg-[#c4171d] p-[10px]">
                                                View More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                                $i++;
                            }
                        }
                    } else {
                    ?>
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-600 text-lg">No student work samples found at this time.</p>
                            <p class="text-gray-500 mt-2">Please check back later or contact the school administration.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- End Gallery Section -->

        <!-- Newsletter -->
        <?php include "includes/newsletter.php" ?>
        <!-- End -->

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>

    <!-- Scripts -->
    <script src="assets/js/kids.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox]', {
            // You can add fancybox options here if needed
        });

        // Optional: client-side title search
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const items = document.querySelectorAll('.gallery-item');

            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    const term = searchInput.value.toLowerCase().trim();
                    let visible = 0;

                    items.forEach(item => {
                        const title = item.getAttribute('data-title')?.toLowerCase() || '';
                        if (title.includes(term)) {
                            item.style.display = '';
                            visible++;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>