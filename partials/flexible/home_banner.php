<?php
$script_handle = "flexible-home_banner-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-home_banner.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * Flexible Builder wrapper.
 * Layout: home_banner
 * Reusa el partial del Home template con campos del flexible.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_template_part('partials/home/banner', null, array(
    'banner' => get_sub_field('add_banner'),
    'enable_video' => get_sub_field('enable_video'),
    'video' => get_sub_field('video'),
));
