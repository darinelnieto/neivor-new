   
<?php
/**
 * 
 * Partial Name: generic-banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$background = get_field('background_gradient');
$background_desktop = get_field('desktop_background');
$background_movil = get_field('movil_background');
$validate_background = get_field('enable_background_image');
$desktop_image = get_field('desktop_size_main_image');
$movil_image = get_field('movil_size_main_image');
$cta = get_field('cta_link');
$enable_hsform = get_field('enable_form_hs');
$hsform = get_field('script_form');
$enable_image_form_hs_ = get_field('enable_hs_form_image');
$hs_form_image2 = get_field('hs_form_image');
$enable_move_image_to_right_place_hs_ = get_field('enable_move_image_to_right_place_hs');

if(get_field('custom_style_image_desktop') === true):
?>
<style>
    .generic-banner-partial-ec8c2e .img-desktop{
        max-width:<?= get_field('max_width_desktop'); ?> !important;
        margin:<?= get_field('margin_desktop'); ?> !important;
    }
	html {
  scroll-behavior: smooth;
}
</style>
<?php 
    endif; 
    if(get_field('custom_style_image_movil') === true):
?>
<style>
    .generic-banner-partial-ec8c2e .img-movil{
        max-width:<?= get_field('max_width_movil'); ?> !important;
        margin:<?= get_field('margin_movil'); ?> !important;
    }
</style>
<?php endif; ?>
<section class="generic-banner-partial-ec8c2e" <?php if($validate_background === false): ?>style="<?= $background; ?>"<?php endif; ?>>
    <div class="banner">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg" width="61" height="263" viewBox="0 0 61 263" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.04487 10.0897C7.83108 10.0897 10.0897 7.83108 10.0897 5.04487C10.0897 2.25867 7.83108 0 5.04487 0C2.25867 0 0 2.25867 0 5.04487C0 7.83108 2.25867 10.0897 5.04487 10.0897ZM5.04487 60.5385C7.83108 60.5385 10.0897 58.2798 10.0897 55.4936C10.0897 52.7074 7.83108 50.4487 5.04487 50.4487C2.25867 50.4487 0 52.7074 0 55.4936C0 58.2798 2.25867 60.5385 5.04487 60.5385ZM10.0897 105.942C10.0897 108.729 7.83108 110.987 5.04487 110.987C2.25867 110.987 0 108.729 0 105.942C0 103.156 2.25867 100.897 5.04487 100.897C7.83108 100.897 10.0897 103.156 10.0897 105.942ZM5.04487 161.436C7.83108 161.436 10.0897 159.177 10.0897 156.391C10.0897 153.605 7.83108 151.346 5.04487 151.346C2.25867 151.346 0 153.605 0 156.391C0 159.177 2.25867 161.436 5.04487 161.436ZM10.0897 206.84C10.0897 209.626 7.83108 211.885 5.04487 211.885C2.25867 211.885 0 209.626 0 206.84C0 204.054 2.25867 201.795 5.04487 201.795C7.83108 201.795 10.0897 204.054 10.0897 206.84ZM5.04487 262.333C7.83108 262.333 10.0897 260.075 10.0897 257.288C10.0897 254.502 7.83108 252.244 5.04487 252.244C2.25867 252.244 0 254.502 0 257.288C0 260.075 2.25867 262.333 5.04487 262.333ZM60.5385 5.04487C60.5385 7.83108 58.2798 10.0897 55.4936 10.0897C52.7074 10.0897 50.4487 7.83108 50.4487 5.04487C50.4487 2.25867 52.7074 0 55.4936 0C58.2798 0 60.5385 2.25867 60.5385 5.04487ZM55.4936 60.5385C58.2798 60.5385 60.5385 58.2798 60.5385 55.4936C60.5385 52.7074 58.2798 50.4487 55.4936 50.4487C52.7074 50.4487 50.4487 52.7074 50.4487 55.4936C50.4487 58.2798 52.7074 60.5385 55.4936 60.5385ZM60.5385 105.942C60.5385 108.729 58.2798 110.987 55.4936 110.987C52.7074 110.987 50.4487 108.729 50.4487 105.942C50.4487 103.156 52.7074 100.897 55.4936 100.897C58.2798 100.897 60.5385 103.156 60.5385 105.942ZM55.4936 161.436C58.2798 161.436 60.5385 159.177 60.5385 156.391C60.5385 153.605 58.2798 151.346 55.4936 151.346C52.7074 151.346 50.4487 153.605 50.4487 156.391C50.4487 159.177 52.7074 161.436 55.4936 161.436ZM60.5385 206.84C60.5385 209.626 58.2798 211.885 55.4936 211.885C52.7074 211.885 50.4487 209.626 50.4487 206.84C50.4487 204.054 52.7074 201.795 55.4936 201.795C58.2798 201.795 60.5385 204.054 60.5385 206.84ZM55.4936 262.333C58.2798 262.333 60.5385 260.075 60.5385 257.288C60.5385 254.502 58.2798 252.244 55.4936 252.244C52.7074 252.244 50.4487 254.502 50.4487 257.288C50.4487 260.075 52.7074 262.333 55.4936 262.333Z" fill="#BDB6FF" fill-opacity="0.39"/>
        </svg>
        <?php if($validate_background === true): ?>
            <img src="<?= $background_desktop['url']; ?>" alt="<?= $background_desktop['title']; ?>" class="background-desktop">
            <img src="<?= $background_movil['url']; ?>" alt="<?= $background_movil['url']; ?>" class="background-movil">
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0 text-content">
                    <h1 class="title" style="color:<?= get_field('text_color'); ?><?php if(get_field('enable_font_size_by_title') === true): ?>; font-size:<?= get_field('font_size_title'); ?><?php endif; ?>"><?= get_field('main_text'); ?></h1>
                    <div class="description" style="margin-bottom: 30px; color:<?= get_field('text_color'); ?>">
                        <?= get_field('complement_text'); ?>
                    </div>
                    <?php if(get_field('add_cta_link') === true && $cta): ?>
                        <a href="<?= $cta['url']; ?>" class="d-none d-md-flex cta" target="<?= $cta['target']; ?>" style="color:<?= get_field('text_color_cta'); ?>; background:<?= get_field('background_cta'); ?>">
                            <span><?= $cta['title']; ?></span>
                        </a>
                    <?php 
                        endif;
                        if(get_field('add_text_after_the_cta')):
                    ?>
                        <div class="text-after-cta d-none d-md-block" style="color:<?= get_field('complement_text_color_movil'); ?>">
                            <p><?= get_field('text_after_the_cta'); ?></p>
                        </div>
                    <?php endif; ?>


    <?php if($enable_hsform === true):?>
	        <div id="hsform" class="row">
	            <div class="col-12 col-md-12">
	                <?= $hsform; ?>
	            </div>
	        </div>
     <?php endif; ?>

			
                </div>
                <div class="col-12 col-md-6 image-contain">
                    <?php if(get_field('enable_video') === false): ?>
                        <div class="image-contain">
                            <img src="<?= $desktop_image['url']; ?>" alt="<?= $desktop_image['title']; ?>" class="d-none d-md-block img-desktop">
                            <img src="<?= $movil_image['url']; ?>" alt="<?= $movil_image['url']; ?>" class="d-block d-md-none img-movil">
                        </div>
                    <?php else: ?>
                        <div class="video">
                            <?= get_field('video_url'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="text-content d-block d-md-none">
                        <?php if(get_field('add_cta_link') === true && $cta): ?>
                            <a href="<?= $cta['url']; ?>" class="cta d-flex d-md-none" target="<?= $cta['target']; ?>" style="color:<?= get_field('text_color_cta'); ?>; background:<?= get_field('background_cta'); ?>">
                                <?= $cta['title']; ?>
                            </a>
                        <?php 
                            endif;
                            if(get_field('add_text_after_the_cta')):
                        ?>
                            <div class="text-after-cta" style="color:<?= get_field('complement_text_color_movil'); ?>">
                                <p><?= get_field('text_after_the_cta'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



	 
    
	 
	
    <?php
        $nav = get_field('nav');
        if(get_field('add_nav') && $nav):
            $styles = get_field('enable_styles');
    ?>
    <div class="nav-contain" <?php if($styles === true): ?>style="background:red;"<?php endif; ?>>
        <div class="container p-0">
            <ul class="row">
                <?php foreach($nav as $item): ?>
                    <li class="col-12 col-md-6 col-lg-3">
                        <a href="<?= $item['cta_link']['url']; ?>">
                            <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>" class="icon normal">
                            <img src="<?= $item['icon_hover']['url']; ?>" alt="<?= $item['icon_hover']['title']; ?>" class="icon hover">
                            <span><?= $item['cta_link']['title']; ?></span>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.43686 12.4428L11.4549 9.42478L8.43686 6.40674" stroke="#637281" stroke-width="1.6462" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <script>
        $(()=>{
            var cambio = false;
            $('.nav-contain  ul li a').each(function(index) {
                if(this.href.trim() == window.location){
                    $(this).addClass("active");
                    cambio = true;
                }
            });
        });
    </script>
    <?php endif; if(get_field('enable_video_after_banner') === true): ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11 col-lg-10 mb-5">
                    <div class="video">
                        <?= get_field('video'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
                    
