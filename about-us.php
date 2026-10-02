<?php
$page =  "about-us";
require_once "proxy/api.php";
require_once "proxy/apis.php";
require_once "layouts/layout-function.php";
$pageData = $about_data;
// print_r($about_data['data']['sections'][1]);
$about_us = $about_data['data']['sections'][1] ?? [];
$m_v_data = $about_data['data']['sections'][2] ?? [];
$legacy_data = $about_data['data']['sections'][3] ?? [];
$chairman_message = $about_data['data']['sections'][4] ?? [];
$principal_message = $about_data['data']['sections'][5] ?? [];
$our_teachers = $about_data['data']['sections'][6] ?? [];
$history_years = $about_data['data']['sections'][8] ?? [];
$register_data = $about_data['data']['sections'][9] ?? [];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $about_data['data']['title'] ?? ""  ?></title>
    <meta name="description" content="<?php echo  $about_data['data']['meta_description'] ?>">
    <meta name="keywords" content="<?php echo  $about_data['data']['meta_keywords'] ?>">
    <script type="application/ld+json">
{
  "@context": "https://schema.org", 
  "@type": "BreadcrumbList", 
  "itemListElement": [
    {
      "@type": "ListItem", 
      "position": 1, 
      "name": "Home",
      "item": "https://allenkidsswaroopnagar.in/"
    },
    {
      "@type": "ListItem", 
      "position": 2, 
      "name": "About Us",
      "item": "https://allenkidsswaroopnagar.in/about-us"
    }
  ]
}
</script>

    <?php include "includes/head.php"; ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>

    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[400px] bg-cover h-[200px]">
            <div class="text-center md:pt-30 pt-12">
                <h1 class="text-[42px] font-[400] text-white">About</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">About</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->
        <!--==== HISTORY US ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-5">
                    <div class="md:w-[50%]">
                       <?= $about_us['columns'][0]['content'] ?? ''; ?>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-7">
                         <?= $about_us['columns'][1]['content'] ?? ''; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== OUR MISSION & VISSION ====-->
        <section class="about-mv-bg relative md:mt-20 mt-10 pb-15">
            <div class="absolute left-0 top-40 animate-left-to-right">
                <img src="assets/images/leaf.png" class="md:w-[100%] w-[80px]" alt="Leaf">
            </div>
            <div class="absolute right-5 z-100 bottom-0 animate-scale-loop">
                <img src="assets/images/bullets-circle.png" class="md:w-[100%] w-[80px]" alt="Bullet Rainbow">
            </div>
            <div class="comman-container-1050">
                <div class="text-center text-white pt-20">
                    <h3 class="flex justify-center gap-3 text-[20px] font-[400]"><img src="assets/images/icon-arrow-02.png" alt="">Our Mission & Vision <img src="assets/images/icon-arrow-1.png" alt=""></h3>
                    <h2 class="text-[45px] leading-11 mt-4">At Allen Kids</h2>
                </div>
                <div class="md:flex gap-10 mt-10">
                     <div class="vm">
                        <?= $m_v_data['columns'][0]['content'] ?? ''; ?> 
                    </div>
                    <div class="vm">
                          <?= $m_v_data['columns'][1]['content'] ?? ''; ?>  
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== LEGACY ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-12">
                    <div class="md:w-[50%]">
                        <div class="mt-5">
                            <div data-aos="zoom-in-right" data-aos-duration="1000">
                                <img src="<?= $legacy_data['columns'][0]['image_url'] ?? "https://genericcms-ms.fastranking.cloud/upload/images/pages/1757001694_AZY0ivxOiQ.webp" ?>" class="w-[100%]" alt="<?= htmlspecialchars($legacy_data['columns'][0]['image_alt']); ?>"></div>
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-10">
                        <div>
                            <!-- <h3 class="text-[#F66] text-[19px] flex items-center gap-2"> 
                                <svg width="78" height="30" viewBox="0 0 78 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="77" height="30" transform="translate(0.146484)" fill="url(#pattern0_293_200)" />
                                    <defs>
                                        <pattern id="pattern0_293_200" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_293_200" transform="scale(0.012987 0.0333333)" />
                                        </pattern>
                                        <image id="image0_293_200" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                                    </defs>
                                </svg>
                            </h3> -->
                             <?= $legacy_data['columns'][1]['content'] ?? ''; ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== CHAIRMAN DESK ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-12">

                    <div class="md:w-[50%] mt-5">
                        <div>
                            <div class="overflow-description">
                                <p class="text-[#70747F] text-[20px] mt-2"><?= $chairman_message['columns'][0]['content'] ?? ''; ?></p>
                            </div>
                         </div>

                    </div>
                    <div class="md:w-[50%]">
                        <div>
                            <div data-aos="zoom-in-right" data-aos-duration="1000"><img
                                    src="<?= $chairman_message['columns'][1]['image_url'] ?? ''; ?>" class="w-[100%]" alt="<?= htmlspecialchars($chairman_message['columns'][1]['image_alt']) ?? ''; ?>"></div>
                            <p class="text-[#70747F] text-[20px] mt-2 font-[700]">M. Amin</p>
                            <p class="text-[#70747F] text-[20px] mt-1 font-[700]">Chairman</p>
                        </div>
                    </div>

                </div>
                <!-- <div>
                    <p class="text-[#70747F] text-[20px] mt-2">Academic excellence along with co-curricular activities
                        and extra co-curricular activities completes the process of education. It gives me great
                        satisfaction that Allen Kids is progressing in all its endeavours towards the overall grooming
                        and development of the personality of the students.</p>

                    <p class="text-[#70747F] text-[20px] mt-2">Parents are important stakeholders of any school system.
                        I extend my gratitude for the unstinted support we have received from them at all times.</p>
                    <p class="text-[#70747F] text-[20px] mt-2 font-[700]">Best Wishes!</p>
                </div> -->
            </div>
        </section>
        <!--==== END ====-->

        <!--==== PRINCIPAL DESK ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container">
                <div class="md:flex gap-12">
                    <div class="md:w-[45%]">
                        <div class="mt-5">
                            <div data-aos="zoom-in-right" data-aos-duration="1000"><img src="<?= $principal_message['columns'][0]['image_url'] ?? 'assets/images/about/head-message.webp'; ?>" class="w-[100%]" alt="<?= htmlspecialchars($principal_message['columns'][0]['image_alt']) ?? ''; ?>"></div>
                        </div>
                    </div>
                    <div class="md:w-[55%] md:mt-0 mt-10">
                        <?= $principal_message['columns'][1]['content'] ?? ''; ?>

                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->


        <!--==== OUR TEACHER ====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container-1050">
                <div class="text-center text-white">
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
                        Meet Our Teacher
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
                    <h2 class="text-[45px] leading-12 mt-4 text-[#2C4073]">Nurturing Young Minds with <br> Expert
                        Guidance</h2>
                </div>
                <div class="swiper carousel3 mt-10">
                    <div class="swiper-wrapper">
                        <?php foreach ($our_teachers['resolved_content']['items'] as $teacher) { ?>
                            <div class="swiper-slide">
                                <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                    <img src="https://allenkids.allenhouseschools.com/<?php echo $teacher['image_url'] ?? "assets/images/our-teacher/Gunjan-Gupta.webp" ?>"
                                        class="w-[80%] mx-auto relative z-90" alt="<?php echo $teacher['image_alt'] ?? "" ?>" />
                                    <div class="bg-[#FC477E] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                        <h2 class="text-[20px] text-white"><?php echo $teacher['title'] ?? "" ?></h2>
                                        <p class="text-[16px] text-white leading-[19px]">Teacher</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Uma-Mukherjee.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Uma Mukherji" />
                                <div class="bg-[#A32CFF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Uma Mukherji</h2>
                                    <p class="text-[16px] text-white leading-[19px]">Playgroup 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Anshu-Gupta.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Anshu Gupta" />
                                <div class="bg-[#FAB319] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Anshu Gupta</h2>
                                    <p class="text-[16px] text-white leading-[19px]">Playgroup 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Aaddya-Verma.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Aaddya Verma" />
                                <div class="bg-[#FAB319] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Aaddya Verma</h2>
                                    <p class="text-[16px] text-white leading-[19px]">Nursery</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Anchal-Nigam.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Anchal Nigam" />
                                <div class="bg-[#FAB319] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Anchal Nigam</h2>
                                    <p class="text-[16px] text-white leading-[19px]">Teacher</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Ashleen-Kaur.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Ashleen Kaur" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Ashleen Kaur </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Prep</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Uma-Mukherjee.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Megha Agarwal" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Megha Agarwal </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Prep</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Sakshi-Srivastava.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Sakshi Srivastava" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Sakshi Srivastava </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Grade 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Nancy-Kapoor.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Nancy Kapoor" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Nancy Kapoor </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Grade 2</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Pooja-Rajpoot.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Pooja Rajput" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Pooja Rajput </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Sports Teacher</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Mohit-Singh.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Mohit Shukla" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Mr Mohit Shukla </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Art Teacher</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/Sonali-Kalra.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Ms Sonali Kalra" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Ms Sonali Kalra </h2>
                                    <p class="text-[16px] text-white leading-[19px]">Dance Teacher</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== ACCREDITATION & QUALITY ASSURANCE ====-->
        <section class="ab-child-bg py-20">
            <div class="comman-container-1050">
                <div class="md:flex">
                    <div class="md:w-[50%]">
                        <div class="bg-white p-12 relative z-10">
                              <?php echo $history_years['columns'][0]['content'] ?? "" ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <?php include "includes/legacy.php" ?>
        <!--==== END ====-->

        <!--==== Registration Start ====-->
        <?php include "includes/online-registration.php" ?>
        <!--==== End ====-->

        <!--==== Dynamic Section ====-->
        <?php
           renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->

        <!--==== Footer ====-->
        <?php include "includes/footer.php" ?>
        <!--==== End ====-->
    </main>
    <!--==== End ====-->
    <?php include "includes/foot.php" ?>
    <!--==== Scripts ====-->
   
</body>

</html>