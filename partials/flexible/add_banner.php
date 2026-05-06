<?php
/**
 * Partial Name: add_banner (Flexible Builder)
 * Layout: add_banner
 * Usar dentro del loop de flexible_content 'page_sections'
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
$banner = get_sub_field('add_banner');
if ( ! $banner ) return;
?>
<section class="new-banner-partial-4607af">
    <div class="container">
        <div class="row">
            <!-- Hero Texts -->
            <div class="col-12 col-md-6">
                <h1 class="title"><?= $banner['title'] ?? 'Neivor'; ?></h1>
                <?php if ( ! empty( $banner['statistics'] ) ) : ?>
                    <div class="statistics d-none d-md-flex">
                        <?php foreach ( $banner['statistics'] as $stat ) : ?>
                            <div class="stat">
                                <p class="label"><?= $stat['value'] ?? ''; ?></p>
                                <p><?= $stat['name'] ?? ''; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <p class="description d-none d-md-block"><?= $banner['description'] ?? ''; ?></p>
                <?php if ( ! empty( $banner['hs_form'] ) ) : ?>
                    <div class="form-content">
                        <?= $banner['hs_form']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6">
                <div class="image-contain">
                    <?= wp_get_attachment_image( $banner['main_image'], 'full', false, [
                        'class'          => 'hero-image d-none d-md-block',
                        'fetchpriority'  => 'high',
                    ] ); ?>
                    <?= wp_get_attachment_image( $banner['movil_image'], 'full', false, [
                        'class'          => 'hero-image d-block d-md-none',
                        'fetchpriority'  => 'high',
                    ] ); ?>
                    <?php if ( ! empty( $banner['overly_image'] ) ) : $overly = $banner['overly_image']; ?>
                        <div class="overly">
                            <div class="desktop-content d-none d-md-flex">
                                <div class="content">
                                    <div class="icon">
                                        <?= wp_get_attachment_image( $overly['icon'], 'full', false, [
                                            'class'         => 'overly-icon',
                                            'fetchpriority' => 'high',
                                        ] ); ?>
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
                <?php if ( ! empty( $banner['statistics_movil'] ) ) : ?>
                    <div class="statistics">
                        <?php foreach ( $banner['statistics_movil'] as $stat ) : ?>
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
