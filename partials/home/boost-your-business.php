<?php
$script_handle = "home-boost-your-business-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/home-boost-your-business.min.js",
    array("jquery"),
    null,
    true
);
?>

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
                                <?= wp_get_attachment_image($item['feature_image']['ID'] ?? '', 'large', false, array(
                                    'class' => 'feature-image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async'
                                )); ?>
                                <div class="content" style="background: linear-gradient(180deg, rgba(191, 162, 24, 0.00) 26.56%, <?= $item['color']; ?> 91.99%);">
                                    <?= wp_get_attachment_image($item['logo']['ID'] ?? '', 'large', false, array(
                                        'class' => 'logo',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )); ?>
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
                        <?= wp_get_attachment_image($item['feature_image']['ID'] ?? '', 'large', false, array(
                            'class' => 'feature-image',
                            'loading' => 'lazy',
                            'decoding' => 'async'
                        )); ?>
                        <div class="content" style="background: linear-gradient(180deg, rgba(191, 162, 24, 0.00) 26.56%, <?= $item['color']; ?> 91.99%);">
                            <?= wp_get_attachment_image($item['logo']['ID'] ?? '', 'large', false, array(
                                'class' => 'logo',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                            )); ?>
                            <p class="comment"><?= $item['comment']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php endif; ?>
