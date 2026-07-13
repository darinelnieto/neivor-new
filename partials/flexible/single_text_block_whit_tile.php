<?php
$script_handle = "flexible-single_text_block_whit_tile-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-single_text_block_whit_tile.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: single_text_block_whit_tile
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$texts = get_sub_field('text_block_whith_titlle');
?>
<section class="single-text-block-whit-tile-partial-80110f" style="padding-top: <?= $texts['padding_top'] ?? 40; ?>px; padding-bottom: <?= $texts['padding_bottom'] ?? 40; ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?= $texts['width'] ?? 'col-12 col-md-10 col-lg-8' ?>">
                <h<?= $texts['headding_type'] ?? 2; ?> class="title"><?= $texts['title'] ?? ''; ?></h<?= $texts['headding_type'] ?? 2; ?>>
                <div class="intro-text">
                    <?= $texts['description']; ?>
                </div>
            </div>
        </div>
    </div>
</section>