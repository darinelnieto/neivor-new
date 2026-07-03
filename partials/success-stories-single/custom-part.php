   
<?php
/**
 * 
 * Partial Name: custom-part
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$customized_styles = get_sub_field('customized_styles');
$customized_content = get_sub_field('customized_content');
if ( ! $customized_styles ) {
    $customized_styles = get_field('customized_styles');
}
if ( ! $customized_content ) {
    $customized_content = get_field('customized_content');
}
?>
<section class="custom-part-partial-64144c">
    <?= $customized_styles; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $customized_content; ?>
            </div>
        </div>
    </div>
</section>
                    