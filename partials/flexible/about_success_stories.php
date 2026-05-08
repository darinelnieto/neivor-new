<?php
$script_handle = 'about-success-stories-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/about-success-stories.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: success-stories
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$success_stories = get_sub_field('success_stories');
if($success_stories['cases']):
?>
<section class="success-stories-partial-2cc9fb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $success_stories['title']; ?></h2>
                <div class="stories-slide owl-carousel">
                    <?php foreach($success_stories['cases'] as $item): ?>
                        <div class="item">
                            <div class="card-history">
                                <div class="image-contain">
                                    <?= wp_get_attachment_image($item['feature_image']['ID'], 'large', false, array(
                                        'class' => 'feature-image',
                                        'loading' => 'lazy',
                                        'decoding' => 'async',
                                    )); ?>
                                    <?php if($item['logos']): ?>
                                        <div class="logo-contain">
                                            <?php foreach($item['logos'] as $logo): ?>
                                                <div class="logo">
                                                    <?= wp_get_attachment_image($logo['logo']['ID'], 'large', false, array(
                                                        'class' => 'logo',
                                                        'loading' => 'lazy',
                                                        'decoding' => 'async',
                                                    )); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <h4 class="title"><?= $item['title']; ?></h4>
                                <div class="description">
                                    <?= $item['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>          