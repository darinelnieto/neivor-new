<?php
$script_handle = "flexible-global_html-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-global_html.min.js",
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
$enable_html = get_sub_field('enable_html');
$html_page = get_sub_field('html_page');
if($enable_html === true):
?>
<section class="html-partial-8190bc">
    <?=$html_page; ?>
</section>
<?php endif; ?>
