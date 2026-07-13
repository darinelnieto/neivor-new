<?php
$script_handle = "globals-new-nav-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/globals-new-nav.min.js",
    array("jquery"),
    null,
    true
);
?>

