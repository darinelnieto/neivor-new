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
$key = 0;
$key_contoller = 0;
?>
<section class="intelligence-vertical-solutions-partial-4af37c">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($v_solutions['title'])): ?>
                    <h2 class="title h2"><?= $v_solutions['title']; ?></h2>
                <?php endif; ?>
                <div class="tabs-content">
                    <ul class="controller">
                        <?php foreach($tabs as $item): $key_contoller++; ?>
                            <li>
                                <button class="item-controller <?php if($key_contoller === 1): ?>active<?php endif; ?>" data-target="<?= $item['item_tab']; ?>"><?= $item['item_tab']; ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tabs-body">
                        <?php foreach($tabs as $item_b): $key++; ?>
                            <div class="item <?php if($key === 1): ?>active<?php endif; ?>" id="<?= $item_b['item_tab']; ?>">
                                <p class="description p"><?= $item_b['introduction'] ?? ''; ?></p>
                                <div class="row align-items-center justify-content-between">
                                    <?php if(!empty($item_b['agentes'])): ?>
                                    <div class="col-12 col-md-6 row">
                                        <?php foreach($item_b['agentes'] as $agent): ?>
                                            <div class="col-12 col-md-6 mb-5">
                                                <div class="agent">
                                                    <div class="texts" style="box-shadow: 0px 0px 10px 0px <?= $agent['color'] ?? '#0088FF33' ?>;">
                                                        <p class="name"><?= $agent['name'] ?? ''; ?></p>
                                                        <p class="rol"><?= $agent['rol'] ?? ''; ?></p>
                                                    </div>
                                                    <?= wp_get_attachment_image($agent['photo'] ?? '', 'large', false, array(
                                                        'class' => 'photo',
                                                        'loading' => 'lazy',
                                                        'decoding' => 'async'
                                                    )); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; if(!empty($item_b['main_image'])): ?>
                                        <div class="col-12 col-md-6">
                                            <div class="image-contain">
                                                <?= wp_get_attachment_image($item_b['main_image'], 'large', false, array(
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