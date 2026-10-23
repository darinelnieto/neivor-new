<?php
// $script_handle = 'comparativas-condo-industrial-safety-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparativas-condo-industrial-safety.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: comparativas-condo-industrial-safety
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$i_safety = get_sub_field('industrial_safety');
$cards = $i_safety['cards_items'];
?>
<section class="comparativas-condo-industrial-safety-partial-3faf4c">
    <div class="container">
        <div class="row flex-md-row-reverse align-items-center gap-5 gap-md-0">
            <div class="col-12 col-md-7">
                <div class="d-flex flex-column-reverse gap-3 mb-4">
                    <?php if(!empty($i_safety['title'])): ?>
                        <h2 class="fw-800 t-size-45 mb-0"><?= $i_safety['title']; ?></h2>
                    <?php endif; if(!empty($i_safety['label'])): ?>
                        <span class="label d-flex gap-3 justify-content-center align-items-center w-max-content rounded-45 gray-color px-3 py-1 t-size-12 fw-700">
                            <?= $i_safety['label'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($i_safety['description'])): ?>
                    <p class="p-size-18 gray-color mb-4 intro"><?= $i_safety['description']; ?></p>
                <?php endif; if(!empty($i_safety['list'])): ?>
                    <div class="d-flex flex-column gap-4">
                        <?php foreach($i_safety['list'] as $item): ?>
                            <div class="item d-flex flex-column flex-md-row gap-4">
                                <?= wp_get_attachment_image($item['icon'] ?? '', 'large', false, array(
                                    'class' => 'icon',
                                    'loading' => 'lazy',
                                    'decoding' => 'async'
                                )); ?>
                                <div class="texts">
                                    <?php if(!empty($item['subtitle'])): ?>
                                        <h3 class="p-size-18 fw-700 dark-color mb-0"><?= $item['subtitle']; ?></h3>
                                    <?php endif; if(!empty($item['info'])): ?>
                                        <p class="t-size-14 gray-color mb-0"><?= $item['info']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($cards)): ?>
                <div class="col-12 col-md-5 d-flex flex-column gap-4">
                    <?php foreach($cards as $i): ?>
                        <div class="card-item <?= $i['card_style']; ?> p-24 rounded-16 bg-white d-flex flex-column gap-2">
                            <?php if(!empty($i['title'])): ?>
                                <p class="label-subtitle d-flex align-items-center t-size-14 fw-700 gap-2 mb-0">
                                    <?= wp_get_attachment_image($i['icon'] ?? '', 'large', false, array(
                                        'class' => 'icon',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )); ?>
                                    <span><?= $i['title']; ?></span>
                                </p>
                            <?php endif; if(!empty($i['description'])): ?>
                                <p class="p-size-16 mb-0 lh-24 <?php if($i['card_style'] === 'red'): ?>fw-500 gray-color<?php else: ?>fw-700 dark-color<?php endif; ?>"><?= $i['description']; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
                    