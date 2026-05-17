   
<?php
/**
 * 
 * Partial Name: autor_appearances
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$appearances = get_sub_field('autor_appearances_group');
$list = $appearances['posts'];
if ( ! empty( $list ) ):
$script_handle = 'autor_appearances-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/autor_appearances.js',
    array('jquery'),
    null,
    true
);
?>
<section class="autor-appearances-partial-c9a33f">
    <div class="container">
        <div class="row">
            <h2 class="title"><?= $appearances['title'] ?? ''; ?></h2>
        </div>
        <div class="row" id="appearances-list">
            <?php 
            foreach ( $list as $item ):
            $post_id = isset( $item['item'] ) ? (int) $item['item'] : 0;
            if ( ! $post_id ) {
                continue;
            }
            $thumbnail_id = get_post_thumbnail_id( $post_id );
            $post_time = get_the_time( 'U', $post_id );
            $current_time = time();
            $time_diff = $current_time - $post_time;
            ?>
            <div class="col-12 col-lg-4 item mb-0 mb-lg-5">
                <a href="<?= get_permalink( $post_id ); ?>" target="_self" class="post-link">
                    <div class="post-image">
                        <?= wp_get_attachment_image($thumbnail_id, 'large', false, array(
                            'class' => 'featured-image',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="category"><?php
                                $terms = get_the_terms( $post_id, 'blog_cat' );
                                echo ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
                            ?></span>
                        </div>
                        <h3 class="post-title"><?= get_the_title( $post_id ); ?></h3>
                        <p class="post-excerpt"><?= get_field('short_description', $post_id ); ?></p>
                        <span class="read-more">LEER MÁS</span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>         