<?php
// $script_handle = 'comparativas-condo-neivor-technology-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparativas-condo-neivor-technology.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: comparativas-condo-neivor-technology
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$n_tech = get_sub_field('neivor_technology');
$right = $n_tech['right'];
?>
<section class="comparativas-condo-neivor-technology-partial-b8731a bg-purple-light-solid">
    <div class="container">
        <div class="row align-items-center gap-5 gap-md-0">
            <div class="col-12 col-md-6 col-lg-7">
                <div class="d-flex flex-column-reverse gap-3">
                    <?php if(!empty($n_tech['title'])): ?>
                        <h2 class="fw-800 t-size-45"><?= $n_tech['title']; ?></h2>
                    <?php endif; if(!empty($n_tech['label'])): ?>
                        <span class="main-label d-flex gap-3 justify-content-center align-items-center w-max-content rounded-45 violeta px-3 py-1 t-size-12 fw-700">
                            <?= $n_tech['label'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($n_tech['description'])): ?>
                    <p class="p-size-18 gray-color mb-5 intro"><?= $n_tech['description']; ?></p>
                <?php endif; if(!empty($n_tech['cards'])): ?>
                    <div class="row gap-3 gap-md-0">
                        <?php foreach($n_tech['cards'] as $i): ?>
                            <div class="col-12 col-md-4 px-2">
                                <div class="card-item bg-white pt-3 pb-4 rounded-12 d-flex flex-column gap-1">
                                    <?php if(!empty($i['label'])): ?>
                                        <span class="label t-size-12 fw-700" style="color: <?= $i['label_color'] ?? '#ffffff'; ?>"><?= $i['label']; ?></span>
                                    <?php endif; if(!empty($i['title'])): ?>
                                        <p class="sub-title m-0 p-size-18 fw-700 dark-color"><?= $i['title']; ?></p>
                                    <?php endif; if(!empty($i['description'])): ?>
                                        <p class="label m-0 t-size-14 fw-400 gray-color"><?= $i['description']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($right['main_image'])): ?>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="image-contain rounded-16">
                        <?= wp_get_attachment_image($right['main_image'], 'medium', false, array(
                            'class' => 'main-image',
                            'loading' => 'lazy',
                            'decoding' => 'async'
                        )) ?>
                        <div class="texts py-4 px-3">
                            <?php if(!empty($right['label'])): ?>
                                <span class="laber-green t-size-12 fw-700"><?= $right['label']; ?></span>
                            <?php endif; if(!empty($right['subtitle'])): ?>
                                <h3 class="p-size-18 m-0 white-color fw-700"><?= $right['subtitle']; ?></h3>
                            <?php endif; if(!empty($right['info'])): ?>
                                <p class="t-size-14 cl-pueple-pr fw-400 m-0"><?= $right['info']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
                    