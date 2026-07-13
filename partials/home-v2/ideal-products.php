<?php
$script_handle = "home-v2-ideal-products-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/home-v2-ideal-products.min.js",
    array("jquery"),
    null,
    true
);
?>

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
                    <?php if ( ! empty( $ideal_product['title_bold'] ) ) : ?><strong><?= $ideal_product['title_bold']; ?></strong><?php endif; ?>
                    <?php if ( ! empty( $ideal_product['title_regular'] ) ) : ?> <?= $ideal_product['title_regular']; ?><?php endif; ?>
                </h2>
            <?php endif; ?>
            <?php if ( ! empty( $ideal_product['subtitle'] ) ) : ?>
                <p class="ip-subtitle"><?= $ideal_product['subtitle']; ?></p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $cards ) ) : ?>
            <div class="ip-cards">
                <?php foreach ( $cards as $item ) : ?>
                    <div class="product-card">
                        <?php if ( ! empty( $item['image'] ) ) : ?>
                            <div class="image-contain">
                                <?= wp_get_attachment_image( $item['image'], 'large', false, array(
                                    'class' => 'full-mage',
                                    'loading' => 'lazy',
                                    'decoding' => 'async'
                                )); ?>
                            </div>
                        <?php endif; ?>
                        <div class="body-card">
                            <div class="card-title-wrap">
                                <?php if ( ! empty( $item['icon'] ) ) : ?>
                                    <?= wp_get_attachment_image( $item['icon'], 'thumbnail', false, array(
                                        'class' => 'card-icon',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )); ?>
                                <?php endif; ?>
                                <?php if ( ! empty( $item['name'] ) ) : ?>
                                    <h3><?= $item['name']; ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if ( ! empty( $item['items'] ) ) : ?>
                                <div class="items">
                                    <?php foreach ( $item['items'] as $cta ) :
                                        $link = $cta['select_page'];
                                    ?>
                                        <div class="item-row">
                                            <a href="<?= $link['url'] ?? '#'; ?>" target="<?= $link['target'] ?? '_self' ?>">
                                                <span><?= $cta['name']; ?></span>
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