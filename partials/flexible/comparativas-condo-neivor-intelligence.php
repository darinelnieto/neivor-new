<?php
// $script_handle = 'comparativas-condo-neivor-intelligence-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparativas-condo-neivor-intelligence.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: comparativas-condo-neivor-intelligence
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$n_intel = get_sub_field('comp_neivor_intelligence');
$top = $n_intel['top'];
$cards = $n_intel['cards'];
$end = $n_intel['end'];
?>
<section class="comparativas-condo-neivor-intelligence-partial-a7e36e">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="d-flex flex-column-reverse gap-3">
                    <?php if(!empty($top['title'])): ?>
                        <h2 class="fw-800 t-size-45"><?= $top['title']; ?></h2>
                    <?php endif; if(!empty($top['label'])): ?>
                        <span class="label d-flex gap-3 justify-content-center align-items-center w-max-content rounded-45 violeta mx-auto px-3 py-1 t-size-12 fw-700">
                            <?= $top['label'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($top['description'])): ?>
                    <p class="p-size-18 gray-color mb-0 intro"><?= $top['description']; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if(!empty($cards)): ?>
            <div class="row gap-4 gap-md-0">
                <?php foreach($cards as $item): ?>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card-item bg-white rounded-16 p-24">
                            <?php if(!empty($item['icon'])): ?>
                                <div class="head">
                                    <?= wp_get_attachment_image($item['icon'], 'large', false, array(
                                        'class' => 'icon',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )); ?>
                                </div>
                            <?php endif; ?>
                            <div class="body">
                                <?php if(!empty($item['title'])): ?>
                                    <h3 class="card-title p-size-18 fw-700 dark-color"><?= $item['title']; ?></h3>
                                <?php endif; if(!empty($item['description'])): ?>
                                    <p class="card-description t-size-14 gray-color m-0"><?= $item['description']; ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($item['text_end'])): ?>
                                <div class="footer">
                                    <p class="<?= $item['text_end_color'] ?? 'violeta' ?> m-0 t-size-12 fw-700"><?= $item['text_end']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; if(!empty($end)): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card-violeta d-flex flex-column flex-md-row  align-items-md-center gap-4 bg-violeta rounded-16 p-32-24">
                        <?= wp_get_attachment_image($end['icon'] ?? '', 'large', false, array(
                            'class' => 'icon',
                            'loading' => 'lazy',
                            'decoding' => 'async' 
                        )); ?>
                        <div class="texts">
                            <?php if(!empty($end['title'])): ?>
                                <h3 class="white-color p-size-24 fw-700 m-0"><?= $end['title']; ?></h3>
                            <?php endif; if(!empty($end['description'])): ?>
                                <p class="cl-pueple-pr p-size-16 fw-500 mb-0"><?= $end['description']; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($end['cta'])): ?>
                            <a href="<?= $end['cta']['url']; ?>" target="<?= $end['cta']['target'] ?? '_self' ?>" class="rounded-12 bg-white violeta t-size-14 fw-700 cta-white">
                                <?= $end['cta']['title'] ?? 'Probar agentes en tu condominio'; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>