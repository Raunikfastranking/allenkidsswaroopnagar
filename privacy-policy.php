<?php
$page = "privacy-policy";
require_once "proxy/config.php";
include_once "proxy/api.php";
include_once "proxy/apis.php";
$pri_data = $privacy_data['data']['sections'][1]['columns'][0]['content'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($privacy_data['data']['title'] ?? (ALLENKIDS_SITE_NAME . ' | Privacy Policy')) ?></title>
    <meta name="description" content="<?= htmlspecialchars($privacy_data['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($privacy_data['data']['meta_keywords'] ?? '') ?>">
    <?php include "includes/head.php" ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->


    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Privacy Policy</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="#" class="text-[#FAB319] sm:text-[16px] text-[12px]">Privacy Policy</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->
        <!--==== Latest Classes ====-->
        <section class="md:mt-2">
            <div class="2xl:w-[1500px] xl:w-[1280px] lg:w-[1080px] sm:mx-auto mx-4">
                <?= $pri_data ?>
            </div>
        </section>
        <!-- END -->

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