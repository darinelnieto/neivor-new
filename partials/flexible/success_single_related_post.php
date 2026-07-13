<?php
$script_handle = "flexible-success_single_related_post-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-success_single_related_post.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_template_part( 'partials/success-stories-single/related-post' );
