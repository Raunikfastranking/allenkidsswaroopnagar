<?php
$page = "virtual-tour";
include_once "proxy/api.php";
include_once "proxy/apis.php";
require_once "layouts/layout-function.php";
$pageData = $virtual_data;

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $admission_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?php echo  $admission_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?php echo  $admission_data['data']['meta_keywords'] ?? "" ?>">
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
                <h1 class="text-[42px] font-[400] text-white">Virtual Tour</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#fff] sm:text-[16px] text-[12px]">Gallery</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="https://allenkid.fastranking.tech/virtual-tour.php" class="text-[#FAB319] sm:text-[16px] text-[12px]">Virtual
                            Tour</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->


        <section class="mt-20 py-10">
            <?php foreach ($virtual_data['data']['sections'][1]['resolved_content']['media'] as $video) {
                $embedUrl = '';
                $videoUrl = $video['media_url'] ?? '';  // <-- get URL from API

                if (!empty($videoUrl)) {
                    $urlParts = parse_url($videoUrl);

                    if (isset($urlParts['host']) && (strpos($urlParts['host'], 'youtube.com') !== false)) {
                        if (isset($urlParts['query'])) {
                            parse_str($urlParts['query'], $queryVars);
                            if (!empty($queryVars['v'])) {
                                $embedUrl = "https://www.youtube.com/embed/" . $queryVars['v'];
                            }
                        }
                    } elseif (isset($urlParts['host']) && (strpos($urlParts['host'], 'youtu.be') !== false)) {
                        $videoId = ltrim($urlParts['path'], '/');
                        $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                    }
                }
            ?>
                <?php if (!empty($embedUrl)) { ?>
                    <div class="max-w-5xl mx-auto aspect-video comman-container-1050">
                        <iframe class="w-full h-full rounded-xl"
                            src="<?= $embedUrl ?>"
                            title="YouTube video"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                <?php } ?>
            <?php } ?>
        </section>
        <!--==== END ====-->


        <!--==== NEWSLETTER START =====-->
        <?php include "includes/newsletter.php" ?>
        <!--==== END ====-->

          <!--==== Dynamic Section ====-->
        <?php
          renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->

        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <script src="assets/js/kids.js" async></script>
</body>

</html>