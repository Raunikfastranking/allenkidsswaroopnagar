<?php if (!defined('ALLENKIDS_BRANCH_ID')) require_once __DIR__ . '/../proxy/config.php'; ?>
 <div id="NewsPopup" class="relative fixed  bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:9999;  position: fixed; right: 0;  top: 20%;"> Newsletter Subscribed.
 </div>
 <section class="md:mt-20 mt-5 newsletter-bg md:pt-24 pt-10 md:h-[250px] mb:pb-0 pb-10">
     <div class="comman-container-1280">
         <div class="md:flex justify-between items-center">
             <div class="md:w-[50%]">
                 <h2 class="text-[36px] md:leading-12 leading-9 text-white font-[500]">Subscribe Our Newsletter</h2>
                 <!-- <p class="text-[18px] text-white md:mt-0 mt-2">Beet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p> -->
             </div>
             <div class="md:w-[50%] md:mt-0 mt-3">
                 <form id="newsForm">
                     <div class="flex gap-2 items-center relative">
                         <input type="text" class="h-[50px] bg-white text-[#70747F] text-[18px] w-[100%] pl-4 rounded-[5px]" id="news-email" placeholder="Email Address">
                         <button type="submit" class="bg-[#FF454A] w-[160px] text-white h-[50px] rounded-[5px] cursor-pointer" id="newsSubmit">SUBSCRIBE</button>
                         <span id="news-email-error" class="text-red-500 text-sm mt-2 absolute top-12 hidden">Please enter a valid email address.</span>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>

<script>
    const emailRegexxx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailErrors = document.getElementById("news-email-error");

    document.getElementById("news-email").addEventListener("input", function () {
        this.value = this.value.toLowerCase();
        emailErrors.classList.toggle("hidden", !this.value || emailRegexxx.test(this.value));
        emailErrors.textContent = "Please enter a valid email."; // default error
    });

    document.getElementById("newsForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const NewssubmitButton = document.getElementById("newsSubmit");
        NewssubmitButton.disabled = true;
        NewssubmitButton.textContent = "Subscribing...";

        const newsemail = document.getElementById("news-email").value.trim();
        let isValid = true;

        if (!emailRegexxx.test(newsemail)) {
            emailErrors.classList.remove("hidden");
            emailErrors.textContent = "Please enter a valid email.";
            isValid = false;
        }

        if (!isValid) {
            NewssubmitButton.disabled = false;
            NewssubmitButton.textContent = "Subscribe";
            return;
        }

        const payload = {
            name: "Test Name",
            email: newsemail,
            phone: "1111111111",
            branch_id: <?= (int) ALLENKIDS_BRANCH_ID ?>,
            school_id: 2,
            language_id: 1
        };

        fetch(allenProxyUrl("newsletter-proxy"), {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(payload)
        })
            .then(async (response) => {
                const data = await response.json();
                if (!response.ok) {
                    throw data; // throw full error response for catch
                }
                return data;
            })
            .then((data) => {
                // success popup
                document.getElementById("NewsPopup").classList.remove("hidden");
                setTimeout(() => {
                    document.getElementById("NewsPopup").classList.add("hidden");
                }, 3000);
                document.getElementById("newsForm").reset();
            })
            .catch((error) => {
                if (error?.errors?.email) {
                    // show backend email error
                    emailErrors.classList.remove("hidden");
                    emailErrors.textContent = error.errors.email[0]; 
                } else {
                    alert("There was an error submitting the form.");
                    console.error("Error:", error);
                }
            })
            .finally(() => {
                NewssubmitButton.disabled = false;
                NewssubmitButton.textContent = "Subscribe";
            });
    });
</script>