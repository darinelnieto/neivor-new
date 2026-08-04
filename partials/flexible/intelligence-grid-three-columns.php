<?php
// $script_handle = 'intelligence-grid-three-columns-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/intelligence-grid-three-columns.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: intelligence-grid-three-columns
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$grid_content = get_sub_field('intelligence_grid_list');
if(!empty($grid_content)):
?>
<section class="intelligence-grid-three-columns-partial-f569f6">
    <div class="container">
        <div class="row">
            <?php foreach($grid_content as $item): ?>
                <div class="col-12 col-md-6 col-lg-4 item text-center">
                    <span class="overly-number"><?= $item['number'] ?? 0; ?></span>
                    <div class="texts">
                        <p class="h3"><?= $item['label'] ?? ''; ?></p>
                        <p class="description"><?= $item['description'] ?? ''; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>