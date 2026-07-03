<?php
/**
 * 
 * Partial Name: true-story
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_true_story')):
$stories = get_field('true_story');
$script_handle = 'markets-true-story-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/markets-true-story.js',
    array('jquery', 'owl-carousel.js'),
    null,
    true
);
?>
<section class="true-story-partial-5878a2">
    <div class="svg-contain">
        <svg width="1440" height="140" viewBox="0 0 1440 140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.5" d="M-92.7439 58.0202C444.145 63.9554 851.393 47.5042 1186.17 9.84202C1520.95 -27.8202 1549.72 56.5111 1210.54 101.462C871.35 146.412 536.045 43.5745 -90.1336 117.676C-716.312 191.778 -629.633 52.0851 -92.7439 58.0202Z" fill="url(#paint0_linear_501_14107)" fill-opacity="0.2"/>
            <defs>
                <linearGradient id="paint0_linear_501_14107" x1="-545.334" y1="108.424" x2="1459.96" y2="-424.844" gradientUnits="userSpaceOnUse">
                    <stop offset="0.323809" stop-color="#723EC7"/>
                    <stop offset="0.48398" stop-color="#7A49CA" stop-opacity="0.941657"/>
                    <stop offset="0.681268" stop-color="#9D79D8" stop-opacity="0.694652"/>
                    <stop offset="1" stop-color="#B3FF9F" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>
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
                                        <?= wp_get_attachment_image($story['photo']['ID'] ?? '', 'full', false, array(
                                            'class' => 'full-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async'
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