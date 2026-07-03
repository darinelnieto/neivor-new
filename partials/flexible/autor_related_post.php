   
<?php
/**
 * 
 * Partial Name: autor_related_post
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$related = get_sub_field('autor_related_post_content');
$author = $related['autor'] ?? '';
if(!empty($author)):
    $autor_query = new WP_Query(array(
        'post_type'      => 'blogs',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'autor',
                'field'    => 'term_id',
                'terms'    => $author,
            ),
        ),
    ));

    $main_post       = array();
    $secondary_posts = array();

    if ( $autor_query->have_posts() ) {
        $all_posts = $autor_query->posts;
        array_push( $main_post, $all_posts[0]->ID );
        foreach ( array_slice( $all_posts, 1 ) as $post_obj ) {
            array_push( $secondary_posts, $post_obj->ID );
        }
    }
    wp_reset_postdata();

?>
<section class="autor-related-post-partial-38593b">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $related['title'] ?? ''; ?></h2>
                <div class="related-post row">
                    <div class="col-12 col-md-6 col-lg-7 mb-5 mb-md-0">
                        <?php if(!empty($main_post[0])): ?>
                            <a href="<?= get_the_permalink($main_post[0]); ?>" target="_self" class="main-post">
                                <?= wp_get_attachment_image(get_post_thumbnail_id($main_post[0]), 'large', false, array(
                                    'class' => 'featured-image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )); ?>
                                <div class="texts">
                                    <div class="label-category">
                                        <span class="category-name">
                                            <?php
                                                $terms = get_the_terms($main_post[0], 'blog_cat');
                                                echo (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';
                                            ?>
                                        </span>
                                        <span class="separator"></span>
                                        <span class="time-ago">Hace <?php echo human_time_diff(get_the_time('U', $main_post[0]), current_time('U')); ?></span>
                                    </div>
                                    <h3 class="name"><?= get_the_title($main_post[0]); ?></h3>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <!--  -->
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="secondary-posts">
                            <?php foreach($secondary_posts  as $item): ?>
                                <div class="item">
                                    <a href="<?= get_permalink($item); ?>" target="_self" class="post-item">
                                        <?= wp_get_attachment_image(get_post_thumbnail_id($item), 'large', false, array(
                                            'class' => 'featured-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                        )); ?>
                                        <div class="texts">
                                            <span class="category-name">
                                                <?php
                                                    $terms = get_the_terms($item, 'blog_cat');
                                                    echo (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';
                                                ?>
                                            </span>
                                            <h3 class="name"><?= get_the_title($item); ?></h3>
                                            <p class="description"><?= get_field('short_description', $item); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>