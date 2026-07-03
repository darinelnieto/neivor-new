   
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
            foreach ($list as $item ):
            ?>
            <div class="col-12 col-lg-4 item mb-0 mb-lg-5">
                <a href="<?= $item['link']['url'] ?? '#'; ?>" target="<?= $item['link']['target'] ?? '_self'; ?>" class="post-link">
                    <div class="post-image">
                        <?= wp_get_attachment_image($item['main_image'], 'large', false, array(
                            'class' => 'featured-image',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="category"><?= $item['category'] ?? ''; ?></span>
                        </div>
                        <h3 class="post-title"><?= $item['title'] ?? ''; ?></h3>
                        <p class="post-excerpt"><?= $item['description'] ?? ''; ?></p>
                        <span class="read-more"><?= $item['link']['title'] ?? 'LEER MÁS' ?></span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>         