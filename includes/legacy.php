 
<?php
if (!function_exists('fetchApiData')) {
    require_once __DIR__ . '/../proxy/api.php';
}
if (empty($statisData) || !is_array($statisData)) {
    $statisData = fetchApiData('api/statistics/branch/' . (defined('ALLENKIDS_BRANCH_ID') ? ALLENKIDS_BRANCH_ID : '4'));
}
$statItems = $statisData['data'][1]['items'] ?? [];
?>
 <section class="relative py-20 md:bg-[url('assets/images/img/o-c-bg.png')] bg-[#FF454A]">
     <div class="absolute animate-left-to-right">
         <img src="assets/images/img/animate-team1.png" class="md:w-[100%] w-[100px]" alt="Image Counter">
     </div>
     <div class="absolute right-[0px] mb:bottom-auto bottom-3 mn animate-left-to-right">
         <img src="assets/images/img/img-counter-01.png" class="md:w-[100%] w-[100px]" alt="Image Counter">
     </div>
     <div class="comman-container-1050s">
         <div class="flex flex-wrap justify-center relative z-10">
             <div class="pxl-counter1 cursor-pointer md:mt-0 mt-8">
                 <div class="relative w-[270px] mx-auto">
                     <div class="line-counter" style="background-image: url(assets/images/img/mask-line-counter.png);"></div>
                     <img src="assets/images/img/white-batch.png" class="mx-auto" alt="one">
                     <img src="assets/images/img/note-book.png" class="absolute left-26 top-7" alt="Student Enroll">
                 </div>
                 <div class="mt-4">
                     <h2 class="text-[36px] text-center text-white"><?php echo $statisData['data'][1]['items'][0]['count'] ?? "" ?></h2>
                     <h3 class="text-center text-white"><?php echo $statisData['data'][1]['items'][0]['heading'] ?? "" ?></h3>
                 </div>
             </div>
             <div class="pxl-counter1 cursor-pointer">
                 <div class="relative w-[270px] mx-auto">
                     <div class="line-counter" style="background-image: url(assets/images/img/mask-line-counter.png);"></div>
                     <img src="assets/images/img/white-batch.png" class="mx-auto w-[125px]" alt="one">
                     <img src="assets/images/img/student-bag.png" class="absolute left-25 top-6 w-[70px] mx-auto" alt="Student Enroll">
                 </div>
                 <div class="mt-4">
                     <h2 class="text-[36px] text-center text-white"><?php echo $statisData['data'][1]['items'][1]['count'] ?? "" ?></h2>
                     <h3 class="text-center text-white"><?php echo $statisData['data'][1]['items'][1]['heading'] ?? "" ?></h3>
                 </div>
             </div>
             <div class="pxl-counter1 cursor-pointer md:mt-0 mt-8">
                 <div class="relative w-[270px] mx-auto">
                     <div class="line-counter" style="background-image: url(assets/images/img/mask-line-counter.png);"></div>
                     <img src="assets/images/img/white-batch.png" class="mx-auto" alt="one">
                     <img src="assets/images/img/book.png" class="absolute left-26 top-7" alt="Student Enroll">
                 </div>
                 <div class="mt-4">
                    <h2 class="text-[36px] text-center text-white"><?php echo $statisData['data'][1]['items'][2]['count'] ?? "" ?></h2>
                    <h3 class="text-center text-white"><?php echo $statisData['data'][1]['items'][2]['heading'] ?? "" ?></h3>
                 </div>
             </div>
             <div class="pxl-counter1 cursor-pointer md:mt-0 mt-8">
                 <div class="relative w-[270px] mx-auto">
                     <div class="line-counter" style="background-image: url(assets/images/img/mask-line-counter.png);"></div>
                     <img src="assets/images/img/white-batch.png" class="mx-auto" alt="one">
                     <img src="assets/images/img/expert-teacher.png" class="absolute left-26 top-7" alt="Student Enroll">
                 </div>
                 <div class="mt-4">
                    <h2 class="text-[36px] text-center text-white"><?php echo $statisData['data'][1]['items'][3]['count'] ?? "" ?></h2>
                    <h3 class="text-center text-white"><?php echo $statisData['data'][1]['items'][3]['heading'] ?? "" ?></h3>
                 </div>
             </div>
             <div class="pxl-counter1 cursor-pointer md:mt-0 mt-8 hidden">
                 <div class="relative w-[270px] mx-auto">
                     <div class="line-counter" style="background-image: url(assets/images/img/mask-line-counter.png);"></div>
                     <img src="assets/images/img/white-batch.png" class="mx-auto" alt="one">
                     <img src="assets/images/img/expert-teacher.png" class="absolute left-26 top-7" alt="Student Enroll">
                 </div>
                 <div class="mt-4">
                     <h2 class="text-[36px] text-center text-white"><?php echo $statisData['data'][1]['items'][4]['count'] ?? "" ?></h2>
                    <h3 class="text-center text-white"><?php echo $statisData['data'][1]['items'][4]['heading'] ?? "" ?></h3>
                 </div>
             </div>

         </div>
     </div>
 </section>