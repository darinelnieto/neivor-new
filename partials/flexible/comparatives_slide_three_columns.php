<?php
/**
 * 
 * Partial Name: comparatives_slide_three_columns
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$c_content = get_sub_field('comparative_slide');
$c_list = $c_content['list'];
if(!empty($c_list)):
// $script_handle = 'comparatives_slide_three_columns-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparatives_slide_three_columns.min.js',
//     array('jquery'),
//     null,
//     true
// );
?>
<section class="comparatives-slide-three-columns-partial-89038a" style="background: <?= $c_content['bg_color'] ?? '#F0F2F8'; ?>; padding-top: <?= $c_content['padding_top'] ?? '80'; ?>px; padding-bottom: <?= $c_content['padding_bottom'] ?? '80'; ?>px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($c_content['title']) || !empty($c_content['description'])): ?>
                    <div class="top-content text-center">
                        <?php if(!empty($c_content['title'])): ?>
                            <h2 class="title"><?= $c_content['title']; ?></h2>
                        <?php endif; if(!empty($c_content['description'])): ?>
                            <p class="description p"><?= $c_content['description']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="comparative-slide row">
                    <?php foreach($c_list as $item): $header = $item['header_content']; $footer = $item['footer']; ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="item">
                                <div class="header_item">
                                    <?= wp_get_attachment_image($header['icon'] ?? '', 'large', false, array(
                                        'class' => 'icon-image',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )) ?>
                                    <div class="texts-content">
                                        <?php if(!empty($header['label'])): ?>
                                            <span class="label"><?= $header['label']; ?></span>
                                        <?php endif; if(!empty($header['title'])): ?>
                                            <h3 class="card-title"><?= $header['title']; ?></h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="content">
                                    <?php if(!empty($item['description'])): ?>
                                        <div class="body_item">
                                            <?= $item['description']; ?>
                                        </div>
                                    <?php endif; if(!empty($footer['subtitle']) || !empty($footer['description'])): ?>
                                        <div class="footer_item">
                                            <div class="card-footer-violeta">
                                                <?php if(!empty($footer['subtitle'])): ?>
                                                    <p class="subtitle violeta"><strong><?= $footer['subtitle']; ?></strong></p>
                                                <?php endif; if(!empty($footer['description'])): ?>
                                                    <p class="description"><?= $footer['description']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>   