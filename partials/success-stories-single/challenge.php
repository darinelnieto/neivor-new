   
<?php
/**
 * 
 * Partial Name: challenge
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$challenge = get_sub_field('challenge_group');
if ( ! $challenge ) {
    $challenge = get_field('challenge_group');
}
?>
<section class="challenge-partial-681333">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($challenge['title']): ?>
                    <h2><?= $challenge['title']; ?></h2>
                <?php endif; ?>
            </div>
            <?php if($challenge['item_list']): foreach($challenge['item_list'] as $item): ?>
                <div class="row challenge-list">
                    <div class="col-12 col-md-1">
                        <div class="icon-contain">
                            <?= wp_get_attachment_image($item['icon']['ID'] ?? '', 'large', false, array(
                                'class' => 'full-image',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                            )); ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-11">
                        <h3><?= $item['title']; ?></h3>
                        <p><?= $item['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>