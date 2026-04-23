   
<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('add_banner');
if($banner):
$key = 0;
?>
<section class="banner-partial-4607af">
    <?php if(is_front_page()): ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="svg" width="61" height="263" viewBox="0 0 61 263" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.04487 10.0897C7.83108 10.0897 10.0897 7.83108 10.0897 5.04487C10.0897 2.25867 7.83108 0 5.04487 0C2.25867 0 0 2.25867 0 5.04487C0 7.83108 2.25867 10.0897 5.04487 10.0897ZM5.04487 60.5385C7.83108 60.5385 10.0897 58.2798 10.0897 55.4936C10.0897 52.7074 7.83108 50.4487 5.04487 50.4487C2.25867 50.4487 0 52.7074 0 55.4936C0 58.2798 2.25867 60.5385 5.04487 60.5385ZM10.0897 105.942C10.0897 108.729 7.83108 110.987 5.04487 110.987C2.25867 110.987 0 108.729 0 105.942C0 103.156 2.25867 100.897 5.04487 100.897C7.83108 100.897 10.0897 103.156 10.0897 105.942ZM5.04487 161.436C7.83108 161.436 10.0897 159.177 10.0897 156.391C10.0897 153.605 7.83108 151.346 5.04487 151.346C2.25867 151.346 0 153.605 0 156.391C0 159.177 2.25867 161.436 5.04487 161.436ZM10.0897 206.84C10.0897 209.626 7.83108 211.885 5.04487 211.885C2.25867 211.885 0 209.626 0 206.84C0 204.054 2.25867 201.795 5.04487 201.795C7.83108 201.795 10.0897 204.054 10.0897 206.84ZM5.04487 262.333C7.83108 262.333 10.0897 260.075 10.0897 257.288C10.0897 254.502 7.83108 252.244 5.04487 252.244C2.25867 252.244 0 254.502 0 257.288C0 260.075 2.25867 262.333 5.04487 262.333ZM60.5385 5.04487C60.5385 7.83108 58.2798 10.0897 55.4936 10.0897C52.7074 10.0897 50.4487 7.83108 50.4487 5.04487C50.4487 2.25867 52.7074 0 55.4936 0C58.2798 0 60.5385 2.25867 60.5385 5.04487ZM55.4936 60.5385C58.2798 60.5385 60.5385 58.2798 60.5385 55.4936C60.5385 52.7074 58.2798 50.4487 55.4936 50.4487C52.7074 50.4487 50.4487 52.7074 50.4487 55.4936C50.4487 58.2798 52.7074 60.5385 55.4936 60.5385ZM60.5385 105.942C60.5385 108.729 58.2798 110.987 55.4936 110.987C52.7074 110.987 50.4487 108.729 50.4487 105.942C50.4487 103.156 52.7074 100.897 55.4936 100.897C58.2798 100.897 60.5385 103.156 60.5385 105.942ZM55.4936 161.436C58.2798 161.436 60.5385 159.177 60.5385 156.391C60.5385 153.605 58.2798 151.346 55.4936 151.346C52.7074 151.346 50.4487 153.605 50.4487 156.391C50.4487 159.177 52.7074 161.436 55.4936 161.436ZM60.5385 206.84C60.5385 209.626 58.2798 211.885 55.4936 211.885C52.7074 211.885 50.4487 209.626 50.4487 206.84C50.4487 204.054 52.7074 201.795 55.4936 201.795C58.2798 201.795 60.5385 204.054 60.5385 206.84ZM55.4936 262.333C58.2798 262.333 60.5385 260.075 60.5385 257.288C60.5385 254.502 58.2798 252.244 55.4936 252.244C52.7074 252.244 50.4487 254.502 50.4487 257.288C50.4487 260.075 52.7074 262.333 55.4936 262.333Z" fill="#BDB6FF" fill-opacity="0.39"/>
        </svg>
    <?php endif; ?>
    <div class="banner-slide <?php if(!is_front_page()): ?>success-stories<?php endif; ?> owl-carousel">
        <?php foreach($banner as $item): $key++; ?>
            <div class="item" style="<?= $item['background']; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4 mb-md-0 text-content">
                            <div class="description" style="color:<?= $item['text_color']; ?>">
                                <?= $item['description']; ?>
                            </div>
                            <?php if($item['add_cta_link'] === true && $item['cta_link']): ?>
                                <a href="<?= $item['cta_link']['url']; ?>" class="cta" target="<?= $item['cta_link']['target']; ?>" style="color:<?= $item['text_color_cta']; ?>; background:<?= $item['background_color_cta']; ?>">
                                    <?= $item['cta_link']['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php if($item['enable_video'] === false): ?>
                                <div class="image-contain">
                                    <img src="<?= $item['main_image']['url']; ?>" alt="<?= $item['main_image']['title']; ?>" class="d-none d-md-block">
                                    <img src="<?= $item['main_image_movil']['url']; ?>" alt="<?= $item['main_image_movil']['url']; ?>" class="d-block d-md-none">
                                </div>
                            <?php else: ?>
                                <div class="video">
                                    <?= $item['video']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if(get_field('enable_video') === true): ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11 col-lg-10">
                    <div class="video">
                        <?= get_field('video'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    const bannerCount = <?= count($banner); ?>;
   console.log(bannerCount);
    $('.banner-slide').owlCarousel({
        autoplay:bannerCount > 1, 
        autoplayTimeout: 10000,
        loop: bannerCount > 1,
        nav:false,
        dots:bannerCount > 1,
        margin:0,
        items:1,
        touchDrag: bannerCount > 1,
        mouseDrag: bannerCount > 1
    }).css({'opacity':1});
</script>
<?php endif; ?>
