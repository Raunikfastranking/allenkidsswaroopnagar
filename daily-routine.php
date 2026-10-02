 <?php
    $page = "daily-routine";
    require_once "proxy/api.php";
    require_once "proxy/apis.php";
    $colors = ["#B250FE", "#B250FE", "#43B2D8", "#B250FE", "#FAB319"];


    // print_r($daily_routine);
    ?>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $daily_routine['data']['title'] ?? ""  ?></title>
     <meta name="description" content="<?php echo  $daily_routine['data']['meta_description'] ?>">
     <meta name="keywords" content="<?php echo  $daily_routine['data']['meta_keywords'] ?>">
     <?php include "includes/head.php" ?>
 </head>
 <style>
     .tab-btn.active {
         background-color: #fff;
         color: #000 !important;
     }
 </style>

 <body>
     <!--==== Header ====-->
     <?php include "includes/header.php"; ?>
     <!--==== End ====-->

     <!--==== Main Content ====-->
     <main>
         <!--==== Bradcrumb ====-->
         <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
             <div class="text-center md:py-28 py-10 relative z-10">
                 <h1 class="md:text-[42px] text-[30px] font-[400] text-white">Daily Routine</h1>
                 <ul class="flex items-center gap-3 justify-center">
                     <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                             <defs>
                                 <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                             </defs>
                             <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                         </svg></li>
                     <li><a href="" class="text-[#fff] sm:text-[16px] text-[12px]">Parent Resources</a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                             <defs>
                                 <path id="weuiArrowOutlined0" fill="#FAB319" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                             </defs>
                             <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                         </svg></li>
                     <li><a href="daily-routine.php" class="text-[#FAB319] sm:text-[16px] text-[12px]">Daily Routine</a></li>
                 </ul>
             </div>
         </section>
         <!--==== End ====-->

         <!--==== START =====-->
         <section class="mt-7">
             <div class="comman-container-1280">
                 <div class="text-center text-white pt-10">
                     <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                         <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)" fill="url(#pattern0_293_580)" />
                             <defs>
                                 <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1" height="1">
                                     <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)" />
                                 </pattern>
                                 <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                             </defs>
                         </svg>
                        <?= strip_tags($daily_routine['data']['sections'][0]['content_heading']) ?? "Our Time Table" ?>
                         <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <rect width="77" height="30" transform="translate(0.681641 0.0800781)" fill="url(#pattern0_293_582)" />
                             <defs>
                                 <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1" height="1">
                                     <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)" />
                                 </pattern>
                                 <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                             </defs>
                         </svg>
                     </h2>
                     <h2 class="md:text-[45px] text-[28px] md:leading-11 leading-8 mt-4 text-[#2C4073]"><?= strip_tags($daily_routine['data']['sections'][0]['content']) ?? "Daily Routine" ?></h2>
                 </div>
                 <div class="mt-10 flex justify-center md:overflow-none overflow-x-auto md:pl-0 pl-60 p-8 bg-[url('assets/images/p-r/bg-blue.webp')] bg-no-repeat md:h-[171px]"
                     style="background-size: 100% 100%;">
                     <ul class="flex gap-8 items-center justify-center" id="tab-buttons">
                         <?php
                            $tabIndex = 0;
                            // print_r($daily_routine['data']['sections'][0]['layout']);
                            foreach ($daily_routine['data']['sections'] as $sec):
                                if ($sec['layout'] != 'table') continue;
                                $slug = strtolower(str_replace(' ', '', $sec['title']));
                            ?>
                             <li class="tab-btn <?= $tabIndex === 0 ? 'active' : '' ?> text-[#fff] border border-[#fff] p-[8px] px-6 cursor-pointer whitespace-nowrap rounded-[5px]"
                                 data-tab="<?= $slug ?>">
                                 <?= $sec['title'] ?>
                             </li>
                         <?php
                                $tabIndex++;
                            endforeach;
                            ?>
                     </ul>
                 </div>

                 <div class="mt-6 overflow-x-scroll">
                     <?php
                        $tabIndex = 0;
                        foreach ($daily_routine['data']['sections'] as $sec):
                            if ($sec['layout'] !== 'table') continue;

                            $tabSlug = strtolower(str_replace(' ', '', $sec['title']));
                            $columns = $sec['resolved_content']['columns'] ?? [];
                            $rows = $sec['resolved_content']['data'] ?? [];

                            if (!is_array($rows)) $rows = array_values($rows);


                            $colors = ["#B250FE", "#FAB319", "#43B2D8", "#B250FE", "#FAB319"];
                        ?>
                         <div class="tab-content <?= $tabIndex === 0 ? '' : 'hidden' ?>" data-tab-content="<?= $tabSlug ?>">

                             <table class="w-[100%]">
                                 <thead class="bg-[#F0F0F0]">
                                     <?php foreach ($columns as $col): ?>
                                         <th class="p-4 text-[#2B3C6B] border border-white border-[2px] text-<?= $col['align'] ?? 'center' ?>">
                                             <?= $col['title'] ?>
                                         </th>
                                     <?php endforeach; ?>
                                 </thead>

                                 <tbody>
                                     <?php foreach ($rows as $row): ?>
                                         <tr>
                                             <?php foreach ($row as $index => $cell):
                                                    $align = $columns[$index]['align'] ?? 'left';
                                                    $bgColor = $index === 0 ? '#fc477e' : ($colors[$index - 1] ?? '#555');
                                                    $textColor = $index === 0 ? 'text-white' : 'text-[#fff]';
                                                ?>
                                                 <td class="border-white border-[2px] text-<?= $align ?>">
                                                     <div class="p-3 h-[85px] flex items-center justify-<?= $align ?> text-<?= $align ?>"
                                                         style="background-color: <?= $bgColor ?>;">

                                                         <?php if ($index === 0): ?>
                                                             <h4 class="<?= $textColor ?>"><?= $cell ?></h4>
                                                         <?php else: ?>
                                                             <h2 class="text-[16px] font-[500] <?= $textColor ?>"><?= $cell ?></h2>
                                                         <?php endif; ?>

                                                     </div>
                                                 </td>
                                             <?php endforeach; ?>
                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     <?php
                            $tabIndex++;
                        endforeach;
                        ?>
                 </div>



             </div>
         </section>
         <!--==== END ====-->


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
     <script>
         const tabButtons = document.querySelectorAll(".tab-btn");
         const tabContents = document.querySelectorAll(".tab-content");

         tabButtons.forEach(button => {
             button.addEventListener("click", () => {
                 // Remove active from all buttons
                 tabButtons.forEach(btn => btn.classList.remove("active"));
                 // Hide all tab contents
                 tabContents.forEach(content => content.classList.add("hidden"));

                 // Add active class to clicked tab
                 button.classList.add("active");
                 // Show corresponding content
                 const tab = button.getAttribute("data-tab");
                 document.querySelector(`[data-tab-content="${tab}"]`).classList.remove("hidden");
             });
         });
     </script>

 </body>

 </html>