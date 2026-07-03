<?php
/**
 * 
 * Partial Name: blog_category_cards
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$categoies = get_sub_field('blog_category_cards');
if(!empty($categoies['cards_grid'])):
?>
<section class="blog-category-cards-partial-4dc4eb">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-4">
                <h2 class="title"><?= $categoies['title'] ?? ''; ?></h2>
                <div class="grid-cards row">
                    <?php foreach($categoies['cards_grid'] as $item): ?>
                        <a href="<?= get_term_link($item['category_page']); ?>" target="_self" class="category-link col-12 col-md-6 col-lg-4">
                            <div class="card-item">
                                <?= wp_get_attachment_image($item['category_image'] ?? '', 'large', false, array(
                                    'class' => 'category-image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )) ?>
                                <div class="texts">
                                    <h3 class="name"><?= $item['name'] ?? ''; ?></h3>
                                    <p class="description"><?= $item['description'] ?? ''; ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>