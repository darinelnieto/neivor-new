   
<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('banner');
if($banner):
?>
<section class="banner-partial-39c12f">
    <div class="container" id="svg-fixed">
        <div class="row">
            <div class="col-12">
                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="64" height="64" rx="32" fill="#7D65FE" fill-opacity="0.1"/>
                    <rect x="7.64508" y="7.64502" width="48.7101" height="48.7101" rx="24.3551" fill="#7D65FE" fill-opacity="0.5"/>
                    <rect x="15.2901" y="15.29" width="33.4202" height="33.4202" rx="16.7101" fill="#7D65FE"/>
                    <path d="M32.001 24.5496C28.5481 24.5496 25.7471 27.329 25.7471 30.7554V39.4505H38.2533V30.7554C38.2533 27.329 35.4523 24.5496 32.001 24.5496ZM34.4744 33.3795C33.5157 33.3795 32.7392 32.6089 32.7392 31.6576C32.7392 30.7062 33.5157 29.9357 34.4744 29.9357C35.4331 29.9357 36.2097 30.7062 36.2097 31.6576C36.2097 32.6089 35.4331 33.3795 34.4744 33.3795Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="banner-slide owl-carousel">
        <?php foreach($banner as $item): ?>
            <div class="item">
                <img src="<?= $item['image_desktop']['url']; ?>" alt="<?= $item['image_desktop']['title']; ?>" class="desktop">
                <img src="<?= $item['image_movil']['url']; ?>" alt="<?= $item['image_movil']['title']; ?>" class="movil">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="text-contain">
                                <h2><?= $item['title']; ?></h2>
                                <p><?= $item['description']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script>
    $('.banner-slide').owlCarousel({
        autoplay:true,
        loop:true,
        nav:false,
        dots:true,
        margin:0,
        items:1
    }).css({'opacity':1});
</script>
<?php endif; ?>                 