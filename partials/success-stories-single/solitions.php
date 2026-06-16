   
<?php
/**
 * 
 * Partial Name: solitions
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$solutions = get_sub_field('solutions_group');
if ( ! $solutions ) {
    $solutions = get_field('solutions_group');
}
if($solutions['solutions_list']):
?>
<section class="solitions-partial-49241b">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $solutions['title']; ?></h2>
            </div>
        </div>
        <?php foreach($solutions['solutions_list'] as $solution): ?>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="solution-image">
                        <?= wp_get_attachment_image($solution['image']['ID'] ?? '', 'large', false, array(
                            'class' => 'full-image',
                            'loading' => 'lazy',
                            'decoding' => 'async'
                        )); ?>
                    </div>
                </div>
                <?php if($solution['list']): ?>
                    <div class="col-12 col-md-6">
                        <?php foreach($solution['list'] as $item): ?>
                            <div class="row challenge-list">
                                <div class="col-12 col-md-2">
                                    <div class="icon-contain">
                                        <?= wp_get_attachment_image($item['icon']['ID'] ?? '', 'large', false, array(
                                            'class' => 'icon-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async'
                                        )); ?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-10">
                                    <p><?= $item['description']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>