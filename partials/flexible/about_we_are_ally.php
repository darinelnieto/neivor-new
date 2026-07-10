<?php
$script_handle = "flexible-about_we_are_ally-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-about_we_are_ally.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: we-are-the-ally
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$allies = get_sub_field('we_are_allies');
if($allies['allies_list']):
?>
<section class="we-are-the-ally-partial-b5ee70">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <p class="description"><?= $allies['description']; ?></p>
                <div class="allies-contain">
                    <?php foreach($allies['allies_list'] as $item): ?>
                        <div class="ally">
                            <div class="logo">
                                <?= wp_get_attachment_image($item['logo']['ID'], 'large', false, array(
                                    'class' => 'logo',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )); ?>
                            </div>
                            <div class="description-contain">
                                <p><?= $item['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>              