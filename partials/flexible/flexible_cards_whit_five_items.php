   
<?php
/**
 * 
 * Partial Name: flexible_cards_whit_five_items
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_sub_field('row_cards_flexible_columns');
if(!empty($content['tarjetas'])):
?>
<section class="flexible-cards-whit-five-items-partial-2d40e4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $content['title'] ?? ''; ?></h2>
                <p class="section-desc"><?= $content['description'] ?? ''; ?></p>
            </div>
            <?php foreach($content['tarjetas'] as $card): ?>
                <div class="col-12 col-md-6 col-lg-<?= $card['grid_size'] ?? '4'; ?> mb-4">
                    <?php if($card['card_style'] === 'dark'): $item = $card['card_dark']; ?>
                        <div class="card-item card-dark">
                            <?= wp_get_attachment_image($item['image'], 'large', false, array(
                                'class' => 'card-image',
                                'loading' => 'lazy',
                                'decoding' => 'async',
                            )); ?>
                            <div class="texts">
                                <h3><?= $item['title'] ?? ''; ?></h3>
                                <p class="description"><?= $item['description'] ?? ''; ?></p>
                            </div>
                        </div>
                    <?php else: $item = $card['card_light']; ?>
                        <div class="card-item card-light">
                            <?= wp_get_attachment_image($item['main_image'], 'large', false, array(
                                'class' => 'card-image',
                                'loading' => 'lazy',
                                'decoding' => 'async',
                            )); ?>
                            <div class="texts">
                                <div class="text-top">
                                    <?= wp_get_attachment_image($item['icon'], 'large', false, array(
                                        'class' => 'icon',
                                        'loading' => 'lazy',
                                        'decoding' => 'async',
                                    )); ?>
                                    <div class="card-label">
                                        <span class="label"><?= $item['label'] ?? ''; ?></span>
                                        <h3><?= $item['title'] ?? ''; ?></h3>
                                    </div>
                                </div>
                                <div class="text-bottom">
                                    <p class="description"><?= $item['description'] ?? ''; ?></p>
                                    <span class="porcent-bar">
                                        <span class="progress" style="width: <?= $item['porcentaje'] ?? '0'; ?>%"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>