<?php
// $script_handle = 'resuorces-texts-flexible-width-cards-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/resuorces-texts-flexible-width-cards.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: resuorces-texts-flexible-width-cards
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$r_content = get_sub_field('resuorces_texts');
$title = $r_content['title_content'];

?>
<section class="resuorces-texts-flexible-width-cards-partial-ae2cc2" style="padding: <?= $r_content['padding'] ?? '5rem 0'; ?>; background: <?= $r_content['background'] ?? '#ffffff'; ?>">
    <div class="container">
        <div class="row">
            <?php if(!empty($title['title'])): ?>
                <div class="col-12 d-flex align-items-center gap-3 mb-3 title-content">
                    <?= wp_get_attachment_image($title['icon'] ?? '', 'medium', false, array(
                        'class' => 'icon-title',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    )); ?>
                    <h2 class="h-size-20 fw-600 dark-color mb-0"><?= $title['title']; ?></h2>
                </div>
            <?php endif; if(!empty($r_content['text'])): ?>
                <div class="col-12 fw-400 p-size-16 t-sm-size-14 violeta-dark">
                    <?= $r_content['text']; ?>
                </div>
            <?php endif; ?> 
        </div>
        <div class="row">
            <?php if($r_content['grid']): foreach($r_content['grid'] as $item): ?>
                <div class="col-12 col-md-6 mb-4">
                    <div class="item-card d-flex gap-2 gap-md-3 aling-items-start bg-purple-light-2">
                        <?= wp_get_attachment_image($item['icon'] ?? '', 'medium', false, array(
                            'class' => 'icon-item',
                            'loading' => 'lazy',
                            'decoding' => 'async'
                        )); ?>
                        <div class="t-size-14 fw-400 purple-light">
                            <?= $item['description'] ?? ''; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; if(!empty($r_content['columns'])): foreach( $r_content['columns'] as $item): ?>
                <div class="col-12 mb-3">
                    <div class="item-card bg-purple-light-solid d-flex gap-2 gap-md-3">
                        <span class="icon bg-violeta"></span>
                        <div class="t-size-14 fw-400 purple-light">
                            <?= $item['item']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
                    