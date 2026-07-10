<?php
$script_handle = "globals-html-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/globals-html.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 *
 * Partial Name: html-partial
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$enable_html = get_field('enable_html');
$html_page = get_field('html_page');
if($enable_html === true):
?>
<section class="html-partial-8190bc">
    <?=$html_page; ?>
</section>
<?php endif; ?>
