   
<?php
/**
 * 
 * Partial Name: blog_hero
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$hero = get_sub_field('hero_blog_partial');
$tag = $hero['label_tag'];
$img = $hero['main_image'];
$author = $hero['author'];
?>
<section class="blog-hero-partial-f87f86">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($tag['text'])): ?>
                    <span class="label-tag" style="background-color: <?= $tag['bg_color'] ?>; color: <?= $tag['text_color'] ?>;">
                        <?= $tag['text'] ?>
                    </span>
                <?php endif; ?>
                <h1 class="title">
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
        </div>
    </div>
    <?= wp_get_attachment_image($img, 'larget', false, array(
        'class' => 'hero-image',
        'fetchpriority' => 'high'
    )) ?>
</section>
                    