   
<?php
/**
 * 
 * Partial Name: benefits_left_image_and_text_right
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$benefits = get_sub_field('benefits_left_image_and_text_right_group');
$left = $benefits['left'];
$right = $benefits['right'];
?>
<section class="benefits-left-image-and-text-right-partial-7219e8">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0">
                <div class="image-contain">
                    <?= wp_get_attachment_image($left['main_image'] ?? '', 'medium', false, array(
                        'class' => 'img-fluid',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    )); ?>
                    <?php if(!empty($left['label']) || !empty($left['description'])): ?>
                        <div class="overly">
                            <p class="label"><?= $left['label'] ?? ''; ?></p>
                            <p class="description"><?= $left['description'] ?? ''; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="texts">
                    <span class="overly"><?= $right['number'] ?? '99'; ?></span>
                    <p class="info"><?= $right['description'] ?? ''; ?></p>
                    <?php if(!empty($right['call_to_action'])): $cta = $right['call_to_action']; ?>
                        <a href="<?= $cta['url']; ?>" target="<?= $cta['url'] ?? '_self'; ?>" class="call-to-action">
                            <?= $cta['title'] ?? 'caso de éxito atlas desarrollos'; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    