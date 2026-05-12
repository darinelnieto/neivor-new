   
<?php
/**
 * Partial Name: flexible/single_blog_text_content
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$data           = get_sub_field('single_blog_text_content_data');
$intro_text     = $data['intro_text'] ?? '';
$body_text      = $data['body_text'] ?? '';
$intro_font_size = $data['intro_font_size'] ?? 32;
$body_font_size  = $data['body_font_size'] ?? 16;
$padding_top     = $data['padding_top'] ?? 40;
$padding_bottom  = $data['padding_bottom'] ?? 40;
?>
<section class="flexible-single-blog-text-content-partial-f223d3"
    style="padding-top: <?= esc_attr($padding_top); ?>px; padding-bottom: <?= esc_attr($padding_bottom); ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <?php if ($intro_text) : ?>
                    <div class="intro-text" style="font-size: <?= esc_attr($intro_font_size); ?>px;">
                        <?= wp_kses_post($intro_text); ?>
                    </div>
                <?php endif; ?>
                <?php if ($body_text) : ?>
                    <div class="body-text" style="font-size: <?= esc_attr($body_font_size); ?>px;">
                        <?= wp_kses_post($body_text); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    