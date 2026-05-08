<?php
$script_handle = 'markets-true-story-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/markets-true-story.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: true-story
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_sub_field('enable_true_story')):
$stories = get_sub_field('true_story');
?>
<section class="true-story-partial-5878a2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $stories['title']; ?></h2>
                <p class="description"><?= $stories['description']; ?></p>
                <?php if($stories['stories']): ?>
                    <div class="slide-stories owl-carousel">
                        <?php foreach($stories['stories'] as $story): ?>
                            <div class="item">
                                <div class="card-story">
                                    <div class="image-contain">
                                        <?= wp_get_attachment_image($story['photo']['ID'], 'large', false, array(
                                            'class' => 'story-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                        )); ?>
                                    </div>
                                    <div class="body">
                                        <h4><?= $story['name']; ?></h4>
                                        <span class="tag"><?= $story['tag'] ?></span>
                                        <p class="stroy-description"><?= $story['description']; ?></p>
                                        <?php if($story['video_link']): ?>
                                            <a href="<?= $story['video_link']['url']; ?>" target="<?= $story['video_link']['target']; ?>" class="see-video">
                                                <?= $story['video_link']['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>       