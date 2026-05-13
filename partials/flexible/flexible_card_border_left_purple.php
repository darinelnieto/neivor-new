   
<?php
/**
 * 
 * Partial Name: flexible_card_border_left_purple
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_sub_field('flexible_card_content');
?>
<section class="flexible-card-border-left-purple-partial-fa12fe" style="background: <?= $content['background_content'] ?? '#ffffff'; ?>; padding-top: <?= $content['padding_top'] ?? 40 ?>px; padding-bottom: <?= $content['padding_bottom'] ?? 40 ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?= $content['width'] ?? 'col-12 col-md-10 col-lg-8' ?>">
                <div class="card-border-purple" style="background: <?= $content['card_background'] ?? '#ffffff'; ?>;">
                    <span class="overly-purple"><?= $content['overly_number'] ?? '99' ?></span>
                    <p class="description"><?= $content['description'] ?? ''; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>