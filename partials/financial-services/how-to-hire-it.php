<?php
$script_handle = "financial-services-how-to-hire-it-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/financial-services-how-to-hire-it.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: how-to-hire-it
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$manual = get_field('enable_manual');
if($manual === true){
    $cta = get_field('request_advice');
    $title = get_field('how_to_hire_it_title');
    $description = get_field('how_to_hire_it_description');
}else{
    $cta = get_field('request_advice', 'option');
    $title = get_field('how_to_hire_it_title', 'option');
    $description = get_field('how_to_hire_it_description', 'option');
}
?>
<section class="how-to-hire-it-partial-117e5e">
    <div class="container">
        <div class="row">
            <div class="col-12 card-purple">
                <h2><?= $title; ?></h2>
                <p><?= $description; ?></p>
                <a href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>">
                    <span><?= $cta['title']; ?></span>
                </a>
            </div>
        </div>
    </div>
</section>
                    
