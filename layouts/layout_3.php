 <section class="md:mt-20 mt-0" style="background-image: url(assets/images/our-class/o-c-bg.png);">
     <div class="comman-container-1050">

         <div class="text-center text-white pt-10">
              <h2 class="md:text-[45px] text-[32px] leading-11 mt-4 text-[#2C4073]"><?= strip_tags($data['content_heading']) ?? "" ?></h2>
              <div>
                <?= $data['content'] ?? "" ?>
              </div>
         </div>

           <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
     </div>
 </section>