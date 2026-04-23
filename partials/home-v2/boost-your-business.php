   
<?php
/**
 * 
 * Partial Name: boost-your-business
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$boost = get_field('boost_your_business_fields_group');
if ( ! $boost ) return;

$cards_html = '';
if ( ! empty( $boost['cards'] ) ) {
    foreach ( $boost['cards'] as $item ) {
        $link_url    = $item['link']['url'] ?? '#';
        $link_target = ! empty( $item['link']['target'] ) ? 'target="' . esc_attr( $item['link']['target'] ) . '"' : '';
        ob_start();
        ?>
        <a href="<?= esc_url( $link_url ); ?>" <?= $link_target; ?> class="card-item">
            <?php if ( ! empty( $item['feature_image'] ) ) : ?>
                <?= wp_get_attachment_image( $item['feature_image'], 'large', false, [ 'class' => 'feature-image' ] ); ?>
            <?php endif; ?>
            <div class="card-overlay"></div>
            <div class="card-content">
                <?php if ( ! empty( $item['tag'] ) ) : 
                    $dot_color = ! empty( $item['tag_color'] ) ? esc_attr( $item['tag_color'] ) : '#7D65FE';
                ?>
                    <span class="card-tag" style="--dot-color: <?= $dot_color; ?>"><?= esc_html( $item['tag'] ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $item['logo'] ) ) : ?>
                    <?= wp_get_attachment_image( $item['logo'], 'medium', false, [ 'class' => 'card-logo' ] ); ?>
                <?php endif; ?>
                <?php if ( ! empty( $item['name'] ) ) : ?>
                    <h3 class="card-name"><?= esc_html( $item['name'] ); ?></h3>
                <?php endif; ?>
                <?php if ( ! empty( $item['stat'] ) ) : ?>
                    <p class="card-stat"><?= esc_html( $item['stat'] ); ?></p>
                <?php endif; ?>
                <span class="card-cta">LEER CASO 
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.175 9H0V7H12.175L6.575 1.4L8 0L16 8L8 16L6.575 14.6L12.175 9Z" fill="white"/>
                    </svg>
                </span>
            </div>
        </a>
        <?php
        $cards_html .= ob_get_clean();
    }
}
?>
<section class="new-boost-your-business-partial-ca6162">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-and-intro">
                    <h2><?= $boost['title']; ?></h2>
                    <p><?= $boost['intro']; ?></p>
                </div>
                <?php if ( $cards_html ) : ?>
                    <!-- Desktop: inside container, aligned with title -->
                    <div class="boost-slide owl-carousel">
                        <?php echo $cards_html; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>