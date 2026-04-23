<?php
/**
 * 
 * Partial Name: corporate-groups
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$groups = get_field('corporate_groups');
if($groups['logos_corporate_list']):
?>
<section class="corporate-groups-partial-d36183">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-0">
                <h2><?= $groups['title'] ?></h2>
            </div>
        </div>
        <div class="row justify-content-center logos-contain">
            <?php foreach($groups['logos_corporate_list'] as $item): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="image-contain">
                        <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>     
