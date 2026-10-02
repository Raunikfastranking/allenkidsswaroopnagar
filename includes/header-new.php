   <?php
    require_once 'proxy/apis.php';
    $header_data = $layoutParts[0]['meta_data'] ?? [];
    $footer_data = $layoutParts[1]['meta_data'] ?? [];
 
    // foreach ($linkParts['data']['menu_items'] as $item) {
    //     $name = $item['name'];
    //     $cleanName = preg_replace("/\s*Swaroop Nagar\s*\(English\)\s*$/i", "", $name);
    //     $cleanName = trim($cleanName);
    //     if ($cleanName !== "") {
    //         echo $cleanName . "<br>";
    //     }
    // }

    function cleanMenuName($name)
    {
        // remove Swaroop Nagar (English) if exists
        $name = preg_replace("/Swaroop Nagar\s*\(English\)/i", "", $name);
        return trim($name);
    }

    function menu_target_html($item)
    {
        $target = $item['target'] ?? $item['link_target'] ?? $item['open_in_new_tab'] ?? null;

        if (is_bool($target) && $target) {
            return ' target="_blank"';
        }
        if (is_int($target) && $target === 1) {
            return ' target="_blank"';
        }

        $t = strtolower(trim((string) $target));
        $newWindow = ['_blank', 'blank', 'new', 'new window', 'new-window', 'newwindow', 'new_window', 'new tab', 'newtab', '1', 'true', 'yes'];
        if (in_array($t, $newWindow, true)) {
            return ' target="_blank"';
        }

        // Fallback: absolute external URLs always open in a new window
        $url = $item['url'] ?? '';
        if (preg_match('/^https?:\/\//i', $url)) {
            $host = parse_url($url, PHP_URL_HOST);
            $currentHost = preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? '');
            if ($host && $currentHost && strcasecmp($host, $currentHost) !== 0) {
                return ' target="_blank"';
            }
        }

        return '';
    }

    function renderMenuItems($items, $page)
    {
        foreach ($items as $item) {
            $cleanName = cleanMenuName($item['name']);
            if ($cleanName === "") continue;

            // Active check (simple)
            $isActive = ($page === basename($item['url'])) ? "active" : "";

            $hasChildren = !empty($item['children']);
    ?>
           <li class="desk-nav-ul relative group">
               <a href="<?= htmlspecialchars($item['url']) ?>"<?= menu_target_html($item) ?>
                   class="<?= $isActive ?> text-white p-2 px-3 hover:bg-[#e9c4c496] 
                      2xl:text-[18px] xl:text-[16px] lg:text-[15px] hover:text-white 
                      rounded-[20px] transition-all flex items-center gap-1">
                   <?= htmlspecialchars($cleanName) ?>

                   <?php if ($hasChildren): ?>
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                           viewBox="0 0 20 20">
                           <path fill="#fff"
                               d="m17.704 6.58l-6.972 8.086a.967.967 0 0 1-1.463 0L2.296 6.58C1.76 5.96 1.967 5 2.791 5h14.42c.821 0 1.029.96.493 1.58" />
                       </svg>
                   <?php endif; ?>
               </a>

               <?php if ($hasChildren): ?>
                   <ul class="absolute mt-2 bg-gray-100 w-[250px] 
                           rounded-[10px] transition-all duration-300 opacity-0 
                           invisible group-hover:visible group-hover:opacity-100 z-50">
                       <div class="absolute top-[-16px] left-10">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                               viewBox="0 0 2048 2048">
                               <path fill="#fff" d="m1024 384l1024 1024H0z" />
                           </svg>
                       </div>
                       <?php foreach ($item['children'] as $child): ?>
                           <?php $childName = cleanMenuName($child['name']); ?>
                           <?php if ($childName !== ""): ?>
                               <li class="group sub-menu-li">
                                   <a href="<?= htmlspecialchars($child['url']) ?>"<?= menu_target_html($child) ?>
                                       class="transition-all cursor-pointer text-[#2B3C6B] 
                                          text-[17px] border-b-[1px] border-gray-500 
                                          p-3 flex items-center gap-1 hover:bg-[#2B3C6B] hover:text-[#fff]">
                                       <?= htmlspecialchars($childName) ?>
                                   </a>
                               </li>
                           <?php endif; ?>
                       <?php endforeach; ?>
                   </ul>
               <?php endif; ?>
           </li>
   <?php
        }
    }

    ?>
   <!-- Top Header -->
   <div class="topHeaderNav justify-between items-center p-2 px-10 relative z-[999]">
      <!-- Logo -->
      <div class="w-[40%]">
          <a href="/"><img src="<?php echo $header_data['logo_url'] ?? "assets/images/logo_kids.png" ?>" class="w-[120px]" alt="Logo Kids"></a>
      </div>
      <!-- Info -->
      <div class="w-[50%] hidden lg:flex justify-between gap-4">
          <div class="flex items-center gap-2 md:w-[50%]">
              <img src="assets/images/map-pin.png" alt="School Location">
              <div>
                  <span class="text-[13px] font-semibold text-[#70747F]">School Location</span>
                  <p><a href="" class="text-[#2C4073] text-[15px] font-semibold"><?php echo $header_data['address_line1']." ".$header_data['address_line2'] ?? "" ?></a></p>
              </div>
          </div>
          <div class="flex items-center gap-2  md:w-[30%] justify-center">
              <img src="assets/images/helpline.png" alt="Call us">
              <div>
                  <span class="text-[13px] font-semibold text-[#70747F]">Call us</span>
                  <p><a href="tel:9720010109" class="text-[#2C4073] text-[15px] font-semibold"><?php echo $header_data['phones'] ?? "" ?></a></p>
              </div>
          </div>
          <div class="flex items-center gap-2 md:w-[20%]">
              <img src="assets/images/erp-login.png" alt="EPR Login">
              <div>
                  <span class="text-[13px] font-semibold text-[#70747F]">ERP Login</span>
                  <p><a href="<?php echo $header_data['primary_cta_url'] ?? "" ?>" target="_blank" class="text-[#2C4073] text-[15px] font-semibold">Click here</a></p>
              </div>
          </div>
      </div>

      <!-- Social -->
      <div class="hidden lg:block">
          <ul class="flex gap-4">
              <li><a href="<?php echo $header_data['youtube_url'] ?? "" ?>" target="_blank"><img src="assets/images/youtube.png" alt="Youtube"></a></li>
              <li><a href="<?php echo $header_data['facebook_url'] ?? "" ?>" target="_blank"><img src="assets/images/facebook.png" alt="Facebook"></a></li>
              <li><a href="<?php echo $header_data['instagram_url'] ?? "" ?>" target="_blank"><img src="assets/images/instagram.png" alt="Instagram"></a></li>
          </ul>
      </div>
  </div>

   <!-- Navigation -->
   <div id="navbar"
       class="sticky top-0 z-[90] bg-[#FF454A] p-2 fixed-navbar top-0 z-50 w-full transition-all duration-500 desktopNav">
      <ul class="flex 2xl:gap-10 xl:gap-5 lg:gap-3 justify-center items-center nvul">
    <?php if (!empty($menuData['data']['menu_items'])): ?>
        <?php renderMenuItems($menuData['data']['menu_items'], $page); ?>
    <?php endif; ?>
</ul>
   </div>

   <!--==== MOBILE MENU ====-->
   <div class="p-2 px-3 MobileMenuToggle bg-white sticky top-0 z-90">
       <div class="flex justify-between items-center">
           <div class="w-[50%]">
               <a href="/"><img src="assets/images/logo_kids.png" class="w-[100px]"
                       alt="Logo Kids"></a>
           </div>
           <div class="w-[50%]">
               <div style="text-align: right;">
                   <button id="menuToggle" class="cursor-pointer">
                       <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16">
                           <path fill="#223668"
                               d="M3.75 2A1.75 1.75 0 0 0 2 3.75v1c0 .49.201.932.525 1.25C2.201 6.318 2 6.76 2 7.25v1.5c0 .49.201.932.525 1.25c-.324.318-.525.76-.525 1.25v1c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0 0 14 12.25v-1c0-.49-.201-.932-.525-1.25c.324-.318.525-.76.525-1.25v-1.5c0-.49-.201-.932-.525-1.25c.324-.318.525-.76.525-1.25v-1A1.75 1.75 0 0 0 12.25 2zM3 11.25a.75.75 0 0 1 .75-.75H5V13H3.75a.75.75 0 0 1-.75-.75zM6 13v-2.5h6.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-.75.75zm0-3.5v-3h6.25a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-.75.75zm0-4V3h6.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-.75.75zM5 3v2.5H3.75A.75.75 0 0 1 3 4.75v-1A.75.75 0 0 1 3.75 3zm0 3.5v3H3.75A.75.75 0 0 1 3 8.75v-1.5a.75.75 0 0 1 .75-.75z" />
                       </svg>
                   </button>
                   <button id="closeToggle" class="cursor-pointer hidden">
                       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                           <path fill="#ff473e" d="m330.443 256l136.765-136.765c14.058-14.058 14.058-36.85 0-50.908l-23.535-23.535c-14.058-14.058-36.85-14.058-50.908 0L256 181.557L119.235 44.792c-14.058-14.058-36.85-14.058-50.908 0L44.792 68.327c-14.058 14.058-14.058 36.85 0 50.908L181.557 256L44.792 392.765c-14.058 14.058-14.058 36.85 0 50.908l23.535 23.535c14.058 14.058 36.85 14.058 50.908 0L256 330.443l136.765 136.765c14.058 14.058 36.85 14.058 50.908 0l23.535-23.535c14.058-14.058 14.058-36.85 0-50.908z" />
                       </svg>
                   </button>
               </div>
           </div>
       </div>
   </div>
   <!--==== END ====-->

   <div class="h-[100%] w-[330px] fixed top-[78px] right-0 bg-[#FF454A] mobileCanvas" id="mobileCanvas">
       <div>
           <ul class="p-7">
               <li>
                   <a href="index" class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       Home
                   </a>
               </li>
               <li class="mt-7">
                   <a href="about-us"
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       About Us
                   </a>
               </li>

               <li class="mt-7 menu-item menu-item">
                   <a
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       Program
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="1.5" d="m6 9l6 6l6-6"></path>
                           </svg></span>
                   </a>
                   <div class="submenu"><a
                           class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       </a>
                       <ul class="mt-2 ml-4 mt-6"><a
                               class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                           </a>
                              <?php
                require_once __DIR__ . '/program-config.php';
                $programs = [
                    ["id" => "playgroup-1", "label" => "Playgroup 1 (2 to 3 years)"],
                    ["id" => "playgroup-2", "label" => "Playgroup 2 (3 to 4 years)"],
                    ["id" => "nursery", "label" => "Nursery (4 to 5 years)"],
                    ["id" => "preparatory", "label" => "Preparatory (5 to 6 years)"],
                    ["id" => "class-1", "label" => "Class 1 (6 to 7 years)"],
                    ["id" => "class-2", "label" => "Class 2 (7 to 8 years)"],
                    ["id" => "class-3", "label" => "Class 3 (8 to 9 years)"],
                    ["id" => "day-care", "label" => "Day Care"],
                ];
                ?>
                           <?php foreach ($programs as $program): ?>
                               <?php
                               $programSlug = allenkids_program_slug_for_id($program['id']);
                               if (!$programSlug) {
                                   continue;
                               }
                               ?>
                               <li class="mb-4">
                                   <a href="<?= htmlspecialchars(allenkids_program_public_path($programSlug)) ?>"
                                       class=" text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                       <?= htmlspecialchars($program['label']) ?></a>
                               </li>
                           <?php endforeach; ?>
                       </ul>
                   </div>
               </li>

               <li class="mt-7 menu-item menu-item">
                   <a href="beyond-curriculam"
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       Beyond Curriculum
                   </a>
               </li>
               <li class="mt-7 menu-item menu-item">
                   <a href="admission"
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       Admision
                   </a>
               </li>
               <li class="mt-7 menu-item menu-item">
                   <a class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor" d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z"></path>
                           </svg></span>
                       Parent Resources
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 9l6 6l6-6"></path>
                           </svg></span>
                   </a>
                   <div class="submenu"><a class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       </a>
                       <ul class="mt-2 ml-4 mt-6"><a class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                           </a>

                           <li class="mb-4">
                               <a href="parent-resources/school-calendar" class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   School Calendar
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="parent-resources/daily-routine" class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Daily Routine
                               </a>
                           </li>

                           <li class="mb-4">
                               <a href="parent-resources/tips-for-parents" class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Tips for parents
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="parent-resources/health-safety-policies" class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Health & Safety Policies
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="parent-resources/testimonials" class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Testimonials
                               </a>
                           </li>
                       </ul>
                   </div>
               </li>
               <li class="mt-7 menu-item menu-item">
                   <a
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       Gallery
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="1.5" d="m6 9l6 6l6-6"></path>
                           </svg></span>
                   </a>
                   <div class="submenu"><a
                           class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       </a>
                       <ul class="mt-2 ml-4 mt-6"><a
                               class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                           </a>
                           <li class="mb-4">
                               <a href="gallery/photos"
                                   class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Photos
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="gallery/videos"
                                   class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Vidoes
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="student-work-sample"
                                   class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Student Work Samples
                               </a>
                           </li>

                       </ul>
                   </div>
               </li>
               <li class="mt-7 menu-item menu-item">
                   <a
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       News & Update
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="1.5" d="m6 9l6 6l6-6"></path>
                           </svg></span>
                   </a>
                   <div class="submenu"><a
                           class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                       </a>
                       <ul class="mt-2 ml-4 mt-6"><a
                               class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">
                           </a>
                           <li class="mb-4">
                               <a href="blogs"
                                   class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Blogs
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="newsletters"
                                   class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Newsletters
                               </a>
                           </li>
                           <li class="mb-4">
                               <a href="events"
                                   class="text-white text-[15px] rounded-[5px] block transition-all  hover:text-[#2c4073]">
                                   Events
                               </a>
                           </li>
                       </ul>
                   </div>
               </li>
               <li class="mt-7">
                   <a href="contact-us"
                       class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all">
                       <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                               <path fill="currentColor"
                                   d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                               </path>
                           </svg></span>
                       Contact Us
                   </a>
               </li>
           </ul>
       </div>
   </div>
   <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5FQK929"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

   <script>
       document.addEventListener('DOMContentLoaded', () => {
           const menuToggle = document.getElementById("menuToggle");
           const clossToggle = document.getElementById("closeToggle");
           const mobileCanvas = document.getElementById("mobileCanvas");

           menuToggle.addEventListener('click', function() {
               mobileCanvas.classList.add('mobile-canvas-translate'); // open canvas
               menuToggle.classList.add('hidden'); // hide hamburger
               clossToggle.classList.remove('hidden'); // show close button
           });

           clossToggle.addEventListener('click', function() {
               mobileCanvas.classList.remove('mobile-canvas-translate'); // close canvas
               clossToggle.classList.add('hidden'); // hide close button
               menuToggle.classList.remove('hidden'); // show hamburger
           });
       });
   </script>