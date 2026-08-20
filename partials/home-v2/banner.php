<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('add_banner');
$show_breadcrumbs = ! empty($banner['show_breadcrumbs']);
?>
<section class="new-banner-partial-4607af">
    <div class="container">
        <div class="row">
            <!-- Hero Texts -->
            <div class="col-12 col-md-6">
                <?php if($show_breadcrumbs && function_exists('sajo_render_banner_breadcrumbs')): ?>
                    <?php sajo_render_banner_breadcrumbs(); ?>
                <?php endif; ?>
                <h1 class="title"><?= $banner['title'] ?? 'Neivor'; ?></h1>
                <?php if($banner['enable_call_to_action'] == true): $cta = $banner['call_to_action']; ?>
                    <a href="<?= $cta['link']['url'] ?? '#'; ?>" target="<?= $cta['link']['target'] ?? '_self' ?>" class="call-to-action">
                        <?= wp_get_attachment_image($cta['cta_image'], 'medium', false, array(
                            'class' => 'cta-image',
                            'fetchpriority' => 'high',
                            'loading' => 'eager',
                        )); ?>
                    </a>
                <?php endif; if(!empty($banner['statistics'])): ?>
                    <div class="statistics d-none d-md-flex">
                        <?php foreach($banner['statistics'] as $stat): ?>
                            <div class="stat">
                                <p class="label"><?= $stat['value'] ?? ''; ?></p>
                                <p><?= $stat['name'] ?? ''; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <p class="description d-none d-md-block"><?= $banner['description'] ?? ''; ?></p>
                <?php if($banner['embeed_form'] === true): ?>
                    <div class="form-content">
                        <?= $banner['hs_form']; ?>
                    </div>
                <?php else:
                    $form = $banner['hs_form_new'];
                    $form_dom_id = wp_unique_id('home-v2-form-');
                    $form_endpoint = rest_url('neivor/v1/hubspot-form/' . rawurlencode($form['portalid'] ?? '') . '/' . rawurlencode($form['formid'] ?? '') . '?region=' . rawurlencode($form['region'] ?? 'na1'));
                    $submit_endpoint = rest_url('neivor/v1/hubspot-subscribe');
                    $script_handle = "home-v2-banner-js";
                    wp_enqueue_script(
                        $script_handle,
                        get_template_directory_uri() . "/js/partials-min/home-v2-banner.min.js",
                        array(),
                        null,
                        true
                    );
                ?>
                    <div
                        id="<?= esc_attr($form_dom_id); ?>"
                        class="form-new"
                        data-form-endpoint="<?= esc_url($form_endpoint); ?>"
                        data-submit-endpoint="<?= $submit_endpoint; ?>"
                        data-portal-id="<?= $form['portalid'] ?? ''; ?>"
                        data-form-id="<?= $form['formid'] ?? ''; ?>"
                        data-region="<?= $form['region'] ?? 'na1'; ?>"
                        data-submit-label="<?= $form['text_buttom_submit'] ?? 'Enviar'; ?>"
                        data-submit-script="<?= esc_attr($form['submit_scripts'] ?? ''); ?>"
                    ></div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6">
                <div class="image-contain">
                    <?php if(empty($banner['enable_video'])): ?>
                        <?= wp_get_attachment_image($banner['main_image'], 'full', false, array(
                            'class' => 'hero-image',
                            'fetchpriority' => 'high',
                            'loading' => 'eager',
                        )) ?? ''; ?>
                    <?php else: ?>
                        <video id="customVideo" autoplay muted loop playsinline preload="metadata" fetchpriority="high" poster="<?= wp_get_attachment_image_url($banner['main_image'] ?? null, 'full') ?: ''; ?>" style="width: 100%; height: auto; object-fit: cover;">
                            <source src="<?= $banner['video']; ?>" type="video/mp4">
                            Tu navegador no soporta video HTML5.
                        </video>
                    <?php endif; if(!empty($banner['overly_image'])): $overly = $banner['overly_image']; ?>
                        <div class="overly">
                            <div class="desktop-content d-none d-md-flex">
                                <div class="content">
                                    <div class="icon">
                                        <?= wp_get_attachment_image($overly['icon'], 'full', false, array(
                                            'class' => 'overly-icon',
                                            'fetchpriority' => 'high',
                                            'loading' => 'eager'
                                        )) ?? ''; ?>
                                    </div>
                                    <div class="texts">
                                        <p class="label"><?= $overly['subtitle'] ?? ''; ?></p>
                                        <p><?= $overly['description'] ?? ''; ?></p>
                                    </div>
                                </div>
                                <span class="porcent-bar">
                                    <span class="progress" style="width: <?= $overly['percent_bar'] ?? '0'; ?>%"></span>
                                </span>
                            </div>
                            <p class="description d-block d-md-none"><?= $banner['description'] ?? ''; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 d-flex d-md-none mt-5 pt-5 pb-5" style="background: #F5F0F7;">
                <?php if(!empty($banner['statistics_movil'])): ?>
                    <div class="statistics">
                        <?php foreach($banner['statistics_movil'] as $stat): ?>
                            <div class="stat">
                                <h3><?= $stat['value'] ?? ''; ?></h3>
                                <p><?= $stat['name'] ?? ''; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>