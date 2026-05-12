   
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
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?= wp_get_attachment_image($img, 'larget', false, array(
        'class' => 'hero-image',
        'fetchpriority' => 'high'
    )) ?>
</section>
                    