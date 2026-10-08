<?php
// $script_handle = 'video-iframe-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/video-iframe.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: video-iframe
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$video = get_sub_field('v_group');
if(!empty($video['video'])):
?>
<section class="video-iframe-partial-823bec">
    <div class="container">
        <div class="row">
            <div class="<?= $video['col_class'] ?? 'col-12'; ?>">
                <?= $video['video']; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>          