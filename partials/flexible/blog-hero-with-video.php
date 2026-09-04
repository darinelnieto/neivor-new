<?php
// $script_handle = 'blog-hero-with-video-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/blog-hero-with-video.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: blog-hero-with-video
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$hero = get_sub_field('bh_content');
$tag = $hero['label_tag'];
$author = $hero['author'];
$video = $hero['video_link'];
?>
<section class="blog-hero-with-video-partial-d2a5cd">
    <div class="container">
        <div class="row justify-content-between row-reverse">
            <div class="col-12 col-md-7 mb-5 mb-md-0">
                <?php if(!empty($tag['text'])): ?>
                    <span class="label-tag" style="color: <?= $tag['text_color'] ?>;">
                        <?= $tag['text'] ?>
                    </span>
                <?php endif; ?>
                <h1 class="title h1">
                    <?= $hero['title'] ?? get_the_title(); ?>
                </h1>
                <?php if(!empty($hero['description'])): ?>
                    <p class="description">
                        <?= $hero['description'] ?? ''; ?>
                    </p>
                <?php endif; if($hero['enable_autor'] == 'true'): $link = $author['link']; ?>
                    <a href="<?= $link['url'] ?? '#'; ?>" target="<?= $link['target'] ?? '_self'; ?>" class="author-tag">
                        <?= wp_get_attachment_image($author['photo'], 'medium', false, array(
                            'fetchpriority' => 'high',
                            'class' => 'author-photo'
                        )) ?>
                        <div class="<?php if($author['label'] == 'rol'): ?>texts-column<?php else: ?>texts-flex<?php endif; ?>">
                            <span class="name"><?= $author['name'] ?? '' ?></span>
                            <?php if($author['label'] == 'date'): ?><span class="separator"></span><?php endif; ?>
                            <span class="label"><?= $author['rol_or_date'] ?? '' ?></span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <?php if(!empty($video)): ?>
                <div class="col-12 col-md-4 video text-center">
                    <?= $video; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>