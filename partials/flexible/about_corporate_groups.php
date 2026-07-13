<?php
$script_handle = "flexible-about_corporate_groups-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-about_corporate_groups.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: corporate-groups
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$groups = get_sub_field('corporate_groups');
if($groups['logos_corporate_list']):
?>
<section class="corporate-groups-partial-d36183">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-0">
                <h2><?= $groups['title'] ?></h2>
            </div>
        </div>
        <div class="row justify-content-center logos-contain">
            <?php foreach($groups['logos_corporate_list'] as $item): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="image-contain">
                        <?= wp_get_attachment_image($item['logo']['ID'], 'large', false, array(
                            'class' => 'logo-image',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>     
