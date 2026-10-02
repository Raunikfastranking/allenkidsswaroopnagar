<?php
include "includes/apis.php";
// print_r($landing_data['data']['sections'][1]['resolved_content']['media']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $landing_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $landing_data['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $landing_data['meta_keywords'] ?? "" ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" rel="stylesheet">

    <style>
        /* Default bullets */
        .swiper-pagination-bullet {
            background: #1E3A8A;
            /* Blue */
            opacity: 1;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            margin: 0 6px !important;
            transition: all 0.3s ease-in-out;
        }

        /* Active bullet */
        .swiper-pagination-bullet-active {
            background: #F59E0B;
            /* Orange */
            width: 50px;
            border-radius: 9999px;
            /* Rounded pill */
        }
    </style>
</head>

<div id="esuccessPopup" class="relative fixed  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden"
    style="z-index:9999; position: fixed; right: 0; top: 20%;">
    Form submitted successfully!
</div>

<body style="overflow-x: hidden">
    <div class="main" style="overflow-x: hidden;">
        <header class=" lg:px-5 w-[100%] bg-white ">
            <div class="main-header flex items-center justify-center p-[8px]">
                <div class="z-99999 py-5">
                    <img src="assets/images/logo.png" alt="logo">
                </div>
            </div>
        </header>
        <div class="main-content">
            <!--==== START ====-->
            <section class="hero-bg relative " id="switchForm">
                <div class="lg:flex items-center justify-center lg:p-20 lg:py-0 sm:py-20 py-10">
                    <div class="lg:w-[50%] w-[100%] p-5 lg:p-10 p-5 ">
                        <div class="relative flex items-center justify-center lg:z-10 z-100">
                            <!-- Circle Background -->
                            <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/4gxFdSMdMnfbGnevlVT8nw77rJKiqkjhrOaFcm7g.png"
                                alt="Circle Background" class="w-full max-w-lg mx-auto">

                            <!-- Text Content (Centered) -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4" style="
    max-width: 370px;
    margin: auto;
">
                                <h2 class="text-[40px] lg:text-[60px] text-[#FA9D3E] font-bold leading-tight">
                                            <!-- Admissions
                                            <br>
                                            Open
                                            <br>
                                            2026–2027!  -->
                                            
                                            <?= $landing_data['data']['sections'][0]['columns'][0]['content_heading'] ?? "" ?>
                                            </h2>
                                            <p class="text-[#EE3135] font-semibold mt-3 text-[18px] lg:text-[24px]">
                                            <!-- Best Preschool & Day-care in Bareilly,
                                            <br>
                                            offering safe, caring, and future-ready
                                            <br> learning. -->
                                             <?= $landing_data['data']['sections'][0]['columns'][0]['content'] ?? "" ?>
                                            </p>

                               
                            </div>
                        </div>

                    </div>

                    <div class="lg:w-[50%] w-[100%] py-1 relative z-999">
                        <div
                            class="bg-white border-[1px] border-white text-white rounded-[8px] lg:m-10 lg:pb-0 p-6 lg:w-[400px] lg:mx-auto mx-[10px] slideLeft">
                            <div>
                                <div>
                                    <div id="successPopup"
                                        class="hidden fixed top-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg z-99">
                                        Form submitted successfully!
                                    </div>
                                                      <form id="enquiryForm">
    <div>
        <h3 class="text-[35px] font-bold text-[#A93295]">
            <?= $landing_data['data']['sections'][0]['columns'][1]['content_heading'] ?? "" ?>
        </h3>
    </div>
    <div class="mt-4">
        <select name="session"
                class="border-[1px] p-2 w-[100%] bg-[#fff] text-black outline-none mt-1 rounded-[5px]"
                id="years" required>
            <option value="" disabled selected>Enquiry For Session</option>

            <?php 
            $sessions = include "session-api.php"; // or full path: 'includes/session-api.php'

            if (!empty($sessions) && is_array($sessions)):
                foreach ($sessions as $item): 
                    $sessionName = trim($item['session'] ?? ''); // <-- FIXED: lowercase 'session'
                    if ($sessionName !== ''):
            ?>
                        <option value="<?= htmlspecialchars($sessionName, ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($sessionName, ENT_QUOTES, 'UTF-8') ?>
                        </option>
            <?php 
                    endif;
                endforeach;
            else: ?>
                <option value="">No sessions available</option>
            <?php endif; ?>
        </select>
        <span id="session-error-1" class="text-black text-sm mt-2 hidden">
            Please select a session.
        </span>
    </div>

    <div class="mt-4">
        <select name="grade" 
                id="egrade"
                class="border-[1px] p-2 w-[100%] bg-[#fff] text-black outline-none mt-1 rounded-[5px]"
                required>
            <option value="" disabled selected>Choose Grade</option>
            <?php include 'grade-api.php'; ?>  <!-- Ensure this file uses $grade['grades'] -->
        </select>
        <span id="grade-error-1" class="text-black text-sm mt-2 hidden">
            Please select a grade.
        </span>
    </div>

    <div class="mt-4">
        <input type="text"
               class="border-[1px] p-2 w-[100%] bg-[#fff] text-black outline-none mt-1 rounded-[5px]"
               required id="estudent_name" placeholder="Enter Child’s Name" />
        <span id="student-error-1" class="text-black text-sm mt-2 hidden">
            Only letters and spaces allowed.
        </span>
    </div>

    <div class="mt-4">
        <input type="text"
               class="border-[1px] p-2 w-[100%] bg-[#fff] text-black outline-none mt-1 rounded-[5px]"
               required id="eparent_name"
               placeholder="Father / Mother / Guardian Name" />
        <span id="parent-error-1" class="text-black text-sm mt-2 hidden">
            Only letters and spaces allowed.
        </span>
    </div>

    <div class="mt-4">
        <input type="text"
               class="border-[1px] p-2 w-[100%] bg-[#fff] text-black outline-none mt-1 rounded-[5px]"
               required id="emobile" placeholder="Enter Your Mobile No">
        <span id="mobile-error-1" class="text-black text-sm mt-2 hidden">
            Please enter valid phone number
        </span>
    </div>

    <div class="mt-4">
        <input type="text"
               class="border-[1px] p-2 w-[100%] bg-[#fff] text-black outline-none mt-1 rounded-[5px]"
               required id="eemail" placeholder="Enter Your Email">
        <span id="email-error-1" class="text-black text-sm mt-2 hidden">
            Please enter a valid email address.
        </span>
    </div>

    <div class="mt-5 lg:pb-5">
        <button type="submit" id="submitBtn"
                class="bg-[#A93295] p-3 w-[100%] text-white rounded-[50px] enquiry-btn transition-all border-[1px] border-[#fff] cursor-pointer">
            Enquiry Now
        </button>
    </div>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Top Wave -->
                <div class="absolute top-[0px] left-0 w-full z-10">
                    <img src="./assets/images/upper.png" alt="" class="w-full">
                </div>

                <!-- Bottom Wave -->
                <div class="absolute  sm:block hidden sm:bottom-[-1px] lg:bottom-[-42px] left-0 w-full z-10">
                    <img src="./assets/images/lower.png" alt="" class="w-full">
                </div>


                <div class="absolute top-[-63px] left-[1px] " style="z-index: 999999;">
                    <img src="./assets/images/star.png" alt="">
                </div>
                <div class="absolute top-[-78px] right-[170px] sm:block hidden" style="z-index: 999999;">
                    <img src="./assets/images/rainbow.png" alt="">
                </div>
                <div class="absolute bottom-[-83px] left-[160px]" style="z-index: 999999;">
                    <img src="./assets/images/wave.png" alt="">
                </div>
                <div class="absolute bottom-[1px] left-1/2" style="z-index: 999999;">
                    <img src="./assets/images/spiral.png" alt="">
                </div>

            </section>
            <!--==== START ====-->
            <section class="mt-8 py-10 mx-auto relative sm:block hidden mx-w-1280">
                <div class="relative">
                    <h2 class="text-center text-[#EE3135] font-bold text-[60px]">
                        <?= $landing_data['data']['sections'][1]['content_heading'] ?? "" ?></h2>

                    <div class="absolute top-[80px] left-1/2">
                        <img src="./assets/images/orange heading.png" alt="">
                    </div>
                    <div
                        class="lg:flex items-center justify-center md:grid grid-cols-2 sm:hidden gap-25 mt-10 lg:p-0 sm:p-10">
                       <?php
                        $bg_color = ['bg-[#A93295]', 'bg-[#FA9D3E]', 'bg-[#EE3135]', 'bg-[#78C064]'];
                        foreach ($landing_data['data']['sections'][1]['resolved_content']['media'] as $value => $data) {
                            // Cycle through the background colors
                            $current_bg = $bg_color[$value % count($bg_color)];
                            ?>
                            <div
                                class="<?= $current_bg ?> rounded-[20px] h-[300px] pt-16 text-white p-10 sm:mt-16 mt-26 flex flex-col items-center justify-center relative">
                                <img class="absolute lg:left-[58px] lg:top-[-65px] left-[104px] top-[-65px] w-[130px] h-[130px] object-contain"
                                    src="<?= $api_url ?>/<?= $data['media_file'] ?? "" ?>" alt="">
                                <h3 class="text-[28px] font-semibold mt-2 text-center"><?= strip_tags($data['heading']) ?? "" ?></h3>
                                <p class="text-[18px] text-center"><?= strip_tags($data['content']) ?? "" ?></p>
                            </div>
                        <?php } ?>




                        <!-- <div
                            class="bg-[#FA9D3E] rounded-[20px] h-[300px] pt-16 text-white p-10 sm:mt-16 mt-26 flex flex-col items-center justify-center relative">
                            <img class="absolute lg:left-[47px] lg:top-[-71px] left-[88px] top-[-78px]" src="./assets/images/integrity.png" alt="">
                            <h3 class="text-[28px] font-semibold mt-2 text-center">Integrity</h3>
                            <p class="mt-2 font-[13px] text-center">We are honest in our actions
                                <br>
                                and speech. We believe in
                                <br>
                                doing what is right. We
                                <br>
                                practice integrity
                            </p>
                        </div>
                        <div
                            class="bg-[#EE3135] rounded-[20px] h-[300px] pt-16 text-white p-10 sm:mt-16 mt-26 flex flex-col items-center justify-center relative">
                            <img class="absolute lg:left-[14px] lg:top-[-71px] left-[55px] top-[-80px]" src="./assets/images/individuality.png"
                                alt="">
                            <h3 class="text-[28px] font-semibold mt-2 text-center">Individuality</h3>
                            <p class="mt-2 font-[13px] text-center">Each child is unique and
                                <br>
                                capable. We train them to
                                <br>
                                embrace their individuality
                                <br>
                                and be just themselves.
                            </p>
                        </div>
                        <div
                            class="bg-[#78C064] rounded-[20px] h-[300px] pt-16 text-white p-10 mt-16 mt-26 flex flex-col items-center justify-center relative">
                            <img class="absolute left-[65px] top-[-100px] left-[95px] top-[-90px]" src="./assets/images/innovation.png" alt="">
                            <h3 class="text-[28px] font-semibold mt-2 text-center">Innovation</h3>
                            <p class="mt-2 font-[13px] text-center">Learning activities, materials,
                                <br>
                                etc. are introduced into the
                                <br>
                                classroom environment that
                                <br>
                                encourages innovation.
                            </p>
                        </div> -->
                    </div>
                </div>

                <div class="absolute bottom-[0px] left-[1px]">
                    <img src="./assets/images/book.png" alt="">
                </div>
                <div class="absolute lg:bottom-[-145px] bottom-[-80px] right-[110px] lg:left-1/2 z-999 sm:block hidden">
                    <img src="./assets/images/alphabets.png" alt="">
                </div>
                <div class="absolute top-[135px] right-[1px]">
                    <img src="./assets/images/disco.png" alt="">
                </div>
                <div
                    class="absolute lg:bottom-[-135px] lg:left-[260px] bottom-[-80] left-[160px] z-999 sm:block hidden">
                    <img src="./assets/images/planet.png" alt="">
                </div>
            </section>
            <!--==== END ====-->


            <!--==== START ====-->
            <section class="mt-8 py-10 mx-auto relative block sm:hidden">
                <div class="relative">
                    <h2 class="text-center text-[#EE3135] font-bold text-[60px]">
                        <?= $landing_data['data']['sections'][1]['content_heading'] ?? "" ?></h2>

                    <div class="absolute top-[80px] left-1/2">
                        <img src="./assets/images/orange heading.png" alt="">
                    </div>

                    <div class="grid grid-cols-1  gap-10 mt-10 p-8">
                        <?php
                        $bg_color = ['bg-[#A93295]', 'bg-[#FA9D3E]', 'bg-[#EE3135]', 'bg-[#78C064]'];
                        foreach ($landing_data['data']['sections'][1]['resolved_content']['media'] as $value => $data) {
                            // Cycle through the background colors
                            $current_bg = $bg_color[$value % count($bg_color)];
                            ?>
                            <div
                                class="<?= $current_bg ?> rounded-[20px]  p-8  text-white   flex  items-center justify-center relative">
                                <div class="w-[40%]"><img class="" src="<?= $api_url ?>/<?= $data['media_file'] ?? "" ?>"
                                        alt=""></div>
                                <div class="w-[60%]">
                                    <h3 class="text-[28px] font-semibold mt-2 text-center"><?= $data['heading'] ?></h3>
                                    <!-- <p class="mt-2 font-[13px] text-center">We pursue excellence in
                                <br>
                                education to remain effective
                                <br>
                                by learning constantly and
                                <br>
                                being the best we can be.
                            </p> -->
                                    <?= $data['content'] ?>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div
                            class="bg-[#FA9D3E] rounded-[20px]  p-8  text-white   flex  items-center justify-center relative">
                            <div class="w-[40%]"><img class="" src="./assets/images/integrity.png" alt=""></div>
                            <div class="w-[60%]">
                            <h3 class="text-[28px] font-semibold mt-2 text-center">Integrity</h3>
                            <p class="mt-2 font-[13px] text-center">We are honest in our actions
                                <br>
                                and speech. We believe in
                                <br>
                                doing what is right. We
                                <br>
                                practice integrity
                            </p>
                            </div>
                        </div>
                        <div
                            class="bg-[#EE3135] rounded-[20px]  p-8  text-white   flex  items-center justify-center relative">
                            <div class="w-[40%]"><img class="" src="./assets/images/individuality.png"
                                alt=""></div>
                               <div class="w-[60%]">
                                <h3 class="text-[28px] font-semibold mt-2 text-center">Individuality</h3>
                            <p class="mt-2 font-[13px] text-center">Each child is unique and
                                <br>
                                capable. We train them to
                                <br>
                                embrace their individuality
                                <br>
                                and be just themselves.
                            </p>
                            </div>
                        </div>
                        <div
                            class="bg-[#78C064] rounded-[20px]  p-8  text-white  flex  items-center justify-center relative">
                            <div class="w-[40%]"><img class="" src="./assets/images/innovation.png" alt=""></div>
                              <div class="w-[60%]">
                            <h3 class="text-[28px] font-semibold mt-2 text-center">Innovation</h3>
                            <p class="mt-2 font-[13px] text-center">Learning activities, materials,
                                <br>
                                etc. are introduced into the
                                <br>
                                classroom environment that
                                <br>
                                encourages innovation.
                            </p>
                            </div>
                        </div> -->
                    </div>
                </div>


            </section>
            <!--==== END ====-->

            <!--==== START ====-->
            <section class="orange-bg relative py-10 lg:py-40">
                <!-- Top Wave -->
                <div class="absolute top-0 left-0 w-full z-10">
                    <img src="./assets/images/upper-2.png" alt="" class="w-full">
                </div>

                <!-- Content -->
                <div
                    class="relative z-20 flex flex-col lg:flex-row items-center justify-center gap-12 max-w-6xl mx-auto px-6 mt-12">
                    <!-- Left Image -->
                    <div class="w-full lg:w-[40%] flex justify-center">
                        <img src="<?= $landing_data['data']['sections'][2]['columns'][0]['image_path'] ?? "" ?>" alt=""
                            class="max-w-full h-auto">
                    </div>

                    <!-- Right Content -->
                    <div class="w-full lg:w-[70%] text-center lg:text-left">
                        <!-- <h3 class="text-[24px] font-semibold text-white">About Us</h3>
      <h2 class="text-[40px] lg:text-[60px] font-bold text-white leading-tight relative">
        Where Fun Meets
        <br>
        Future-Ready Learning. 
         <div class="absolute right-[200px] bottom-[-5px] lg:block hidden">
    <img src="./assets/images/purple.png" alt="">
  </div>-->
                        </h2>
                        <!-- <p class="text-white mt-4 leading-relaxed">
        Allen Kids Bareilly is a leading early education centre where academic growth, creativity, and values go hand-in-hand. With small class sizes, NEP-aligned curriculum, and a highly trained team, we ensure your child’s first learning experience is joyful and future-ready.
      </p> -->
                        <?= $landing_data['data']['sections'][2]['columns'][1]['content'] ?? "" ?>
                        <button class="rounded-full bg-[#A93295] px-6 py-3 mt-6 w-[50%]">
                            <a href="#" class="text-white font-semibold">Enquire Now</a>
                        </button>
                    </div>
                </div>

                <!-- Bottom Wave -->
                <div class="absolute bottom-[-34px] left-0 w-full z-10">
                    <img src="./assets/images/lower-2.png" alt="" class="w-full">
                </div>


                <div class="absolute top-[225px] right-[200px] z-999 lg:block hidden">
                    <img src="./assets/images/parachute.png" alt="">
                </div>
                <div class="absolute sm:bottom-[-7px] sm:left-[65px] left-[-8px] bottom-[-30px] z-999">
                    <img src="./assets/images/bag.png" alt="">
                </div>
                <div class="absolute bottom-[0px] left-1/2 z-999 lg:block hidden">
                    <img src="./assets/images/girl.png" alt="">
                </div>
                <div
                    class="absolute lg:bottom-[-44px] lg:right-[70px] right-[-2px] bottom-[-85px] z-999 sm:block hidden">
                    <img src="./assets/images/coloredrainbow.png" alt="">
                </div>

            </section>

            <!--==== END ====-->

            <!--==== START ====-->
            <section class="mt-10 relative">
                <!-- <h3 class="text-center text-[#EE3135] font-bold sm:text-[60px] text-[40px] relative">Why Choose 
                    <br>
                    AllenKids Bareilly
                    <div class="absolute top-[80px] left-1/2 sm:block hidden">
                        <img src="./assets/images/orange heading.png" alt="">
                    </div>
                </h3> -->
                <h3 class="text-center text-[#EE3135] font-bold sm:text-[60px] text-[40px] relative">
                    <?= $landing_data['data']['sections'][3]['content_heading'] ?? "" ?></h3>
                <div class="block mt-10 lg:hidden sm:mx-[140px]">
                    <img src=" <?= $landing_data['data']['sections'][3]['columns'][0]['image_path'] ?? "" ?>" alt="">
                </div>
                <div class="flex items-center gap-10 justify-center mt-10 p-5">
                   <!-- 1st -->
                    <div>
                        <div class="sm:flex items-center gap-10" style="
    max-width: 350px;">
                            <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][3]['resolved_content']['media'][0]['media_file'] ?? "" ?>"
                                alt="" class="mx-auto">
                            <p class="text-[#2C4073] sm:text-[32px] text-[24px] sm:text-left text-center">
                              <?= strip_tags($landing_data['data']['sections'][3]['resolved_content']['media'][0]['content']) ?? ""  ?>
                               
                            </p>
 
                        </div>
                        <div class="sm:flex items-center gap-10 lg:mt-[55px] sm:mt-10 mt-16" style="
    max-width: 350px;">
                            <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][3]['resolved_content']['media'][1]['media_file'] ?? "" ?>"
                                alt="" class="mx-auto">
                            <p class="text-[#2C4073] sm:text-[32px] text-[24px] sm:text-left text-center">
                                  <?= strip_tags($landing_data['data']['sections'][3]['resolved_content']['media'][1]['content']) ?? ""  ?>
                            </p>
                        </div>
                    </div>
                     <!-- 2nd -->
                    <div class="lg:block hidden">
                        <img src="  <?= $landing_data['data']['sections'][3]['columns'][0]['image_path'] ?? "" ?>"
                            alt="">
                    </div>
                     <!-- 3rd -->
                    <div>
                        <div class="sm:flex-row flex flex-col-reverse items-center sm:gap-10 " style="
    max-width: 350px;">
                            <p class="text-[#2C4073] sm:text-[32px] text-[24px] sm:text-right text-center">
                                 <?= strip_tags($landing_data['data']['sections'][3]['resolved_content']['media'][2]['content']) ?? ""  ?>
                            </p>
                            <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][3]['resolved_content']['media'][2]['media_file'] ?? "" ?>"
                                alt="" class="mx-auto">

                        </div>
                        <div
                            class="sm:flex-row flex flex-col-reverse items-center sm:gap-10 lg:mt-[55px] sm:mt-10 mt-10" style="
    max-width: 350px;">
                            <p class="text-[#2C4073] sm:text-[32px] text-[24px] sm:text-right text-center">
                              <?= strip_tags($landing_data['data']['sections'][3]['resolved_content']['media'][3]['content']) ?? ""  ?>
                            </p>
                            <img src="<?= $api_url ?>/<?= $landing_data['data']['sections'][3]['resolved_content']['media'][3]['media_file'] ?? "" ?>" alt="" class="mx-auto">
                        </div>
                    </div>

                </div>
                <div class="absolute top-[136px] right-[60px] lg:left-[280px] sm:block hidden">
                    <img src="./assets/images/string.png" alt="">
                </div>
                <div class="absolute top-[30px] lg:right-[340px] left-[11px] sm:block hidden">
                    <img src="./assets/images/bulb.png" alt="">
                </div>
            </section>
            <!--==== END ====-->

            <!--==== START ====-->
            <section class="relative red-bg">
                <div
                    class="sm:flex grid grid-cols-2 sm:gap-5 gap-5  items-center justify-between lg:p-[150px] sm:p-[80px] p-[50px] lg:pt-[200px]">
                    <?= $landing_data['data']['sections'][4]['resolved_content']['items'][0]['content'] ?? "" ?>
                    <div>
                        <img src="./assets/images/l1.png" alt="">
                        <div class="text-center">
                            <h3 class="text-white lg:text-[50px] text-[30px] mt-4 font-bold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][0]['count'] ?? "" ?>
                            </h3>
                            <p class="lg:text-[20px] text-white mt-2 font-semibold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][0]['heading'] ?? "" ?>
                            </p>
                        </div>
                    </div>
                    <div>
                        <img src="./assets/images/l2.png" alt="">
                        <div class="text-center">
                            <h3 class="text-white lg:text-[50px] text-[30px] mt-4 font-bold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][1]['count'] ?? "" ?>
                            </h3>
                            <p class="lg:text-[20px] text-white mt-2 font-semibold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][1]['heading'] ?? "" ?>
                            </p>
                        </div>
                    </div>
                    <div class="sm:mt-0 mt-10">
                        <img src="./assets/images/l3.png" alt="">
                        <div class="text-center">
                            <h3 class="text-white lg:text-[50px] text-[30px] mt-4 font-bold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][2]['count'] ?? "" ?>
                            </h3>
                            <p class="lg:text-[20px] text-white mt-2 font-semibold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][2]['heading'] ?? "" ?>
                            </p>
                        </div>
                    </div>
                    <div class="sm:mt-0 mt-10">
                        <img src="./assets/images/l4.png" alt="">
                        <div class="text-center">
                            <h3 class="text-white lg:text-[50px] text-[30px] mt-4 font-bold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][3]['count'] ?? "" ?>
                            </h3>
                            <p class="lg:text-[20px] text-white mt-2 font-semibold">
                                <?= $landing_data['data']['sections'][4]['resolved_content']['items'][3]['heading'] ?? "" ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="absolute top-[0px] left-0 w-full z-10">
                    <img src="./assets/images/upper-2.png" alt="" class="w-full">
                </div>
            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="py-[100px] px-[20px]">
                <div class="flex sm:flex-row flex-col items-center justify-center gap-20">
                    <div class="relative">
                        <!-- <h3 class="text-[#FA9D3E] text-[20px] font-semibold">
                        Online Registrations
                      </h3>
                      <h2 class="text-[#EE3135] sm:text-[50px] text-[40px] mt-2 font-bold">
                        Experience a Fun-filled Classroom
                        <br>
                         Where Learning Meets Laughter
                      </h2>
                      <p class="text-[#341C77] mt-6 text-[20px]">
                       Children Bond with Classmates While Building Skills for a Bright Future
                      </p> -->

                        <?= $landing_data['data']['sections'][5]['content'] ?? "" ?>

                        <div class="absolute sm:top-[-100px] top-[-107px] left-[115px] sm:left-[-100px]">
                            <img src="./assets/images/rubic.png" alt="">
                        </div>
                        <div class="absolute top-[-26px] right-[-45px]">
                            <img src="./assets/images/arrow.png" alt="">
                        </div>
                    </div>

                    <div class="relative">

                        <div>


                            <div class="text-center">
                                <button type="submit" id="a-submitBtn"
                                    class="w-full bg-[#A93295] text-white px-12 py-3 rounded-full font-semibold hover:bg-purple-700 transition">
                                    Enquire Now
                                </button>
                            </div>


                        </div>

                        <div
                            class="absolute lg:bottom-[-220px] lg:right-[-300px] right-[-160px] bottom-[-280px] sm:block hidden">
                            <img src="./assets/images/boy.png" alt="">
                        </div>
                    </div>

            </section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="pt-16">
                <div class="cloudbg flex flex-col items-center justify-center relative">
                    <div class=" w-full max-w-3xl mx-auto px-4 py-26">

                        <!-- Heading -->
                        <h2
                            class="text-center text-[#D833C0] text-[40px] lg:text-[60px] font-bold mb-10 mt-[130px] relative">
                            <!-- What Parents Say -->
                            <?= $landing_data['data']['sections'][6]['content_heading'] ?? "" ?>
                            <!-- <div class="absolute top-[80px] left-1/2">
                        <img src="./assets/images/orange heading.png" alt="">
                    </div> -->
                        </h2>

                        <!-- Carousel -->
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">





                                <?php
                                foreach ($landing_data['data']['sections'][6]['resolved_content']['items'] as $value => $data) {

                                    ?>
                                    <!-- Slide 1 -->
                                    <div class="swiper-slide flex justify-center">
                                        <div
                                            class="bg-white border-2 border-[#A93295] rounded-2xl shadow-md p-6 relative max-w-2xl p-14">

                                            <p class="italic text-gray-700">
                                                <!-- “
                                        Allen Kids is doing a tremendous job to shape the future of my Kid, Allen Kids
                                        is inculcating and paving to go beyond the boundaries, I believe Allen Kids is
                                        the place where my child is being pampered and nurtured to tackle future
                                        hindrances. Thanks Team Allen Kids.
                                    ” -->
                                                <?= $data['description'] ?>
                                            </p>
                                            <div class="flex items-center mt-6">
                                                <img src="<?= $api_url ?>/<?= $data['image_url'] ?? "" ?>"
                                                    class="w-12 h-12 rounded-full ">
                                                <div class="ml-3">
                                                    <p class="text-[#D833C0] font-semibold"><?= $data['title'] ?></p>
                                                    <p class="text-[#D833C0]"><?= $data['subtitle'] ?></p>
                                                </div>
                                            </div>
                                            <span class="absolute bottom-4 right-6 text-[#A93295] text-4xl font-bold"><img
                                                    src="./assets/images/comma.png" alt=""></span>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Slide 2 -->
                                <!-- <div class="swiper-slide flex justify-center">
            <div class="bg-white border-2 border-[#A93295] rounded-2xl shadow-md p-6 relative max-w-2xl p-14">
              <p class="italic text-gray-700">
                “
                                        Our association with Allen Kids has been very satisfactory and gratifying. Under
                                        their guidance Advik has attained academic excellence and has earned his laurels
                                        in various co-curricular activities. We would like to extend our gratitude &amp;
                                        appreciation to the entire team of Allen Kids for  being an integral part in
                                        Advik's journey.
                                    ”
              </p>
              <div class="flex items-center mt-6">
                <img src="./assets/images/Advik.jpg"
                  class="w-12 h-12 rounded-full ">
                <div class="ml-3">
                  <p class="text-[#D833C0] font-semibold">Parents of Advik Vashistha - Class II</p>
                  <p class="text-[#D833C0]"> Mr. Piyush Vashistha & Mrs. Ritika Vashistha</p>
                </div>
              </div>
              <span class="absolute bottom-4 right-6 text-[#A93295] text-4xl font-bold"><img src="./assets/images/comma.png" alt=""></span>
            </div>
          </div> -->

                            </div>




                            <!-- Pagination -->
                            <!-- <div class="swiper-pagination mt-6 flex justify-center"></div> -->
                        </div>
                        <div class="swiper-pagination mt-20 flex justify-center"></div>
                    </div>
                    <div class="absolute bottom-[40px] left-[0px]">
                        <img src="./assets/images/leftdisc.png" alt="">
                    </div>
                    <div class="absolute bottom-[0px] right-[15px]">
                        <img src="./assets/images/tree.png" alt="">
                    </div>
                    <div class="absolute lg:top-[-81px] top-[-170px] left-[-44px] lg:left-[-5px]">
                        <img src="./assets/images/happykid.png" alt="">
                    </div>
                    <div class="absolute top-[200px] lg:right-[400px] right-[20px] sm:block hidden">
                        <img src="./assets/images/waves.png" alt="">
                    </div>
                </div>
            </section>

            <!--==== END ====-->

            <!--==== Start ====-->
            <!-- <section class="mt-[-14px]">
                <div class="relative">
                    <img src="	https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/Vlo30CalVxNE2BxymyLdikJH7ecJSUIXSJYp43P2.png"
                        alt="" class="w-full">
                    <div
                        class=" xl:left-[751px] xl:bottom-[435px] lg:left-[325px] lg:bottom-[210px] md:left-[200px] md:bottom-[130px] left-[159px] bottom-[80px] absolute flex flex-col items-center justify-center">
                        <p class="lg:text-[60px] md:text-[40px] text-[16px] text-[#EE3135] font-bold">
                            <?= wordwrap(strip_tags($landing_data['data']['sections'][7]['content']) ?? "", 15, "<br>") ?>
                        </p>
                        <button
                            class="text-center bg-[#A93295] text-white lg:p-3 sm:p-2 rounded-full lg:w-[384px] sm:w-[227px] w-[115px] mt-2 lg:mt-10 sm:mt-5 sm:text-[16px] text-[8px]">
                            Book a free school tour today!
                        </button>
                    </div>
                </div>
            </section> -->
                        <section class="mt-[-14px]">
  <div class="relative w-full">
    <!-- Background image -->
    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/Vlo30CalVxNE2BxymyLdikJH7ecJSUIXSJYp43P2.png" alt="School Banner" class="w-full h-auto object-cover">

    <!-- Centered Content -->
    <div class="absolute 2xl:top-[-147px] xl:top-[-147px] lg:top-[-90px] md:top-[-50px] inset-0 flex flex-col items-center justify-center text-center px-4" style="
    /* top: -147px; */
">
      <p class="text-[#EE3135] font-bold leading-tight
                 lg:text-[60px] md:text-[40px] sm:text-[28px] text-[16px]">
           <?= wordwrap(strip_tags($landing_data['data']['sections'][7]['content']) ?? "", 15, "<br>") ?>
      </p>
      <button class="bg-[#A93295] text-white rounded-full mt-4
               lg:mt-10 sm:mt-6
               lg:py-3 sm:py-2 py-1
               lg:px-8 sm:px-6 px-4
               lg:text-[18px] sm:text-[14px] text-[10px]">
        Book a free school tour today!
      </button>
    </div>
  </div>
</section>
            <!--==== END ====-->

            <!--==== Start ====-->
            <section class="shapingfuture flex items-center justify-between sm:p-40 relative">
                <div></div>
                <div class="relative flex items-center justify-center sm:top-0 top-[-50px]">
                    <!-- Circle Background -->
                    <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/4gxFdSMdMnfbGnevlVT8nw77rJKiqkjhrOaFcm7g.png"
                        alt="Circle Background" class="w-full max-w-lg mx-auto sm:p-0 p-[50px]">

                    <!-- Text Content (Centered) -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                        <p class="font-bold lg:text-[60px] text-[30px] text-[#A93295] text-center">
                            <!-- Shaping
                        <br>
                        Futures with
                        <br>
                        Fun and
                        <br>
                        Learning -->
                            <?= wordwrap(strip_tags($landing_data['data']['sections'][8]['content']) ?? "", 7, "<br>") ?>

                        </p>
                    </div>
                </div>

                <div class="absolute top-[-120px] left-[0px] w-full z-10 lg:block hidden">
                    <img src="./assets/images/White_wave.png" alt="" class="w-full">
                </div>
            </section>
            <!--==== END ====-->


            <!--==== Start ====-->
            <section class="flex  flex-col items-center justify-center">
              
                    <?= $landing_data['data']['sections'][9]['content_heading'] ?? "" ?>
                    

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[32px]">
                    <?php
                    foreach ($landing_data['data']['sections'][9]['resolved_content']['media'] as $value => $data) {

                        ?>

                        <img src="<?= $api_url ?>/<?= $data['media_file'] ?? "" ?>" alt="">
                        <!-- <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/D5jzAHXQBheoy5AoGj15pC6psGk47suqP8PZuyHE.webp" alt="">
<img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/Z718ZMnRjFe0ZLHD7e9bIfeXZtf1ypTDVfNDT7dv.webp" alt="" class="sm:block hidden">
<img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/G4DC2vALg4jGIUerXyPmsFPktAVpvBpt7NosbW0n.webp" alt="" class="sm:block hidden">
<img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/xsVhu4KNZ072ZIFKm6PivA5elSEoFBMLwiBI3FRy.webp" alt="" class="sm:block hidden"> -->
                    <?php } ?>
                </div>


            </section>
            <!--==== END ====-->


            <!--==== Start ====-->
            <footer class="footer-bg relative py-[100px]">
                <div class="flex lg:flex-row  flex-col-reverse items-center justify-center sm:gap-20 gap-3">




                    <div class="flex items-center gap-4 sm:mt-10 mt-2 lg:hidden">
                        <p class="text-[21px] text-black font-semibold">Follow Us On:</p>
                        <div class="flex items-center gap-4">
                            <a href="<?= $layoutParts[1]['meta_data']['footer_facebook'] ?? "" ?>">

                                <svg width="10" height="18" viewBox="0 0 10 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.20264 17.7723V9.77957H0.5V6.66463H3.20264V4.36746C3.20264 1.70161 4.83866 0.25 7.2282 0.25C8.37281 0.25 9.35655 0.334812 9.64324 0.37272V3.15869L7.98596 3.15944C6.6864 3.15944 6.43477 3.77403 6.43477 4.67589V6.66463H9.53411L9.13056 9.77957H6.43477V17.7723H3.20264Z"
                                        fill="#FF454A" />
                                </svg>

                            </a>
                            <a href="<?= $layoutParts[1]['meta_data']['footer_instagram'] ?? "" ?>">

                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.93988 2.50677C12.5555 2.50677 12.8652 2.51652 13.8985 2.56341C14.5198 2.57098 15.1351 2.68451 15.7178 2.89908C16.1404 3.06126 16.5242 3.30971 16.8444 3.62843C17.1647 3.94715 17.4143 4.32908 17.5773 4.74963C17.7929 5.32955 17.9069 5.94197 17.9146 6.56026C17.9612 7.5886 17.9715 7.89687 17.9715 10.5C17.9715 13.1031 17.9617 13.4114 17.9146 14.4397C17.9069 15.058 17.7929 15.6705 17.5773 16.2504C17.4143 16.6709 17.1647 17.0528 16.8444 17.3716C16.5242 17.6903 16.1404 17.9387 15.7178 18.1009C15.1351 18.3155 14.5198 18.429 13.8985 18.4366C12.8657 18.483 12.556 18.4932 9.93988 18.4932C7.32379 18.4932 7.01404 18.4835 5.98123 18.4366C5.35997 18.429 4.74462 18.3155 4.16191 18.1009C3.73935 17.9387 3.35559 17.6903 3.03534 17.3716C2.71509 17.0528 2.46544 16.6709 2.30248 16.2504C2.08688 15.6705 1.97281 15.058 1.9652 14.4397C1.91856 13.4114 1.90829 13.1031 1.90829 10.5C1.90829 7.89687 1.91809 7.5886 1.9652 6.56026C1.97281 5.94197 2.08688 5.32955 2.30248 4.74963C2.46544 4.32908 2.71509 3.94715 3.03534 3.62843C3.35559 3.30971 3.73935 3.06126 4.16191 2.89908C4.74462 2.68451 5.35997 2.57098 5.98123 2.56341C7.01451 2.51699 7.32426 2.50677 9.93988 2.50677ZM9.93988 0.75C7.28088 0.75 6.94594 0.761142 5.90099 0.808497C5.08792 0.824592 4.28348 0.977805 3.52189 1.26162C2.86856 1.50659 2.27682 1.89049 1.78794 2.38653C1.28907 2.87325 0.903 3.46251 0.656695 4.11313C0.37152 4.87108 0.217572 5.67168 0.2014 6.48087C0.154751 7.51989 0.143555 7.85323 0.143555 10.4995C0.143555 13.1458 0.15475 13.4792 0.202333 14.5191C0.218505 15.3283 0.372453 16.1289 0.657629 16.8869C0.90366 17.5374 1.28941 18.1267 1.78794 18.6135C2.27709 19.1096 2.86916 19.4935 3.52282 19.7384C4.28441 20.0222 5.08885 20.1754 5.90193 20.1915C6.94687 20.2379 7.28041 20.25 9.94081 20.25C12.6012 20.25 12.9348 20.2389 13.9797 20.1915C14.7928 20.1754 15.5972 20.0222 16.3588 19.7384C17.0094 19.4874 17.6001 19.1041 18.0933 18.6129C18.5865 18.1218 18.9713 17.5336 19.2231 16.8859C19.5082 16.128 19.6622 15.3274 19.6784 14.5182C19.725 13.4792 19.7362 13.1458 19.7362 10.4995C19.7362 7.85323 19.725 7.51989 19.6774 6.47994C19.6613 5.67075 19.5073 4.87015 19.2221 4.1122C18.9761 3.46166 18.5903 2.87241 18.0918 2.3856C17.6027 1.88945 17.0106 1.50555 16.3569 1.26069C15.5953 0.976876 14.7909 0.823664 13.9778 0.807569C12.9338 0.761142 12.5989 0.75 9.93988 0.75Z"
                                        fill="#FF454A" />
                                    <path
                                        d="M9.93787 5.49316C8.94291 5.49316 7.97028 5.7868 7.143 6.33693C6.31571 6.88707 5.67092 7.66899 5.29016 8.58383C4.90941 9.49867 4.80978 10.5053 5.00389 11.4765C5.198 12.4477 5.67712 13.3398 6.38067 14.04C7.08422 14.7402 7.98059 15.217 8.95644 15.4102C9.93229 15.6034 10.9438 15.5042 11.863 15.1253C12.7822 14.7464 13.5679 14.1046 14.1207 13.2813C14.6735 12.458 14.9685 11.49 14.9685 10.4998C14.9685 9.17195 14.4385 7.89849 13.4951 6.95957C12.5516 6.02065 11.2721 5.49316 9.93787 5.49316ZM9.93787 13.7496C9.29203 13.7496 8.66069 13.559 8.12369 13.2019C7.58669 12.8448 7.16815 12.3373 6.921 11.7434C6.67385 11.1496 6.60918 10.4962 6.73518 9.86577C6.86118 9.23536 7.17218 8.65629 7.62886 8.2018C8.08554 7.7473 8.66738 7.43778 9.30082 7.31238C9.93425 7.18699 10.5908 7.25134 11.1875 7.49732C11.7842 7.74329 12.2942 8.15983 12.653 8.69427C13.0118 9.2287 13.2033 9.85702 13.2033 10.4998C13.2033 11.3617 12.8593 12.1883 12.2469 12.7978C11.6345 13.4072 10.8039 13.7496 9.93787 13.7496Z"
                                        fill="#FF454A" />
                                    <path
                                        d="M15.1677 6.46489C15.817 6.46489 16.3433 5.94109 16.3433 5.29494C16.3433 4.6488 15.817 4.125 15.1677 4.125C14.5185 4.125 13.9922 4.6488 13.9922 5.29494C13.9922 5.94109 14.5185 6.46489 15.1677 6.46489Z"
                                        fill="#FF454A" />
                                </svg>

                            </a>
                            <!-- <a href=""> 
<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_210_2723)">
<path d="M13.9791 1.67773H16.5092L10.9817 7.99535L17.4844 16.5922H12.3928L8.4049 11.3783L3.84184 16.5922H1.3102L7.22245 9.83481L0.984375 1.67773H6.20521L9.80992 6.44348L13.9791 1.67773ZM13.0911 15.0778H14.4931L5.44342 3.11258H3.93897L13.0911 15.0778Z" fill="#FF454A"/>
</g>
<defs>
<clipPath id="clip0_210_2723">
<rect width="18" height="18" fill="white" transform="translate(0.234375 0.25)"/>
</clipPath>
</defs>
</svg>
</a> -->
                            <a href="<?= $layoutParts[1]['meta_data']['footer_youtube'] ?? "" ?>">
                                <svg width="24" height="23" viewBox="0 0 24 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_210_2724)">
                                        <path
                                            d="M22.7854 5.79873C22.6582 5.32006 22.4075 4.88319 22.0584 4.53185C21.7093 4.1805 21.274 3.92701 20.7962 3.79674C19.0371 3.32373 12.0059 3.32373 12.0059 3.32373C12.0059 3.32373 4.97461 3.32373 3.21552 3.79674C2.73767 3.92701 2.30241 4.1805 1.95332 4.53185C1.60422 4.88319 1.35352 5.32006 1.22631 5.79873C0.755859 7.56549 0.755859 11.2499 0.755859 11.2499C0.755859 11.2499 0.755859 14.9342 1.22631 16.701C1.35352 17.1797 1.60422 17.6165 1.95332 17.9679C2.30241 18.3192 2.73767 18.5727 3.21552 18.703C4.97461 19.176 12.0059 19.176 12.0059 19.176C12.0059 19.176 19.0371 19.176 20.7962 18.703C21.274 18.5727 21.7093 18.3192 22.0584 17.9679C22.4075 17.6165 22.6582 17.1797 22.7854 16.701C23.2559 14.9342 23.2559 11.2499 23.2559 11.2499C23.2559 11.2499 23.2559 7.56549 22.7854 5.79873Z"
                                            fill="#FF454A" />
                                        <path d="M9.70605 14.5955V7.9043L15.5867 11.2499L9.70605 14.5955Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_210_2724">
                                            <rect width="22.5" height="22.5" fill="white"
                                                transform="translate(0.734375)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <iframe class="sm:w-[600px] w-[400px]"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8546.69900305866!2d80.314688!3d26.481518!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c399b1c43ca6d%3A0xdbdcdbc632d25b52!2sAllen%20Kids%20Swaroop%20Nagar!5e1!3m2!1sen!2sin!4v1760451676158!5m2!1sen!2sin"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>



                    <div class="sm:p-0 p-10 sm:text-left text-center">
                        <h3 class="text-[42px] text-black font-semibold">Contact Us</h3>
                        <div class="flex items-center gap-2 mt-5 text-[21px] text-black font-semibold">
                            <img src="./assets/images/call.png" alt="">
                            <a href="tel:"><?= $layoutParts[1]['meta_data']['footer_phones'] ?? "" ?></a>
                        </div>
                        <div class="flex items-center gap-2 mt-7 text-[21px] text-black font-semibold">
                            <img src="./assets/images/mail.png" alt="">
                            <a href="mailto:"><?= $layoutParts[1]['meta_data']['footer_email'] ?? "" ?></a>
                        </div>
                        <div class="flex items-center gap-2 mt-7 text-[21px] text-black font-semibold">
                            <img src="./assets/images/loc.png" alt="">
                            <p><?= $layoutParts[1]['meta_data']['footer_about'] ?? "" ?></p>
                        </div>

                        <div class="lg:flex items-center gap-4 mt-10 hidden">
                            <p class="text-[21px] text-black font-semibold">Follow Us On:</p>
                            <div class="flex items-center gap-4">
                                <a href="<?= $layoutParts[1]['meta_data']['footer_facebook'] ?? "" ?>">

                                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.20264 17.7723V9.77957H0.5V6.66463H3.20264V4.36746C3.20264 1.70161 4.83866 0.25 7.2282 0.25C8.37281 0.25 9.35655 0.334812 9.64324 0.37272V3.15869L7.98596 3.15944C6.6864 3.15944 6.43477 3.77403 6.43477 4.67589V6.66463H9.53411L9.13056 9.77957H6.43477V17.7723H3.20264Z"
                                            fill="#FF454A" />
                                    </svg>

                                </a>
                                <a href="<?= $layoutParts[1]['meta_data']['footer_instagram'] ?? "" ?>">

                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.93988 2.50677C12.5555 2.50677 12.8652 2.51652 13.8985 2.56341C14.5198 2.57098 15.1351 2.68451 15.7178 2.89908C16.1404 3.06126 16.5242 3.30971 16.8444 3.62843C17.1647 3.94715 17.4143 4.32908 17.5773 4.74963C17.7929 5.32955 17.9069 5.94197 17.9146 6.56026C17.9612 7.5886 17.9715 7.89687 17.9715 10.5C17.9715 13.1031 17.9617 13.4114 17.9146 14.4397C17.9069 15.058 17.7929 15.6705 17.5773 16.2504C17.4143 16.6709 17.1647 17.0528 16.8444 17.3716C16.5242 17.6903 16.1404 17.9387 15.7178 18.1009C15.1351 18.3155 14.5198 18.429 13.8985 18.4366C12.8657 18.483 12.556 18.4932 9.93988 18.4932C7.32379 18.4932 7.01404 18.4835 5.98123 18.4366C5.35997 18.429 4.74462 18.3155 4.16191 18.1009C3.73935 17.9387 3.35559 17.6903 3.03534 17.3716C2.71509 17.0528 2.46544 16.6709 2.30248 16.2504C2.08688 15.6705 1.97281 15.058 1.9652 14.4397C1.91856 13.4114 1.90829 13.1031 1.90829 10.5C1.90829 7.89687 1.91809 7.5886 1.9652 6.56026C1.97281 5.94197 2.08688 5.32955 2.30248 4.74963C2.46544 4.32908 2.71509 3.94715 3.03534 3.62843C3.35559 3.30971 3.73935 3.06126 4.16191 2.89908C4.74462 2.68451 5.35997 2.57098 5.98123 2.56341C7.01451 2.51699 7.32426 2.50677 9.93988 2.50677ZM9.93988 0.75C7.28088 0.75 6.94594 0.761142 5.90099 0.808497C5.08792 0.824592 4.28348 0.977805 3.52189 1.26162C2.86856 1.50659 2.27682 1.89049 1.78794 2.38653C1.28907 2.87325 0.903 3.46251 0.656695 4.11313C0.37152 4.87108 0.217572 5.67168 0.2014 6.48087C0.154751 7.51989 0.143555 7.85323 0.143555 10.4995C0.143555 13.1458 0.15475 13.4792 0.202333 14.5191C0.218505 15.3283 0.372453 16.1289 0.657629 16.8869C0.90366 17.5374 1.28941 18.1267 1.78794 18.6135C2.27709 19.1096 2.86916 19.4935 3.52282 19.7384C4.28441 20.0222 5.08885 20.1754 5.90193 20.1915C6.94687 20.2379 7.28041 20.25 9.94081 20.25C12.6012 20.25 12.9348 20.2389 13.9797 20.1915C14.7928 20.1754 15.5972 20.0222 16.3588 19.7384C17.0094 19.4874 17.6001 19.1041 18.0933 18.6129C18.5865 18.1218 18.9713 17.5336 19.2231 16.8859C19.5082 16.128 19.6622 15.3274 19.6784 14.5182C19.725 13.4792 19.7362 13.1458 19.7362 10.4995C19.7362 7.85323 19.725 7.51989 19.6774 6.47994C19.6613 5.67075 19.5073 4.87015 19.2221 4.1122C18.9761 3.46166 18.5903 2.87241 18.0918 2.3856C17.6027 1.88945 17.0106 1.50555 16.3569 1.26069C15.5953 0.976876 14.7909 0.823664 13.9778 0.807569C12.9338 0.761142 12.5989 0.75 9.93988 0.75Z"
                                            fill="#FF454A" />
                                        <path
                                            d="M9.93787 5.49316C8.94291 5.49316 7.97028 5.7868 7.143 6.33693C6.31571 6.88707 5.67092 7.66899 5.29016 8.58383C4.90941 9.49867 4.80978 10.5053 5.00389 11.4765C5.198 12.4477 5.67712 13.3398 6.38067 14.04C7.08422 14.7402 7.98059 15.217 8.95644 15.4102C9.93229 15.6034 10.9438 15.5042 11.863 15.1253C12.7822 14.7464 13.5679 14.1046 14.1207 13.2813C14.6735 12.458 14.9685 11.49 14.9685 10.4998C14.9685 9.17195 14.4385 7.89849 13.4951 6.95957C12.5516 6.02065 11.2721 5.49316 9.93787 5.49316ZM9.93787 13.7496C9.29203 13.7496 8.66069 13.559 8.12369 13.2019C7.58669 12.8448 7.16815 12.3373 6.921 11.7434C6.67385 11.1496 6.60918 10.4962 6.73518 9.86577C6.86118 9.23536 7.17218 8.65629 7.62886 8.2018C8.08554 7.7473 8.66738 7.43778 9.30082 7.31238C9.93425 7.18699 10.5908 7.25134 11.1875 7.49732C11.7842 7.74329 12.2942 8.15983 12.653 8.69427C13.0118 9.2287 13.2033 9.85702 13.2033 10.4998C13.2033 11.3617 12.8593 12.1883 12.2469 12.7978C11.6345 13.4072 10.8039 13.7496 9.93787 13.7496Z"
                                            fill="#FF454A" />
                                        <path
                                            d="M15.1677 6.46489C15.817 6.46489 16.3433 5.94109 16.3433 5.29494C16.3433 4.6488 15.817 4.125 15.1677 4.125C14.5185 4.125 13.9922 4.6488 13.9922 5.29494C13.9922 5.94109 14.5185 6.46489 15.1677 6.46489Z"
                                            fill="#FF454A" />
                                    </svg>

                                </a>
                                <!-- <a href=""> 
<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_210_2723)">
<path d="M13.9791 1.67773H16.5092L10.9817 7.99535L17.4844 16.5922H12.3928L8.4049 11.3783L3.84184 16.5922H1.3102L7.22245 9.83481L0.984375 1.67773H6.20521L9.80992 6.44348L13.9791 1.67773ZM13.0911 15.0778H14.4931L5.44342 3.11258H3.93897L13.0911 15.0778Z" fill="#FF454A"/>
</g>
<defs>
<clipPath id="clip0_210_2723">
<rect width="18" height="18" fill="white" transform="translate(0.234375 0.25)"/>
</clipPath>
</defs>
</svg>
</a> -->
                                <a href="<?= $layoutParts[1]['meta_data']['footer_youtube'] ?? "" ?>">
                                    <svg width="24" height="23" viewBox="0 0 24 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_210_2724)">
                                            <path
                                                d="M22.7854 5.79873C22.6582 5.32006 22.4075 4.88319 22.0584 4.53185C21.7093 4.1805 21.274 3.92701 20.7962 3.79674C19.0371 3.32373 12.0059 3.32373 12.0059 3.32373C12.0059 3.32373 4.97461 3.32373 3.21552 3.79674C2.73767 3.92701 2.30241 4.1805 1.95332 4.53185C1.60422 4.88319 1.35352 5.32006 1.22631 5.79873C0.755859 7.56549 0.755859 11.2499 0.755859 11.2499C0.755859 11.2499 0.755859 14.9342 1.22631 16.701C1.35352 17.1797 1.60422 17.6165 1.95332 17.9679C2.30241 18.3192 2.73767 18.5727 3.21552 18.703C4.97461 19.176 12.0059 19.176 12.0059 19.176C12.0059 19.176 19.0371 19.176 20.7962 18.703C21.274 18.5727 21.7093 18.3192 22.0584 17.9679C22.4075 17.6165 22.6582 17.1797 22.7854 16.701C23.2559 14.9342 23.2559 11.2499 23.2559 11.2499C23.2559 11.2499 23.2559 7.56549 22.7854 5.79873Z"
                                                fill="#FF454A" />
                                            <path d="M9.70605 14.5955V7.9043L15.5867 11.2499L9.70605 14.5955Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_210_2724">
                                                <rect width="22.5" height="22.5" fill="white"
                                                    transform="translate(0.734375)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>

                </div>
            </footer>
            <div class="absolute top-[0px] left-0 w-full z-10">
                <img src="./assets/images/upper-2.png" alt="" class="w-full">
            </div>
            <!--==== END ====-->

        </div>
    </div>
    <div>
        <a id="scroll" style="display: block;"><span></span></a>
    </div>

    <div id="videoModal" class="fixed inset-0   bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl w-[90%] max-w-3xl relative shadow-lg">
            <!-- Close Button -->
            <button id="closeModalBtn"
                class="absolute top-2 right-2 text-white bg-red-600 rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700 z-50">
                &times;
            </button>
            <!-- Video Container -->
            <div class="w-full aspect-video">
                <iframe id="videoIframe" class="w-full h-full rounded-b-xl" class="w-[100%] lg:h-[100%]"
                    src="https://www.youtube.com/embed/1Vzi5P3yE7c?autoplay=1&mute=1&loop=1&playlist=1Vzi5P3yE7c"
                    frameborder="0" allow="autoplay;" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const videoModal = document.getElementById('videoModal');
        const videoIframe = document.getElementById('videoIframe');

        openModalBtn.addEventListener('click', () => {
            videoModal.classList.remove('hidden');
            videoIframe.src += ''; // Reload video to autoplay
        });

        closeModalBtn.addEventListener('click', () => {
            videoModal.classList.add('hidden');
            videoIframe.src = videoIframe.src; // Reset to stop the video
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000, // 3 seconds
                disableOnInteraction: false,
            },
            speed: 800, // smooth transition
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        const swiper2 = new Swiper('.carousel2', {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
                1220: {
                    slidesPerView: 4
                },
                1320: {
                    slidesPerView: 5
                }
            }
        });
        const swiper3 = new Swiper('.carousel3', {
            loop: true,
            spaceBetween: 15,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                }
            }
        });
        const swiper4 = new Swiper('.carousel4', {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                }
            }
        });


        const ourToppers = new Swiper('.our-toppers', {
            loop: true,
            spaceBetween: 15,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
                1220: {
                    slidesPerView: 4
                },
                1320: {
                    slidesPerView: 5
                }
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.addEventListener("scroll", function () {
                if (window.scrollY > 100) {
                    document.getElementById("scroll").style.display = "block";
                } else {
                    document.getElementById("scroll").style.display = "none";
                }
            });

            document.getElementById("scroll").addEventListener("click", function () {
                setTimeout(function () {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                }, 500); // 500ms delay
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000, // 3 seconds
                disableOnInteraction: false,
            },
            speed: 800, // smooth transition
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <script>
      (function() {
            function getParam(name) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(name);
            }
            var source = getParam("utm_source") || document.referrer || "";
            console.log("Initial Source:", source);
            if (!source) {
                source = "Landing Page";
            } else if (source.includes("google.")) {
                source = "Google-Ads by Agency";
                console.log("Referrer is Google, setting source to 'Google-Ads by Agency'");
            } else if (source.includes("facebook.")) {
                source = "Facebook by Agency";
            } else if (source.includes("instagram.")) {
                source = "Instagram by Agency";
            // } else if (!getParam("utm_source")) {
            //     source = "Google by Agency";
            }
            if (!sessionStorage.getItem("leadSource")) {
                sessionStorage.setItem("leadSource", source);
            }
            var finalSource = sessionStorage.getItem("leadSource");
            var sourceInput = document.getElementById("source");
            if (sourceInput) {
                sourceInput.value = finalSource;
            }
            console.log("Captured Source:", finalSource);

            // Regex patterns
            const nameRegex = /^[A-Za-z\s]+$/;
            const mobileRegex = /^[6-9]\d{9}$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Form elements (enquiryForm)
            const enquiryForm = document.getElementById("enquiryForm");
            const eYears = enquiryForm?.querySelector("#years");
            const eGrade = enquiryForm?.querySelector("#egrade");
            const eStudentName = enquiryForm?.querySelector("#estudent_name");
            const eParentName = enquiryForm?.querySelector("#eparent_name");
            const eMobile = enquiryForm?.querySelector("#emobile");
            const eEmail = enquiryForm?.querySelector("#eemail");
            const eSubmitBtn = enquiryForm?.querySelector("#submitBtn");
            const eSessionError = enquiryForm?.querySelector("#session-error-1");
            const eGradeError = enquiryForm?.querySelector("#grade-error-1");
            const eStudentError = enquiryForm?.querySelector("#student-error-1");
            const eParentError = enquiryForm?.querySelector("#parent-error-1");
            const eMobileError = enquiryForm?.querySelector("#mobile-error-1");
            const eEmailError = enquiryForm?.querySelector("#email-error-1");

            // Debugging: Log element availability
            console.log("enquiryForm elements:", {
                form: !!enquiryForm,
                years: !!eYears,
                grade: !!eGrade,
                studentName: !!eStudentName,
                parentName: !!eParentName,
                mobile: !!eMobile,
                email: !!eEmail,
                submitBtn: !!eSubmitBtn
            });

            // Input validation function
            function validateInput(input, regex, errorElement, errorMessage, isSelect = false) {
                if (!input || !errorElement) {
                    console.error(`Input or error element missing for ${errorElement?.id || 'unknown'}`);
                    return false;
                }
                if (isSelect) {
                    const isValid = input.value.trim() !== "";
                    errorElement.classList.toggle("hidden", isValid);
                    errorElement.textContent = isValid ? "" : errorMessage;
                    return isValid;
                }
                const value = input.value.trim();
                const isValid = value ? (regex ? regex.test(value) : true) : false;
                errorElement.classList.toggle("hidden", isValid);
                errorElement.textContent = isValid ? "" : errorMessage;
                return isValid;
            }

            // Form submission handler
            function handleSubmit(form, submitBtn, inputs, errorElements) {
                if (!form || !submitBtn) {
                    console.error("Form or submit button missing:", form?.id);
                    return;
                }
                console.log(`Binding submit event for ${form.id}`);
                form.addEventListener("submit", function (e) {
                    e.preventDefault();
                    console.log(`Submit triggered for ${form.id}`);
                    submitBtn.disabled = true;
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = "Submitting...";
                    const { years, grade, studentName, parentName, mobile, email } = inputs;
                    let isValid = true;
                    // Validate inputs
                    isValid &= validateInput(years, null, errorElements.session, "Please select a session.", true);
                    isValid &= validateInput(grade, null, errorElements.grade, "Please select a grade.", true);
                    isValid &= validateInput(studentName, nameRegex, errorElements.student, "Only letters and spaces allowed.");
                    isValid &= validateInput(parentName, nameRegex, errorElements.parent, "Only letters and spaces allowed.");
                    isValid &= validateInput(mobile, mobileRegex, errorElements.mobile, "Please enter a valid 10-digit phone number starting with 6-9.");
                    isValid &= validateInput(email, emailRegex, errorElements.email, "Please enter a valid email address.");
                    console.log(`Validation result for ${form.id}:`, isValid);
                    if (!isValid) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                        return;
                    }

                    // API Payload
                    const payload = {
                        name: studentName.value.trim(),
                        years: years.value.trim(),
                        grade: grade.value.trim(),
                        student_name: studentName.value.trim(),
                        parent_name: parentName.value.trim(),
                        phone: mobile.value.trim(),
                        email: email.value.trim().toLowerCase(),
                        source: sessionStorage.getItem("leadSource") || "Landing Page",
                        source_type: "Landing Page",
                        enquiry_type: "Digital",
                        message: "This Message From Allen Kids Swaroop Nagar",
                        subject: "Admission Enquiry",
                        branch_id: 4,
                        school_id: 2,
                        language_id: 1
                    };

                    console.log("Submitting payload:", payload);

                    fetch("admission-proxy", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(payload)
                    })
                        .then(response => {
                            if (!response.ok) throw new Error(`Network error: ${response.status}`);
                            return response.json();
                        })
                        .then(data => {
                            console.log("API response:", data);
                            window.location.href = "thankyou"; // Redirect to thank you page
                            form.reset();
                        })
                        .catch(error => {
                            console.error("Form submission error:", error);
                            alert("Error submitting the form. Please try again.");
                        })
                        .finally(() => {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        });
                });
            }

            // Real-time validation for enquiryForm
            if (enquiryForm && eYears && eGrade && eStudentName && eParentName && eMobile && eEmail && eSubmitBtn) {
                eYears.addEventListener("change", () => validateInput(eYears, null, eSessionError, "Please select a session.", true));
                eGrade.addEventListener("change", () => validateInput(eGrade, null, eGradeError, "Please select a grade.", true));
                eStudentName.addEventListener("input", () => validateInput(eStudentName, nameRegex, eStudentError, "Only letters and spaces allowed."));
                eParentName.addEventListener("input", () => validateInput(eParentName, nameRegex, eParentError, "Only letters and spaces allowed."));
                eMobile.addEventListener("input", () => {
                    eMobile.value = eMobile.value.replace(/\D/g, '').slice(0, 10);
                    validateInput(eMobile, mobileRegex, eMobileError, "Please enter a valid 10-digit phone number starting with 6-9.");
                });
                eEmail.addEventListener("input", () => {
                    eEmail.value = eEmail.value.toLowerCase();
                    validateInput(eEmail, emailRegex, eEmailError, "Please enter a valid email address.");
                });

                handleSubmit(enquiryForm, eSubmitBtn, {
                    years: eYears,
                    grade: eGrade,
                    studentName: eStudentName,
                    parentName: eParentName,
                    mobile: eMobile,
                    email: eEmail
                }, {
                    session: eSessionError,
                    grade: eGradeError,
                    student: eStudentError,
                    parent: eParentError,
                    mobile: eMobileError,
                    email: eEmailError
                });
            } else {
                console.error("Missing required elements for enquiryForm:", {
                    form: !!enquiryForm,
                    years: !!eYears,
                    grade: !!eGrade,
                    studentName: !!eStudentName,
                    parentName: !!eParentName,
                    mobile: !!eMobile,
                    email: !!eEmail,
                    submitBtn: !!eSubmitBtn
                });
            }
        })();
    </script>
</body>

</html>