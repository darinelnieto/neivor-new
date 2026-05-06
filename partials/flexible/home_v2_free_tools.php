
<?php
// Flexible Builder wrapper. Original: partials/home-v2/free-tools.php

/**
 *
 * Partial Name: free-tools
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$ft = get_sub_field('free_tools_section');
if ( ! $ft ) return;

$cards_html = '';
if ( ! empty( $ft['cards'] ) ) {
    foreach ( $ft['cards'] as $card ) {
        $link_url    = $card['link']['url'] ?? '#';
        $link_title  = $card['link']['title'] ?? 'USAR';
        $link_target = ! empty( $card['link']['target'] ) ? 'target="' . esc_attr( $card['link']['target'] ) . '"' : '';
        ob_start();
        ?>
        <div class="ft-card">
            <?php if ( ! empty( $card['image'] ) ) : ?>
                <div class="ft-card__image">
                    <?= wp_get_attachment_image( $card['image'], 'medium_large', false, array(
                        'class' => 'ft-img',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    ) ); ?>
                </div>
            <?php endif; ?>
            <div class="ft-card__body">
                <?php if ( ! empty( $card['card_title'] ) ) : ?>
                    <h3 class="ft-card__title"><?= esc_html( $card['card_title'] ); ?></h3>
                <?php endif; ?>
                <?php if ( ! empty( $card['card_description'] ) ) : ?>
                    <p class="ft-card__desc"><?= esc_html( $card['card_description'] ); ?></p>
                <?php endif; ?>
                <a href="<?= esc_url( $link_url ); ?>" <?= $link_target; ?> class="ft-card__cta">
                    <?= esc_html( $link_title ); ?>
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                    </svg>
                </a>
            </div>
        </div>
        <?php
        $cards_html .= ob_get_clean();
    }
}
?>
<section class="new-free-tools-partial-home">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ft-header">
                    <h2><?= $ft['title']; ?></h2>
                    <?php if ( ! empty( $ft['subtitle'] ) ) : ?>
                        <p class="ft-subtitle"><?= esc_html( $ft['subtitle'] ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ( $cards_html ) : ?>
            <div class="ft-slide owl-carousel">
                <?php echo $cards_html; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
wp_enqueue_script(
    'free-tools',
    get_template_directory_uri() . '/js/partials/free-tools.js',
    [ 'jquery', 'owl-carousel.js' ],
    '1.0',
    true
);
