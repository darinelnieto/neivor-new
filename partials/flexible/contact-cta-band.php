<?php
// $script_handle = 'contact-cta-band-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/contact-cta-band.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: contact-cta-band
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$cta_band = get_sub_field('contact_cta_band_group');
?>
<section class="contact-cta-band-partial-f5e012">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($cta_band['title'])): ?>
                    <h2 class="title"><?= $cta_band['title'] ?></h2>
                <?php endif; if(!empty($cta_band['description'])): ?>
                    <p class="description"><?= $cta_band['description']; ?></p>
                <?php endif; if(!empty($cta_band['cta'])): $cta = $cta_band['cta']; ?>
                    <a href="<?= $cta['url']; ?>" target="<?= $cta['url'] ?? '_self'; ?>" class="cta-purple">
                        <?= $cta['title'] ?? 'Contactar a Neivor'; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    