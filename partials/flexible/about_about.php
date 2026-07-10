<?php
$script_handle = "flexible-about_about-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-about_about.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: about
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$about = get_sub_field('about');
if($about['title'] && $about['description']):
?>
<section class="about-partial-c4b5c3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="texts-contain">
                    <h2><?= $about['title']; ?></h2>
                    <p><?= $about['description']; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="image-contain">
                    <?= wp_get_attachment_image($about['image']['ID'], 'large', false, array(
                        'class' => 'about-image',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>     
