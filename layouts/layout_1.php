 <section class=" core-value-bg  md:py-20 py-8 relative  bg-cover bg-center" style="background-size: cover;">
     <div class="absolute left-0 top-40 animate-left-to-right">
         <img src="assets/images/leaf.png" class="md:w-[100%] w-[80px]" alt="Leaf">
     </div>
     <div class="absolute right-0 translate-y-40 translate-x-[-30px] animate-scale-loop">
         <img src="assets/images/start.png" class="md:w-[100%] w-[80px]" alt="Star">
     </div>
     <div class="absolute left-0 bottom-0 animate-scale-loop">
         <img src="assets/images/white-rainbow.png" class="md:w-[100%] w-[80px]" alt="White Rainbow">
     </div>
     <div class="absolute right-5 z-100 bottom-0 animate-scale-loop">
         <img src="assets/images/bullets-circle.png" class="md:w-[100%] w-[80px]" alt="Bullet Rainbow">
     </div>
     <div class="comman-container">
         <div class="text-center text-white md:pt-30">
             <h2 class="md:text-[45px] text-[32px] leading-11 mt-4"><?= strip_tags($data['content_heading']) ?? "" ?></h2>
             <div>
                 <?= $data['content'] ?? "" ?>
             </div>
         </div>
          
        <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
     </div>
 </section>