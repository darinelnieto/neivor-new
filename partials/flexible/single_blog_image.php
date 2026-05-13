   
<?php
/**
 * Partial Name: flexible/single_blog_image
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$data          = get_sub_field('single_blog_image_data');
$image         = $data['image'] ?? '';
$padding_top   = $data['padding_top'] ?? 40;
$padding_bottom = $data['padding_bottom'] ?? 40;


?>
<section class="flexible-single-blog-image-partial-e89f4e"
    style="padding-top: <?= $padding_top; ?>px; padding-bottom: <?= $padding_bottom; ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <?= wp_get_attachment_image($image['ID'], 'lareg', false, array(
                    'class' => 'img-fluid',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                )); ?>
            </div>
        </div>
    </div>
</section>
                    