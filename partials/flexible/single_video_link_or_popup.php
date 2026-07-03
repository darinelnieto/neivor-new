   
<?php
/**
 * 
 * Partial Name: single_video_link_or_popup
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$video = get_sub_field('video_link_or_popup');
if(empty($video['enable_link'])) {
    $script_handle = 'video-popup-js';
    wp_enqueue_script(
        $script_handle,
        get_template_directory_uri() . '/js/partials/video-popup.js',
        array('jquery'),
        null,
        true
    );
}
?>
<section class="single-video-link-or-popup-partial-0b3133">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <?php if(!empty($video['enable_link'])): ?>
                    <a href="<?= $video['link']['url']; ?>" targe="<?= $video['link']['target']; ?>" class="is-link">
                        <?= wp_get_attachment_image($video['video_image'] ?? '', 'full', false, array(
                            'class' => 'img-fluid',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                        <span class="play">
                            <svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 28V0L22 14L0 28ZM4 20.7L14.5 14L4 7.3V20.7Z" fill="white"/>
                            </svg>
                        </span>
                    </a>
                <?php else: ?>
                    <a href="<?= $video['iframe_video']; ?>" area-label="Controla el popup" class="is-popup">
                        <?= wp_get_attachment_image($video['video_image'] ?? '', 'full', false, array(
                            'class' => 'img-fluid',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                        <span class="play">
                            <svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 28V0L22 14L0 28ZM4 20.7L14.5 14L4 7.3V20.7Z" fill="white"/>
                            </svg>
                        </span>
                    </a>
                    <div class="popup-video"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    