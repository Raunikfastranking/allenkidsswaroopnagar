<?php
$page = "admission.php";
require_once "proxy/api.php";
require_once "proxy/apis.php";
$admission_data = fetchApiData("api/pages/preschool-admission-in-swaroop-nagar-allen-kids");
$faq_data = fetchApiData("api/accordions/branch/4");
require_once __DIR__ . '/includes/session-api.php'; $sessions = allenkids_fetch_sessions();
require_once "layouts/layout-function.php";
$pageData = $admission_data;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $admission_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?php echo $admission_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?php echo $admission_data['data']['meta_keywords'] ?? "" ?>">
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
      "name": "Admissions",
      "item": "https://allenkidsswaroopnagar.in/admission"
    }
  ]
}
</script>

    <?php include "includes/head.php" ?>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
        <!-- Bradcrumb -->
        <section class="about-brudcrumb md:h-[400px] h-[200px] bg-program-cover relative">
            <div class="text-center md:pt-30 pt-12 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Admission</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="admission" class="text-[#FAB319] sm:text-[16px] text-[12px]">Admission</a></li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!--==== ENQUIRY ====-->
        <section
            class="mt-20 py-8 md:pb-15 pb-24 bg-[url('assets/images/admission/admission-bg.webp')] bg-cover bg-center">
            <div class="comman-container-1050">
                <div>
                    <h2 class="text-[32px] font-[500] text-white text-center">Enquiry For Session</h2>
                    <div>
                        <?php $eeFormId = 'ee-form-11-admission'; include __DIR__ . '/includes/enquiry-widget.php'; ?>
                    </div>
            </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== ENTROLL PROCESS ====-->
        <section class="py-10 md:px-10 px-5">
            <div class="comman-container-1280">
                <div class="md:flex">
                    <div class="md:w-[60%]">
                        <?php echo $admission_data['data']['sections'][2]['columns'][0]['content'] ?? "" ?>
                    </div>
                    <div class="md:w-[40%] md:mt-0 mt-8">
                        <div>
                            <img src="<?php echo $admission_data['data']['sections'][2]['columns'][1]['image_url'] ?? "" ?>"
                            alt="<?= htmlspecialchars($admission_data['data']['sections'][2]['columns'][1]['image_alt']); ?>"
                                class="w-[100%] object-contain md:h-[500px]" alt="Girl ">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START ====-->
        <section
            class="mt-20 py-10 md:pb-15 pb-24 bg-[url('assets/images/admission/admission-2-bg.webp')] bg-cover bg-center px-4">
            <div class="comman-container-1280">
                <div class="md:flex gap-10">
                    <div class="md:w-[50%]">
                        <h2 class="text-[#2B3C6B] text-[28px] font-[500]">Important Admission Dates</h2>
                        <p class="text-gray-500 text-[18px]">To ensure a seamless admission process, here are the key
                            <br> dates to note:
                        </p>
                        <div class="mt-6">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full text-left border border-separate rounded border-slate-200"
                                    cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="col"
                                                class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#4A6CC3] text-white bg-[#2C4073] text-center">
                                                Event</th>
                                            <th scope="col"
                                                class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#4A6CC3] text-white bg-[#2C4073] text-center">
                                                Date</th> -->
                            <?php
                             foreach ($admission_data['data']['sections'][3]['columns'][0]['resolved_content']['columns'] as $column) {
                            ?>
                                            <th scope="col" class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#4A6CC3] text-white bg-[#2C4073] text-center">
                                               <?= $column['title'] ?? "NA" ?>
                                            </th>
                            <?php } ?>
                                        </tr>
                                         <?php foreach ($admission_data['data']['sections'][3]['columns'][0]['resolved_content']['data'] as $row_data): ?>
                                            <tr class="bg-[#FFFFFF]">
                                                <?php foreach ($row_data as $cell): ?>
                                                    <td class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#4A6CC3]  text-black text-center">
                                                        <?= $cell !== null && $cell !== "" ? htmlspecialchars($cell) : "NA" ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        <!-- <tr class="bg-[#FFFFFF]">
                                            <td
                                                class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#4A6CC3]  text-black text-center ">
                                                Registration Opens</td>
                                            <td
                                                class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#4A6CC3]  text-black text-center ">
                                                1st November, 2025</td>
                                        </tr> -->
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-5">
                        <h2 class="text-[#2B3C6B] text-[28px] font-[500]">Fee Structure & Payment Details</h2>
                        <p class="text-gray-500 text-[18px]">Our fee structure is designed to be transparent and
                            inclusive.</p>
                        <div class="mt-8">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full text-left border border-separate rounded border-slate-200"
                                    cellspacing="0">
                                    <tbody>
                                        <tr>
                           <?php
                             foreach ($admission_data['data']['sections'][3]['columns'][1]['resolved_content']['columns'] as $column) {
                            ?>
                                            <th scope="col" class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#FF94EB] text-white bg-[#FF94EB] text-center">
                                               <?= $column['title'] ?? "NA" ?>
                                            </th>
                            <?php } ?>                    
                                        </tr>
                                         <?php foreach ($admission_data['data']['sections'][3]['columns'][1]['resolved_content']['data'] as $row_data): ?>
                                            <tr class="hover:bg-gray-50">
                                                <?php foreach ($row_data as $cell): ?>
                                                    <td class="h-12 px-6 transition duration-300 border-t border-l first:border-l-0 border-[#4A6CC3] text-black text-center">
                                                        <?= $cell !== null && $cell !== "" ? htmlspecialchars($cell) : "NA" ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>

                                        <!-- <tr class="bg-[#FFFFFF]">
                                            <td
                                                class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#FF94EB]  text-black text-center ">
                                                1.</td>
                                            <td
                                                class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#FF94EB]  text-black text-center ">
                                                Registration Fee</td>
                                            <td
                                                class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#FF94EB]  text-black text-center ">
                                                All Class</td>
                                            <td
                                                class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#FF94EB]  text-black text-center ">
                                                1000</td>
                                        </tr> -->
 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== Documents ====-->
        <section class="py-10 md:px-10 px-5">
            <div class="comman-container-1280">
                <div class="md:flex gap-10">
                    <div class="md:w-[50%]">
                        <div>
                            <img src="<?php echo $admission_data['data']['sections'][4]['columns'][0]['image_url'] ?? "" ?>"
                                alt="<?= htmlspecialchars($admission_data['data']['sections'][4]['columns'][0]['image_alt']); ?>"
                                class="w-[100%]" alt="Girl ">
                        </div>
                    </div>
                    <div class="md:w-[40%] md:mt-18 mt-8">
                        <div>
                            <?php echo $admission_data['data']['sections'][4]['columns'][1]['content'] ?? "" ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->
        <!--==== Terms & Conditions ====-->
        <section class="md:py-10 py-1 md:px-10 px-5">
            <div class="comman-container-1280">
                <div class="md:flex gap-10">
                    <div class="md:w-[100%] md:mt-18 mt-1">
                        <!-- <div>
                            <h2 class="text-[#2B3C6B] text-[28px] font-[500]">Terms & Conditions</h2>
                            <ul class="mt-7">
                                <li class="text-[#2B3C6B] text-[18px] mb-3">Child should be of 1.5+ years as on
                                    31st-March for Toddler</li>
                                <li class="text-[#2B3C6B] text-[18px] mb-3">Child should be of 2+ years as on 31st-March
                                    for class Play Group (PG-I).</li>
                                <li class="text-[#2B3C6B] text-[18px] mb-3">Child should be of 3+ years as on 31st-March
                                    for class Play Group (PG-II).</li>
                                <li class="text-[#2B3C6B] text-[18px] mb-3">Child should be of 4+ years as on 31st-March
                                    for class Nursery.</li>
                                <li class="text-[#2B3C6B] text-[18px] mb-3">Child should be of 5+ years as on 31st-March
                                    for class Prep</li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-[#2B3C6B] text-[28px] font-[500]">Details of Entrance Test</h2>
                            <p class="text-[#2B3C6B] text-[18px] mt-1 font-[600]">A written observation for classes
                                Nursey & Prep will be conducted at School in the following subjects:</p>
                            <p class="text-[#2B3C6B] text-[18px] mt-1 font-[600]">1. English 2. Numbers 3. Hindi</p>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-[#2B3C6B] text-[22px] font-[500]" style="font-style: italic;">FOR ANY QUERY,
                                PLEASE CONTACT SCHOOL OFFICE:</h3>
                            <p class="text-[#2B3C6B] text-[18px] mt-1 font-[600]">+91-7800661660, +91-6390907015</p>
                            <p class="text-[#2B3C6B] text-[17px] mt-3 font-[500]">Take the print out of the Filled
                                Registration and this Must Be Submitted at the School's Front Office within a week of
                                filling Online Registration process. Entrance Date will be intimated at the time of
                                submission.</p>
                        </div> -->
                  
                       <?php echo $admission_data['data']['sections'][5]['content_heading'] ?? "" ?>
                      
                             <?php echo $admission_data['data']['sections'][5]['content'] ?? "" ?>
              
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== FAQ ====-->
        <section class=" py-10 md:pb-15 pb-24 bg-[url('assets/images/admission/faq.webp')] bg-cover bg-center px-4">
            <div class="comman-container-1280 ">
                <div class="mb-5">
                    <h4 class="text-[#F66] text-[18px] font-[300] flex items-center gap-2">
                        FAQ
                        <svg width="50" height="22" viewBox="0 0 78 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="translate(0.146484)"
                                fill="url(#pattern0_293_200)" />
                            <defs>
                                <pattern id="pattern0_293_200" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_293_200" transform="scale(0.012987 0.0333333)" />
                                </pattern>
                                <image id="image0_293_200" width="77" height="30" preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </h4>
                    <h2 class="text-[28px] text-white mt-[100px] sm:mt-[60px]">Frequently Asked Questions</h2>

                    <?php foreach ($faq_data[0]['items'] as $item) { ?>
                        <details class="p-2 mb-5 group">
                            <summary
                                class="[&::-webkit-details-marker]:hidden relative pr-8 font-medium list-none cursor-pointer text-white focus-visible:outline-none transition-colors duration-300 group-hover:text-slate-300 text-white text-[20px]">
                                <?php echo $item['title'] ?>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute right-0 w-4 h-4 transition duration-300 top-1 stroke-white shrink-0 group-open:rotate-45"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                                    aria-labelledby="title-ac02 desc-ac02">
                                    <title id="title-ac02">Open icon</title>
                                    <desc id="desc-ac02">icon that represents the state of the summary</desc>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </summary>
                            <?php echo $item['content'] ?>

                        </details>
                    <?php } ?>

                </div>
        </section>
        <!--==== END ====-->

        <!--==== Dynamic Section ====-->
        <?php
        renderDynamicSections($pageData, $api_url);
        ?>
        <!--==== End ====-->

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        <!-- End -->
    </main>
    <!-- End -->

    <!-- Scripts -->
    <?php include "includes/foot.php" ?>
</body>

</html>