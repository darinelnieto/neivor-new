<?php
$script_handle = 'resources-list-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials-min/resources-list.min.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: resources-list
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$resources = get_sub_field('resources_list');
$taxonomies = $resources['taxonomi_nav'];
if(empty($taxonomies)){
    $taxonomies = get_terms(array('taxonomy' => 'resources_cat'));
}
?>
<section class="resources-list-partial-c4f913">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($resources['title'])): ?>
                    <h2 class="t-size-20 dark-color fw-700 mb-4"><?= $resources['title']; ?></h2>
                <?php endif; ?>
                <nav class="taxonomies mb-5">
                    <ul class="taxonomy-list">
                        <li>
                            <button class="taxonomy-btn p-size-16 fw-600 active" value="get-all">Todos</button>
                        </li>
                        <?php foreach($taxonomies as $tax): ?>
                            <li class="taxonomy-item">
                                <button class="taxonomy-btn p-size-16 fw-600" value="<?= $tax->slug; ?>">
                                    <?= $tax->name; ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <div class="resources-results row mb-5"></div>
                <div class="resources-pagination"></div>
            </div>
        </div>
    </div>
</section>
                    