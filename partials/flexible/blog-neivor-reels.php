<?php
/**
 *
 * Partial Name: blog-neivor-reels
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$reels = get_sub_field('neivor_reels');
if(!empty($reels['reels'])):
$script_handle = 'blog-neivor-reels-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials-min/blog-neivor-reels.min.js',
    array('jquery'),
    null,
    true
);
?>
<section class="blog-neivor-reels-partial-2ad27e"
    style="background-color: <?= $reels['background'] ?? 'transparent'; ?>; padding-top: <?= $reels['padding_top'] ?? '0'; ?>px; padding-bottom: <?= $reels['padding_bottom'] ?? '0'; ?>px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9 mb-5">
                <?php if(!empty($reels['title'])): ?>
                    <h2 class="h2 fw-700 dark-color mb-2"><?= $reels['title']; ?></h2>
                <?php endif; if(!empty($reels['subtitle'])): ?>
                    <p class="p-size-18 gray-color mb-0"><?= $reels['subtitle']; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-12">
                <div class="reels-slide owl-carousel">
                    <?php foreach($reels['reels'] as $item): ?>
                        <div class="item">
                            <div class="video">
                                <?= $item['video']; ?>
                            </div>
                            <?php if(!empty($item['title'])): ?>
                                <h3 class="h5 fw-700 dark-color mt-3 mb-0"><?= $item['title']; ?></h3>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
