<?php
// $script_handle = 'pld_arquitectura_integral-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/pld_arquitectura_integral.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: pld_arquitectura_integral
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$a_integral = get_sub_field('arquitectura_integral');
$top = $a_integral['top_content'];
$grid = $a_integral['grid_content'];
?>
<section class="pld-arquitectura-integral-partial-f9bf0a" style="background: <?= $a_integral['background'] ?? '#F5F8FA' ?>;">
    <div class="container" id="pld-arquitectura-integral-top-content">
        <div class="row mb-5 align-items-center">
            <div class="col-12 col-md-6 col-lg-7">
                <?php if($top['label']): ?>
                    <span class="violeta p fw-500"><?= $top['label']; ?></span>
                <?php endif; if(!empty($top['title'])): ?>
                    <h2 class="t-size-30 fw-400"><?= $top['title']; ?></h2>
                <?php endif; if(!empty($top['description'])): ?>
                    <div class="description t-size-20 fw-400">
                        <?= $top['description']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($top['main_image'])): ?>
                <div class="col-12 col-md-6 col-lg-5">
                    <?= wp_get_attachment_image($top['main_image'], 'medium', false, array(
                        'class' => 'main-image',
                        'loadin' => 'lazy',
                        'decodding' => 'async',
                        'alt' => $top['title'] ?? 'Imagen principal'
                    )) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if(!empty($grid)): ?>
        <div class="container" id="pld-arquitectura-integral-grid">
            <div class="row">
                <?php foreach($grid as $item): ?>
                    <div class="col-12 col-md-6">
                        <div class="card-item">
                            <div class="head-card">
                                <?php if(!empty($item['label_tag'])): ?>
                                    <span class="label-tag <?= $item['label_style'] ?? 'dark'; ?> t-size-12 fw-900"><?= $item['label_tag'] ?></span>
                                <?php 
                                    endif; if(!empty($item['icon'])):
                                    echo wp_get_attachment_image($item['icon'], 'medium', false, array(
                                        'class' => 'icon-image',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    ));
                                    endif;
                                ?>
                            </div>
                            <div class="body-card mb-4">
                                <?php if(!empty($item['title'])): ?>
                                    <h3 class="p-size-24 fw-900 dark-color mt-2 mb-0"><?= $item['title']; ?></h3>
                                <?php endif; if(!empty($item['description'])): ?>
                                    <div class="t-size-14 fw-400 violeta-dark mb-4"><?= $item['description']; ?></div>
                                <?php endif; if(!empty($item['grid_list'])): ?>
                                    <div class="grid-card">
                                        <?php if(!empty($item['title_grid'])): ?>
                                            <h4 class="t-size-10 fw-700 violeta-dark"><?= $item['title_grid']; ?></h4>
                                        <?php endif; ?>
                                        <div class="row">
                                            <?php foreach($item['grid_list'] as $a): ?>
                                                <div class="col-12 col-sm-4 px-2 mb-3 mb-md-0">
                                                    <div class="min-card">
                                                        <?= wp_get_attachment_image($a['icon'] ?? '', 'medium', false, array(
                                                            'class' => 'icon-min-card',
                                                            'loading' => 'lazy',
                                                            'decoding' => 'async'
                                                        )); ?>
                                                        <?php if(!empty($a['name'])): ?>
                                                            <span class="dark-color t-size-12 fw-700"><?= $a['name']; ?></span>
                                                        <?php endif; if(!empty($a['value'])): ?>
                                                            <span class="t-size-10 fw-700 <?= $a['value_color'] ?? 'green'; ?>-color"><?= $a['value']; ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($item['call_to_action']['link'])): $cta = $item['call_to_action']['link']; $icon = $item['call_to_action']['icon']; ?>
                                <div class="footer-card">
                                    <a href="<?= $cta['url']; ?>" target="<?= $cta['target'] ?? '_self'; ?>" class="t-size-12 violeta fw-700">
                                        <span class="text"><?= $cta['title']; ?></span>
                                        <?= wp_get_attachment_image($icon ?? '', 'medium', false, array(
                                            'class' => 'icon-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                            'alt' => 'icono -' . $cta['title']
                                        )); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
                    