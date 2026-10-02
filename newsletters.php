<?php
$page = "newsletters";
require_once "proxy/api.php";
require_once "proxy/apis.php";
$newsData = fetchApiData("api/pages/newsletters-swaroop-nagar");
require_once "layouts/layout-function.php";
$pageData = $newsData;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $newsData['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $newsData['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $newsData['data']['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                <h1 class="text-[42px] font-[400] text-white">Newsletters</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#fff] sm:text-[16px] text-[12px]">News and Updates</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="/newsletters" class="text-[#FAB319] sm:text-[16px] text-[12px]">Newsletters</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START =====-->
        <section class="mt-7 mb-5">
            <div class="comman-container-1050">
                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)"
                                fill="url(#pattern0_293_580)" />
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                         <?php echo strip_tags($newsData['data']['sections'][1]['content_heading'] ?? '') ?>
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.681641 0.0800781)"
                                fill="url(#pattern0_293_582)" />
                            <defs>
                                <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </h2>
                    <?php echo $newsData['data']['sections'][1]['content'] ?? "" ?>
                </div>
                <div class="mt-10">
                    <div
                        class="bg-[#FCF9F4] rounded-[16px] md:py-10 md:px-12 py-8 px-3 md:flex items-center gap-12 mt-10">
                        <div><img src="<?php echo $newsData['data']['sections'][1]['columns'][0]['image_url'] ?? "" ?>"
                                alt="<?= htmlspecialchars($newsData['data']['sections'][1]['columns'][0]['image_alt'] ?? $newsData['data']['sections'][1]['columns'][0]['image_alt_text'] ?? '') ?>"></div>
                        <div>
                            <h3 class="text-black text-[20px] mt-5">
                                <?php echo $newsData['data']['sections'][1]['columns'][1]['content_heading'] ?? "" ?>
                            </h3>
                            <p class="text-black text-[18px]  flex  gap-2 items-baseline mt-2">
                                <?php echo $newsData['data']['sections'][1]['columns'][1]['content'] ?? "" ?></p>
                        </div>
                    </div>

                    <div
                        class="bg-[#FCF9F4] rounded-[16px] md:py-10 md:px-12 py-8 px-3 flex flex-col-reverse md:flex-row items-center md:gap-12 md:mt-10">
                        <div>
                            <!-- <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3> -->
                            <h3 class="text-black text-[20px] mt-5">
                                <?php echo $newsData['data']['sections'][2]['columns'][0]['content_heading'] ?? "" ?>
                            </h3>
                            <p class="text-black text-[18px]  flex  gap-2 items-baseline mt-2">
                                <?php echo $newsData['data']['sections'][2]['columns'][0]['content'] ?? "" ?></p>
                        </div>
                        <div>
                            <img src="<?php echo $newsData['data']['sections'][2]['columns'][1]['image_url'] ?? "" ?>"
                               alt="<?= htmlspecialchars($newsData['data']['sections'][2]['columns'][1]['image_alt'] ?? $newsData['data']['sections'][2]['columns'][1]['image_alt_text'] ?? '') ?>">
                        </div>
                    </div>
                    <div
                        class="bg-[#FCF9F4] rounded-[16px] md:py-10 md:px-12 py-8 px-3 md:flex items-center gap-12 mt-10">
                        <div><img src="<?php echo $newsData['data']['sections'][3]['columns'][0]['image_url'] ?? "" ?>"
                                alt="<?= htmlspecialchars($newsData['data']['sections'][3]['columns'][0]['image_alt'] ?? $newsData['data']['sections'][3]['columns'][0]['image_alt_text'] ?? '') ?>"></div>
                        <div>
                            <h3 class="text-black text-[20px] mt-5">
                                <?php echo $newsData['data']['sections'][3]['columns'][1]['content_heading'] ?? "" ?>
                            </h3>
                            <p class="text-black text-[18px]  flex  gap-2 items-baseline mt-2">
                                <?php echo $newsData['data']['sections'][3]['columns'][1]['content'] ?? "" ?></p>
                        </div>
                    </div>
                </div>
                <div class="mt-12  mx-auto">
                    <div>
                        <img src="<?php echo $newsData['data']['sections'][4]['columns'][0]['image_url'] ?? "" ?>"
                            alt="<?= htmlspecialchars($newsData['data']['sections'][4]['columns'][0]['image_alt'] ?? $newsData['data']['sections'][4]['columns'][0]['image_alt_text'] ?? '') ?>">
                    </div>
                </div>
                <div class="mt-10 text-center">
                    <h3 class="text-black text-[20px] mt-5">
                        <?php echo $newsData['data']['sections'][5]['content_heading'] ?? "" ?></h3>
                    <p class="text-center text-gray-500 text-[30px]    mx-auto mt-2 md:w-[52%]">
                        <?php echo $newsData['data']['sections'][5]['content'] ?? "" ?>
                    </p>
                </div>
                <!-- <div class="mt-10 md:flex items-center gap-8">
                    <div>
                        <img src="./assets/images/news2.png"
                            alt="">
                        <div class="mt-3">
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                            <p class=" text-gray-500 text-[18px] mt-2">Nemo enim ipsam voluptatem
                                quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </div>
                    <div>
                        <img src="./assets/images/news2.png"
                            alt="">
                        <div class="mt-3">
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                            <p class=" text-gray-500 text-[18px] mt-2">Nemo enim ipsam voluptatem
                                quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </div>
                    <div>
                        <img src="./assets/images/news2.png"
                            alt="">
                        <div class="mt-3">
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                            <p class=" text-gray-500 text-[18px] mt-2">Nemo enim ipsam voluptatem
                                quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </div>

                </div> -->
        </section>
        <!-- <section class="mt-7">
            <div class="comman-container-1050">
                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)"
                                fill="url(#pattern0_293_580)" />
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                        Newsletters
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.681641 0.0800781)"
                                fill="url(#pattern0_293_582)" />
                            <defs>
                                <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </h2>
                    <h2 class="text-[45px] leading-11 mt-4 text-[#2C4073]">Our Teaching Culture</h2>
                </div>
                <div class="mt-10">
                    <div class="bg-[#FCF9F4] rounded-[16px] py-10 px-12 sm:flex items-center gap-12">
                        <div><img
                                src="./assets/images/news1.png"
                                alt=""></div>
                        <div>
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam </h3>
                            <p class="text-black text-[18px]  flex  gap-2 items-baseline mt-2">Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                dolores eos qui ratione voluptatem sequi nesciunt. </p>
                        </div>
                    </div>

                    <div class="bg-[#FCF9F4] rounded-[16px] py-10 px-12 sm:flex items-center gap-12 mt-10">

                        <div>
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam </h3>
                            <p class="text-black text-[18px]  flex  gap-2 items-baseline mt-2">Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                dolores eos qui ratione voluptatem sequi nesciunt. </p>
                        </div>
                        <div><img
                                src="./assets/images/news1.png"
                                alt=""></div>
                    </div>

                    <div class="bg-[#FCF9F4] rounded-[16px] py-10 px-12 sm:flex items-center gap-12 mt-10">
                        <div><img
                                src="./assets/images/news1.png"
                                alt=""></div>
                        <div>
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam </h3>
                            <p class="text-black text-[18px]  flex  gap-2 items-baseline mt-2">Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                dolores eos qui ratione voluptatem sequi nesciunt. </p>
                        </div>
                    </div>




                </div>

                <div class="mt-12 w-[80%] mx-auto">
                    <div>
                        <img src="./assets/images/news3.png"
                            alt="">
                    </div>
                </div>
                <div class="mt-10 text-center">
                    <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                    <p class="text-center text-gray-500 text-[30px]    mx-auto mt-2 w-[52%]">Nemo enim ipsam voluptatem
                        quia voluptas sit aspernatur aut
                        odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt. </p>

                </div>

                <div class="mt-10 sm:flex items-center gap-8">
                 
                    <div>
                        <img src="./assets/images/news2.png"
                            alt="">
                        <div class="mt-3">
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                            <p class=" text-gray-500 text-[18px] mt-2">Nemo enim ipsam voluptatem
                                quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </div>
                    <div>
                        <img src="./assets/images/news2.png"
                            alt="">
                        <div class="mt-3">
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                            <p class=" text-gray-500 text-[18px] mt-2">Nemo enim ipsam voluptatem
                                quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </div>
                    <div>
                        <img src="./assets/images/news2.png"
                            alt="">
                        <div class="mt-3">
                            <h3 class="text-black text-[20px] mt-5">Heading ipsam</h3>
                            <p class=" text-gray-500 text-[18px] mt-2">Nemo enim ipsam voluptatem
                                quia voluptas sit aspernatur aut
                                odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                                voluptatem sequi nesciunt. </p>
                        </div>
                    </div>

                </div>
        </section> -->

        <!-- <p class="flex items-center justify-center mt-10"> DATA WILL BE FETCHED FROM API</p> -->
        <!--==== END ====-->

   <!--==== Dynamic Section ====-->
        <?php
           renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->
        
        <!--==== NEWSLETTER START =====-->
        <?php include "includes/newsletter.php" ?>
        <!--==== END ====-->

        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <script src="assets/js/kids.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function scrollCarousel(direction) {
            const container = document.getElementById("carousel");
            const scrollAmount = 320; // Adjust based on card width and gap
            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>