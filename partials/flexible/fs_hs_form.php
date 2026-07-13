<?php
$script_handle = "flexible-fs_hs_form-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-fs_hs_form.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
get_template_part( 'partials/financial-services/hs-form' );
