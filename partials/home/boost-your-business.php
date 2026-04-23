   
<?php
/**
 * 
 * Partial Name: boost-your-business
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$boost = get_field('boost_your_business_fields_group');
if($boost):
?>
<section class="boost-your-business-partial-ca6162">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-and-intro">
                    <h2><?= $boost['title']; ?></h2>
                    <p><?= $boost['intro']; ?></p>
                </div>
                <?php if($boost['cards']): ?>
                    <div class="boost-slide owl-carousel d-none d-md-block">
                        <?php foreach($boost['cards'] as $item): ?>
                            <div class="card-item" style="height: 300px;">
                                <img src="<?= $item['feature_image']['url']; ?>" alt="<?= $item['feature_image']['title']; ?>" class="feature-image">
                                <div class="content" style="background: linear-gradient(180deg, rgba(191, 162, 24, 0.00) 26.56%, <?= $item['color']; ?> 91.99%);">
                                    <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>" class="logo">
                                    <p class="comment"><?= $item['comment']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if($boost['cards']): ?>
        <div class="the-slide-movil d-block d-md-none">
            <div class="boost-slide owl-carousel">
                <?php foreach($boost['cards'] as $item): ?>
                    <div class="card-item" style="height: 300px;">
                        <img src="<?= $item['feature_image']['url']; ?>" alt="<?= $item['feature_image']['title']; ?>" class="feature-image">
                        <div class="content" style="background: linear-gradient(180deg, rgba(191, 162, 24, 0.00) 26.56%, <?= $item['color']; ?> 91.99%);">
                            <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>" class="logo">
                            <p class="comment"><?= $item['comment']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    $('.boost-slide').owlCarousel({
        autoplay:false,
        loop:true,
        nav:false,touchDrag: true,
        mouseDrag: true,
        responsive:{
            0:{
                items:1.1,
                center:true,
                autoplay:true,
                margin:10,
            },
            640:{
                items:2,
                autoplay:true,
                margin:40,
            },
            991:{
                items:3,
                margin:80
            }
        }
    }).css({'opacity':1});
</script>
<?php endif; ?>
