<?php
// $script_handle = 'intelligence-videos-grid-three-column-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/intelligence-videos-grid-three-column.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: intelligence-videos-grid-three-column
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$videos = get_sub_field('videos_grid_three_column');
if(!empty($videos['list'])):
?>
<section class="intelligence-videos-grid-three-column-partial-53c7ec">
    <div class="container">
        <div class="row">
            <?php if(!empty($videos['title']) || !empty($videos['subtitle'])): ?>
                <div class="col-12 text-center mb-4">
                    <?php if(!empty($videos['title']) ): ?>
                        <h2 class="title h2"><?= $videos['title']; ?></h2>
                    <?php endif; if(!empty($videos['subtitle'])): ?>
                        <p class="subtitle"><?= $videos['subtitle']; ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; foreach($videos['list'] as $item): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="item">
                        <?php if(!empty($item['video'])): ?>
                            <div class="video">
                                <?= $item['video']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="texts">
                            <?php if(!empty($item['label'])): ?>
                                <p class="label"><?= $item['label']; ?></p>
                            <?php endif; if(!empty($item['description'])): ?>
                                <p class="description p"><?= $item['description']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>