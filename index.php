<?php
$page = "/";
require_once 'proxy/apis.php';
// print_r($home_data);
require_once "layouts/layout-function.php";
$pageData = $homePage;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  $homePage['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?=  $homePage['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?=  $homePage['data']['meta_keywords'] ?? "" ?>">
    <!--==== Head ====-->
    <!--==== Head ====-->
    <?php include "includes/head.php"; ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->

    <!--==== Main Content ====-->
      <main>
        <!--==== Hero Section ====-->
        <section class="relative">
            <div class="absolute md:left-10 top-10 animate-scale-loop">
                <img src="assets/images/hero/scale-start.png" class="md:w-[100%] w-[80px]" alt="animation one">
            </div>
            <div class="absolute left-10 bottom-10 animate-scale-loop2">
                <img src="assets/images/hero/icon-tool-04.png.png" alt="animation Two">
            </div>
            <div class="comman-container">
                <div class="md:flex items-center py-10 mx-4">
                    <div class="md:w-[50%]" data-aos="fade-right">
                        <div class="relative z-10">
                            <h1 class="hero-h1 mb-4 md:text-[65px] text-[42px] relative z-90">
                                <span class="text-[32px]">learn, Play, & Grow Together</span> <br>
                                Start Learning With
                            </h1>
                            <a href="" class="transition-all"><img src="assets/images/hero/allen-kids.png" alt=""></a>
                        </div>
                        <div class="mt-7">
                            <ul class=" ">
                                <li
                                    class="text-[#2C4073] font-[500] text-[14px] hero-li-points flex items-center gap-2 mt-2">
                                    <span></span> Smart Classes
                                </li>
                                <li
                                    class="text-[#2C4073] font-[500] text-[14px] hero-li-points flex items-center gap-2 mt-2">
                                    <span></span> Activity Based Thematic Curriculum
                                </li>
                                <li
                                    class="text-[#2C4073] font-[500] text-[14px] hero-li-points flex items-center gap-2 mt-2">
                                    <span></span> Trained & Experienced Staff
                                </li>
                                <li
                                    class="text-[#2C4073] font-[500] text-[14px] hero-li-points flex items-center gap-2 mt-2">
                                    <span></span> Coding
                                </li>
                                <li
                                    class="text-[#2C4073] font-[500] text-[14px] hero-li-points flex items-center gap-2 mt-2">
                                    <span></span>Sports Activities
                                </li>
                                <li
                                    class="text-[#2C4073] font-[500] text-[14px] hero-li-points flex items-center gap-2 mt-2">
                                    <span></span>Student: Teacher Ratio – 12 : 1
                                </li>
                            </ul>
                            <div class="mt-10 flex gap-3 relative z-90">
                                <a href="contact-us"
                                    class="bg-[#DD5AC4] h-[50px] w-[150px] flex justify-center items-center text-[18px] text-white rounded-[10px]">Contact
                                    Us </a>
                                <a href="admission"
                                    class="bg-[#2C4073] h-[50px] w-[150px] flex justify-center items-center text-[18px] text-white rounded-[10px]">Learn
                                    More </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-4">
                        <div data-aos="fade-left">
                            <img src="assets/images/hero/hero-image.png" alt="Banner Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute md:right-10 right-1 top-10 animate-scale-loop">
                <img src="assets/images/hero/star.png" alt="animation one">
            </div>
            <div class="absolute right-10 bottom-10 animate-scale-loop2">
                <img src="assets/images/hero/icon-tool-05.png" alt="animation Two">
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Core Value Start ====-->
        <section class="core-value-bg  md:py-20 py-8 relative  bg-cover bg-center" style="background-size: cover;">
            <div class="absolute left-0 top-40 animate-left-to-right">
                <img src="assets/images/leaf.png" class="md:w-[100%] w-[80px]" alt="Leaf">
            </div>
            <div class="absolute right-0 translate-y-40 translate-x-[-30px] animate-scale-loop">
                <img src="assets/images/start.png" class="md:w-[100%] w-[80px]" alt="Star">
            </div>
            <div class="absolute left-0 bottom-0 animate-scale-loop">
                <img src="assets/images/white-rainbow.png" class="md:w-[100%] w-[80px]" alt="White Rainbow">
            </div>
            <div class="absolute right-5 z-100 bottom-0 animate-scale-loop">
                <img src="assets/images/bullets-circle.png" class="md:w-[100%] w-[80px]" alt="Bullet Rainbow">
            </div>
            <div class="2xl:w-[1500px] xl:w-[1280px] lg:w-[1080px] sm:mx-auto mx-4">
                <div class="text-center text-white md:pt-30">
                    <h3 class="flex justify-center gap-3 text-[20px] font-[400]"><img
                            src="assets/images/icon-arrow-02.png" alt=""> Our core values <img
                            src="assets/images/icon-arrow-1.png" alt=""></h3>
                    <!-- <h2 class="md:text-[45px] text-[32px] leading-11 mt-4">We are honest in our <br> actions and speech
                    </h2> -->
                </div>
                <div class="swiper our-value-carousel mt-10">
                    <div class="swiper-wrapper ">
                        <?php
                        foreach ($homePage['data']['sections'][1]['resolved_content']['media'] as $coreValue) {
                        ?>
                            <div class="bg-center swiper-slide p-5 core-value-card md:mb-0 mb-3"
                                style="background:url(assets/images/core-card-bg.png);background-repeat: no-repeat;background-size: cover;">
                                <div class="">

                                    <img src="<?php echo $coreValue['media_url'] ?>" class="mx-auto animated-img" alt="<?= htmlspecialchars($coreValue['media_alt_text']) ?>">
                                </div>
                                <div class="text-center mt-5">
                                    <h2 class="text-[#2C4073] text-[24px]"><?php echo $coreValue['heading'] ?></h2>
                                    <p class="text-[#70747F] text-[16px] mt-3 font-[300] mb-5 text-[18px]">
                                        <?php echo strip_tags($coreValue['content']) ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Why Choose Us Start ====-->
        <section class="mt-20">
            <div class="comman-container">
                <div class="md:flex gap-12">
                    <div data-aos="zoom-in-right md:w-[45%]">
                        <img src="<?php echo $homePage['data']['sections'][2]['columns'][0]['image_url'] ?? "assets/images/why-choose-us/why-choose-us.webp" ?>" width="100%" alt="<?= htmlspecialchars($homePage['data']['sections'][2]['columns'][0]['image_alt'] ?? '') ?>">
                    </div>
                    <div class="md:mt-0 mt-5 md:w-[55%]">
                        <h3 class="text-[#F66] text-[19px] flex items-center gap-2">Why Choose Us
                            <svg width="78" height="30" viewBox="0 0 78 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                        </h3>
                        <h2 class="text-[#2C4073] text-[42px] leading-9 mt-3 mb-4">Why choose Allen Kids?</h2>
                        <?php
                        $fullContent = <<<HTML
                                    <p class="text-[#70747F] text-[18px] mt-6">
                                    Allen kids is a school with a difference. It is home away from home where every child blossoms at its own pace in a caring and secure environment.. Allen kids does not just teach children to read and write the conventional rote learning way but educates and grooms them holistically by providing the best amenities, instilling moral values and 21st century skills to face future challenges. The trust, goodwill and legacy of excellence has been created over the years by investing in the changing education policy and best teaching learning strategies. The child centric curriculum with life skill development, stable and inspiring administrative block, dynamic leaders and 24 + schools under its umbrella gives students a scope to compete with the best. Only at Allen kids the child gets exposure to our revolutionary curriculum “BRILLIANCE” which fosters the development of well rounded, conscious leaders to excel in our rapidly evolving society.  In Brilliance B stands for - <br>
                                    <strong>B</strong> - BRILLIANT ACADEMICS <br>
                                    <strong>R</strong> - RESOURCEFUL CODING <br>
                                    <strong>I</strong> - INNOVATIVE LIFE SKILLS <br>
                                    <strong>L</strong> - LUCID COMMUNICATION- <br>
                                    <strong>L</strong> - LIBERAL GENDER EQUALITY- <br>
                                    <strong>I</strong> - INSPIRED FOOD SCIENCE- <br>
                                    <strong>A</strong> - AWARE MINDFULNESS- <br>
                                    <strong>C</strong> - CAPABLE FINANCIAL LITERACY <br>
                                    <strong>E</strong> - ECOLOGICAL PLANTATION <br>
                                    our CSS supports learning to all types of learners auditory/visual/ kinaesthetic.
                                    </p>

                                    <ul class="md:pl-4 pl-5 mt-4" style="list-style: disc;">
                                        <li class="text-[#70747F]">The school provides digital classroom and well equipped library.</li>
                                        <li class="text-[#70747F]">Regular society awareness programmes are conducted to connect and give back to the society.</li>
                                        <li class="text-[#70747F]">The child gets exposure to Inter school competitions within the group schools and outside the group. Thus giving them best competence.</li>
                                        <li class="text-[#70747F]">Extracurricular activities like skating, swimming, adventure sports and gymnastics are provided to all children.</li>
                                        <li class="text-[#70747F]">Parents play an important role in the education system.</li>
                                        <li class="text-[#70747F]">Regular parent workshops and orientation programmes are held to update them with the new curriculum and its nuances.</li>
                                    </ul>
                                    HTML;

                        $plainText = strip_tags($fullContent); // Remove HTML for word count
                        $words = explode(' ', $plainText);
                        $uniqueId = uniqid('readmore_');

                        if (count($words) > 60) {
                            $shortText = implode(' ', array_slice($words, 0, 130));
                        ?>
                            <div>
                                <p class="text-[#70747F] text-[18px] mt-6" id="<?= $uniqueId ?>_short"><?= $shortText ?>...
                                </p>
                                <div id="<?= $uniqueId ?>_full" style="display: none;">
                                    <?= $fullContent ?>
                                </div>
                                <span class="text-blue-500 cursor-pointer text-[15px] ml-2 inline-block mt-2"
                                    onclick="toggleFullText('<?= $uniqueId ?>')" id="<?= $uniqueId ?>_toggle">Read
                                    more</span>
                            </div>
                        <?php
                        } else {
                            echo $fullContent;
                        }
                        ?>

                        <div class="lg:grid hidden grid-cols-2 gap-8 mt-8">
                            <div class="md:flex gap-3 items-center" data-aos="zoom-in-up">
                                <img src="assets/images/why-choose-us/motor.png" class="w-[75px] h-[75px] object-cover"
                                    alt="Motor Skills">
                                <div>
                                    <h2 class="text-[#2C4073] text-[20px]">Motor Skills</h2>
                                    <p class="text-[#70747F] text-[16px] mt-2"></p>
                                </div>
                            </div>
                            <div class="md:flex gap-3 items-center" data-aos="zoom-in-up">
                                <img src="assets/images/why-choose-us/social-dev.png"
                                    class="w-[75px] h-[75px] object-cover" alt="">
                                <div>
                                    <h2 class="text-[#2C4073] text-[20px]">Social Development</h2>
                                    <p class="text-[#70747F] text-[16px] mt-2"></p>
                                </div>
                            </div>
                            <div class="md:flex gap-3 items-center" data-aos="zoom-in-up">
                                <img src="assets/images/why-choose-us/cognitive.png"
                                    class="w-[75px] h-[75px] object-cover" alt="">
                                <div>
                                    <h2 class="text-[#2C4073] text-[20px]">Cognitive Development</h2>
                                    <p class="text-[#70747F] text-[16px] mt-2"></p>
                                </div>
                            </div>
                            <div class="md:flex gap-3 items-center" data-aos="zoom-in-up">
                                <img src="assets/images/why-choose-us/language-dev.png"
                                    class="w-[75px] h-[75px] object-cover" alt="">
                                <div>
                                    <h2 class="text-[#2C4073] text-[20px]">Language Development</h2>
                                    <p class="text-[#70747F] text-[16px] mt-2"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Start ====-->
        <section class="md:mt-18 mt-10">
            <div class="swiper carousel1">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($homePage['data']['sections'][3]['resolved_content']['items'] as $activesValue) {
                    ?>
                        <div class="swiper-slide">
                            <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                                <img src="https://allenkids.allenhouseschools.com/<?php echo $activesValue['image_url'] ?? "" ?>" class="w-[100%] rounded-[20px]" alt="<?= htmlspecialchars($activesValue['image_alt'] ?? $activesValue['image_alt_text'] ?? '') ?>" />
                                <div class="p-4 md:h-[185px] h-[190px]">
                                    <h2 class="text-[22px] text-[#2C4073]"><?php echo $activesValue['title'] ?? "" ?></h2>
                                    <p class="text-[18px] text-[#70747F] mt-2"><?php echo strip_tags($activesValue['description']) ?? "" ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/activies/swiming-pool.webp" class="w-[100%] rounded-[20px]"
                                alt="Swimming" />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Swimming</h2>
                                <p class="text-[18px] text-[#70747F] mt-2">Swimming improves cardiovascular fitness and
                                    builds muscle strength. A great way to improve coordination, balance and
                                    flexibility. </p>
                            </div>
                        </div>
                    </div>
                     <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/activies/taekwondo.webp" class="w-[100%] rounded-[20px]"
                                alt="Taekwondo" />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Taekwondo</h2>
                                <p class="text-[18px] text-[#70747F] mt-2">Taekwondo cultivates mental discipline,
                                    focus, and character development, aligning with the school's holistic approach to
                                    education. </p>
                            </div>
                        </div>
                    </div>
                     <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/dance.png" class="w-[100%] rounded-[20px]" alt="Dance " />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Dance </h2>
                                <p class="text-[18px] text-[#70747F] mt-2">It’s a fun activity that combines movement,
                                    music, and creativity helping kids learn about their bodies and the world around
                                    them.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/music.png" class="w-[100%] rounded-[20px]" alt="Music" />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Music </h2>
                                <p class="text-[18px] text-[#70747F] mt-2">Music plays a vital role in a child's
                                    development, offering benefits from improving memory and learning abilities ,
                                    social-emotional growth to physical coordination and language skills. </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/yoga.png" class="w-[100%] rounded-[20px]" alt="Yoga " />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Yoga </h2>
                                <p class="text-[18px] text-[#70747F] mt-2">Yoga enhances flexibility, strength, and
                                    balance, while also promoting body awareness and mindfulness.</p>
                            </div>
                        </div>
                    </div>
                   
                    <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/activies/field-trip.webp" class="w-[100%] rounded-[20px]"
                                alt="Field trips " />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Field trips </h2>
                                <p class="text-[18px] text-[#70747F] mt-2">Field trips offer valuable hands-on learning
                                    experiences that complement classroom instruction, enhancing academic performance,
                                    promoting social skills, and fostering a love for learning in children.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                            <img src="assets/images/activies/f-moter-skills.webp" class="w-[100%] rounded-[20px]"
                                alt="FMotor skill activities" />
                            <div class="p-4 md:h-[185px] h-[190px]">
                                <h2 class="text-[22px] text-[#2C4073]">Motor skill activities</h2>
                                <p class="text-[18px] text-[#70747F] mt-2">Motor skill activities are foundational for
                                    everyday tasks, learning, and overall well-being, influencing physical, cognitive,
                                    and social development. Developing these skills early on can significantly impact a
                                    child's academic success and future independence.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Our Class ====-->
        <section class="md:mt-20 md:mt-0 mt-8" style="background-image: url(assets/images/our-class/o-c-bg.png);">
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
                        Our Classes
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
                    <h2 class="md:text-[45px] text-[32px] leading-11 mt-4 text-[#2C4073]">We Provide a Competency
                        Program
                        <br> To Build Bright Future
                    </h2>
                </div>
                <div class="swiper carousel2 mt-10">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($homePage['data']['sections'][4]['resolved_content']['items'] as $classValue) {
                        ?>
                            <div class="swiper-slide">
                                <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="300">
                                    <img src="https://allenkids.allenhouseschools.com/<?php echo $classValue['image_url'] ?? "" ?>" class="w-[100%]" alt="<?= htmlspecialchars($classValue['image_alt'] ?? $classValue['image_alt_text'] ?? '') ?>" />
                                    <div class="p-5 bg-white text-center w-[300px] mx-auto relative top-[-40px]">
                                        <h2 class="text-[28px] text-[#2C4073]"><?php echo $classValue['title'] ?? "" ?></h2>
                                        <h3 class="text-[22px]"><?php echo $classValue['description'] ?? "" ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--====Legacy START ====-->
        <?php include "includes/legacy.php" ?>
        <!--==== END ====-->

        <!--==== EVENT START =====-->
        <section class="events-bg">
            <div class="md:mx-10 mx-4 py-10">
                <div class="text-center text-white pt-10 mb-5">
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
                        Events
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
                    <h2 class="md:text-[45px] text-[32px] leading-11 mt-4 text-[#2C4073]">School Activities & Programs
                    </h2>
                </div>
              
                <div class="swiper events-carousel mt-10">
                   <div class="swiper-wrapper">
                        <?php
                        $colors = ["#DD5AC4", "#2C4073", "#FF454A"];
                        $image_bg = ["assets/images/events/pink-bg.webp", "assets/images/events/blue-bg.webp", "assets/images/events/red-bg.webp"];
                        foreach ($eventData['data'] as $i => $data) { 
                            $bgColor = $colors[$i % count($colors)];
                            $bgImage = $image_bg[$i % count($image_bg)];
                        ?>
                            <div class="swiper-slide">
                                <div class="event-hover transition-all">
                                    <div data-aos="fade-up" data-aos-duration="1000">
                                        <div class="relative">
                                            <img src="<?php echo $api_url; ?>/<?php echo $data['media'][0]['media_file'] ?>"
                                                class="w-[100%] mx-auto relative z-90 rounded-[20px]" alt="<?= htmlspecialchars($data['media'][0]['media_alt_text']) ?>" />
                                            <div class="absolute z-90 bottom-[-1px]">
                                                <img src="<?php echo $bgImage; ?>" class="w-[100%]" alt="Pink">
                                            </div>
                                        </div>
                                        <?php $contentId = uniqid('eventContentHeight_'); ?>
                                        <div class="px-4 pb-3  rounded-b-[20px] relative h-[260px]" style="background-color: <?= $bgColor ?>;"
                                            id="<?= $contentId ?>">
                                            <div class="flex justify-between">
                                                <span class="text-[#fff] flex items-center gap-1">
                                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.625 9H3.375C3.15625 9 3 8.84375 3 8.625V7.375C3 7.1875 3.15625 7 3.375 7H4.625C4.8125 7 5 7.1875 5 7.375V8.625C5 8.84375 4.8125 9 4.625 9ZM8 8.625C8 8.84375 7.8125 9 7.625 9H6.375C6.15625 9 6 8.84375 6 8.625V7.375C6 7.1875 6.15625 7 6.375 7H7.625C7.8125 7 8 7.1875 8 7.375V8.625ZM11 8.625C11 8.84375 10.8125 9 10.625 9H9.375C9.15625 9 9 8.84375 9 8.625V7.375C9 7.1875 9.15625 7 9.375 7H10.625C10.8125 7 11 7.1875 11 7.375V8.625ZM8 11.625C8 11.8438 7.8125 12 7.625 12H6.375C6.15625 12 6 11.8438 6 11.625V10.375C6 10.1875 6.15625 10 6.375 10H7.625C7.8125 10 8 10.1875 8 10.375V11.625ZM5 11.625C5 11.8438 4.8125 12 4.625 12H3.375C3.15625 12 3 11.8438 3 11.625V10.375C3 10.1875 3.15625 10 3.375 10H4.625C4.8125 10 5 10.1875 5 10.375V11.625ZM11 11.625C11 11.8438 10.8125 12 10.625 12H9.375C9.15625 12 9 11.8438 9 11.625V10.375C9 10.1875 9.15625 10 9.375 10H10.625C10.8125 10 11 10.1875 11 10.375V11.625ZM14 3.5V14.5C14 15.3438 13.3125 16 12.5 16H1.5C0.65625 16 0 15.3438 0 14.5V3.5C0 2.6875 0.65625 2 1.5 2H3V0.375C3 0.1875 3.15625 0 3.375 0H4.625C4.8125 0 5 0.1875 5 0.375V2H9V0.375C9 0.1875 9.15625 0 9.375 0H10.625C10.8125 0 11 0.1875 11 0.375V2H12.5C13.3125 2 14 2.6875 14 3.5ZM12.5 14.3125V5H1.5V14.3125C1.5 14.4375 1.5625 14.5 1.6875 14.5H12.3125C12.4062 14.5 12.5 14.4375 12.5 14.3125Z"
                                                            fill="#fff" />
                                                    </svg>
                                                    <?php
                                                        $rawDate = $data['created_at'];
                                                        echo date("M d, Y", strtotime($rawDate));
                                                    ?>
                                                </span>
                                                <span class="text-[#fff] flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16"
                                                        viewBox="0 0 17 14" fill="none">
                                                        <path
                                                            d="M2.56836 5.93848L2.57324 5.92871C2.78173 5.53505 3.06293 5.21579 3.42383 4.99414C3.73959 4.80025 4.09596 4.69339 4.48047 4.66211L4.64648 4.65332H13.7373V3.7832C13.7223 3.52174 13.6344 3.31617 13.4785 3.14258C13.3049 2.98665 13.0994 2.89883 12.8379 2.88379H8.0293L7.88281 2.7373L6.18359 1.03711H1.7998C1.53377 1.05041 1.32418 1.13732 1.14844 1.29492C0.992154 1.4686 0.90476 1.67485 0.889648 1.93652V9.27832L2.56836 5.93848ZM13.2646 12.9619C13.4493 12.9509 13.5768 12.8779 13.6855 12.6973L16.4404 7.1875C16.5078 7.04312 16.5122 6.94419 16.4824 6.86035L16.4424 6.7793C16.3696 6.66618 16.2595 6.58834 16.0283 6.57617H4.68457C4.52142 6.58433 4.41519 6.63075 4.33594 6.72266L4.26465 6.83008L1.19824 12.9619H13.2646Z"
                                                            stroke="#fff" />
                                                    </svg>
                                                    Event
                                                </span>
                                            </div>
                                            <h2 class="md:text-[22px] text-[18px] text-[#fff] md:leading-7 leading-6 mt-4 ">
                                                 <?php echo strip_tags($data['heading']) ?? "" ?>
                                            </h2>
                                            <p class="text-[17px] text-[#fff] mt-2 mb-3"> <?php echo strip_tags(substr($data['content'], 0, 140)) ?? " " ?></p>
                                         </div>
                                    </div>
                                    <div class="relative top-[-20px]">
                                        <a href="event-detail?id=<?php echo $data['id']; ?>"
                                            class="event-svg w-[40px] h-[40px] transition-all hover:bg-[#DD5AC4] bg-white flex items-center rounded-[50%] justify-center mx-auto b-shadow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 16 16">
                                                <path fill="#2C4073" fill-rule="evenodd"
                                                    d="M10.159 10.72a.75.75 0 1 0 1.06 1.06l3.25-3.25L15 8l-.53-.53l-3.25-3.25a.75.75 0 0 0-1.061 1.06l1.97 1.97H1.75a.75.75 0 1 0 0 1.5h10.379z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php  }  ?>

                    </div>
                    <div class="md:swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== Our Teacher ====-->
        <section class="sm:mt-20 mt-10">
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
                    <h2 class="md:text-[45px] text-[32px] leading-12 mt-4 text-[#2C4073]">Meet Our Experienced Teachers

                    </h2>
                </div>
                <div class="swiper carousel3 mt-10">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($homePage['data']['sections'][7]['resolved_content']['items'] as $classValue) {
                        ?>
                            <div class="swiper-slide">
                                <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                    <img src="https://allenkids.allenhouseschools.com/<?php echo $classValue['image_url'] ?? "" ?>"
                                        class="w-[80%] mx-auto relative z-90" alt="<?= htmlspecialchars($classValue['image_alt'] ?? $classValue['image_alt_text'] ?? '') ?>" />
                                    <div class="bg-[#FC477E] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                        <h2 class="text-[20px] text-white"><?php echo $classValue['title'] ?? "" ?></h2>
                                        <p class="text-[16px] text-white leading-[19px]"><?php echo strip_tags($classValue['description']) ?? "" ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/sonia-chawla.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Sonia Chawla" />
                                <div class="bg-[#FAB319] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Sonia Chawla</h2>

                                    <p class="text-[16px] text-white leading-[19px]">Mother Teacher ( Prep), 25 yrs
                                        experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/karnika-gupta.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Karnika Gupta" />
                                <div class="bg-[#1AB9FF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Karnika Gupta </h2>

                                    <p class="text-[16px] text-white leading-[19px]">Mother Teacher (Playgroup 2), 8
                                        yrs experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <img src="assets/images/our-teacher/puneet-arora.webp"
                                    class="w-[80%] mx-auto relative z-90" alt="Puneet Arora" />
                                <div class="bg-[#A32CFF] text-center mx-auto pt-20 pb-3 relative top-[-65px]">
                                    <h2 class="text-[20px] text-white">Puneet Arora</h2>

                                    <p class="text-[16px] text-white leading-[19px]">Mother Teacher (Nursery) , 13 yrs
                                        experience</p>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Start ====-->
        <section class="bg-[#2c4073] py-10 pb-20">
            <div class="comman-container">
                <div class="swiper carousel4 mt-10">
                    <div class="swiper-wrapper flex items-center">
                        <?php
                        foreach ($homePage['data']['sections'][8]['resolved_content']['media'] ?? [] as $classValues) {
                        ?>
                            <div class="swiper-slide">
                                <div class="">
                                    <img src="<?php echo $classValues['media_url'] ?? '' ?>" class="w-[100%] mx-auto relative z-90"
                                        alt="<?= htmlspecialchars($classValues['media_alt_text'] ?? $classValues['image_alt'] ?? '') ?>" />
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div class="swiper-slide">
                            <div class="">
                                <img src="assets/images/our-teacher/img.png" class="w-[100%] mx-auto relative z-90"
                                    alt="Image 2" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="">
                                <img src="assets/images/our-teacher/img3.png" class="w-[100%] mx-auto relative z-90"
                                    alt="Image 3" />
                            </div>
                        </div> -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Group Institution ====-->
        <section class="md:mt-20 mt-10 relative">
            <div class="text-center text-white">
                <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px] relative z-10">
                    <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)"
                            fill="url(#pattern0_293_580)" />
                        <defs>
                            <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)" />
                            </pattern>
                            <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none"
                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                        </defs>
                    </svg>
                    Our Group Institution
                    <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="77" height="30" transform="translate(0.681641 0.0800781)"
                            fill="url(#pattern0_293_582)" />
                        <defs>
                            <pattern id="pattern0_293_582" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_293_582" transform="scale(0.012987 0.0333333)" />
                            </pattern>
                            <image id="image0_293_582" width="77" height="30" preserveAspectRatio="none"
                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                        </defs>
                    </svg>
                </h2>
                <h2 class="md:text-[45px] text-[32px] leading-12 mt-4 text-[#2C4073] relative z-10">Elevating student
                    across nation</h2>
            </div>
            <div class="absolute md:left-[100px] md:top-[-15px] top-0 left-0">
                <img src="assets/images/group-institution/testi-bee-shape.png" class="w-[150px]" alt="Bee">
            </div>
            <div class="swiper group-institution mt-10">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($homePage['data']['sections'][9]['resolved_content']['items'] as $groupValues) {
                    ?>
                        <div class="swiper-slide">
                            <div class="relative border-[3px] border-[#E7E7E7] rounded-[20px]">
                                <div class="relative">
                                    <img src="<?php echo $api_url ?>/<?php echo $groupValues['image_url'] ?>"
                                        class="w-[100%] mx-auto relative z-90" alt="<?= htmlspecialchars($groupValues['image_alt'] ?? $groupValues['image_alt_text'] ?? '') ?>" />
                                </div>
                                <div class="institution-text">
                                    <a href="<?php echo $groupValues['link_url'] ?? "" ?>">
                                        <h2 class="text-[#2C4073] text-[24px] z-90 text-center relative bottom-[30px] z-[100] relative z-90">
                                            <?php echo $groupValues['title'] ?? "" ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="md:swiper-pagination"></div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Parents Feedback ====-->
        <section class="md:mt-20 mt-10 relative md:mb-40">
            <div class="absolute md:left-10 md:top-0 top-[30%] animate-top-to-bottom">
                <img src="assets/images/parent-feedback/img-feedback-01.png" class="md:w-[100%] w-[200px]" alt="Books">
            </div>
            <div class="absolute right-0 animate-left-to-right md:top-0 top-[25%]">
                <img src="assets/images/parent-feedback/pencil.png" class="md:w-[100%] w-[150px]" alt="Books">
            </div>
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
                        Parents Feedback
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
                    <h2 class="md:text-[45px] text-[32px] leading-12 mt-4 text-[#2C4073] relative z-10">Happy Parents
                    </h2>
                </div>

                <div class="swiper parent-carousel mt-10">
                    <div class="swiper-wrapper">
                        <?php foreach ($homePage['data']['sections'][10]['resolved_content']['items'] as $t_data) {
                            $description = $t_data['description'] ?? "";
                            $words = explode(" ", $description);
                            $shortDesc = implode(" ", array_slice($words, 0, 40));
                            $remainingDesc = implode(" ", array_slice($words, 40));
                        ?>
                            <div class="swiper-slide">
                                <div class="p-10 parent-card"
                                    style="background-image: url(assets/images/parent-feedback/parebnt-card.png);">
                                    <div class="flex gap-4">
                                        <img src="<?php echo $api_url ?>/<?php echo $t_data['image_url'] ?? "" ?>"
                                            class="w-[70px] h-[70px] rounded-full" alt="<?= htmlspecialchars($t_data['image_alt'] ?? $t_data['image_alt_text'] ?? '') ?>">
                                        <div>
                                            <h2 class="text-[#2C4073] md:text-[24px] text-[18px] md:leading-7 leading-5">
                                                <?php echo $t_data['title'] ?? "" ?>
                                            </h2>
                                            <p class="text-[#A32CFF] md:text-[16px] text-[14px] leading-4 md:leading-5 md:mt-0 mt-2">
                                                <?php echo $t_data['subtitle'] ?? "" ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] mt-3 description">
                                            <?php echo strip_tags($shortDesc); ?>
                                            <?php if (!empty($remainingDesc)) { ?>
                                        <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] more-text hidden"><?php echo " " . strip_tags($remainingDesc); ?></p>
                                    <?php } ?>
                                    </p>

                                    <?php if (!empty($remainingDesc)) { ?>
                                        <a href="#" class="text-red-500 text-[14px] toggle-btn">Read More..</a>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="p-10 parent-card"
                                style="background-image: url(assets/images/parent-feedback/parebnt-card.png);">
                                <div class="flex gap-4">
                                    <img src="./assets/images/dinesh.jpg"
                                        class="w-[70px] h-[70px] rounded-full" alt="Nursery">
                                    <div>
                                        <h2 class="text-[#2C4073] md:text-[24px] text-[18px] md:leading-7 leading-5">
                                            Dinesh Kumar Shukla</h2>
                                        <p
                                            class="text-[#A32CFF] md:text-[16px] text-[14px] leading-4 md:leading-5 md:mt-0 mt-2">
                                            ACP Kanpur Nagar
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] mt-3">
                                        I would like to dedicate the above lines to my daughter's school "Allen kids"
                                        which has been running under the supervision of Mrs. Nalini Bhargava (Centre
                                        Head) and extremely cooperative teachers & staff members.


                                    </p>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] moretext">
                                        I am delighted to say that this place has not only done much on education but
                                        also inculcated moral values in my child which is indeed commendable, hereby it
                                        would be fair to call this place my child's second home.
                                    </p>
                                    <a href="#" class="text-red-500 text-[14px] moreless-button">Read More..</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="p-10 parent-card"
                                style="background-image: url(assets/images/parent-feedback/parebnt-card.png);">
                                <div class="flex gap-4">
                                    <img src="https://akidss.superhouseerp.com//Uploads/Site/AKIDSS/Banner/Banner_50000001202511810576637.jpeg"
                                        class="w-[70px] h-[70px] rounded-full" alt="Nursery">
                                    <div>
                                        <h2 class="text-[#2C4073] md:text-[24px] text-[18px] md:leading-7 leading-5">
                                            Mother of Jiyana Khandelwal</h2>
                                        <p
                                            class="text-[#A32CFF] md:text-[16px] text-[14px] leading-4 md:leading-5 md:mt-0 mt-2">
                                            Shruti Khandelwal
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] mt-3">
                                        Hello everyone, I liked the concept of orientation program given to parents and
                                        children before they actually start learning in school. We as parent got to know
                                        about how the teaching is going to be throughout the year. The orientation given
                                        to kids was just outstanding.
                                    </p>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] moretext">
                                        This has encouraged and motivated kids to come to
                                        school. I can confidently say that my child is having an extended family in the
                                        school. The Principal ma’am, Mrs. Nalini Bhargava, teachers and the entire staff
                                        at Allen Kids are so kind and caring that children are happy to come to school
                                        and learn. The way the teachers make an effort to teach the kids is commendable.
                                        I like the practical approach of learning here at Allen Kids. I am sure this
                                        practical approach of learning, the kids will remember throughout their life.
                                        The classroom and the washrooms are very hygienic. Allen Kids, Swaroop Nagar is
                                        a great place for education, a great place to be and a great place to learn.
                                    </p>
                                    <a href="#" class="text-red-500 text-[14px] moreless-button">Read More..</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="p-10 parent-card"
                                style="background-image: url(assets/images/parent-feedback/parebnt-card.png);">
                                <div class="flex gap-4">
                                    <img src="https://akidss.superhouseerp.com//Uploads/Site/AKIDSS/Banner/Banner_50000001202511810367850.jpeg"
                                        class="w-[70px] h-[70px] cover rounded-[100%]" alt="Nursery">
                                    <div>
                                        <h2 class="text-[#2C4073] md:text-[24px] text-[18px] md:leading-7 leading-5">
                                            Mother of Prajjwal Raj - Nursery</h2>
                                        <p
                                            class="text-[#A32CFF] md:text-[16px] text-[14px] leading-4 md:leading-5 md:mt-0 mt-2">
                                            Ms. Sonal Agarwal</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] mt-3 ">

                                        The contribution of Allen Kids in consistently shaping the personality of my
                                        child is laudable. Everyday there is some or the other well designed activity
                                        organised for the children, which keeps them thrilled to go to the school.
                                        Instead of relying solely on the traditional classroom learning

                                    </p>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] moretext">
                                        methods, it is
                                        commendable that the school ceaselessly puts such sincere efforts in imparting
                                        education to the little ones through practical learning sessions, fun
                                        activities, drawing and craft, dance and music, sports activities, organised
                                        games, Yoga sessions, field trips to important places, and celebrating festivals
                                        and days of national importance with such zeal and enthusiasm. All the teachers
                                        and support staff are extremely supportive and try to bring the best out of the
                                        students. I have all the praises for Mrs. Nalini Bhargava, Centre Head, who
                                        leaves no stone unturned in cordially addressing the concerns of parents and
                                        personally monitoring the performance of every child. It is pertinent to mention
                                        that the school has a clean and well maintained swimming pool because of which
                                        Prajjwal could get an opportunity to learn the basics of swimming at such a
                                        young age. It gives me immense satisfaction to witness my child learning in such
                                        a loving and caring atmosphere. Kudos to the entire team of Allen Kids Swaroop
                                        Nagar!
                                    </p>
                                    <a href="#" class="text-red-500 text-[14px] moreless-button">Read More..</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="p-10 parent-card"
                                style="background-image: url(assets/images/parent-feedback/parebnt-card.png);">
                                <div class="flex gap-4">
                                    <img src="https://akidss.superhouseerp.com//Uploads/Site/AKIDSS/Banner/Banner_500000012025118104158862.jpeg"
                                        class="w-[70px] h-[70px] rounded-full" alt="Nursery">
                                    <div>
                                        <h2 class="text-[#2C4073] md:text-[24px] text-[18px] md:leading-7 leading-5">

                                            Mother of Pratyush Gupta - Prep
                                        </h2>
                                        <p
                                            class="text-[#A32CFF] md:text-[16px] text-[14px] leading-4 md:leading-5 md:mt-0 mt-2">
                                            Dr Rashmi Gupta</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] mt-3">

                                        I had always dreamt of best possible education as well as exposure to extra-
                                        curricular activities for my son and Allen Kids Swaroop Nagar never disappointed
                                        me and delivered more than my expectation. The amount of importance laid on
                                        sport activities and extracurricular activities with

                                    </p>
                                    <p class="text-[#2C4073] md:text-[18px] text-[15px] font-[600] moretext">
                                        quality education is indeed
                                        commendable in this school. The school is very efficiently nurturing the little
                                        minds and helping them in character building. The teacher and staff is very
                                        caring, professional and responsible. I specially express my gratitude to the
                                        Principal Madam whose able leadership and amicable behavior has catalyzed all
                                        good things together to make Allen Kids Swaroop Nagar one of the best pre-
                                        school of Kanpur. I hope in coming year school will flourish further and touch
                                        the peak of excellence in the field of education.
                                    </p>
                                    <a href="#" class="text-red-500 text-[14px] moreless-button">Read More..</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Blogs and News ====-->
        <section class="md:mt-30 mt-10 relative">
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
                        Latest News & Blog
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
                    <h2 class="md:text-[45px] text-[32px] leading-12 mt-4 text-[#2C4073]">Explore What’s Going on</h2>
                </div>
                <div class="swiper carousel2 mt-10">
                    <div class="swiper-wrapper">

                        <?php
                        if (!empty($blogData['data'])) {
                            foreach ($blogData['data'] as $blog) {
                        ?>
                                <div class="swiper-slide">
                                    <div data-aos="fade-up" data-aos-duration="3000">
                                        <img src="https://allenkids.allenhouseschools.com/<?= htmlspecialchars($blog['image_url']) ?>" class="w-[100%] mx-auto relative z-90"
                                            alt="<?= htmlspecialchars($blog['image_alt_text'] ?? 'Blog Image') ?>" />
                                        <div class="p-3">
                                            <div class="flex justify-between">
                                                <span class="text-[#A32CFF] flex items-center gap-1">
                                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.625 9H3.375C3.15625 9 3 8.84375 3 8.625V7.375C3 7.1875 3.15625 7 3.375 7H4.625C4.8125 7 5 7.1875 5 7.375V8.625C5 8.84375 4.8125 9 4.625 9ZM8 8.625C8 8.84375 7.8125 9 7.625 9H6.375C6.15625 9 6 8.84375 6 8.625V7.375C6 7.1875 6.15625 7 6.375 7H7.625C7.8125 7 8 7.1875 8 7.375V8.625ZM11 8.625C11 8.84375 10.8125 9 10.625 9H9.375C9.15625 9 9 8.84375 9 8.625V7.375C9 7.1875 9.15625 7 9.375 7H10.625C10.8125 7 11 7.1875 11 7.375V8.625ZM8 11.625C8 11.8438 7.8125 12 7.625 12H6.375C6.15625 12 6 11.8438 6 11.625V10.375C6 10.1875 6.15625 10 6.375 10H7.625C7.8125 10 8 10.1875 8 10.375V11.625ZM5 11.625C5 11.8438 4.8125 12 4.625 12H3.375C3.15625 12 3 11.8438 3 11.625V10.375C3 10.1875 3.15625 10 3.375 10H4.625C4.8125 10 5 10.1875 5 10.375V11.625ZM11 11.625C11 11.8438 10.8125 12 10.625 12H9.375C9.15625 12 9 11.8438 9 11.625V10.375C9 10.1875 9.15625 10 9.375 10H10.625C10.8125 10 11 10.1875 11 10.375V11.625ZM14 3.5V14.5C14 15.3438 13.3125 16 12.5 16H1.5C0.65625 16 0 15.3438 0 14.5V3.5C0 2.6875 0.65625 2 1.5 2H3V0.375C3 0.1875 3.15625 0 3.375 0H4.625C4.8125 0 5 0.1875 5 0.375V2H9V0.375C9 0.1875 9.15625 0 9.375 0H10.625C10.8125 0 11 0.1875 11 0.375V2H12.5C13.3125 2 14 2.6875 14 3.5ZM12.5 14.3125V5H1.5V14.3125C1.5 14.4375 1.5625 14.5 1.6875 14.5H12.3125C12.4062 14.5 12.5 14.4375 12.5 14.3125Z"
                                                            fill="#A32CFF" />
                                                    </svg>
                                                    <?= date("M d, Y", strtotime($blog['date'])) ?>
                                                </span>
                                                <span class="text-[#A32CFF] flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16"
                                                        viewBox="0 0 17 14" fill="none">
                                                        <path
                                                            d="M2.56836 5.93848L2.57324 5.92871C2.78173 5.53505 3.06293 5.21579 3.42383 4.99414C3.73959 4.80025 4.09596 4.69339 4.48047 4.66211L4.64648 4.65332H13.7373V3.7832C13.7223 3.52174 13.6344 3.31617 13.4785 3.14258C13.3049 2.98665 13.0994 2.89883 12.8379 2.88379H8.0293L7.88281 2.7373L6.18359 1.03711H1.7998C1.53377 1.05041 1.32418 1.13732 1.14844 1.29492C0.992154 1.4686 0.90476 1.67485 0.889648 1.93652V9.27832L2.56836 5.93848ZM13.2646 12.9619C13.4493 12.9509 13.5768 12.8779 13.6855 12.6973L16.4404 7.1875C16.5078 7.04312 16.5122 6.94419 16.4824 6.86035L16.4424 6.7793C16.3696 6.66618 16.2595 6.58834 16.0283 6.57617H4.68457C4.52142 6.58433 4.41519 6.63075 4.33594 6.72266L4.26465 6.83008L1.19824 12.9619H13.2646Z"
                                                            stroke="#A32CFF" />
                                                    </svg>
                                                    Event
                                                </span>
                                            </div>
                                            <h2 class="text-[22px] text-[#2C4073] leading-7 mt-3"><?= htmlspecialchars($blog['main_title']) ?></h2>
                                            <p class="text-[18px] text-[#70747F] mt-1 mb-3"><?= htmlspecialchars(substr($blog['main_description'],0, 50)) ?></p>
                                            <a href="/blog/<?php echo $blog['slug'] ?>"
                                                class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center transition-all hover:text-[#A32CFF]">
                                                Read More
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path fill="#2C4073" fill-rule="evenodd"
                                                        d="M13.483 4.47a.75.75 0 0 1 1.06 0l6.988 7a.75.75 0 0 1 0 1.06l-6.988 7a.75.75 0 0 1-1.061-1.06l5.709-5.719L3 12.762a.75.75 0 0 1-.002-1.5l16.194-.01l-5.711-5.722a.75.75 0 0 1 0-1.06"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <p>No blogs found for this branch.</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== Youtube Start ====-->
        <section class="mt-20 py-10 bg-black">
            <div class="max-w-5xl mx-auto aspect-video">
                <iframe class="w-full h-full rounded-xl" src="https://www.youtube.com/embed/epjED-Zglto"
                    title="YouTube video" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </section>
        <!--==== End ====-->

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

    <!--==== Scripts  ====-->
    <?php include "includes/foot.php" ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.moreless-button');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent anchor jump

                    const moreText = this.previousElementSibling;

                    if (moreText.style.display === 'none' || moreText.style.display === '') {
                        moreText.style.display = 'block';
                        this.textContent = 'Read less..';
                    } else {
                        moreText.style.display = 'none';
                        this.textContent = 'Read More..';
                    }
                });
            });
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const parent = this.closest('div');
                    const moreText = parent.querySelector('.more-text');

                    if (moreText.classList.contains('hidden')) {
                        moreText.classList.remove('hidden');
                        this.textContent = 'Read less..';
                    } else {
                        moreText.classList.add('hidden');
                        this.textContent = 'Read More..';
                    }
                });
            });
        });
    </script>
    <!-- Why Chose Us Read More Script -->
    <script>
        function toggleFullText(id) {
            const shortText = document.getElementById(id + "_short");
            const fullText = document.getElementById(id + "_full");
            const toggleBtn = document.getElementById(id + "_toggle");

            const isExpanded = fullText.style.display === "inline";

            if (isExpanded) {
                fullText.style.display = "none";
                shortText.style.display = "inline";
                toggleBtn.innerText = "Read more";
            } else {
                fullText.style.display = "inline";
                shortText.style.display = "none";
                toggleBtn.innerText = "Show less";
            }
        }
    </script>
</body>

</html>