   
<?php
/**
 * 
 * Partial Name: solitions
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$solutions = get_field('solutions_group');
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
                        <img src="<?= $solution['image']['url']; ?>" alt="<?= $solution['image']['title']; ?>">
                    </div>
                </div>
                <?php if($solution['list']): ?>
                    <div class="col-12 col-md-6">
                        <?php foreach($solution['list'] as $item): ?>
                            <div class="row challenge-list">
                                <div class="col-12 col-md-2">
                                    <div class="icon-contain">
                                        <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>">
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