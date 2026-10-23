<?php
// $script_handle = 'comparativas-condo-real-investment-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparativas-condo-real-investment.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: comparativas-condo-real-investment
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$real_i = get_sub_field('real_investment');
?>
<section class="comparativas-condo-real-investment-partial-fa832e" style="background: <?= $real_i['bg_section'] ?? '#FDF8FF'; ?>">
    <div class="container">
        <div class="row gap-5">
            <div class="col-12 text-center">
                <div class="d-flex flex-column-reverse gap-3">
                    <?php if(!empty($real_i['title'])): ?>
                        <h2 class="fw-800 t-size-45"><?= $real_i['title']; ?></h2>
                    <?php endif; if(!empty($real_i['label'])): ?>
                        <span class="label d-flex gap-3 justify-content-center align-items-center w-max-content rounded-45 violeta mx-auto px-3 py-1 t-size-12 fw-700">
                            <?= $real_i['label'] ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($real_i['description'])): ?>
                    <p class="p-size-18 gray-color mb-0 intro"><?= $real_i['description']; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-12">
                <?= $real_i['table'] ?? ''; ?>
            </div>
        </div>
    </div>
</section>