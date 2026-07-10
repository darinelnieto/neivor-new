<?php
$script_handle = "home-v2-biased-section-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/home-v2-biased-section.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: biased-section
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$biased = get_field('biased_content');
if($biased):
?>
<section class="new-biased-section-partial-95d4ad">
    <div class="container">
        <div class="row">
            <div class="col-12 content">
                <?= $biased; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>