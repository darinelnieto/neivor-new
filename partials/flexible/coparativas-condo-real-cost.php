<?php
// $script_handle = 'coparativas-condo-real-cost-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/coparativas-condo-real-cost.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: coparativas-condo-real-cost
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$real_c = get_sub_field('real_cost');
if(!empty($real_c['card_list'])):
?>
<section class="coparativas-condo-real-cost-partial-7fd115 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 text-center mb-5">
                <div class="d-flex flex-column-reverse gap-3">
                    <?php if(!empty($real_c['title'])): ?>
                        <h2 class="fw-800 t-size-45"><?= $real_c['title']; ?></h2>
                    <?php endif; if(!empty($real_c['label'])): ?>
                        <span class="label d-flex gap-3 justify-content-center align-items-center w-max-content rounded-45 mx-auto violeta px-3 py-1 t-size-12 fw-700">
                            <?= $real_c['label'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($real_c['description'])): ?>
                    <p class="fw-600 h-size-20 red-color"><?= $real_c['description']; ?></p>
                <?php endif; ?>
            </div>
            <?php foreach($real_c['card_list'] as $item): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card-item bg-white">
                        <?php if(!empty($item['icon_image'])): ?>
                            <div class="head">
                                <?= wp_get_attachment_image($item['icon_image'], 'large', false, array(
                                    'class' => 'icon-image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                    'alt' => 'icono ' . $item['title']
                                )); ?>
                            </div>
                        <?php endif; ?>
                        <div class="body">
                            <?php if(!empty($item['title'])): ?>
                                <h3 class="dark-color p-size-18 fw-700 mb-3"><?= $item['title']; ?></h3>
                            <?php endif; if(!empty($item['description'])): ?>
                                <p class="p-size-15 gray-color fw-400"><?= $item['description']; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($item['end'])): ?>
                            <div class="footer">
                                <p class="red-color t-size-12 fw-700 m-0"><?= $item['end']; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>