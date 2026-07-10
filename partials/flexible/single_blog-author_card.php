<?php
$script_handle = "flexible-single_blog-author_card-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-single_blog-author_card.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: single_blog-author_card
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$width = get_sub_field('width_content');
$pt = get_sub_field('padding_top');
$pb = get_sub_field('padding_bottom');
$bg = get_sub_field('background');
$author_id = (int) get_sub_field('select_author');
$name = $author_id ? get_term($author_id, 'autor')->name : '';
$author_group = $author_id ? get_field('autor_hero_group', 'term_' . $author_id) : null;
$author = $author_group['autor_hero_group'];

?>
<section class="single-blog-author-card-partial-d88356" style="background: <?= $bg ?? '#ffffff'; ?>; padding-top: <?= $pt ?? '40' ?>px; padding-bottom: <?= $pb ?? '40' ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?= $width ?? 'col-12 col-md-10 col-lg-8' ?> card-col">
                <div class="single-blog-author-card">
                    <div class="author-image">
                        <?= wp_get_attachment_image($author['authors_photo'] ?? '', 'medium', false, array(
                            'class' => 'author-photo',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                    </div>
                    <div class="author-info">
                        <div class="author">
                            <p class="author-name"><?= $name; ?></p>
                            <span class="rol"><?= $author['rol'] ?? ''; ?></span>
                        </div>
                        <p class="author-bio"><?= $author['description'] ?? ''; ?></p>
                        <?php if(!empty($author['social_netwrk'])): ?>
                            <ul class="shares-link">
                                <?php foreach($author['social_netwrk'] as $item): ?>
                                    <li>
                                        <a href="<?= $item['link']['url'] ?? '#'; ?>" target="_blank" rel="noopener">
                                            <?= wp_get_attachment_image($item['icon'] ?? '', 'medium', false, array(
                                                'class' => 'social-icon',
                                                'loading' => 'lazy',
                                                'decoding' => 'async',
                                            )); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>