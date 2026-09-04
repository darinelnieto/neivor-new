<?php
// $script_handle = "flexible-home_v2_cta_banner-js";
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . "/js/partials-min/flexible-home_v2_cta_banner.min.js",
//     array("jquery"),
//     null,
//     true
// );
// Flexible Builder wrapper. Original: partials/home-v2/cta-banner.php

/**
 * Partial Name: cta-banner
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$cta = get_sub_field('cta_banner_section');
if ( ! $cta ) return;
$btn_url    = $cta['button']['url']    ?? '#';
$btn_title  = $cta['button']['title']  ?? 'Solicitar asesoría personalizada';
$btn_target = ! empty( $cta['button']['target'] ) ? 'target="' . esc_attr( $cta['button']['target'] ) . '"' : '';
?>
<section class="new-cta-banner-partial-home" style="background: <?= $cta['background'] ?? '#ffffff'; ?>">
    <div class="container">
        <div class="cta-banner__inner">
            <?php if ( ! empty( $cta['eyebrow'] ) ) : ?>
                <p class="cta-banner__eyebrow"><?= esc_html( $cta['eyebrow'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $cta['title'] ) ) : ?>
                <h2 class="cta-banner__title"><?= wp_kses_post( $cta['title'] ); ?></h2>
            <?php endif; ?>
            <?php if ( ! empty( $cta['subtitle'] ) ) : ?>
                <p class="cta-banner__subtitle"><?= esc_html( $cta['subtitle'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $cta['button'] ) ) : ?>
                <a href="<?= esc_url( $btn_url ); ?>" <?= $btn_target; ?> class="cta-banner__btn">
                    <?= esc_html( $btn_title ); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
