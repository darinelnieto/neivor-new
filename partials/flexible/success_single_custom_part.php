<?php
$script_handle = "flexible-success_single_custom_part-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-success_single_custom_part.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( get_sub_field( 'enable_custom_partial' ) ) {
    get_template_part( 'partials/success-stories-single/custom-part' );
}
