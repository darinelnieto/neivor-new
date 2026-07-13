<?php
$script_handle = "home-v2-cta-banner-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/home-v2-cta-banner.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * Partial Name: cta-banner
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$cta = get_field( 'cta_banner_section' );
if ( ! $cta ) return;
$btn_url    = $cta['button']['url']    ?? '#';
$btn_title  = $cta['button']['title']  ?? 'Solicitar asesoría personalizada';
$btn_target = ! empty( $cta['button']['target'] ) ? 'target="' . esc_attr( $cta['button']['target'] ) . '"' : '';
?>
<section class="new-cta-banner-partial-home">
    <div class="container">
        <div class="cta-banner__inner">
            <?php if ( ! empty( $cta['eyebrow'] ) ) : ?>
                <p class="cta-banner__eyebrow"><?= $cta['eyebrow']; ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $cta['title'] ) ) : ?>
                <h2 class="cta-banner__title"><?= $cta['title'] ; ?></h2>
            <?php endif; ?>
            <?php if ( ! empty( $cta['subtitle'] ) ) : ?>
                <p class="cta-banner__subtitle"><?= $cta['subtitle']; ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $cta['button'] ) ) : ?>
                <a href="<?= $btn_url; ?>" <?= $btn_target; ?> class="cta-banner__btn">
                    <?= $btn_title; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
