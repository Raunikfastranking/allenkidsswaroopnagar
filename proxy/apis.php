<?php
require_once __DIR__ . '/config.php';

$api_url = API_BASE_URL;

function fetchMultipleApiData($endpoints)
{
    $baseUrl = rtrim(API_BASE_URL, '/') . '/api';
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];
    // Create all curl handles
    foreach ($endpoints as $key => $endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint . '?cb=' . time());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , (!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST , ((!preg_match('/^(localhost|127[.]0[.]0[.]1|192[.]168[.]1[.]195|.*[.]localhost)(:[0-9]+)?$/i', $_SERVER['HTTP_HOST'] ?? '')) ? 2 : 0));
        curl_multi_add_handle($mh, $ch);
        $curlHandles[$key] = $ch;
    }
    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);

        if ($status > CURLM_OK) {
             break;
        }
        curl_multi_select($mh);
        usleep(10000);
    } while ($running > 0);

    // Collect responses
    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $responses[$key] = json_decode($content, true);
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    return $responses;
}
$endpoints = [
    'home_data'   => '/pages/best-preschool-in-swaroop-nagar-a-place-to-bloom',
    'about_data'   => '/pages/about-allen-kids-leading-preschool-near-swaroop-nagar',
    'curriculumData'   => '/pages/best-holistic-preschool-education-in-swaroop-nagar',
    'layoutParts' => '/public/branches/4/layout-parts/',
    'blogData' => '/blogs/branch/4',
    'eventData' => '/galleries/events/branch/4',
    'menu_data'   => '/menus/4',
    'footer_links'   => '/link-groups',
    'statisData'   => '/statistics/branch/4',
    'program_1' => '/pages/best-toddler-program-near-swaroop-nagar-allen-kids',
    'program_2' => '/pages/best-playgroup-for-toddlers-in-swaroop-nagar-allen-kids',
    'program_3' => '/pages/allen-kids-best-playgroup-school-in-swaroop-nagar-kanpur',
    'program_4' => '/pages/early-childhood-nursery-program-allen-kids-swaroop-nagar',
    'program_5' => '/pages/preparatory-school-program-in-swaroop-nagar-allen-kids',
    'admission_data' => '/pages/preschool-admission-in-swaroop-nagar-allen-kids',
    'faq_data' => '/accordions/branch/4',
    'contactData' => '/pages/visit-allen-kids-swaroop-nagar-best-playschool-in-kanpur',
    'routine_data' => '/tables/branch/4',
    'tips_data' => '/pages/tips-for-parents-swaroop-nagar',
    'health_data' => '/pages/health-safety-policies-swaroop-nagar',
    'galleryData' => '/galleries/gallery/branch/4',
    'videoData' => '/videos/branch/4',
    'news_data' => '/pages/newsletters-swaroop-nagar',
    'term_data' => '/pages/terms-condition-swaroop-nagar',
    'privacy_data' => '/pages/terms-condition-swaroop-nagar',
    'virtual_data' => '/pages/virtual-tour-swaroop-nagar',
    'jobs_data' => '/jobs/branch/4',
    'daily_routine' => '/pages/daily-routine-swaroop-nagar',
    'video_data' => '/pages/videos-swaroop-nagar',
  ];

$data = fetchMultipleApiData($endpoints);

$homePage   = $data['home_data'];
$about_data = $data['about_data'];
$curriculumData = $data['curriculumData'];
$layoutParts = $data['layoutParts'];
$blogData = $data['blogData'];
$eventData  = $data['eventData'];
$menuData   = $data['menu_data'];
$footer_links = $data['footer_links']; 
$statisData = $data['statisData'];
$program_1 = $data['program_1'];
$program_2 = $data['program_2'];
$program_3 = $data['program_3'];
$program_4 = $data['program_4'];
$program_5 = $data['program_5'];
$admission_data = $data['admission_data'];
$faq_data = $data['faq_data'];
$contactData = $data['contactData'];
$routine_data = $data['routine_data'];
$tips_data = $data['tips_data'];
$health_data = $data['health_data'];
$galleryData = $data['galleryData'];
$videoData = $data['videoData'];
$news_data = $data['news_data'];
$term_data = $data['term_data'];
$privacy_data = $data['privacy_data'];
$virtual_data = $data['virtual_data'];
$jobs_data = $data['jobs_data'];
$daily_routine = $data['daily_routine'];
$video_data = $data['video_data'];

 