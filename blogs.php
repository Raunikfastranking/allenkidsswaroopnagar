<?php
$page = "blogs";

// Define API base URL (used in image src)
$api_url = "https://allenkids.allenhouseschools.com";

// Include the file that actually defines the function
include_once "proxy/apis.php";

// Fetch ONLY the blogs data for branch 4
$endpoints = [
    'blogData' => '/blogs/branch/4',
];

$responses = fetchMultipleApiData($endpoints);

// Get the blogs response
$blogResponse = $responses['blogData'] ?? [];
$blogData = $blogResponse['data'] ?? [];

// Safety: make sure it's an array
if (!is_array($blogData)) {
    $blogData = [];
}

// Sort blogs by date descending (newest first)
if (!empty($blogData) && count($blogData) > 1) {
    usort($blogData, function($a, $b) {
        $dateA = !empty($a['date']) && $a['date'] !== '0000-00-00' && $a['date'] !== '0000-00-00 00:00:00'
               ? $a['date']
               : '1970-01-01 00:00:00';

        $dateB = !empty($b['date']) && $b['date'] !== '0000-00-00' && $b['date'] !== '0000-00-00 00:00:00'
               ? $b['date']
               : '1970-01-01 00:00:00';

        return strtotime($dateB) <=> strtotime($dateA);
    });
}

// Dynamic meta (safe fallback)
$metaTitle = "Allen Kids Swaroop Nagar | Blogs";
$metaDesc  = "Latest blogs, news, events and updates from Allen Kids Swaroop Nagar preschool in Kanpur.";

if (!empty($blogData) && isset($blogData[0])) {
    $first = $blogData[0];
    if (!empty($first['blogdetails'][0]['title'])) {
        $metaTitle = $first['blogdetails'][0]['title'] . " | Allen Kids Swaroop Nagar";
    }
    if (!empty($first['blogdetails'][0]['description'])) {
        $metaDesc = substr(strip_tags($first['blogdetails'][0]['description']), 0, 160) . '...';
    }
}
?>

<?php
$ogMeta = [
    'title'       => 'Allen Kids Swaroop Nagar | Blogs',
    'description' => 'Latest blogs, news, events and updates from Allen Kids Swaroop Nagar preschool in Kanpur.',
    'url'         => 'https://allenkidsswaroopnagar.in/blogs',
    'type'        => 'website',
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $blogData['data']['meta_title'] ?? "Allen Kids Swaroop Nagar | Blogs" ?></title>
    <meta name="description" content="<?php echo $blogData['data']['meta_description'] ?? "" ?>">
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
      "name": "Blog",
      "item": "https://allenkidsswaroopnagar.in/blogs"
    }
  ]
}
</script>

    <?php include "includes/head.php"; ?>
</head>

<body>
    <!--==== Header ====-->
    <?php include "includes/header.php"; ?>
    <!--==== End ====-->

    <!-- Main Content -->
    <main>
        <!--==== Breadcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] event-news-cover relative">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-[#2C4073]">Blogs</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-[#2C4073] flex items-center gap-2 sm:text-[16px] text-[12px]">Home</a></li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#2C4073" d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg>
                    </li>
                    <li><a href="blogs.php" class="text-[#FF454A] sm:text-[16px] text-[12px]">Blogs</a></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <!--==== START =====-->
        <section class="mt-10">
            <div class="comman-container-1050">
                <div>
                    <ul class="grid md:grid-cols-4 grid-cols-2 gap-3 justify-center">
                        <li><a href="blogs.php" class="bg-[#2C4073] text-white h-[45px] flex items-center justify-center font-[500] text-[17px] rounded-[8px] px-10 whitespace-nowrap">Blogs</a></li>
                        <li><a href="" class="bg-[#DD5AC4] text-white h-[45px] flex items-center justify-center font-[500] text-[17px] rounded-[8px] px-10 whitespace-nowrap">Newsletter</a></li>
                        <li><a href="" class="bg-[#FF454A] text-white h-[45px] flex items-center justify-center font-[500] text-[17px] rounded-[8px] px-10 whitespace-nowrap">Announcement</a></li>
                        <li><a href="" class="bg-[#FF972D] text-white h-[45px] flex items-center justify-center font-[500] text-[17px] rounded-[8px] px-10 whitespace-nowrap">Upcoming Events</a></li>
                    </ul>
                </div>

                <div class="text-center text-white pt-10">
                    <h2 class="text-[#F66] flex items-center gap-2 justify-center text-[18px]">
                        <!-- Your original SVG icons (unchanged) -->
                        <svg width="77" height="31" viewBox="0 0 77 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="77" height="30" transform="matrix(-1 0 0 1 77 0.0800781)" fill="url(#pattern0_293_580)"></rect>
                            <!-- rest of SVG remains exactly as you had -->
                            <defs>
                                <pattern id="pattern0_293_580" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_293_580" transform="scale(0.012987 0.0333333)"></use>
                                </pattern>
                                <image id="image0_293_580" width="77" height="30" preserveAspectRatio="none" xlink:href="data:image/png;base64,..."></image>
                            </defs>
                        </svg>
                        Blogs
                        <!-- second SVG unchanged -->
                        <svg width="78" height="31" viewBox="0 0 78 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- ... same as original ... -->
                        </svg>
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 mt-7 gap-8">
                    <?php
                    if (!empty($blogData)) {
                        foreach ($blogData as $blog) {
                    ?>
                            <div class="swiper-slide">
                                <div data-aos="fade-up" data-aos-duration="3000">
                                    <?php
                                    $imgSrc = !empty($blog['blogdetails'][0]['image_url'])
                                        ? $api_url . '/' . ltrim($blog['blogdetails'][0]['image_url'], '/')
                                        : 'assets/images/placeholder-blog.jpg';
                                    ?>
                                    <img src="<?php echo htmlspecialchars($imgSrc); ?>" 
                                         class="w-[100%] mx-auto relative z-90"
                                         alt="<?php echo htmlspecialchars($blog['image_alt_text'] ?? 'Blog Image'); ?>" 
                                         onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png'; "/>

                                    <div class="p-3">
                                        <div class="flex justify-between">
                                            <span class="text-[#A32CFF] flex items-center gap-1">
                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <!-- your calendar SVG unchanged -->
                                                </svg>
                                                <?= date("M d, Y", strtotime($blog['date'] ?? 'now')) ?>
                                            </span>
                                            <span class="text-[#A32CFF] flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 17 14" fill="none">
                                                    <!-- your blog icon SVG unchanged -->
                                                </svg>
                                                Blog
                                            </span>
                                        </div>
                                        <h2 class="text-[22px] text-[#2C4073] leading-7 mt-3">
                                            <?= htmlspecialchars($blog['blogdetails'][0]['title'] ?? 'Untitled') ?>
                                        </h2>
                                        <p class="text-[18px] text-[#70747F] mt-1 mb-3">
                                            <?= substr(strip_tags($blog['blogdetails'][0]['description'] ?? ''), 0, 150) . (strlen(strip_tags($blog['blogdetails'][0]['description'] ?? '')) > 150 ? '...' : '') ?>
                                        </p>
                                        <a href="/blog/<?= htmlspecialchars($blog['slug'] ?? '') ?>" class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center transition-all hover:text-[#A32CFF]">

                                        <!-- <a href="blog-detail.php?slug=<?php echo htmlspecialchars($blog['slug'] ?? ''); ?>"
                                           class="text-[#2C4073] text-[16px] uppercase flex gap-2 items-center transition-all hover:text-[#A32CFF]"> -->
                                            Read More
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="#2C4073" fill-rule="evenodd"
                                                      d="M13.483 4.47a.75.75 0 0 1 1.06 0l6.988 7a.75.75 0 0 1 0 1.06l-6.988 7a.75.75 0 0 1-1.061-1.06l5.709-5.719L3 12.762a.75.75 0 0 1-.002-1.5l16.194-.01l-5.711-5.722a.75.75 0 0 1 0-1.06"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                    ?>
                        <p class="col-span-full text-center text-gray-600 py-10">No blogs found for this branch.</p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--==== END ====-->

       <!-- Announcement Section -->
        <section class="mt-10 announcement-bg py-8 relative">
            <div class="absolute left-3 bottom-10">
                <img src="assets/images/events/girl.webp" class="md:w-[100%] w-[90px]" alt="Girl">
            </div>
            <div class="absolute md:left-8 md:top-12 animate-scale-loop">
                <img src="assets/images/events/girl-brush.webp" class="md:w-[100%] w-[50px]" alt="Brush & Pencil">
            </div>
            <div class="absolute right-3 bottom-10">
                <img src="assets/images/events/boy.webp" class="md:w-[100%] w-[90px]" alt="Boy">
            </div>
            <div class="absolute md:right-12 right-0 md:top-12 animate-scale-loop">
                <img src="assets/images/events/boy-pencil.webp" class="md:w-[100%] w-[50px]" alt="Boy with Pencil">
            </div>
            <div class="comman-container-1050">
                <div class="text-center text-white pt-10">
                    <h2 class="text-[#DD5AC4] flex items-center gap-2 justify-center text-[18px]">
                        <svg width="74" height="23" viewBox="0 0 74 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.5 1.50433L22.4275 2.5017L22.5 1.50433ZM1.5 12.5043C0.947716 12.5043 0.5 12.0566 0.5 11.5043V2.50433C0.5 1.95204 0.947716 1.50433 1.5 1.50433C2.05228 1.50433 2.5 1.95204 2.5 2.50433V10.5043H10.5C11.0523 10.5043 11.5 10.952 11.5 11.5043C11.5 12.0566 11.0523 12.5043 10.5 12.5043H1.5ZM22.5 1.50433L22.4275 2.5017C15.1157 1.9702 10.2325 4.25573 7.11858 6.69126C5.55291 7.91586 4.42192 9.18894 3.65205 10.1868C3.26736 10.6854 2.97261 11.1155 2.75645 11.4402C2.65873 11.5869 2.54798 11.7564 2.48235 11.8543C2.43329 11.9275 2.32338 12.0952 2.20711 12.2114L1.5 11.5043L0.792892 10.7972C0.73912 10.851 0.729523 10.8773 0.821022 10.7407C0.895943 10.629 0.965996 10.5205 1.09176 10.3316C1.32255 9.98505 1.64545 9.51349 2.06857 8.96507C2.91433 7.86885 4.15958 6.46655 5.88641 5.11591C9.35754 2.40094 14.7243 -0.0635302 22.5725 0.506962L22.5 1.50433ZM73 11.5043L73.7472 12.1689C67.6584 19.0151 62.335 22.0548 57.43 22.5139C52.5157 22.9738 48.2822 20.818 44.4482 17.8961C42.5277 16.4324 40.6748 14.751 38.8644 13.0664C37.0425 11.3711 35.2724 9.68103 33.4712 8.14619C29.8527 5.06295 26.3024 2.78337 22.4275 2.5017L22.5 1.50433L22.5725 0.506962C27.1242 0.837826 31.0945 3.49352 34.7683 6.62387C36.6131 8.19584 38.4321 9.93215 40.2269 11.6023C42.0331 13.2831 43.8244 14.9061 45.6605 16.3054C49.3397 19.1093 53.0686 20.9133 57.2436 20.5226C61.4279 20.131 66.3208 17.5096 72.2528 10.8398L73 11.5043Z" fill="#DD5AC4" />
                        </svg>
                        Announcement
                        <svg width="74" height="23" viewBox="0 0 74 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M51.5 1.50433L51.5725 2.5017L51.5 1.50433ZM72.5 12.5043C73.0523 12.5043 73.5 12.0566 73.5 11.5043V2.50433C73.5 1.95204 73.0523 1.50433 72.5 1.50433C71.9477 1.50433 71.5 1.95204 71.5 2.50433V10.5043H63.5C62.9477 10.5043 62.5 10.952 62.5 11.5043C62.5 12.0566 62.9477 12.5043 63.5 12.5043H72.5ZM51.5 1.50433L51.5725 2.5017C58.8843 1.9702 63.7675 4.25573 66.8814 6.69126C68.4471 7.91586 69.5781 9.18894 70.3479 10.1868C70.7326 10.6854 71.0274 11.1155 71.2436 11.4402C71.3413 11.5869 71.452 11.7564 71.5177 11.8543C71.5667 11.9275 71.6766 12.0952 71.7929 12.2114L72.5 11.5043L73.2071 10.7972C73.2609 10.851 73.2705 10.8773 73.179 10.7407C73.1041 10.629 73.034 10.5205 72.9082 10.3316C72.6775 9.98505 72.3546 9.51349 71.9314 8.96507C71.0857 7.86885 69.8404 6.46655 68.1136 5.11591C64.6425 2.40094 59.2757 -0.0635302 51.4275 0.506962L51.5 1.50433ZM1 11.5043L0.252771 12.1689C6.34157 19.0151 11.665 22.0548 16.57 22.5139C21.4843 22.9738 25.7178 20.818 29.5518 17.8961C31.4723 16.4324 33.3252 14.751 35.1356 13.0664C36.9575 11.3711 38.7276 9.68103 40.5288 8.14619C44.1473 5.06295 47.6976 2.78337 51.5725 2.5017L51.5 1.50433L51.4275 0.506962C46.8758 0.837826 42.9055 3.49352 39.2317 6.62387C37.3869 8.19584 35.5679 9.93215 33.7731 11.6023C31.9669 13.2831 30.1756 14.9061 28.3395 16.3054C24.6603 19.1093 20.9314 20.9133 16.7564 20.5226C12.5721 20.131 7.67921 17.5096 1.74723 10.8398L1 11.5043Z" fill="#DD5AC4" />
                        </svg>
                    </h2>
                </div>
                <div class="mt-10">
                    <div>
                        <img src="assets/images/events/announcement-text.webp" alt="Announcement">
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

       <!-- Newsletter Subscription -->
        <section class="md:mt-20 mt-10 newsletter-bg md:pt-24 pt-15 md:h-[250px] h-[300px]">
            <div class="comman-container-1280">
                <div class="md:flex justify-between items-center">
                    <div class="md:w-[50%]">
                        <h2 class="text-[36px] text-white font-[500]">Subscribe Our Newsletter</h2>
                        <p class="text-[18px] text-white">Beet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-2">
                        <div class="flex gap-2 items-center">
                            <input type="text" class="h-[50px] bg-white text-[#70747F] text-[18px] w-[100%] pl-4 rounded-[5px]" placeholder="Email Address">
                            <button class="bg-[#FF454A] w-[160px] text-white h-[50px] rounded-[5px] cursor-pointer">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->
        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
    </main>

    <!-- Scripts -->
    <?php include "includes/foot.php"; ?>

</body>
</html>