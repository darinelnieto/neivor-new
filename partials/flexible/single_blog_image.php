   
<?php
/**
 * Partial Name: flexible/single_blog_image
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$data          = get_sub_field('single_blog_image_data');
$image         = $data['image'] ?? '';
$height        = $data['height'] ?? 500;
$width         = $data['width'] ?? 100;
$border_radius = $data['border_radius'] ?? 0;
$object_fit    = $data['object_fit'] ?? 'cover';
$padding_top   = $data['padding_top'] ?? 40;
$padding_bottom = $data['padding_bottom'] ?? 40;

$img_src = is_array($image) ? $image['url'] : wp_get_attachment_url($image);
$img_alt = is_array($image) ? ($image['alt'] ?? '') : get_post_meta($image, '_wp_attachment_image_alt', true);
?>
<section class="flexible-single-blog-image-partial-e89f4e"
    style="padding-top: <?= esc_attr($padding_top); ?>px; padding-bottom: <?= esc_attr($padding_bottom); ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <?php if ($img_src) : ?>
                    <img
                        src="<?= esc_url($img_src); ?>"
                        alt="<?= esc_attr($img_alt); ?>"
                        style="
                            display: block;
                            width: <?= esc_attr($width); ?>%;
                            height: <?= esc_attr($height); ?>px;
                            border-radius: <?= esc_attr($border_radius); ?>px;
                            object-fit: <?= esc_attr($object_fit); ?>;
                        "
                    />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    