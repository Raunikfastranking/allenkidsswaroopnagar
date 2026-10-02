  <section class="mt-1">
      <div class="comman-container">
          <div class="text-center text-white pt-10">
              <h2 class="md:text-[45px] text-[32px] leading-11 mt-4 text-[#2C4073]"><?= strip_tags($data['content_heading']) ?? "" ?></h2>
              <div>
                  <?= $data['content'] ?? "" ?>
              </div>
          </div>
       
          <?php include __DIR__ . '/../includes/sections/section-content.php'; ?>
      </div>
  </section>