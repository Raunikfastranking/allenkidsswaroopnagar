<div class="swiper carousel2 mt-10">
    <div class="swiper-wrapper">
        <?php foreach ($data['resolved_content']['items'] as $items) { ?>
            <div class="swiper-slide">
                <div class="p-2 rounded-[30px] border-[1px] border-[#C7C7C7]">
                    <img src="<?= $api_url ?>/<?= $items['image_url'] ?? '' ?>" class="w-[100%] rounded-[20px] h-[300px] object-cover"
                        alt="Taekwondo" />
                    <div class="p-4 pt-6">
                        <h2 class="text-[22px] text-[#2C4073]"><?= $items['title'] ?? '' ?></h2>
                        <p class="text-[18px] text-[#70747F] mt-2"><?= $items['description'] ?? '' ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>