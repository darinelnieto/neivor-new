<?php
/**
 * 
 * Partial Name: single_related_post
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$related = get_sub_field('related_posts');
$post_list = $related['select_post'];
if(!empty($post_list)):
    $script_handle = 'related-blog-slide-js';
    wp_enqueue_script(
        $script_handle,
        get_template_directory_uri() . '/js/partials/related-blog-slide.js',
        array('jquery'),
        null,
        true
    );
?>
<section class="single-related-post-partial-982653" 
    style="background-color: <?= $related['background'] ?? 'transparent'; ?>; padding-top: <?= $related['padding_top'] ?? '0'; ?>px; padding-bottom: <?= $related['padding_bottom'] ?? '0'; ?>px;">
   <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-content">
                    <h2 class="title"><?= $related['title'] ?? ''; ?></h2>
                    <?php if($related['link']): ?>
                        <a href="<?= $related['link']['url'] ?>" class="d-none d-md-block" target="<?= $related['link']['targe'] ?? '_self' ?>">
                            <?= $related['link']['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="related-posts owl-carousel">
                    <?php foreach($post_list as $post_id): $tag = get_field('tag', $post_id); ?>
                        <div class="related-post-item">
                            <a href="<?= get_the_permalink($post_id) ?>">
                                <div class="image-contain">
                                    <?= get_the_post_thumbnail($post_id, 'large', false, array(
                                        'class' => 'img-fluid',
                                        'loading' => 'lazy',
                                        'decoding' => 'async',
                                    )); ?>
                                    <?php if($tag): ?>
                                        <span><?= $tag; ?></span>
                                    <?php endif ?>
                                </div>
                                <div class="texts">
                                    <h3 class="name"><?= get_the_title($post_id); ?></h3>
                                    <p class="description"><?= get_field('short_description', $post_id); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="title-content d-block d-md-none">
                    <?php if($related['link']): ?>
                        <a href="<?= $related['link']['url'] ?>" target="<?= $related['link']['targe'] ?? '_self' ?>">
                            <?= $related['link']['title']; ?>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.7071 8.07088C15.0976 7.68035 15.0976 7.04719 14.7071 6.65666L8.34315 0.292702C7.95262 -0.0978227 7.31946 -0.0978227 6.92893 0.292702C6.53841 0.683226 6.53841 1.31639 6.92893 1.70692L12.5858 7.36377L6.92893 13.0206C6.53841 13.4111 6.53841 14.0443 6.92893 14.4348C7.31946 14.8254 7.95262 14.8254 8.34315 14.4348L14.7071 8.07088ZM0 7.36377V8.36377H7V7.36377V6.36377H0V7.36377ZM7 7.36377V8.36377H14V7.36377V6.36377H7V7.36377Z" fill="#7E66FC"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
    </div>
   </div>
</section>
<?php endif; ?>