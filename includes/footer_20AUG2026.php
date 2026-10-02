  <style>
      @media screen and (max-width: 720px) {
          .footer-padding {
              padding-top: 110px;
          }
      }
  </style>

  <footer class="footer pt-5" style="background-image: url(assets/images/footer.png);">
      <div class="comman-container-1280 mt-20 gap-10 footer-padding">
          <div class="md:flex gap-12">
              <div class="md:w-[35%]">
                  <div>
                      <a href="/">
                          <img src="<?php echo $footer_data['footer_logo_url'] ?? "assets/images/logo_kids.png" ?>" alt="Footer Logo"> </a>
                  </div>
                  <ul class="mt-5">
                      <li class="flex gap-2 mt-4">
                          <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="22" viewBox="0 0 15 22" fill="none">
                                  <g clip-path="url(#clip0_293_653)">
                                      <path d="M6.5625 20.8691C5.85938 20.0098 4.98698 18.8509 3.94531 17.3926C2.92969 15.9603 2.03125 14.4759 1.25 12.9395C0.46875 11.403 0.0520833 10.0488 0 8.87695C0.0520833 6.74154 0.78125 4.9707 2.1875 3.56445C3.59375 2.1582 5.36458 1.42904 7.5 1.37695C9.63542 1.42904 11.4062 2.1582 12.8125 3.56445C14.2188 4.9707 14.9479 6.74154 15 8.87695C14.9479 10.0488 14.5312 11.403 13.75 12.9395C12.9427 14.4759 12.0312 15.9603 11.0156 17.3926C10 18.8509 9.14062 20.0098 8.4375 20.8691C8.17708 21.1816 7.86458 21.3379 7.5 21.3379C7.13542 21.3379 6.82292 21.1816 6.5625 20.8691ZM7.5 11.377C8.20312 11.3509 8.78906 11.1035 9.25781 10.6348C9.72656 10.166 9.97396 9.58008 10 8.87695C9.97396 8.17383 9.72656 7.58789 9.25781 7.11914C8.78906 6.65039 8.20312 6.403 7.5 6.37695C6.79688 6.403 6.21094 6.65039 5.74219 7.11914C5.27344 7.58789 5.02604 8.17383 5 8.87695C5.02604 9.58008 5.27344 10.166 5.74219 10.6348C6.21094 11.1035 6.79688 11.3509 7.5 11.377Z" fill="#FC9C3D" />
                                  </g>
                                  <defs>
                                      <clipPath id="clip0_293_653">
                                          <rect width="15" height="21" fill="white" transform="matrix(1 0 0 -1 0 21.877)" />
                                      </clipPath>
                                  </defs>
                              </svg></span>
                          <h3><a class="text-[#003258] leading-5"><?php echo $footer_data['footer_about'] ?? "" ?></a></h3>
                      </li>
                      <li class="flex gap-2 mt-4">
                          <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                  <g clip-path="url(#clip0_293_658)">
                                      <path d="M11.1328 8.59835C10.638 8.28585 10.1953 8.32492 9.80469 8.71554C9.46615 9.21033 9.50521 9.65304 9.92188 10.0437C10.3906 10.4343 10.625 10.9161 10.625 11.489C10.625 12.0619 10.3906 12.5437 9.92188 12.9343C9.50521 13.3249 9.46615 13.7676 9.80469 14.2624C9.98698 14.4707 10.2214 14.5749 10.5078 14.5749C10.7422 14.5749 10.9505 14.5098 11.1328 14.3796C12.0182 13.6244 12.474 12.6609 12.5 11.489C12.474 10.3171 12.0182 9.35356 11.1328 8.59835ZM13.4766 5.66867C13.0078 5.35617 12.5651 5.39523 12.1484 5.78585C11.8359 6.28065 11.888 6.72335 12.3047 7.11398C13.6589 8.25981 14.349 9.70512 14.375 11.4499C14.349 13.1947 13.6589 14.64 12.3047 15.7859C11.888 16.2025 11.8359 16.6452 12.1484 17.114C12.3568 17.3484 12.6042 17.4655 12.8906 17.4655C13.099 17.4655 13.2943 17.3874 13.4766 17.2312C14.362 16.528 15.0391 15.6687 15.5078 14.653C16.0026 13.6635 16.25 12.5957 16.25 11.4499C16.1979 9.13221 15.2734 7.20512 13.4766 5.66867ZM15.8594 2.77804C15.3906 2.46554 14.9609 2.5046 14.5703 2.89523C14.2318 3.39002 14.2708 3.83273 14.6875 4.22335C15.7812 5.13481 16.6276 6.21554 17.2266 7.46554C17.8255 8.71554 18.125 10.0437 18.125 11.4499C18.125 12.8562 17.8255 14.1973 17.2266 15.4734C16.6276 16.7234 15.7812 17.8041 14.6875 18.7155C14.2708 19.1062 14.2318 19.5489 14.5703 20.0437C14.7526 20.252 14.987 20.3562 15.2734 20.3562C15.4818 20.3562 15.6771 20.2911 15.8594 20.1609C17.1875 19.0931 18.2031 17.8041 18.9062 16.2937C19.6354 14.7832 20 13.1687 20 11.4499C20 9.73117 19.6354 8.1296 18.9062 6.64523C18.2031 5.16085 17.1875 3.87179 15.8594 2.77804ZM5.89844 8.32492C6.34115 8.32492 6.66667 8.1296 6.875 7.73898L8.20312 4.41867C8.33333 3.92387 8.20312 3.54627 7.8125 3.28585L5.19531 1.64523C4.77865 1.41085 4.38802 1.44992 4.02344 1.76242C2.22656 3.58533 1.02865 5.66867 0.429688 8.01242C-0.143229 10.3301 -0.143229 12.6478 0.429688 14.9655C1.02865 17.3093 2.22656 19.3926 4.02344 21.2155C4.38802 21.528 4.77865 21.5671 5.19531 21.3327L7.8125 19.6921C8.20312 19.4056 8.33333 19.028 8.20312 18.5593L6.875 15.278C6.69271 14.8614 6.36719 14.6661 5.89844 14.6921L3.82812 14.8874C3.07292 12.6218 3.07292 10.3562 3.82812 8.09054L5.89844 8.32492Z" fill="#FC9C3D" />
                                  </g>
                                  <defs>
                                      <clipPath id="clip0_293_658">
                                          <rect width="20" height="21" fill="white" transform="matrix(1 0 0 -1 0 21.9893)" />
                                      </clipPath>
                                  </defs>
                              </svg>
                          </span>
                          <?php
                            $phone = trim($footer_data['footer_phones'] ?? "");
                            ?>

                          <h3>
                              <a href="tel:<?= $phone ?>" class="text-[#003258] leading-5">
                                  <?= $phone ?>
                              </a>
                          </h3>
                      </li>
                      <li class="flex gap-2 mt-4">
                          <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                  <path d="M17.5 3.98926H2.5C1.79688 4.0153 1.21094 4.2627 0.742188 4.73145C0.273438 5.2002 0.0260417 5.78613 0 6.48926V16.4893C0.0260417 17.1924 0.273438 17.7783 0.742188 18.2471C1.21094 18.7158 1.79688 18.9632 2.5 18.9893H17.5C18.2031 18.9632 18.7891 18.7158 19.2578 18.2471C19.7266 17.7783 19.974 17.1924 20 16.4893V6.48926C19.974 5.78613 19.7266 5.2002 19.2578 4.73145C18.7891 4.2627 18.2031 4.0153 17.5 3.98926ZM2.5 5.86426H17.5C17.8906 5.8903 18.099 6.09863 18.125 6.48926V7.34863L11.6016 12.7393C11.1328 13.1299 10.599 13.3252 10 13.3252C9.40104 13.3252 8.86719 13.1299 8.39844 12.7393L1.875 7.34863V6.48926C1.90104 6.09863 2.10938 5.8903 2.5 5.86426ZM17.5 17.1143H2.5C2.10938 17.0882 1.90104 16.8799 1.875 16.4893V9.80957L7.1875 14.2236C8.02083 14.9007 8.95833 15.2393 10 15.2393C11.0417 15.2393 11.9792 14.9007 12.8125 14.2236L18.125 9.80957V16.4893C18.099 16.8799 17.8906 17.0882 17.5 17.1143Z" fill="#FC9C3D" />
                              </svg>
                          </span>
                          <h3><a href="mail:<?php echo $footer_data['footer_email'] ?? "" ?>" class="text-[#003258] leading-5"> <?php echo $footer_data['footer_email'] ?? "" ?></a></h3>
                      </li>
                  </ul>

                  <div class="hidden lg:block mt-3">
                      <ul class="flex gap-4">
                          <li><a href="<?php echo $footer_data['footer_youtube'] ?? "" ?>" target="_blank"><img src="assets/images/youtube.png" alt="Youtube"></a></li>
                          <li><a href="<?php echo $footer_data['footer_facebook'] ?? "" ?>" target="_blank"><img src="assets/images/facebook.png" alt="Facebook"></a></li>
                          <li><a href="<?php echo $footer_data['footer_instagram'] ?? "" ?>" target="_blank"><img src="assets/images/instagram.png" alt="Instagram"></a></li>
                      </ul>
                  </div>
              </div>
              <div class="md:w-[35%] md:mt-0 mt-7">
                  <div class="flex justify-between gap-5">
                      <div>
                          <h3 class="text-[#000] text-[24px] leading-5">Quick Links</h3>
                          <ul class="mt-4">
                              <?php foreach ($footer_links['data'][0]['links'] as $data) { ?>
                                  <li class="mb-5"><a href="<?= $data["url"] ?? "" ?>" class="text-[#003258] flex items-center gap-1">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                              <g transform="translate(608 0) scale(-1 1)">
                                                  <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                              </g>
                                          </svg> <?= $data["title"] ?? "" ?></a></li>
                              <?php } ?>
                              <!-- <li class="mb-5"><a href="program.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg> Program</a></li>
                             <li class="mb-5"><a href="beyond-curriculam.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg>Beyond Curriculum</a></li>
                             <li class="mb-5"><a href="photos.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg>Gallery</a></li>
                             <li class="mb-5"><a href="admission.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg>Admission</a></li>
                             <li class="mb-5"><a href="contact-us.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg>Contact Us</a></li> -->

                          </ul>
                      </div>
                      <div>
                          <h3 class="text-[#000] text-[24px] leading-5">Other Links</h3>
                          <ul class="mt-4">
                              <?php foreach ($footer_links['data'][1]['links'] as $data) { ?>
                                  <li class="mb-5"><a href="<?= $data["url"] ?? "" ?>" class="text-[#003258] flex items-center gap-1">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                              <g transform="translate(608 0) scale(-1 1)">
                                                  <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                              </g>
                                          </svg> <?= $data["title"] ?? "" ?></a></li>
                              <?php } ?>

                              <li class="mb-5 sm:hidden block"><a href="career" class="text-[#003258] flex items-center gap-1">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18"
                                          viewBox="0 0 608 1280">
                                          <g transform="translate(608 0) scale(-1 1)">
                                              <path fill="#2C4073"
                                                  d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                          </g>
                                      </svg>Career</a></li>
                              <li class="mb-5"><a href="apply-jobs" class="text-[#003258] flex items-center gap-1">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18"
                                          viewBox="0 0 608 1280">
                                          <g transform="translate(608 0) scale(-1 1)">
                                              <path fill="#2C4073"
                                                  d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                          </g>
                                      </svg>Apply Now</a></li>
                              <!-- <li class="mb-5"><a href="virtual-tour.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg> Virtual Tour</a></li>
                             <li class="mb-5"><a href="health-safety-policies.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg>Health & Safety Policies</a></li>
                             <li class="mb-5"><a href="career.php" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg> Careers</a></li>
                             <li class="mb-5"><a href="/allenkidsmukharjivihar" class="text-[#003258] flex items-center gap-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="8.4" height="18" viewBox="0 0 608 1280">
                                         <g transform="translate(608 0) scale(-1 1)">
                                             <path fill="#2C4073" d="M595 288q0 13-10 23L192 704l393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10L23 727q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23" />
                                         </g>
                                     </svg> Parent Portal Login</a></li> -->

                          </ul>
                      </div>
                  </div>
              </div>
              <div class="md:w-[25%] md:mt-0 mt-6">
                  <div class="bg-no-repeat bg-cover p-5 py-10" style="background-image: url(assets/images/footer-form-bg.png);background-size: 100% 100%;">
                      <div class="text-center">
                          <h2 class="text-[24px] text-white">Opening Hours</h2>
                          <h3 class="text-[18px] text-white font-[400] mt-4">Monday - Saturday <br> 08:00 AM - 05:00 PM</h3>
                          <span class="flex justify-center mt-4">
                              <svg width="170" height="3" viewBox="0 0 170 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <mask id="path-1-inside-1_293_673" fill="white">
                                      <path d="M0 0.444336H169.5V2.44434H0V0.444336Z" />
                                  </mask>
                                  <path d="M169.5 0.444336V-0.555664H166.509V0.444336V1.44434H169.5V0.444336ZM162.521 0.444336V-0.555664H156.538V0.444336V1.44434H162.521V0.444336ZM152.55 0.444336V-0.555664H146.568V0.444336V1.44434H152.55V0.444336ZM142.579 0.444336V-0.555664H136.597V0.444336V1.44434H142.579V0.444336ZM132.609 0.444336V-0.555664H126.626V0.444336V1.44434H132.609V0.444336ZM122.638 0.444336V-0.555664H116.656V0.444336V1.44434H122.638V0.444336ZM112.668 0.444336V-0.555664H106.685V0.444336V1.44434H112.668V0.444336ZM102.697 0.444336V-0.555664H96.7147V0.444336V1.44434H102.697V0.444336ZM92.7265 0.444336V-0.555664H86.7441V0.444336V1.44434H92.7265V0.444336ZM82.7559 0.444336V-0.555664H76.7735V0.444336V1.44434H82.7559V0.444336ZM72.7853 0.444336V-0.555664H66.8029V0.444336V1.44434H72.7853V0.444336ZM62.8147 0.444336V-0.555664H56.8324V0.444336V1.44434H62.8147V0.444336ZM52.8441 0.444336V-0.555664H46.8618V0.444336V1.44434H52.8441V0.444336ZM42.8735 0.444336V-0.555664H36.8912V0.444336V1.44434H42.8735V0.444336ZM32.9029 0.444336V-0.555664H26.9206V0.444336V1.44434H32.9029V0.444336ZM22.9324 0.444336V-0.555664H16.95V0.444336V1.44434H22.9324V0.444336ZM12.9618 0.444336V-0.555664H6.97943V0.444336V1.44434H12.9618V0.444336ZM2.99119 0.444336V-0.555664H0V0.444336V1.44434H2.99119V0.444336ZM169.5 0.444336V-1.55566H166.509V0.444336V2.44434H169.5V0.444336ZM162.521 0.444336V-1.55566H156.538V0.444336V2.44434H162.521V0.444336ZM152.55 0.444336V-1.55566H146.568V0.444336V2.44434H152.55V0.444336ZM142.579 0.444336V-1.55566H136.597V0.444336V2.44434H142.579V0.444336ZM132.609 0.444336V-1.55566H126.626V0.444336V2.44434H132.609V0.444336ZM122.638 0.444336V-1.55566H116.656V0.444336V2.44434H122.638V0.444336ZM112.668 0.444336V-1.55566H106.685V0.444336V2.44434H112.668V0.444336ZM102.697 0.444336V-1.55566H96.7147V0.444336V2.44434H102.697V0.444336ZM92.7265 0.444336V-1.55566H86.7441V0.444336V2.44434H92.7265V0.444336ZM82.7559 0.444336V-1.55566H76.7735V0.444336V2.44434H82.7559V0.444336ZM72.7853 0.444336V-1.55566H66.8029V0.444336V2.44434H72.7853V0.444336ZM62.8147 0.444336V-1.55566H56.8324V0.444336V2.44434H62.8147V0.444336ZM52.8441 0.444336V-1.55566H46.8618V0.444336V2.44434H52.8441V0.444336ZM42.8735 0.444336V-1.55566H36.8912V0.444336V2.44434H42.8735V0.444336ZM32.9029 0.444336V-1.55566H26.9206V0.444336V2.44434H32.9029V0.444336ZM22.9324 0.444336V-1.55566H16.95V0.444336V2.44434H22.9324V0.444336ZM12.9618 0.444336V-1.55566H6.97943V0.444336V2.44434H12.9618V0.444336ZM2.99119 0.444336V-1.55566H0V0.444336V2.44434H2.99119V0.444336Z" fill="white" mask="url(#path-1-inside-1_293_673)" />
                              </svg>
                          </span>
                          <!-- <h3 class="text-[22px] mt-5 text-white"> Govt Holidays</h3>
                         <h3 class="text-[25px] text-white mt-4">Closed</h3> -->
                      </div>
                  </div>
                  <div>
                      <h2 class="sm:text-[22px] text-[18px] font-[600] mt-3 sm:mt-5" style="color:#2a3366">Allen Care App
                      </h2>
                      <div class="flex items-center mt-3 gap-1">
                          <a href="<?php echo $footer_data['android_app_link'] ?? "" ?>"><img class="w-[140px] " src="https://allenkids.allenhouseschools.com/<?php echo ltrim($footer_data['android_badge_url'] ?? '', '/') ?>"
                                  alt=""></a>
                          <a href="<?php echo $footer_data['ios_app_link'] ?? "" ?>"><img class="w-[140px] "
                                  src="https://allenkids.allenhouseschools.com/<?php echo ltrim($footer_data['ios_badge_url'] ?? '', '/') ?>" alt=""></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="md:flex justify-between bg-[#223668] md:p-3 p-1 mt-5 mb-5">
              <p class="text-[16px] text-white text-center md:text-[16px] text-[14px]"><?php echo $footer_data['copyright_text'] ?? "" ?> | Powered by <span><a href="https://fastranking.co.uk/">Fast Ranking</a></span></p>
              <ul class="flex gap-4 justify-center">
                  <li class="font-[300]"><a href="terms-condition.php" class="text-white">Terms & Conditions</a></li>
                  <li class="font-[300]"><a href="privacy-policy.php" class="text-white">Privacy Policy</a></li>
              </ul>
          </div>
      </div>
  </footer>

  <a id="scroll" style="display: flex;">
      <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
              <path fill="#000" d="M8 .5L.5 8H5v8h6V8h4.5z" />
          </svg>
      </span>
  </a>
  <div>
      <a href="https://api.whatsapp.com/send?phone=<?php echo $footer_data['whatsapp_number'] ?? "" ?>" class="whatsapp-button" target="_blank">
          <img src="https://i.ibb.co/VgSspjY/whatsapp-button.png" alt="botão whatsapp">
      </a>
  </div>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const BASE_URL = "<?= rtrim((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'], '/') ?>";
          const SITE_PATH = <?= json_encode(isset($AllenSiteRoot) ? $AllenSiteRoot : '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
          const hpopupOverlay = document.getElementById('HeaderenquiryPopup');
          const hopenBtn = document.getElementById('openEnquiryPopup');
          const hcloseBtn = document.getElementById('closeEnquiryPopup');

          function openPopup() {
              hpopupOverlay.classList.remove("hidden");
                                      }

          hopenBtn?.addEventListener('click', function(e) {
              e.preventDefault();
              openPopup();
          });

          // hopenBtn?.addEventListener('click', function(e) {
          //     e.preventDefault();
          //     hpopupOverlay.classList.remove('hidden');
          //     document.body.style.overflow = 'hidden';
          // });

          hcloseBtn?.addEventListener('click', () => {
              hpopupOverlay.classList.add('hidden');
                                      });

          hpopupOverlay?.addEventListener('click', (e) => {
              if (e.target === hpopupOverlay) {
                  hpopupOverlay.classList.add('hidden');
                                                  }
          });

          document.addEventListener('keydown', (e) => {
              if (e.key === 'Escape' && !hpopupOverlay.classList.contains('hidden')) {
                  hpopupOverlay.classList.add('hidden');
                                                  }
          });

          (function() {
              function getParam(name) {
                  const urlParams = new URLSearchParams(window.location.search);
                  return urlParams.get(name);
              }

              // Capture source: UTM > referrer > Direct
              var source = getParam("utm_source") || document.referrer || "Website";
              console.log("Initial Source:", source);

              // Normalize known sources
              if (source.includes("google.")) {
                  source = "Google-Ads by Agency";
                  console.log("Referrer is Google, setting source to 'Google'");
              } else if (source.includes("facebook.")) {
                  source = "Facebook by Agency";
              } else if (source.includes("instagram.")) {
                  source = "Instagram by Agency";
              }

              // Save in cookie (first touch only)
              if (!sessionStorage.getItem("hleadSource")) {
                  sessionStorage.setItem("hleadSource", source);
              }

              var hfinalSource = sessionStorage.getItem("hleadSource");

              // Fill hidden field if it exists
              var hsourceInput = document.getElementById("hsource");
              if (hsourceInput) {
                  hsourceInput.value = hfinalSource;
              }

              console.log("Captured Source:", hfinalSource);
          })();
          // Regex patterns
          const hnameRegexs = /^[A-Za-z\s]+$/;
          const hmobileRegexs = /^[6-9]\d{9}$/;
          const hemailRegexs = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

          // DOM elements
          const hchildnameInput = document.getElementById("hchildname");
          const hfmgnameInput = document.getElementById("hfmgname");
          const hmobileInput = document.getElementById("hmobile");
          const hemailInput = document.getElementById("hemail");

          // Error spans
          const hchildnameError = document.getElementById("hchildname-error");
          const hfmgnameError = document.getElementById("hfmgname-error");
          const hmobileErrorss = document.getElementById("hmobile-error");
          const hemailErrorss = document.getElementById("hemail-error");

          // Child name validation
          hchildnameInput.addEventListener("input", function() {
              hchildnameError.classList.toggle("hidden", !this.value || hnameRegexs.test(this.value));
          });

          // FMG name validation
          hfmgnameInput.addEventListener("input", function() {
              hfmgnameError.classList.toggle("hidden", !this.value || hnameRegexs.test(this.value));
          });

          // Mobile validation
          hmobileInput.addEventListener("input", function() {
              this.value = this.value.replace(/\D/g, '').slice(0, 10); // digits only
              hmobileErrorss.classList.toggle("hidden", !this.value || hmobileRegexs.test(this.value));
          });

          // Email validation
          hemailInput.addEventListener("input", function() {
              this.value = this.value.toLowerCase();
              hemailErrorss.classList.toggle("hidden", !this.value || hemailRegexs.test(this.value));
          });

          // Form submission
          const form = document.getElementById("HeadercontactForm");
          if (!form.dataset.listenerAttached) {
              form.dataset.listenerAttached = "true";
              form.addEventListener("submit", function(e) {
                  e.preventDefault();
                  const hsubmitBtn = document.getElementById("hcontacthSubmitBtn");
                  hsubmitBtn.disabled = true;
                  hsubmitBtn.textContent = "Submitting...";
                  // Inputs
                  const hsessionSel = document.getElementById("hyears");
                  const hyears = hsessionSel?.value.trim() || "";
                  const hsessionLabel = hsessionSel && hsessionSel.selectedIndex >= 0
                      ? (hsessionSel.options[hsessionSel.selectedIndex].text || "").trim()
                      : "";
                  const hgrade = document.getElementById("hgrade")?.value.trim() || "";
                  const hchildname = hchildnameInput.value.trim();
                  const hfmgname = hfmgnameInput.value.trim();
                  const hmobile = hmobileInput.value.trim();
                  const hemail = hemailInput.value.trim();
                  const hsource = sessionStorage.getItem("hsource") || "Website";

                  let isValid = true;
                  // Child name validation
                  if (!hnameRegexs.test(hchildname)) {
                      hchildnameError.classList.remove("hidden");
                      isValid = false;
                  } else {
                      hchildnameError.classList.add("hidden");
                  }
                  // FMG name validation
                  if (!hnameRegexs.test(hfmgname)) {
                      hfmgnameError.classList.remove("hidden");
                      isValid = false;
                  } else {
                      hfmgnameError.classList.add("hidden");
                  }
                  // Mobile validation
                  if (!hmobileRegexs.test(hmobile)) {
                      hmobileErrorss.classList.remove("hidden");
                      isValid = false;
                  } else {
                      hmobileErrorss.classList.add("hidden");
                  }
                  // Email validation
                  if (!hemailRegexs.test(hemail)) {
                      hemailErrorss.classList.remove("hidden");
                      isValid = false;
                  } else {
                      hemailErrorss.classList.add("hidden");
                  }
                  if (!isValid) {
                      hsubmitBtn.disabled = false;
                      hsubmitBtn.textContent = "Submit";
                      return;
                  }
                  // API Payload
                  const payload = {
                      name: hchildname,
                      years: hyears,
                      session: hsessionLabel || hyears,
                      grade: hgrade,
                      student_name: hchildname,
                      parent_name: hfmgname,
                      phone: hmobile,
                      email: hemail,
                      source: hsource,
                      source_type: "Website",
                      enquiry_type: "Digital",
                      message: "This Message From Allen Kids Mukharji Vihar",
                      subject: "Admission Enquiry",
                      branch_id: 2,
                      school_id: 2,
                      language_id: 1
                  };
                  fetch(allenProxyUrl("admission-proxy"), {
                          method: "POST",
                          headers: {
                              "Content-Type": "application/json"
                          },
                          body: JSON.stringify(payload)
                      })
                      .then(response => {
                          if (!response.ok) throw new Error("Network error");
                          return response.json();
                      })
                      .then(() => {
                          const hpopup = document.getElementById("HeadersuccessPopup");
                          hpopup.classList.remove("hidden");
                          hpopupOverlay.classList.add("hidden");
                                                                                                        setTimeout(() => {
                              hpopup.classList.add("hidden");
                          }, 10000);
                          form.reset();
                      })
                      .catch(() => {
                          hpopupOverlay.classList.add("hidden");
                                                                              alert("Error submitting the form. Please try again.");
                      })
                      .finally(() => {
                          hsubmitBtn.disabled = false;
                          hsubmitBtn.textContent = "Submit Message";
                      });
              });
          }
      });
  </script>