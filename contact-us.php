<?php
$page = "contact-us.php";
require_once "proxy/apis.php";
//  print_r($contactData['data']['sections'][1]['columns'][0]['content_heading']);
require_once "layouts/layout-function.php";
$pageData = $contactData;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $contactData['data']['title'] ?? '' ?></title>
<meta name="description" content="<?= htmlspecialchars($contactData['data']['meta_description'] ?? '') ?>">
<meta name="keywords" content="<?= htmlspecialchars($contactData['data']['meta_keywords'] ?? '') ?>">
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
      "name": "Contact Us",
      "item": "https://allenkidsswaroopnagar.in/contact-us"
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
        <section class="about-brudcrumb md:h-[350px] bg-program-cover relative ">
            <div class="text-center md:py-28 py-10 relative z-10">
                <h1 class="text-[42px] font-[400] text-white">Contact Us</h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white flex items-center gap-2 sm:text-[16px] text-[12px]">Home </a></li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24">
                            <defs>
                                <path id="weuiArrowOutlined0" fill="#FAB319"
                                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
                            </defs>
                            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
                        </svg></li>
                    <li><a href="" class="text-[#FAB319] sm:text-[16px] text-[12px]">Contact Us</a></li>
                </ul>
            </div>
        </section>
        <!-- End -->

        <!--==== START =====-->
        <section class="md:mt-20 mt-10 px-2">
            <div class="comman-container-1280">
                <div class="md:flex gap-12">
                    <div class="md:mt-0 mt-5 md:w-[50%]">
                        <?php echo $contactData['data']['sections'][1]['columns'][0]['content'] ?? "" ?>
                    </div>
                    <div data-aos="zoom-in-right" class="md:w-[50%] md:mt-0 mt-8">
    <img src="<?= $contactData['data']['sections'][1]['columns'][1]['image_url'] ?? 'assets/images/contact-us.png' ?>"
         width="100%"
         alt="<?= htmlspecialchars($contactData['data']['sections'][1]['columns'][1]['image_alt'] ?? '') ?>">
</div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START =====-->
        <section class="md:mt-20 mt-10">
            <div class="comman-container-1280">
                <div class="md:flex gap-3">
                    <div class="md:w-[50%]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4431.460818803188!2d80.3146714!3d26.481223799999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c399b1c43ca6d%3A0xdbdcdbc632d25b52!2sAllen%20Kids%20Swaroop%20Nagar!5e1!3m2!1sen!2sin!4v1752051221812!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="md:w-[600px] w-[100%] md:h-[100%] h-[350px]"></iframe>
                    </div>
                    <div class="md:w-[50%] md:mt-0 mt-5">
                        <div class="bg-[#2C4073] md:p-10 p-5 rounded-xl">
                            <h2 class="text-[28px] text-[#fff] font-[600] text-center">Leave a Message</h2>

                            <!-- Success Message -->
                            <div id="successPopup"
                                class="relative mt-3 bg-green-500 text-white px-4 py-2 rounded mb-5 hidden">
                                Form submitted successfully!
                            </div>
                            <form id="contactForm" class="mt-6 space-y-5">

                                <!-- Name -->
                                <div>
                                    <input type="text" id="name"
                                        class="w-full bg-white h-[50px] rounded-[6px] pl-4 text-gray-700"
                                        placeholder="Your Name" maxlength="30">
                                    <span id="name-error" class="text-red-500 text-sm hidden">Only letters and spaces
                                        allowed.</span>
                                </div>

                                <!-- Mobile -->
                                <div>
                                    <input type="text" id="mobile"
                                        class="w-full bg-white h-[50px] rounded-[6px] pl-4 text-gray-700"
                                        placeholder="Mobile Number">
                                    <span id="mobile-error" class="text-red-500 text-sm hidden">Enter valid 10-digit
                                        mobile number.</span>
                                </div>

                                <!-- Email -->
                                <div>
                                    <input type="email" id="email"
                                        class="w-full bg-white h-[50px] rounded-[6px] pl-4 text-gray-700"
                                        placeholder="Email ID">
                                    <span id="email-error" class="text-red-500 text-sm hidden">Enter a valid email
                                        address.</span>
                                </div>

                                <!-- Select Query -->
                                <div>
                                    <select id="queryType"
                                        class="w-full bg-white h-[50px] rounded-[6px] pl-4 text-gray-700">
                                        <option value="">Select Query</option>
                                        <option value="admission">Admission</option>
                                        <option value="fees">Fees Related</option>
                                        <option value="general">General Enquiry</option>
                                        <option value="support">Support</option>
                                    </select>
                                    <span id="query-error" class="text-red-500 text-sm hidden">Please select a
                                        query.</span>
                                </div>

                                <!-- Message -->
                                <div>
                                    <textarea id="message"
                                        class="w-full bg-white h-[100px] rounded-[6px] pl-4 pt-3 text-gray-700"
                                        placeholder="Your Message"></textarea>
                                    <span id="message-error" class="text-red-500 text-sm hidden">Message cannot be
                                        empty.</span>
                                </div>

                                <!-- Submit -->
                                <div class="text-right">
                                    <button type="submit" id="contactSubmitBtn"
                                        class="bg-[#FF454A] text-white h-[55px]  w-full rounded-[10px] text-[18px] cursor-pointer transition-all hover:translate-y-[-3px]">
                                        Submit Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==== END ====-->

        <!--==== START =====-->
        <?php include "includes/newsletter.php" ?>
        <!--==== END ====-->

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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/kids.js" async></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        // Regex patterns
        const nameRegex = /^[A-Za-z\s]+$/;
        const mobileRegex = /^[6-9]\d{9}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // DOM Elements
        const nameInput = document.getElementById("name");
        const mobileInput = document.getElementById("mobile");
        const emailInput = document.getElementById("email");
        const querySelect = document.getElementById("queryType");
        const messageInput = document.getElementById("message");

        const nameError = document.getElementById("name-error");
        const mobileError = document.getElementById("mobile-error");
        const emailError = document.getElementById("email-error");
        const queryError = document.getElementById("query-error");
        const messageError = document.getElementById("message-error");

        // Live Validation
        nameInput.addEventListener("input", () => {
            nameError.classList.toggle("hidden", !nameInput.value || nameRegex.test(nameInput.value));
        });

        mobileInput.addEventListener("input", () => {
            mobileInput.value = mobileInput.value.replace(/\D/g, '').slice(0, 10);
            mobileError.classList.toggle("hidden", !mobileInput.value || mobileRegex.test(mobileInput.value));
        });

        emailInput.addEventListener("input", () => {
            emailInput.value = emailInput.value.toLowerCase();
            emailError.classList.toggle("hidden", !emailInput.value || emailRegex.test(emailInput.value));
        });

        // Submit
        document.getElementById("contactForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById("contactSubmitBtn");
            submitBtn.disabled = true;
            submitBtn.textContent = "Submitting...";

            let isValid = true;

            if (!nameRegex.test(nameInput.value.trim())) {
                nameError.classList.remove("hidden");
                isValid = false;
            }
            if (!mobileRegex.test(mobileInput.value.trim())) {
                mobileError.classList.remove("hidden");
                isValid = false;
            }
            if (!emailRegex.test(emailInput.value.trim())) {
                emailError.classList.remove("hidden");
                isValid = false;
            }
            if (!querySelect.value) {
                queryError.classList.remove("hidden");
                isValid = false;
            }
            if (!messageInput.value.trim()) {
                messageError.classList.remove("hidden");
                isValid = false;
            }

            if (!isValid) {
                submitBtn.disabled = false;
                submitBtn.textContent = "Submit Message";
                return;
            }

            // Payload
            const payload = {
                name: nameInput.value.trim(),
                phone: mobileInput.value.trim(),
                email: emailInput.value.trim(),
                query_type: querySelect.value,
                subject: "Contact Us Form Submission",
                message: messageInput.value.trim(),
                branch_id: 4,
                school_id: 2,
                language_id: 1
            };

            // API Request
            fetch(allenProxyUrl("contact-proxy"), {
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
                    const popup = document.getElementById("successPopup");
                    popup.classList.remove("hidden");
                    setTimeout(() => popup.classList.add("hidden"), 3000);
                    document.getElementById("contactForm").reset();
                })
                .catch(() => {
                    alert("Error submitting the form. Please try again.");
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = "Submit Message";
                });

        });
    </script>
</body>

</html>