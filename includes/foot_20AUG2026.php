<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/kids.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<!-- <script>
     document.addEventListener('DOMContentLoaded', function() {
         const BASE_URL = "<?= rtrim((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'], '/') ?>";

         const hpopupOverlay = document.getElementById('HeaderenquiryPopup');
         const hopenBtn = document.getElementById('openEnquiryPopup');
         const hcloseBtn = document.getElementById('closeEnquiryPopup');

         const sessionSelect = document.getElementById('hyears'); // ✅ FIX
         const gradeSelect = document.getElementById('hgrade'); // ✅ FIX
         let apiLoaded = false; // ✅ ensure load once only
         function openPopup() {
             hpopupOverlay.classList.remove("hidden");
             document.body.style.overflow = 'hidden';

             if (!apiLoaded) {
                 // Load Session
                 fetch(`${BASE_URL}/includes/ajax-session`)
                     .then(res => res.text())
                     .then(html => sessionSelect.innerHTML += html)
                     .catch(err => console.error("Session API error", err));

                 // Load Grade
                 fetch(`${BASE_URL}/includes/grade-api`)
                     .then(res => res.text())
                     .then(html => gradeSelect.innerHTML += html)
                     .catch(err => console.error("Grade API error", err));

                 apiLoaded = true;
             }
         }

         hopenBtn?.addEventListener('click', function(e) {
             e.preventDefault();
             openPopup(); // ✅ FIX
         });

         hcloseBtn?.addEventListener('click', () => {
             hpopupOverlay.classList.add('hidden');
             document.body.style.overflow = '';
         });

         hpopupOverlay?.addEventListener('click', (e) => {
             if (e.target === hpopupOverlay) {
                 hpopupOverlay.classList.add('hidden');
                 document.body.style.overflow = '';
             }
         });

         document.addEventListener('keydown', (e) => {
             if (e.key === 'Escape' && !hpopupOverlay.classList.contains('hidden')) {
                 hpopupOverlay.classList.add('hidden');
                 document.body.style.overflow = '';
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
                 const hyears = document.getElementById("hyears")?.value.trim() || "";
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
                     branch_id: 5,
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
                         document.body.style.overflow = '';
                         setTimeout(() => {
                             hpopup.classList.add("hidden");
                         }, 3000);
                         form.reset();
                     })
                     .catch(() => {
                         alert("Error submitting the form. Please try again.");
                     })
                     .finally(() => {
                         hsubmitBtn.disabled = false;
                         hsubmitBtn.textContent = "Submit Message";
                     });
             });
         }
     });
 </script> -->
    <script>
document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("HeaderenquiryPopup");
    const closeBtn = document.getElementById("closeEnquiryPopup");
    const form = document.getElementById("HeadercontactForm");
    const submitBtn = document.getElementById("hcontacthSubmitBtn");

    function resetHeaderForm() {

        if (!form) return;

        // Reset form fields
        form.reset();

        // Reset dropdowns
        const session = document.getElementById("years");
        const grade = document.getElementById("hgrade");

        if (session) session.selectedIndex = 0;
        if (grade) grade.selectedIndex = 0;

        // Reset button
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = "Submit";
        }

        // Hide ALL validation errors
        [
            "hchildname-error",
            "hfmgname-error",
            "hmobile-error",
            "hemail-error"
        ].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.classList.add("hidden");
                el.style.display = "none";
            }
        });

        // Remove red borders if added by validation
        document.querySelectorAll("#HeadercontactForm input, #HeadercontactForm select")
        .forEach(el => el.classList.remove("border-red-500"));
    }

    // CLOSE BUTTON
    closeBtn?.addEventListener("click", () => {
        setTimeout(resetHeaderForm, 100);
    });

    // OUTSIDE CLICK
    popup?.addEventListener("click", (e) => {
        if (e.target === popup) {
            setTimeout(resetHeaderForm, 100);
        }
    });

    // ESC KEY
    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape" && popup && !popup.classList.contains("hidden")) {
            setTimeout(resetHeaderForm, 100);
        }
    });

    // After popup hidden (success close)
    const observer = new MutationObserver(() => {
        if (popup.classList.contains("hidden")) {
            resetHeaderForm();
            document.body.style.overflow = '';
            document.documentElement.style.overflow = '';
        }
    });

    if (popup) {
        observer.observe(popup, { attributes: true, attributeFilter: ['class'] });
    }

});
</script>
<script>
(function(){

function rebindHeaderForm(){

    const popup = document.getElementById("HeaderenquiryPopup");
    const form = document.getElementById("HeadercontactForm");

    if(!popup || !form) return;

    const hchild = document.getElementById("hchildname");
    const hfmg = document.getElementById("hfmgname");
    const hmobile = document.getElementById("hmobile");
    const hemail = document.getElementById("hemail");

    if(!hchild || hchild.dataset.bound) return;

    const nameRegex = /^[A-Za-z\s]+$/;
    const mobileRegex = /^[6-9]\d{9}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const childErr = document.getElementById("hchildname-error");
    const fmgErr = document.getElementById("hfmgname-error");
    const mobErr = document.getElementById("hmobile-error");
    const mailErr = document.getElementById("hemail-error");

    hchild.addEventListener("input", function(){
        childErr.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
    });

    hfmg.addEventListener("input", function(){
        fmgErr.classList.toggle("hidden", !this.value || nameRegex.test(this.value));
    });

    hmobile.addEventListener("input", function(){
        this.value = this.value.replace(/\D/g,'').slice(0,10);
        mobErr.classList.toggle("hidden", !this.value || mobileRegex.test(this.value));
    });

    hemail.addEventListener("input", function(){
        this.value = this.value.toLowerCase();
        mailErr.classList.toggle("hidden", !this.value || emailRegex.test(this.value));
    });

    // mark as bound
    hchild.dataset.bound = "true";
}

function watchHeaderPopup(){

    const popup = document.getElementById("HeaderenquiryPopup");
    if(!popup) return;

    const observer = new MutationObserver(() => {

        if(!popup.classList.contains("hidden")){
            setTimeout(rebindHeaderForm,200);
        }

    });

    observer.observe(popup,{
        attributes:true,
        attributeFilter:['class']
    });

}

document.addEventListener("DOMContentLoaded", watchHeaderPopup);

})();
</script>

