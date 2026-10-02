<?php require_once __DIR__ . '/session-api.php'; $sessions = allenkids_fetch_sessions(); ?>
<section class="mt-20 registration-section relative">
    <div class="absolute bottom-30 animate-left-to-right">
        <img src="assets/images/girl.png" class="md:w-[100%] w-[100px]" alt="Girl">
    </div>
    <div class="absolute bottom-30 right-0 animate-left-to-right">
        <img src="assets/images/boy.png" class="md:w-[100%] w-[100px]" alt="Boy">
    </div>
    <div class="comman-container-1050">
        <div class="relative z-10">
            <h2 class="text-[#F66]  flex items-center gap-2 justify-center text-[18px]">
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
                Online Registrations
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
            <h3 class="text-[#2C4073] text-center text-[42px]">Admission Going On ! Hurry Up <br> To Admit Your Seat
            </h3>
        </div>
        <div class="bg-[#FF454A] md:p-12 p-4 mt-5  relative ">
            <div id="successPopup" class="relative mt-3  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:999"> Form submitted successfully!
            </div>
            <div>
                <form id="onlineRegistrationForm" class="mt-6">
                    <div class="md:flex gap-4">
                        <div class="md:w-[50%] md:mt-0 mt-5">
                               <select name="session"
                    class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                    id="years" required>
                <option value="" disabled selected>Enquiry For Session</option>

                <?php
                // Assuming $sessions is already loaded at the top of the page
                // If not, add: $sessions = include 'includes/session-api.php';

                if (!empty($sessions)):
                    foreach ($sessions as $item):
                        $sessionName = trim($item['session'] ?? '');
                        if ($sessionName !== ''):
                ?>
                            <option value="<?= htmlspecialchars($sessionName, ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($sessionName, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                <?php
                        endif;
                    endforeach;
                else:
                ?>
                    <option value="">No sessions available</option>
                <?php endif; ?>
            </select>
                        </div>
                        <div class="md:w-[50%] md:mt-0 mt-5">
                            <select name="grade" 
                    class="bg-white h-[45px] rounded-[6px] w-[100%] text-gray-500 pl-2"
                    id="grade" required>
                <option value="">Choose Grade</option>
                <?php include 'includes/grade-api.php'; ?>
            </select>

                        </div>
                    </div>
                    <div class="md:flex gap-4 mt-5">
                        <div class="md:w-[50%]">
                            <input type="text"
                                class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2"
                                id="childname" placeholder="Enter Child's Name" maxlength="50">
                            <span id="childname-error" class="text-black text-sm mt-1 hidden text-[15px]">Only
                                letters and spaces allowed.</span>
                        </div>
                        <div class="md:w-[50%] md:mt-0 mt-5">
                            <input type="text"
                                class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2" maxlength="50"
                                id="fmgname" placeholder="Father / Mother / Guardian Name">
                            <span id="fmgname-error" class="text-black text-sm mt-1 hidden text-[15px]">Only
                                letters and spaces allowed.</span>
                        </div>
                    </div>



                    <div class="md:flex gap-4 mt-5">
                        <div class="md:w-[50%] md:mt-0 mt-5">
                            <input type="text"
                                class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2" maxlength="12"
                                id="mobile" placeholder="Enter Your Mobile No">
                            <div id="mobile-error" class="text-black text-sm mt-1 hidden text-[15px]">Please
                                enter valid phone number</div>
                        </div>

                        <div class="md:w-[50%] md:mt-0 mt-5">
                            <input type="text"
                                class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-600 pl-2" id="email"
                                placeholder="Enter Your Email">
                            <span id="email-error" class="text-black text-sm mt-1 hidden text-[15px]">Please
                                enter a valid email address.</span>
                        </div>
                    </div>
                    <!-- <div class="md:w-[50%] md:mt-0 mt-5">
                                 <input type="text"
                                     class="bg-white h-[45px] rounded-[6px] bg-white w-[100%] text-gray-500 pl-2"
                                     placeholder="Your Message (optional)" required>
                             </div> -->
            <input type="hidden" id="source" value="">
            <div class="mt-5">
                <button type="submit" id="contactSubmitBtn"
                    class="w-[100%] h-[55px] text-white rounded-[8px] bg-[#2C4073] text-[17px] uppercase flex items-center justify-center gap-1 cursor-pointer transition-all hover:transform-y-5">
                    Sumbit
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
</section>

<script>
    AOS.init();
</script>

<script>
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
        if (!sessionStorage.getItem("leadSource")) {
            sessionStorage.setItem("leadSource", source);
        }

        var finalSource = sessionStorage.getItem("leadSource");

        // Fill hidden field if it exists
        var sourceInput = document.getElementById("source");
        if (sourceInput) {
            sourceInput.value = finalSource;
        }

        console.log("Captured Source:", finalSource);
    })();

    // Regex patterns
    const nameRegexs = /^[A-Za-z\s]+$/;
    const mobileRegexs = /^[6-9]\d{9}$/;
    const emailRegexs = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // DOM elements
    const childnameInput = document.getElementById("childname");
    const fmgnameInput = document.getElementById("fmgname");
    const mobileInput = document.getElementById("mobile");
    const emailInput = document.getElementById("email");

    // Error spans
    const childnameError = document.getElementById("childname-error");
    const fmgnameError = document.getElementById("fmgname-error");
    const mobileErrorss = document.getElementById("mobile-error");
    const emailErrorss = document.getElementById("email-error");

    // Child name validation
    childnameInput.addEventListener("input", function() {
        childnameError.classList.toggle("hidden", !this.value || nameRegexs.test(this.value));
    });

    // FMG name validation
    fmgnameInput.addEventListener("input", function() {
        fmgnameError.classList.toggle("hidden", !this.value || nameRegexs.test(this.value));
    });

    // Mobile validation
    mobileInput.addEventListener("input", function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 10); // digits only
        mobileErrorss.classList.toggle("hidden", !this.value || mobileRegexs.test(this.value));
    });

    // Email validation
    emailInput.addEventListener("input", function() {
        this.value = this.value.toLowerCase();
        emailErrorss.classList.toggle("hidden", !this.value || emailRegexs.test(this.value));
    });

    // Form submission
    const onlineRegistrationForm = document.getElementById("onlineRegistrationForm");
    onlineRegistrationForm?.addEventListener("submit", function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById("contactSubmitBtn");
        submitBtn.disabled = true;
        submitBtn.textContent = "Submitting...";

        const years = onlineRegistrationForm.querySelector('select[name="session"]')?.value.trim() || "";
        const grade = onlineRegistrationForm.querySelector('select[name="grade"]')?.value.trim() || "";
        const childname = childnameInput.value.trim();
        const fmgname = fmgnameInput.value.trim();
        const mobile = mobileInput.value.trim();
        const email = emailInput.value.trim();
        const source = sessionStorage.getItem("leadSource") || "Website";

        let isValid = true;

        // Child name validation
        if (!nameRegexs.test(childname)) {
            childnameError.classList.remove("hidden");
            isValid = false;
        } else {
            childnameError.classList.add("hidden");
        }

        // FMG name validation
        if (!nameRegexs.test(fmgname)) {
            fmgnameError.classList.remove("hidden");
            isValid = false;
        } else {
            fmgnameError.classList.add("hidden");
        }

        // Mobile validation
        if (!mobileRegexs.test(mobile)) {
            mobileErrorss.classList.remove("hidden");
            isValid = false;
        } else {
            mobileErrorss.classList.add("hidden");
        }

        // Email validation
        if (!emailRegexs.test(email)) {
            emailErrorss.classList.remove("hidden");
            isValid = false;
        } else {
            emailErrorss.classList.add("hidden");
        }

        if (!isValid) {
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit";
            return;
        }
        // API Payload
        const payload = {
            name: childname,
            years: years,
            grade: grade,
            student_name: childname,
            parent_name: fmgname,
            phone: mobile,
            email: email,
            source: source,
            source_type: "Website",
            enquiry_type: "Digital",
            message: "This Message From Allen Kids Swaroop Nagar",
            subject: "Admission Enquiry",
            branch_id: 4,
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
                const popup = document.getElementById("successPopup");
                popup.classList.remove("hidden");
                setTimeout(() => popup.classList.add("hidden"), 8000);
                document.getElementById("onlineRegistrationForm").reset();
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