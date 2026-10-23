<?php
// $script_handle = 'comparativas-condo-critical-success-factor-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparativas-condo-critical-success-factor.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: comparativas-condo-critical-success-factor
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$csf = get_sub_field('critical_success_factor');
$c_left = $csf['left_card'];
$c_right = $csf['right_card'];
?>
<section class="comparativas-condo-critical-success-factor-partial-9133ad">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex flex-column-reverse gap-3">
                    <?php if(!empty($csf['title'])): ?>
                        <h2 class="fw-800 t-size-45"><?= $csf['title']; ?></h2>
                    <?php endif; if(!empty($csf['label'])): ?>
                        <span class="label d-flex gap-3 justify-content-center align-items-center w-max-content rounded-45 violeta px-3 py-1 t-size-12 fw-700">
                            <?= $csf['label'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($csf['description'])): ?>
                    <p class="p-size-18 gray-color mb-0"><?= $csf['description']; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if(!empty($csf['values_list'])): ?>
            <div class="row values mb-3 mb-md-5">
                <?php foreach($csf['values_list'] as $i): ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 value-item">
                        <div class="card-item bg-white rounded-16">
                            <?php if(!empty($i['title'])): ?>
                                <h3 class="t-size-32 <?= $i['title_color']; ?> fw-800"><?= $i['title'] ?></h3>
                            <?php endif; if(!empty($i['subtitle'])): ?>
                                <p class="sub-title <?= $i['subtitle_color'] ?> d-flex align-items-center gap-2 fw-700 t-size-14">
                                    <?= wp_get_attachment_image($i['icon_subtitle'] ?? '', 'large', false, array(
                                        'class' => 'icon',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )) ?>
                                    <span><?= $i['subtitle']; ?></span>
                                </p>
                            <?php endif; if(!empty($i['description'])): ?>
                                <p class="description t-size-14 fw-400 gray-color"><?= $i['description']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center gap-4 gap-md-0">
            <?php if(!empty($c_left)): ?>
                <div class="col-12 col-md-6">
                    <div class="large-card left bg-white rounded-16">
                        <?php if(!empty($c_left['head'])): $head = $c_left['head']; ?>
                            <div class="head d-flex flex-column flex-md-row gap-3 gap-md-0 align-items-md-center justify-content-between">
                                <?php if(!empty($head['label'])): ?>
                                    <span class="label px-3 rounded-45 bg-pueple-pr t-size-12 fw-700 py-1 w-max-content"><?= $head['label']; ?></span>
                                <?php endif; if(!empty($head['text'])): ?>
                                    <p class="text-md-end m-0 green-color p-size-18 fw-800"><?= $head['text']; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; if(!empty($c_left['body'])): $body = $c_left['body']; ?>
                            <div class="body">
                                <?php if(!empty($body['title'])): ?>
                                    <h3 class="mb-2 p-size-24 dark-color fw-700"><?= $body['title']; ?></h3>
                                <?php endif; if(!empty($body['description'])): ?>
                                    <p class="fw-500 gray-color p-size-16"><?= $body['description']; ?></p>
                                <?php endif; if(!empty($body['mini_card'])): ?>
                                    <div class="row justify-content-between bg-purple-light-solid rounded-8 py-4 px-1 mt-4 gap-3 gap-md-0">
                                        <?php foreach($body['mini_card'] as $i): ?>
                                            <div class="col-12 col-md-4">
                                                <div class="min-card bg-white text-center py-3 px-2 rounded-8 ">
                                                    <?= wp_get_attachment_image($i['icon'] ?? '', 'large', false, array(
                                                        'class' => 'icon',
                                                        'loadin' => 'lazy',
                                                        'decoding' => 'async'
                                                    )); ?>
                                                    <?php if(!empty($i['description'])): ?>
                                                        <p class="gray-color t-size-14 pt-3 m-0"> <?= $i['description']; ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; if(!empty($c_left['footer'])): $footer = $c_left['footer']; ?>
                            <div class="footer d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-4 pt-3">
                                <?php if(!empty($footer['t_left'])): ?>
                                    <span class="t-size-14 gray-color fw-400"><?= $footer['t_left']; ?></span>
                                <?php endif; if(!empty($footer['t_right'])): ?>
                                    <span class="t-size-14 violeta fw-700"><?= $footer['t_right']; ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; if(!empty($c_right)): ?>
                <div class="col-12 col-md-6">
                    <div class="large-card right bg-white rounded-16">
                        <?php if(!empty($c_right['head'])): $head = $c_right['head']; ?>
                            <div class="head d-flex flex-column flex-md-row gap-3 gap-md-0 align-items-md-center justify-content-between">
                                <?php if(!empty($head['label'])): ?>
                                    <span class="label px-3 rounded-45 bg-pueple-pr t-size-12 fw-700 py-1 w-max-content"><?= $head['label']; ?></span>
                                <?php endif; if(!empty($head['text'])): ?>
                                    <p class="text-md-end m-0 violeta p-size-18 fw-800"><?= $head['text']; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; if(!empty($c_right['body'])): $body = $c_right['body']; ?>
                            <div class="body">
                                <?php if(!empty($body['title'])): ?>
                                    <h3 class="mb-2 p-size-24 dark-color fw-700"><?= $body['title']; ?></h3>
                                <?php endif; if(!empty($body['description'])): ?>
                                    <p class="fw-500 gray-color p-size-16"><?= $body['description']; ?></p>
                                <?php endif; if(!empty($body['mini_card'])): $key = 0; ?>
                                    <div class="row gap-2">
                                        <?php foreach($body['mini_card'] as $i): $key++; ?>
                                            <div class="col-12">
                                                <div class="sec-min-card d-flex flex-column flex-md-row align-items-md-center bg-purple-light-solid">
                                                    <span class="count bg-violeta rounded-8 white-color fw-800"><?= $key; ?></span>
                                                    <?php if(!empty($i['description'])): ?>
                                                        <p class="dark-color fw-700 t-size-14 m-0"> <?= $i['description']; ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; if(!empty($c_right['footer'])): $footer = $c_right['footer']; ?>
                            <div class="footer d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3 pt-3">
                                <?php if(!empty($footer['t_left'])): ?>
                                    <span class="t-size-14 gray-color fw-400"><?= $footer['t_left']; ?></span>
                                <?php endif; if(!empty($footer['t_right'])): ?>
                                    <span class="t-size-14 violeta fw-700"><?= $footer['t_right']; ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
                    