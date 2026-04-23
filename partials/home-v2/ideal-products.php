   
<?php
/**
 * 
 * Partial Name: ideal-products
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$ideal_product = get_field('ideal_product_content');
if ( $ideal_product['enable_ideal_product'] === true ) :
    $cards = $ideal_product['ideal_product'] ?? [];
?>
<section class="new-ideal-products-partial-c221ef">
    <div class="container">
        <div class="ip-header">
            <?php if ( ! empty( $ideal_product['title_bold'] ) || ! empty( $ideal_product['title_regular'] ) ) : ?>
                <h2>
                    <?php if ( ! empty( $ideal_product['title_bold'] ) ) : ?><strong><?= esc_html( $ideal_product['title_bold'] ); ?></strong><?php endif; ?>
                    <?php if ( ! empty( $ideal_product['title_regular'] ) ) : ?> <?= esc_html( $ideal_product['title_regular'] ); ?><?php endif; ?>
                </h2>
            <?php endif; ?>
            <?php if ( ! empty( $ideal_product['subtitle'] ) ) : ?>
                <p class="ip-subtitle"><?= esc_html( $ideal_product['subtitle'] ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $cards ) ) : ?>
            <div class="ip-cards">
                <?php foreach ( $cards as $item ) : ?>
                    <div class="product-card">
                        <?php if ( ! empty( $item['image'] ) ) : ?>
                            <div class="image-contain">
                                <?= wp_get_attachment_image( $item['image'], 'large', false, [ 'alt' => esc_attr( $item['name'] ?? '' ) ] ); ?>
                            </div>
                        <?php endif; ?>
                        <div class="body-card">
                            <div class="card-title-wrap">
                                <?php if ( ! empty( $item['icon'] ) ) : ?>
                                    <?= wp_get_attachment_image( $item['icon'], 'thumbnail', false, [ 'class' => 'card-icon', 'alt' => '' ] ); ?>
                                <?php endif; ?>
                                <?php if ( ! empty( $item['name'] ) ) : ?>
                                    <h3><?= esc_html( $item['name'] ); ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if ( ! empty( $item['items'] ) ) : ?>
                                <div class="items">
                                    <?php foreach ( $item['items'] as $cta ) :
                                        $link = $cta['select_page'];
                                    ?>
                                        <div class="item-row">
                                            <a href="<?= esc_url( $link['url'] ?? '#' ); ?>" <?= ! empty( $link['target'] ) ? 'target="' . esc_attr( $link['target'] ) . '"' : ''; ?>>
                                                <span><?= esc_html( $cta['name'] ); ?></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M10 16L14 12L10 8" stroke="#473EA1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>