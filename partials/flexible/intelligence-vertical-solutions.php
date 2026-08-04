<?php
/**
 * 
 * Partial Name: intelligence-vertical-solutions
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$v_solutions = get_sub_field('vertical_solutions');
$tabs = $v_solutions['tabs'];
if(!empty($tabs)):
$script_handle = 'intelligence-vertical-solutions-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials-min/intelligence-vertical-solutions.min.js',
    array('jquery'),
    null,
    true
);
// $key = 0;
// $key_contoller = 0;
?>
<section class="intelligence-vertical-solutions-partial-4af37c">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($v_solutions['title'])): ?>
                    <h2 class="title"><?= $v_solutions['title']; ?></h2>
                <?php endif; ?>
                <div class="tabs-content">
                    <ul class="controller">
                        <?php foreach($tabs as $item): ?>
                            <li>
                                <button class="item-controller" target="<?= $item['item_tab']; ?>"><?= $item['item_tab']; ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tabs-body">
                        <?php foreach($tabs as $item): ?>
                            <div class="item" id="<?= $item['item_tab']; ?>">
                                <p class="description"><?= $item['introduction'] ?? ''; ?></p>
                                <div class="row align-items-center">
                                    <?php if(!empty($item['agentes'])): ?>
                                    <div class="col-12 col-md-5 row">
                                        <?php foreach($item['agentes'] as $agent): ?>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; if(!empty($item['main_image'])): ?>
                                        <div class="col-12 col-md-7">
                                            <div class="image-contain">
                                                <?= wp_get_attachment_image($item['main_image'], 'large', false, array(
                                                    'class' => 'main-image',
                                                    'loading' => 'lazy',
                                                    'decoding' => 'async'
                                                )) ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>