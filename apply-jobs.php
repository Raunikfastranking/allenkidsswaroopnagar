<?php
session_start(); // Required for PRG pattern
include_once "proxy/apis.php";

$successMessage = '';

// Display success message once after redirect
if (isset($_SESSION['application_success'])) {
    $successMessage = '
    <div id="successMessage" class="inline-flex ml-6 px-6 py-3 bg-green-100 border border-green-400 text-green-800 font-medium rounded-md shadow-lg flex items-center space-x-3 opacity-100 transition-opacity duration-500">
        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>
        <span>Job application submitted successfully!</span>
    </div>

    <script>
        setTimeout(function() {
            var msg = document.getElementById("successMessage");
            if (msg) {
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 600);
            }
        }, 8000);
    </script>';

    unset($_SESSION['application_success']); // Show only once
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['mobile_no'] ?? '');
    $applied_for = trim($_POST['applied_for'] ?? '');

    $errors = [];

    // Basic validation
    if (empty($fullName) || !preg_match('/^[A-Za-z\s]+$/', $fullName)) {
        $errors[] = "Valid full name is required (letters and spaces only).";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email address is required.";
    }
    if (empty($phone) || !preg_match('/^[6-9]\d{9}$/', $phone)) {
        $errors[] = "Valid 10-digit Indian mobile number is required.";
    }
    if (empty($applied_for)) {
        $errors[] = "Please specify the position you're applying for.";
    }

    // Resume validation
    if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Resume file is required.";
    } else {
        $resume = $_FILES['resume'];
        if ($resume['size'] > 2 * 1024 * 1024) {
            $errors[] = "Resume must be ≤ 2MB.";
        }
        if ($resume['type'] !== 'application/pdf') {
            $errors[] = "Resume must be a PDF file.";
        }
    }

    // Optional cover letter validation
    if (isset($_FILES['cover_letter']) && $_FILES['cover_letter']['error'] === UPLOAD_ERR_OK) {
        $cover = $_FILES['cover_letter'];
        if ($cover['size'] > 2 * 1024 * 1024) {
            $errors[] = "Cover letter must be ≤ 2MB.";
        }
        if ($cover['type'] !== 'application/pdf') {
            $errors[] = "Cover letter must be a PDF file.";
        }
    }

    if (!empty($errors)) {
        $successMessage = '<div class="inline-flex ml-6 px-6 py-3 bg-red-100 border border-red-400 text-red-800 font-medium rounded-md shadow-md">' 
            . implode('<br>', $errors) . '</div>';
    } else {
        // Prepare files
        $resumeFile = new CURLFile(
            $_FILES['resume']['tmp_name'],
            $_FILES['resume']['type'],
            $_FILES['resume']['name']
        );

        $postData = [
            'name' => $fullName,
            'email' => $email,
            'mobile' => $phone,
            'applied_for' => $applied_for,
            'resume' => $resumeFile
        ];

        if (isset($_FILES['cover_letter']) && $_FILES['cover_letter']['error'] === UPLOAD_ERR_OK) {
            $coverFile = new CURLFile(
                $_FILES['cover_letter']['tmp_name'],
                $_FILES['cover_letter']['type'],
                $_FILES['cover_letter']['name']
            );
            $postData['cover_letter'] = $coverFile;
        }

        require_once __DIR__ . '/proxy/config.php';

        $apiResult = proxy_api_multipart_post(
            'api/save-external-job-application/2/' . ALLENKIDS_BRANCH_ID,
            $postData
        );
        $response = $apiResult['response'];
        $curlError = $apiResult['error'];

        if ($curlError || !$response) {
            $successMessage = '<div class="inline-flex ml-6 px-6 py-3 bg-red-100 border border-red-400 text-red-800 font-medium rounded-md shadow-md">
                Error: Unable to submit application. Please try again later.
            </div>';
        } else {
            // Success → Store in session and redirect
            $_SESSION['application_success'] = true;

            // Build redirect URL (preserves any GET params like ?job_id=...)
            $redirect_url = $_SERVER['PHP_SELF'];
            if (!empty($_SERVER['QUERY_STRING'])) {
                $redirect_url .= '?' . $_SERVER['QUERY_STRING'];
            }

            header("Location: " . $redirect_url);
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allen Kids Swaroop Nagar | Job Openings</title>
    <?php include "includes/head.php" ?>
    <style>
        #submitOverlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(4px);
        }
        #submitOverlay .loader {
            background: white;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
            font-size: 18px;
            font-weight: 500;
        }
        #submitOverlay .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #d32f2f;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <?php include "includes/header.php" ?>

    <div id="submitOverlay">
        <div class="loader">
            <div class="spinner"></div>
            <div>Uploading your application...<br><small>Please wait, this may take a few seconds.</small></div>
        </div>
    </div>

    <div class="main relative mb-[120px]">
        <div class="text-gray-800">
            <div class="max-w-5xl mx-auto p-6 space-y-8 bg-white shadow-xl mt-10 rounded-xl">
                <form id="applicationForm" method="post" action="" class="space-y-6" enctype="multipart/form-data">
                    <h2 class="text-xl font-semibold">Application Form</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-1 font-medium">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($fullName ?? ''); ?>" required maxlength="150"
                                class="w-full border border-gray-300 p-2 rounded-md" />
                            <p id="nameError" class="text-sm text-red-500 hidden mt-1">Only letters and spaces allowed.</p>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required
                                class="w-full border border-gray-300 p-2 rounded-md" />
                            <p id="emailError" class="text-sm text-red-500 hidden mt-1">Enter a valid email.</p>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Mobile No <span class="text-red-500">*</span></label>
                            <input type="text" id="phone" name="mobile_no" value="<?php echo htmlspecialchars($phone ?? ''); ?>" required maxlength="10"
                                class="w-full border border-gray-300 p-2 rounded-md" />
                            <p id="phoneError" class="text-sm text-red-500 hidden mt-1">Enter a valid 10-digit number.</p>
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Applied For <span class="text-red-500">*</span></label>
                            <input type="text" name="applied_for" value="<?php echo htmlspecialchars($applied_for ?? ''); ?>" required maxlength="150"
                                class="w-full border border-gray-300 p-2 rounded-md" />
                            <p id="appliedErr" class="text-sm text-red-500 hidden mt-1">This field is required.</p>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Upload Resume <span class="text-red-500">*</span></label>
                        <input type="file" required name="resume" id="resume" accept="application/pdf"
                            class="w-full p-2 border border-dashed border-gray-400 rounded-md" />
                        <p id="resumeError" class="text-sm text-red-500 hidden mt-1">Only PDF files ≤ 2MB are allowed.</p>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Upload Cover Letter (optional)</label>
                        <input type="file" name="cover_letter" id="cover_letter" accept="application/pdf"
                            class="w-full p-2 border border-dashed border-gray-400 rounded-md" />
                        <p id="coverError" class="text-sm text-red-500 hidden mt-1">Only PDF files ≤ 2MB are allowed.</p>
                    </div>

                    <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($job_id ?? '0'); ?>">

                    <div class="flex flex-wrap items-center gap-4 mt-8">
                        <button type="submit" name="submit" id="submitBtn"
                            class="bg-red-600 text-white px-8 py-3 rounded-md hover:bg-red-500 transition font-medium text-lg flex items-center gap-3 disabled:opacity-70 disabled:cursor-not-allowed">
                            <span id="btnText">Submit</span>
                            <svg id="spinner" class="animate-spin h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>

                        <?php echo $successMessage; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById("applicationForm");
        const submitBtn = document.getElementById("submitBtn");
        const btnText = document.getElementById("btnText");
        const spinner = document.getElementById("spinner");
        const overlay = document.getElementById("submitOverlay");

        const fullName = document.getElementById("full_name");
        const email = document.getElementById("email");
        const phone = document.getElementById("phone");
        const applied_for = document.querySelector("input[name='applied_for']");
        const resume = document.getElementById("resume");
        const cover = document.getElementById("cover_letter"); // Fixed ID

        const nameRegex = /^[A-Za-z\s]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^[6-9]\d{9}$/;

        // Real-time validation
        fullName.addEventListener("input", () => {
            document.getElementById("nameError").classList.toggle("hidden", nameRegex.test(fullName.value.trim()));
        });
        email.addEventListener("input", () => {
            document.getElementById("emailError").classList.toggle("hidden", emailRegex.test(email.value.trim()));
        });
        phone.addEventListener("input", () => {
            document.getElementById("phoneError").classList.toggle("hidden", phoneRegex.test(phone.value.trim()));
        });

        function validateFile(input, errorId, required = true) {
            return () => {
                const file = input.files[0];
                const errorEl = document.getElementById(errorId);
                if (!file) {
                    errorEl.classList.toggle("hidden", !required);
                    return;
                }
                const valid = file.type === 'application/pdf' && file.size <= 2 * 1024 * 1024;
                errorEl.classList.toggle("hidden", valid);
            };
        }

        resume.addEventListener("change", validateFile(resume, "resumeError", true));
        cover.addEventListener("change", validateFile(cover, "coverError", false));

        form.addEventListener("submit", function(e) {
            let isValid = true;
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            if (!nameRegex.test(fullName.value.trim())) {
                document.getElementById("nameError").classList.remove("hidden");
                isValid = false;
            }
            if (!emailRegex.test(email.value.trim())) {
                document.getElementById("emailError").classList.remove("hidden");
                isValid = false;
            }
            if (!phoneRegex.test(phone.value.trim())) {
                document.getElementById("phoneError").classList.remove("hidden");
                isValid = false;
            }
            if (!applied_for.value.trim()) {
                document.getElementById("appliedErr").classList.remove("hidden");
                isValid = false;
            }

            const resumeFile = resume.files[0];
            if (!resumeFile || resumeFile.type !== 'application/pdf' || resumeFile.size > 2*1024*1024) {
                document.getElementById("resumeError").classList.remove("hidden");
                isValid = false;
            }

            const coverFile = cover.files[0];
            if (coverFile && (coverFile.type !== 'application/pdf' || coverFile.size > 2*1024*1024)) {
                document.getElementById("coverError").classList.remove("hidden");
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                return;
            }

            overlay.style.display = "flex";
            submitBtn.disabled = true;
            btnText.textContent = "Submitting...";
            spinner.classList.remove("hidden");
        });
    </script>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>
</body>
</html>