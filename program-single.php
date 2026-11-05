<?php
$page = "programs";
require_once 'proxy/api.php';
require_once 'proxy/apis.php';
require_once __DIR__ . '/includes/program-config.php';
allenkids_redirect_legacy_program_id();
$slug = allenkids_resolve_program_slug();
$legacyId = $slug ? allenkids_program_legacy_id_for_slug($slug) : null;
require_once __DIR__ . '/includes/session-api.php'; $sessions = allenkids_fetch_sessions();
// Default meta values
$metaTitle = "Allen Kids Swaroop Nagar";
$metaDescription = "Welcome to Allen Kids Swaroop Nagar — where little seeds grow!";
$metaKeywords = "preschool, playgroup, nursery, daycare, allen kids, Swaroop Nahar";
$contentData = "No Data";
$program = null;

// Fetch API data by CMS SEO slug
if ($slug) {
    $program = fetchApiData('api/pages/' . $slug);
}
// If API gives meta, use it
if ($program && isset($program['data'])) {
    $metaTitle = $program['data']['title'] ?? $metaTitle;
    $metaDescription = $program['data']['meta_description'] ?? $metaDescription;
    $metaKeywords = $program['data']['meta_keywords'] ?? $metaKeywords;
    $contentData  = $program['data']['sections'][1] ?? $contentData;
}
$canonicalUrl = $slug ? allenkids_program_canonical_url($slug) : null;
$GLOBALS['canonicalUrl'] = $canonicalUrl;
$ogMeta = [
    'title' => $metaTitle,
    'description' => $metaDescription,
    'url' => $canonicalUrl,
    'type' => 'website',
];
$GLOBALS['ogMeta'] = $ogMeta;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($metaTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">
    <?php include "includes/head.php" ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->
    <?php
    $programs = [
        "toddler" => [
            "url" => allenkids_program_slug_for_id('toddler'),
            "title" => "Toddler (1.5 to 2 years)",
            "description" => "Content Pending",
            "image" => "assets/images/our-class/toddler1.webp",
            "image2" => "assets/images/our-class/toddler2.webp",
            "image3" => "assets/images/our-class/toddler3.jpg",
            "p_image" => "assets/images/our-class/toddler.webp",
        ],
        "playgroup-1" => [
            "url" => allenkids_program_slug_for_id('playgroup-1'),
            "title" => "Playgroup 1 (2 to 3 years)",
            "description" => "Content Pending",
            "image" => "assets/images/our-class/p-g-2.webp",
            "image2" => "assets/images/our-class/p-g-3.webp",
            "image3" => "assets/images/our-class/p-g-4.webp",
            "p_image" => "assets/images/our-class/pg-1.webp",
        ],
        "playgroup-2" => [
            "url" => allenkids_program_slug_for_id('playgroup-2'),
            "title" => "Playgroup 2 (3 to 4 years)",
            "description" => "Content Pending",
            "image" => "assets/images/our-class/pg2.webp",
            "image2" => "assets/images/our-class/pg3.webp",
            "image3" => "assets/images/our-class/pg4.webp",
            "p_image" => "assets/images/our-class/pg-2.webp",
        ],
        "nursery" => [
            "url" => allenkids_program_slug_for_id('nursery'),
            "title" => "Nursery (4 to 5 years)",
            "description" => "Content Pending",
            "image" => "assets/images/our-class/n1.webp",
            "image2" => "assets/images/our-class/n2.webp",
            "image3" => "assets/images/our-class/n3.webp",
            "p_image" => "assets/images/our-class/nursery.webp",
        ],
        "preparatory" => [
            "url" => allenkids_program_slug_for_id('preparatory'),
            "title" => "Preparatory (5 to 6 years)",
            "description" => "Content Pending",
            "image" => "assets/images/our-class/pg22.webp",
            "image2" => "assets/images/our-class/pg33.webp",
            "image3" => "assets/images/our-class/pg44.webp",
            "p_image" => "assets/images/our-class/pre.webp",
        ],

    ];
    $program = null;
    if ($legacyId && isset($programs[$legacyId])) {
        $program = $programs[$legacyId];
    }
    ?>
    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="md:text-[42px] text-[28px] font-[400] text-white"><?php echo $program['title']; ?></h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/"
                            class="text-white flex items-center gap-2 md:text-[16px] text-[13px] sm:text-[16px] text-[12px]">Home
                        </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#fff] md:text-[16px] text-[13px] sm:text-[16px] text-[12px]">Program</a>
                    </li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href=""
                            class="text-[#FAB319] md:text-[16px] text-[13px] sm:text-[16px] text-[12px]"><?php echo $program['title']; ?></a>
                    </li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START ====-->
        <section class="mt-10 mb-10">
            <div class="comman-container-1280">

                <div class="md:flex gap-10 mt-5">
                    <div class="md:w-[70%]">
                        <?= $contentData['columns'][0]['content'] ?? "" ?>
                    </div>

                    <div class="md:w-[30%] md:mt-0 mt-10">
                        <!-- INFORMATION -->
                        <div class="bg-[#DD5AC4]">
                            <div class="flex gap-4 p-3 items-center">
                                <img src="assets/images/program/book.png" class="w-[35px]" alt="Book">
                                <h2 class="text-[22px] text-white">Informations</h2>
                            </div>
                        </div>
                        <div class="border-[2px] border-[#DBDBDB]">

                            <ul class="mt-2">
                                <li class="flex justify-between items-center border-b-[1px] border-[#E8EBF0] p-5">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#2C4073"
                                                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m.5-13H11v6l5.2 3.2l.8-1.3l-4.5-2.7z" />
                                        </svg>
                                        <h3 class="text-[18px] text-[#2C4073]">Class Time</h3>
                                    </div>
                                    <?= $contentData['columns'][1]['content'] ?>
                                </li>
                                <li class="flex justify-between items-center border-b-[1px] border-[#E8EBF0] p-5">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 1024 1024">
                                            <path fill="#2C4073"
                                                d="m960 95.888l-256.224.001V32.113c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76h-256v-63.76c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76H64c-35.344 0-64 28.656-64 64v800c0 35.343 28.656 64 64 64h896c35.344 0 64-28.657 64-64v-800c0-35.329-28.656-63.985-64-63.985m0 863.985H64v-800h255.776v32.24c0 17.679 14.32 32 32 32s32-14.321 32-32v-32.224h256v32.24c0 17.68 14.32 32 32 32s32-14.32 32-32v-32.24H960zM736 511.888h64c17.664 0 32-14.336 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32m0 255.984h64c17.664 0 32-14.32 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.696 14.336 32 32 32m-192-128h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32m0-255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m-256 0h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m0 255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32" />
                                        </svg>
                                        <h3 class="text-[18px] text-[#2C4073]">Days</h3>
                                    </div>
                                    <?= $contentData['columns'][1]['content_heading'] ?>
                                </li>

                            </ul>

                            <div class="my-8">
                                <a href="javascript:void(0)" onclick="openModal()"
                                    class="mx-auto bg-[#FF454A] transition-all hover:translate-x-1 text-white w-[250px] flex justify-between items-center px-3 h-[50px] rounded-[10px] text-[18px] uppercase">
                                    Enroll Now
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M18.5 12.214a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h12.5a1 1 0 0 0 1-1"
                                            clip-rule="evenodd"></path>
                                        <path fill="#fff" fill-rule="evenodd"
                                            d="M20 12.214a1 1 0 0 0-.293-.707l-4.5-4.5a1 1 0 1 0-1.414 1.414l3.793 3.793l-3.793 3.793a1 1 0 0 0 1.414 1.415l4.5-4.5a1 1 0 0 0 .293-.708"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- PROGRAM -->
                        <div class="bg-[#FF972D] mt-8">
                            <div class="flex gap-4 p-3 items-center">
                                <img src="assets/images/program/book.png" alt="Book">
                                <h2 class="text-[22px] text-white">Our Program</h2>
                            </div>
                        </div>
                        <div class="border-[2px] border-[#DBDBDB]">
                            <ul class="mt-2">
                                <?php foreach ($programs as $program): ?>
                                    <?php if (!isset($program["p_image"])) continue; ?>
                                    <li class="border-b-[1px] border-[#E8EBF0] p-5">
                                        <a href="<?= htmlspecialchars(allenkids_program_public_path($program['url'])) ?>">
                                            <div class="flex gap-4 items-center">
                                                <img src="<?php echo $program["p_image"]; ?>" alt="Image One"
                                                    class="w-[100px] h-[75px] object-cover">
                                                <div>
                                                    <h2 class="text-[#1AB9FF] text-[18px]"><?php echo $program["title"]; ?>
                                                    </h2>
                                                    <h3 class="text-[20px] text-[#2C4073]"> </h3>
                                                    <!-- <h4 class="text-[#F66]"><span class="text-[#70747F]">By</span> Alka Ghosh</h4> -->
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!-- Modal -->
        <div id="enquiryModal" class="fixed inset-0 bg-white/30 flex items-center justify-center z-[999] hidden">
            <!-- Modal Container -->
            <div class="bg-[#2C4073] p-6 rounded-[10px]  relative">
                <!-- Close Button -->
                <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
                <div class="md:w-[400px] md:mx-auto mx-4">
                    <div>
                        <h2 class="text-[32px] font-[500] text-white text-center">Enquiry For Session</h2>
                        <div>
                            <?php $eeFormId = 'ee-form-11-modal'; include __DIR__ . '/includes/enquiry-widget.php'; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- END -->
        <!--==== START ====-->
        <?php include "includes/legacy.php"; ?>
        <!--==== END ====-->
        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!--==== End ====-->
    </main>
    <!--==== End ====-->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/kids.js" async></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        function openModal() {
            document.getElementById("enquiryModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("enquiryModal").classList.add("hidden");
        }

        // Optional: Close modal when clicking outside the modal content
        window.addEventListener("click", function(e) {
            const modal = document.getElementById("enquiryModal");
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>


</body>

</html>