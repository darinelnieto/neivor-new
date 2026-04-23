   
<?php
/**
 * 
 * Partial Name: ideal-products
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$ideal_product = get_field('ideal_product_content');
if($ideal_product['enable_ideal_product'] === true):
?>
<section class="ideal-products-partial-c221ef">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2><?= $ideal_product['title']; ?></h2>
            </div>
            <?php if($ideal_product['ideal_product']): foreach($ideal_product['ideal_product'] as $item): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="product-card">
                        <div class="image-contain">
                            <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                        </div>
                        <div class="body-card">
                            <div class="title">
                                <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>">
                                <h3><?= $item['name']; ?></h3>
                            </div>
                            <?php if($item['items']): ?>
                                <div class="items">
                                    <?php foreach($item['items'] as $cta): ?>
                                        <div class="name">
                                            <a href="<?= $cta['select_page']; ?>">
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
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>