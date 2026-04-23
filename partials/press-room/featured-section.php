   
<?php
/**
 * 
 * Partial Name: featured-section
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$highlights = get_field('the_highlights_items');
if($highlights):
?>
<section class="featured-section-partial-e657e2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= get_field('the_highlights_title'); ?></h2>
            </div>
        </div>
    </div>
    <div class="highlights-slide owl-carousel">
        <?php foreach($highlights as $item): ?>
            <div class="item">
                <div class="logo-contain">
                    <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>">
                </div>
                <div class="card-content">
                    <div class="image-contain">
                        <img src="<?= $item['feature_image']['url']; ?>" alt="<?= $item['feature_image']['title']; ?>">
                    </div>
                    <div class="text-contain">
                        <div class="description-content">
                            <h3><?= $item['title'] ?></h3>
                            <p><?= $item['description']; ?></p>
                        </div>
                        <div class="cta-contain">
                            <a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M5.95056 12.8307V12.7632C5.95056 9.82204 8.33437 7.43823 11.2755 7.43823H12.5349H16.6005" stroke="#0A2540" stroke-width="1.33124" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.95058 12.8342V17.2007" stroke="#0A2540" stroke-width="1.33124" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.938 10.1007L16.6005 7.43824L13.938 4.77576" stroke="#0A2540" stroke-width="1.33124" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>
                                    <?php if(get_bloginfo("language") == "en-US"): ?>
                                        Go to site
                                    <?php else: ?>
                                        Ir al sitio
                                    <?php endif; ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script>
    $('.highlights-slide').owlCarousel({
        autoplay:false,
        loop:true,
        margin:0,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1,
                margin:10
            },
            768:{
                items:1.3,
                center:true
            }
        }

    }).css({'opacity':1});
</script>
<?php endif; ?>        