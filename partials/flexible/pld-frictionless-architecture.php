<?php
// $script_handle = 'pld-frictionless-architecture-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/pld-frictionless-architecture.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: pld-frictionless-architecture
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$pld = get_sub_field('frictionless_architecture');
?>
<section class="pld-frictionless-architecture-partial-abbfa7" 
    style="background: <?= $pld['background'] ?? '#ffffff'; ?>; <?php if($pld['border_top'] === true): ?>border-top: 1px solid <?php echo $pld['border_color']; endif; ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 text-center">
                <?php if(!empty($pld['label'])): ?>
                    <span class="violeta fw-700 t-size-12"><?= $pld['label']; ?></span>
                <?php endif; if(!empty($pld['title'])): ?>
                    <h2 class="title fw-800"><?= $pld['title']; ?></h2>
                <?php endif; if(!empty($pld['description'])): ?>
                    <p class="p-size-18"><?= $pld['description']; ?></p>
                <?php endif; if(!empty($pld['tabs'])): ?>
                    <div class="info-tag mt-5 mb-3">
                        <?php foreach($pld['tabs'] as $i): ?>
                            <div class="item-tag <?= $i['tab_style']; ?> fw-700 t-size-14">
                                <?= wp_get_attachment_image($i['icon'] ?? '', 'medium', false, array(
                                    'class' => 'item-icon',
                                    'loading' => 'lazy',
                                    'decoding' =>'async'
                                )); ?>
                                <?= $i['text'] ?? ''; ?>
                            </div>
                            <span class="p-size-18 violeta fw-700 more-icon">+</span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; if(!empty($pld['text_after_tabs'])): ?>
                    <p class="violeta t-size-14 fw-700 mb-5"><?= $pld['text_after_tabs']; ?></p>
                <?php endif; if($pld['link']): $cta = $pld['link']; ?>
                    <a href="<?= $cta['url']; ?>" target="<?= $cta['target'] ?? '_self'; ?>" class="cta-violeta mx-auto">
                        <?= $cta['title'] ?? '' ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>