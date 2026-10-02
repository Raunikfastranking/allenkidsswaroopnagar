<?php
$page = "program.php";
require_once 'proxy/api.php';
require_once 'proxy/apis.php';
require_once __DIR__ . '/includes/program-config.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allen Kids Swaroop Nagar | Program</title>
    <?php include "includes/head.php" ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->

     <?php
      $programs = [
         ["id" => "toddler",
          "label" => "Toddler",
          "name" => "1.5 to 2 Years",
          "desc" => "The Toddler Program is a unique concept in education to make strong establishments in the early life of a toddler.",
          "image" => "assets/images/toddler.jpg"
        ],

        ["id" => "playgroup-1",
         "label" => "PG - 1",
         "name" => "2-3 Years",
         "desc" => "We practice an integrated thematic study which aims at enhancing the development and education of children through play.",
        "image" => "assets/images/pg-1.jpg"
        ],
        ["id" => "playgroup-2", 
         "label" => "PG - 2",
         "name" => "3-4 Years",
         "desc" => "Our specially designed curriculum encourages children to develop self- confidence and self - esteem to feel valued as individuals.",
         "image" => "assets/images/pg-2.jpg"
         ],
        ["id" => "nursery", 
         "label" => "Nursery",
         "name" => "4 to 5 Years",
         "desc" => "Children learn different skills like communication and language including listening, speaking and understanding.",
         "image" =>"assets/images/nursery.jpg",
        ],
        ["id" => "preparatory", 
         "label" => "Prep",
         "name" => "5 to 6 Years",
         "desc" => "A preparatory year is a programme designed to prepare the students for the primary classes.",
         "image" => "assets/images/prep.jpg"
        ],
        ];
    ?>

    <!--==== Main Content ====-->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Program</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">Program</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->
        <!--==== Latest Classes ====-->
        <section class="md:mt-2">
            <div class="2xl:w-[1500px] xl:w-[1280px] lg:w-[1080px] sm:mx-auto mx-4">
                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)" fill="url(#pattern0_293_580)"></rect>
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)"></use>
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII="></image>
                            </defs>
                        </svg>
                        Latest Classes
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.681641 0.0800781)" fill="url(#pattern0_293_582)"></rect>
                            <defs>
                                <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)"></use>
                                </pattern>
                                <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII="></image>
                            </defs>
                        </svg>
                    </h2>
                    <h2 class="text-[45px] leading-12 mt-4 text-[#2C4073]">We Provide Awesome Program To <br> Build Bright Future</h2>
                </div>
                <div class="mt-10">
                    <div class="grid md:grid-cols-3 grid-cols-1 gap-10">
                    <?php foreach ($programs as $program): ?>
                        <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                            <img src="<?php echo $program["image"] ?>" class="w-[100%]" alt="Toddler" />
                            <div class="p-5 bg-white text-center w-[300px] mx-auto relative top-[-40px]">
                                <h2 class="text-[28px] text-[#2C4073]"><?php echo $program['label'] ?></h2>
                                <h3 class="text-[22px]"><?php echo $program['name'] ?></h3>
                                <p class="text-[18px] text-[#70747F] mt-2"><?php echo $program['desc'] ?></p>
                                <div class="mt-3">
                                    <a href="<?= htmlspecialchars(allenkids_program_public_path(allenkids_program_slug_for_id($program['id']))) ?>" class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center justify-center transition-all hover:text-[#A32CFF]">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                            <path fill="#2C4073" fill-rule="evenodd" d="M13.483 4.47a.75.75 0 0 1 1.06 0l6.988 7a.75.75 0 0 1 0 1.06l-6.988 7a.75.75 0 0 1-1.061-1.06l5.709-5.719L3 12.762a.75.75 0 0 1-.002-1.5l16.194-.01l-5.711-5.722a.75.75 0 0 1 0-1.06" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                     </div>
                </div>
            </div>
        </section>
        <!-- END -->

           <!-- Registration Start -->
        <?php include "includes/online-registration.php" ?>
        <!-- End -->

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