<?php
/**
 * 
 * Partial Name: blog_get_most_popular
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$posts = get_sub_field('blog_most_popular');
$main_post = $posts['main_post'];
$secondary_posts = $posts['secondaries'];
?>
<section class="blog-get-most-popular-partial-0ec1df">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title text-md-center">
                    <?= $posts['title'] ?? ''; ?>
                </h2>
            </div>
            <div class="col-12 col-md-6 col-lg-7 mb-5 mb-md-0">
                <a href="<?= get_permalink($main_post); ?>" target="_self" class="main-post">
                    <?= wp_get_attachment_image(get_post_thumbnail_id($main_post), 'large', false, array(
                        'class' => 'featured-image',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    )); ?>
                    <div class="texts">
                        <div class="label-category">
                            <span class="category-name">
                                <?php
                                    $terms = get_the_terms($main_post, 'blog_cat');
                                    echo (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';
                                ?>
                            </span>
                            <span class="separator"></span>
                            <span class="time-ago">Hace <?php echo human_time_diff(get_the_time('U', $main_post), current_time('U')); ?></span>
                        </div>
                        <h3 class="name"><?= get_the_title($main_post); ?></h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <div class="secondary-posts">
                    <?php foreach($secondary_posts  as $item): ?>
                        <div class="item">
                            <a href="<?= get_permalink($item['item']); ?>" target="_self" class="post-item">
                                <?= wp_get_attachment_image(get_post_thumbnail_id($item['item']), 'large', false, array(
                                    'class' => 'featured-image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )); ?>
                                <div class="texts">
                                    <span class="category-name">
                                        <?php
                                            $terms = get_the_terms($item['item'], 'blog_cat');
                                            echo (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';
                                        ?>
                                    </span>
                                    <h3 class="name"><?= get_the_title($item['item']); ?></h3>
                                    <p class="description"><?= get_field('short_description', $item['item']); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    