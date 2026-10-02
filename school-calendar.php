<?php
$page = "school-calendar";
 require_once "proxy/apis.php";
//  require_once "layouts/layout-function.php";
//    $pageData = $admission_data;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allen Kids Swaroop Nagar | School Calendar</title>
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <!-- Main Content -->
    <main>
        <!--==== Bradcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">School Calendar</h1>
                <ul class="flex items-center gap-3 justify-center md:overflow-auto overflow-x-auto">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#fff] whitespace-nowrap sm:text-[16px] text-[12px]">Parent Resources</a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] whitespace-nowrap sm:text-[16px] text-[12px]">School Calendar</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START =====-->
        <section class="mt-7">
            <div class="comman-container-1280">
                <div class="md:w-[100%]">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
                            <thead class="text-xs text-white uppercase bg-[#223668] ">
                                <tr>
                                    <th scope="col" class="px-6 py-4">
                                        S.No.
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Documents/Information
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Upload Document Link
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd:bg-white even:bg-gray-50  ">
                                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap">
                                        1 </th>
                                    <td class="px-6 py-2">
                                        School Calendar</td>
                                    <td class="px-6 py-2">
                                        <a href="https://drive.google.com/file/d/10q1L86X2uEK8x0KiEQPZnH0akFCxRawH/view"
                                            target="_blank"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        //
    });
    </script>

</body>

</html>