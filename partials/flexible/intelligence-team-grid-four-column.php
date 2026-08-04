<?php
// $script_handle = 'intelligence-team-grid-four-column-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/intelligence-team-grid-four-column.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: intelligence-team-grid-four-column
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$team = get_sub_field('team_group');
if(!empty($team['team'])):
?>
<section class="intelligence-team-grid-four-column-partial-f92794">
    <div class="container">
        <div class="row">
            <?php if(!empty($team['title']) || !empty($team['intro'])): ?>
                <div class="col-12 text-center mb-4">
                    <?php if(!empty($team['title'])): ?>
                        <h2 class="title"><?= $team['title']; ?></h2>
                    <?php endif; if(!empty($team['intro'])): ?>
                        <p class="subtitle p"><?= $team['intro']; ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; foreach($team['team'] as $item): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="member-card">
                        <?php if(!empty($item['photo'])): ?>
                            <div class="photo-contain">
                                <?= wp_get_attachment_image($item['photo'], 'large', false, array(
                                    'class' => 'photo',
                                    'loading' => 'lazy',
                                    'decoding' => 'async'
                                )); ?>
                            </div>
                        <?php endif; ?>
                        <div class="texts" style="box-shadow: 0px 0px 90px -40px <?= $item['color'] ?? '#341DAD30' ?>;">
                            <h3 class="h3 name"><?= $item['name'] ?? ''; ?></h3>
                            <span class="rol"><?= $item['rol'] ?? ''; ?></span>
                            <p class="description"><?= $item['description'] ?? ''; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>