   
<?php
/**
 * Partial Name: flexible/single_blog_text_content
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$data           = get_sub_field('single_blog_text_content_data');
$intro_text     = $data['intro_text'] ?? '';
$padding_top     = $data['padding_top'] ?? 40;
$padding_bottom  = $data['padding_bottom'] ?? 40;
?>
<section class="flexible-single-blog-text-content-partial-f223d3"
    style="padding-top: <?= $padding_top; ?>px; padding-bottom: <?= $padding_bottom; ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <?php if (!empty($intro_text)): ?>
                    <div class="intro-text" style="font-size: <?= $intro_font_size; ?>px;">
                        <?= $intro_text; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    