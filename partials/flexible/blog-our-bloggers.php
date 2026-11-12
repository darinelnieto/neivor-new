<?php
// $script_handle = 'blog-our-bloggers-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/blog-our-bloggers.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 *
 * Partial Name: blog-our-bloggers
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$bloggers = get_sub_field('our_bloggers');
if(!empty($bloggers['authors'])):
?>
<section class="blog-our-bloggers-partial-515bf2"
    style="background-color: <?= $bloggers['background'] ?? 'transparent'; ?>; padding-top: <?= $bloggers['padding_top'] ?? '0'; ?>px; padding-bottom: <?= $bloggers['padding_bottom'] ?? '0'; ?>px;">
    <div class="container">
        <div class="row">
            <?php if(!empty($bloggers['title'])): ?>
                <div class="col-12 mb-5">
                    <h2 class="h2 fw-700 dark-color mb-0"><?= $bloggers['title']; ?></h2>
                </div>
            <?php endif; foreach($bloggers['authors'] as $item):
                $author_id = (int) $item['author'];
                if(!$author_id) continue;
                $author_group = get_field('autor_hero_group', 'term_' . $author_id);
                $author = $author_group['autor_hero_group'] ?? array();
            ?>
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <a href="<?= get_term_link($author_id, 'autor'); ?>" class="blogger-card d-flex flex-column gap-3 text-decoration-none">
                        <div class="ratio ratio-1x1 rounded-16 overflow-hidden">
                            <?= wp_get_attachment_image($author['authors_photo'] ?? '', 'large', false, array(
                                'class' => 'blogger-photo',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                            )); ?>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h3 class="h3 fw-600 dark-color mb-0"><?= get_term($author_id, 'autor')->name; ?></h3>
                            <?php if(!empty($author['rol'])): ?>
                                <span class="h3-size text-uppercase violeta-color"><?= $author['rol']; ?></span>
                            <?php endif; if(!empty($author['description'])): ?>
                                <p class="description p-size-16 gray-color mt-2 mb-0"><?= $author['description']; ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
