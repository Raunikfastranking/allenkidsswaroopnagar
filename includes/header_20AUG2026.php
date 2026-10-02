  <?php
    require_once 'proxy/api.php';
    require_once __DIR__ . '/program-config.php';

    if (!isset($page)) {
        $page = basename($_SERVER['SCRIPT_NAME'] ?? '', '.php');
    }

    $api_url = "https://allenkids.allenhouseschools.com";
    // Home Page Api
    $homePage = fetchApiData("api/pages/kanpurs-best-preschool-kindergarten-learn-play-grow");
    // Testimonial Data
    $testimonial_data = fetchApiData("api/pages/testimonials-page-mukharji-vihar");
    $layoutParts = fetchApiData("api/public/branches/2/layout-parts/");
    $header_data = $layoutParts[0]['meta_data'] ?? [];
    $footer_data = $layoutParts[1]['meta_data'] ?? [];
    $footer_links = fetchApiData("api/link-groups/");
    require_once __DIR__ . '/allen-site-root.php';
    // print_r($footer_links['data'][0]['links']);
    $menuData = fetchApiData("api/menus/7");
require_once __DIR__ . '/session-api.php';
    $sessions = allenkids_fetch_sessions();
    // print_r($homePage['data']['sections'][7]);

    function cleanMenuName($name)
    {
        // remove Swaroop Nagar (English) if exists
        $name = preg_replace("/Page Mukharji vihar\s*\(English\)/i", "", $name);
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
        global $sessions;
        foreach ($items as $item) {
            $cleanName = cleanMenuName($item['name']);
            if ($cleanName === "") continue;

            // Active check (simple)
            $isActive = ($page === basename($item['url'])) ? "active" : "";

            $hasChildren = !empty($item['children']);

            if (!is_array($sessions)) {
                $sessions = allenkids_fetch_sessions();
            }
    ?>
          <li class="desk-nav-ul relative group">
              <a href="<?= htmlspecialchars(allenkids_normalize_menu_program_url((string) $item['url'])) ?>"<?= menu_target_html($item) ?>
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
                                  <a href="<?= htmlspecialchars(allenkids_normalize_menu_program_url((string) $child['url'])) ?>"<?= menu_target_html($child) ?>
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
                  <p><a href="" class="text-[#2C4073] text-[15px] font-semibold"><?php echo ($header_data['address_line1'] ?? '') . " " . ($header_data['address_line2'] ?? '') ?></a></p>
              </div>
          </div>
          <div class="flex items-center gap-2  md:w-[30%] justify-center">
              <img src="assets/images/helpline.png" alt="Call us">
              <div>
                  <span class="text-[13px] font-semibold text-[#70747F]">Call us</span>
                  <p><a href="tel:<?php echo $header_data['phones'] ?? "" ?>" class="text-[#2C4073] text-[15px] font-semibold"><?php echo $header_data['phones'] ?? "" ?></a></p>
              </div>
          </div>
          <div class="flex items-center gap-2 md:w-[20%]">
              <img src="assets/images/erp-login.png" alt="EPR Login">
              <div>
                  <span class="text-[13px] font-semibold text-[#70747F]">ERP Login</span>
                  <p><a href="<?php echo $header_data['primary_cta_url'] ?? "" ?>" class="text-[#2C4073] text-[15px] font-semibold">Click here</a></p>
              </div>
          </div>

          <div class="flex items-center gap-2 md:w-[20%]">
              <img src="assets/images/career.png" alt="Career">
              <div>
                  <span class="text-[13px] font-semibold text-[#70747F]">Career</span>
                  <p><a href="career" target="_blank" class="text-[#2C4073] text-[15px] font-semibold">Click here</a></p>
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
          <?php if (!empty($menuData['data']['menu_items'])) : ?>
              <?php renderMenuItems($menuData['data']['menu_items'], $page); ?>
          <?php endif; ?>
      </ul>
  </div>

  <!--==== MOBILE MENU ====-->
  <div class="p-2 px-3 MobileMenuToggle bg-white sticky top-0 z-90" >
      <div class="flex justify-between items-center">
          <div class="w-[50%]">
              <a href="/"><img src="assets/images/logo_kids.png" class="w-[100px]"
                      alt="Logo Kids"></a>
          </div>
          <div class="w-[50%]">
              <div style="text-align: right;">
                  <button id="menuToggle" class="cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16">
                          <path fill="#223668" d="M3.75 2A1.75 1.75 0 0 0 2 3.75v1c0 .49.201.932.525 1.25C2.201 6.318 2 6.76 2 7.25v1.5c0 .49.201.932.525 1.25c-.324.318-.525.76-.525 1.25v1c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0 0 14 12.25v-1c0-.49-.201-.932-.525-1.25c.324-.318.525-.76.525-1.25v-1.5c0-.49-.201-.932-.525-1.25c.324-.318.525-.76.525-1.25v-1A1.75 1.75 0 0 0 12.25 2zM3 11.25a.75.75 0 0 1 .75-.75H5V13H3.75a.75.75 0 0 1-.75-.75zM6 13v-2.5h6.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-.75.75zm0-3.5v-3h6.25a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-.75.75zm0-4V3h6.25a.75.75 0 0 1 .75.75v1a.75.75 0 0 1-.75.75zM5 3v2.5H3.75A.75.75 0 0 1 3 4.75v-1A.75.75 0 0 1 3.75 3zm0 3.5v3H3.75A.75.75 0 0 1 3 8.75v-1.5a.75.75 0 0 1 .75-.75z" />
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

  <div class="h-[100%] w-[330px] fixed top-[78px] right-0 bg-[#FF454A] mobileCanvas " id="mobileCanvas" >
      <div>
          <?php
            function renderMobileMenuItems($items, $isChild = false)
            {
                foreach ($items as $item) {
                    $hasChildren = !empty($item['children']);
                    $itemName = htmlspecialchars($item['name']);
                    $itemUrl = htmlspecialchars($item['url'] ?? '#');
                    // Clean name
                    $itemName = preg_replace("/Page Mukharji vihar\s*\(English\)/i", "", $itemName);
                    $itemName = trim($itemName);
                    // li classes
                    $liClass = $isChild ? 'mb-4' : 'mt-7 menu-item';
                    // Determine if URL is external or internal
                    $itemUrlRaw = allenkids_normalize_menu_program_url((string) ($item['url'] ?? '#'));
                    $href = (preg_match('/^https?:\/\//i', $itemUrlRaw)) ? $itemUrlRaw : '/' . ltrim($itemUrlRaw, '/');
                    $href = htmlspecialchars($href);

                    echo '<li class="' . $liClass . '">';
                    echo '<a href="' . $href . '"' . menu_target_html($item) . ' class="flex text-white gap-2 text-[15px] items-end hover:text-[#2C4073] transition-all cursor-pointer">';
                    echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                   <path fill="currentColor"
                       d="M3.161 4.469a6.5 6.5 0 0 1 8.84-.328a6.5 6.5 0 0 1 9.178 9.154l-7.765 7.79a2 2 0 0 1-2.719.102l-.11-.101l-7.764-7.791a6.5 6.5 0 0 1 .34-8.826m1.414 1.414a4.5 4.5 0 0 0-.146 6.21l.146.154L12 19.672l5.303-5.305l-3.535-3.534l-1.06 1.06a3 3 0 0 1-4.244-4.242l2.102-2.103a4.5 4.5 0 0 0-5.837.189zm8.486 2.828a1 1 0 0 1 1.414 0l4.242 4.242l.708-.706a4.5 4.5 0 0 0-6.211-6.51l-.153.146l-3.182 3.182a1 1 0 0 0-.078 1.327l.078.087a1 1 0 0 0 1.327.078l.087-.078z">
                   </path>
               </svg></span>';
                    echo $itemName;

                    if ($hasChildren) {
                        echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1.5" d="m6 9l6 6l6-6"></path>
              </svg></span>';
                    }

                    echo '</a>';

                    // Render children recursively
                    if ($hasChildren) {
                        echo '<div class="submenu">';
                        echo '<ul class="relative top-[10px]">';
                        renderMobileMenuItems($item['children'], true);
                        echo '</ul>';
                        echo '</div>';
                    }

                    echo '</li>';
                }
            }
            ?>
          <!-- Mobile Menu -->
          <ul class="p-7">
              <?php renderMobileMenuItems($menuData['data']['menu_items']); ?>
          </ul>

      </div>
  </div>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KD333NTS"
          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


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
  
  <style>
      /* Fixed Sidebar Buttons - Always Vertical on ALL Devices */
      .fixed-sidebar-buttons {
          position: fixed;
          right: 15px;
          top: 50%;
          transform: translateY(-50%);
          z-index: 999999;
          display: flex;
          flex-direction: column;
          gap: 18px;
      }

      .sidebar-btn {
          color: white;
          text-decoration: none;
          display: flex;
          align-items: center;
          justify-content: center;
          box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
          transition: all 0.3s ease;
          border-radius: 7px;
          overflow: hidden;
          min-height: 180px;
          width: 50px;
      }

      .sidebar-btn:hover {
          transform: translateY(-8px) scale(1.05);
          box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
      }

      .btn-text {
          writing-mode: vertical-rl;
          text-orientation: mixed;
          padding: 12px 6px;
          white-space: nowrap;
          font-size: 15px;
          letter-spacing: 1px;
      }

      .btn-icon-mobile {
          display: none;
          /* Hidden on all screens since we keep vertical text */
      }

      .enquiry-btn {
          background-color: #FC477E;
      }

      .registration-btn {
          background: #FF972D;
      }

      .registration-btn .btn-text {
          display: flex;
          flex-direction: column-reverse;
          gap: 15px;
      }

      .registration-btn svg {
          transform: rotate(90deg);
      }

      /* Popup Styles */
      .enquiry-popup-overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.8);
          backdrop-filter: blur(5px);
          z-index: 1000000;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 20px;
      }

      .enquiry-popup-overlay.hidden {
          display: none !important;
      }

      .enquiry-popup-container {
          background: #ff424f;
          padding: 50px 40px;
          border-radius: 20px;
          max-width: 500px;
          width: 100%;
          max-height: 90vh;
          overflow-y: auto;
          position: relative;
          box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
      }

      .popup-close-btn {
          position: absolute;
          top: 20px;
          right: 25px;
          background: rgba(255, 255, 255, 0.2);
          border: none;
          border-radius: 50%;
          width: 40px;
          height: 40px;
          display: flex;
          align-items: center;
          justify-content: center;
          color: white;
          cursor: pointer;
          transition: 0.3s;
          backdrop-filter: blur(10px);
      }

      .popup-close-btn:hover {
          background: rgba(255, 255, 255, 0.4);
          transform: scale(1.1);
      }

      /* Vertical Form */
      .form-group-vertical {
          margin-bottom: 22px;
      }

      .form-input {
          width: 100%;
          height: 50px;
          background: white;
          border-radius: 6px;
          border: none;
          padding: 0 15px;
          font-size: 16px;
          color: #4B5563;
          outline: none;
      }

      .form-input:focus {
          box-shadow: 0 0 0 3px rgba(44, 64, 115, 0.3);
      }

      .error-msg {
          color: #fff !important;
          font-size: 14px;
          margin-top: 6px;
          display: none;
          position: absolute;
          bottom: -21px;
      }

      .submit-btn {
          width: 100%;
          height: 55px;
          background: #2C4073;
          color: white;
          border: none;
          border-radius: 8px;
          font-size: 18px;
          font-weight: 600;
          text-transform: uppercase;
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 10px;
          cursor: pointer;
          margin-top: 10px;
          transition: 0.3s;
      }

      .submit-btn:hover:not(:disabled) {
          transform: translateY(-3px);
          box-shadow: 0 10px 30px rgba(44, 64, 115, 0.4);
      }

      /* Mobile Adjustments - Keep Vertical but Optimize Size */
      @media (max-width: 768px) {
          .fixed-sidebar-buttons {
              right: 10px;
              gap: 15px;
          }

          .sidebar-btn {
              min-height: 160px;
              width: 55px;
          }

          .btn-text {
              font-size: 15px;
              padding: 20px 10px;
          }
      }

      @media (max-width: 480px) {
          .fixed-sidebar-buttons {
              right: 8px;
              gap: 12px;
          }

          .sidebar-btn {
              min-height: 140px;
              width: 50px;
          }

          .btn-text {
              font-size: 14px;
              padding: 18px 8px;
              letter-spacing: 0.5px;
          }

          .enquiry-popup-container {
              padding: 40px 20px;
              margin: 10px;
          }

          .text-[32px] {
              font-size: 26px !important;
          }
      }
  </style>
  <!-- Fixed Sidebar Buttons + Enquiry Popup Form (Always Vertical - Even on Mobile) -->
  <div class="fixed-sidebar-buttons ">
      <a href="javascript:void(0);" class="sidebar-btn enquiry-btn open-enquiry-popup" aria-label="Online Enquiry Form"
          id="openEnquiryPopup">
          <span class="btn-text">ONLINE ENQUIRY</span>
          <span class="btn-icon-mobile">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="currentColor"
                      d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
              </svg>
          </span>
      </a>
      <a href="https://akidsm.superhouseerp.com/RegistrationTransaction/OnlineRegistration"
          class="sidebar-btn registration-btn" aria-label="Online Registration" target="_blank">
          <span class="btn-text">ONLINE REGISTRATION</span>
          <span class="btn-icon-mobile">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="currentColor" d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
              </svg>
          </span>
      </a>
  </div>
  
  <div id="HeadersuccessPopup" class="bg-green-500 text-white w-[100%] py-3 mb-5 block fixed top-0 text-center hidden" style="z-index:999999;position:fixed;">
      Form submitted successfully!
  </div>
  <!-- Enquiry Popup Modal (Vertical Form) -->
  <div id="HeaderenquiryPopup" class="enquiry-popup-overlay hidden">
      <div class="enquiry-popup-container">
          <!-- Close Button (×) -->
          <button class="popup-close-btn" id="closeEnquiryPopup" aria-label="Close">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
              </svg>
          </button>
          <div class="popup-content">
              <h2 class="text-[32px] font-[500] text-white text-center mb-8">Enquiry For Session</h2>
              <form id="HeadercontactForm" class="popup-form">
                  <!-- Vertical Fields -->
                <div class="form-group-vertical">
  <select name="session"
    class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
    id="hyears" required>

    <option value="" disabled selected>Enquiry For Session</option>

    <?php
    $uniqueSessions = [];

    if (!empty($sessions)):
        foreach ($sessions as $item):
            $sessionName = trim($item['session'] ?? '');
            if ($sessionName === '') continue;

            if (in_array($sessionName, $uniqueSessions, true)) continue;
            $uniqueSessions[] = $sessionName;
    ?>
            <option value="<?= htmlspecialchars($sessionName) ?>">
                <?= htmlspecialchars($sessionName) ?>
            </option>
    <?php
        endforeach;
    else:
    ?>
        <option value="">No sessions available</option>
    <?php endif; ?>
</select>

</div>

               <div class="form-group-vertical">
    <select name="grade" class="form-input" id="hgrade" required>
        <option value="" selected>Choose Grade</option>
        <?php include __DIR__ . '/grade-api.php'; ?>
    </select>
</div>

                  <div class="form-group-vertical relative">
                      <input type="text" class="form-input" id="hchildname" placeholder="Enter Child's Name" required maxlength="30">
                      <span id="hchildname-error" class="text-black text-sm mt-1 hidden text-[15px]">Only
                          letters and spaces allowed.</span>
                  </div>

                  <div class="form-group-vertical relative">
                      <input type="text" class="form-input" id="hfmgname" placeholder="Father / Mother / Guardian Name" maxlength="30"
                          required>
                      <span id="hfmgname-error" class="text-black text-sm mt-1 hidden text-[15px]">Only
                          letters and spaces allowed.</span>
                  </div>

                  <div class="form-group-vertical relative">
                      <input type="text" class="form-input" id="hmobile" placeholder="Enter Your Mobile No" required>
                      <div id="hmobile-error" class="text-black text-sm mt-1 hidden text-[15px]">Please enter valid phone
                          number</div>
                  </div>

                  <div class="form-group-vertical">
                      <input type="email" class="form-input" id="hemail" placeholder="Enter Your Email" required>
                      <span id="hemail-error" class="text-black text-sm mt-1 hidden text-[15px]">Please
                          enter a valid email address.</span>
                  </div>
                  <input type="hidden" id="hsource" value="">
                  <div class="form-submit">
                      <button type="submit" id="hcontacthSubmitBtn" class="submit-btn">
                          Submit
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5" d="M4.5 12h15m0 0l-5.625-6m5.625 6l-5.625 6" />
                          </svg>
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>