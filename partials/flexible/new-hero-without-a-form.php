<?php
// $script_handle = 'new-hero-without-a-form-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/new-hero-without-a-form.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: new-hero-without-a-form
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$hero = get_sub_field('hero_without_a_form');
?>
<section class="new-hero-without-a-form-partial-040958">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7 d-flex flex-column gap-4">
                <div class="hero-title-contain d-flex flex-column-reverse">
                    <?php if(!empty($hero['title'])): ?>
                        <h1 class="hero-title fw-800 dark-color h1-size"><?= $hero['title']; ?></h1>
                    <?php endif; if(!empty($hero['label'])): ?>
                        <span class="hero-label-tag "><?= $hero['label']; ?></span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($hero['description'])): ?>
                    <div class="hero-description fw-400 p-size-16 violeta-dark">
                        <?= $hero['description']; ?>
                    </div>
                <?php endif; if(!empty($hero['tags_list'])): ?>
                    <ul class="tags d-flex list-none flex-wrap gap-4 px-0 m-0">
                        <?php foreach($hero['tags_list'] as $i): ?>
                            <li class="d-flex align-items-ceenter gap-4">
                                <?= wp_get_attachment_image($i['icon'] ?? '', 'large', false, array(
                                    'class' => 'icon-item',
                                    'fetchpriority' => 'high',
                                    'loading' => 'eage',
                                    'decoding' => 'async'
                                )); ?>
                                <?= $i['label'] ?? ''; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <?= wp_get_attachment_image($hero['main_image'] ?? '', 'medium', false, array(
                    'class' => 'hero-main-mage',
                    'fetchpriority' => 'high',
                    'loading' => 'eage',
                    'decoding' => 'async',
                    'alt' => 'hero main image'
                )); ?>
            </div>
        </div>
    </div>
</section>
                    