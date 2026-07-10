<?php
$script_handle = "flexible-markets_logos_slide-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-markets_logos_slide.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
get_template_part( 'partials/markets/logos-slide' );
