   
<?php
/**
 * 
 * Partial Name: allies
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$allies = get_field('allies_content');
if($allies):
?>
<section class="allies-partial-c9ecc6">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <h2 class="title"><?= $allies['title']; ?></h2>
            </div>
            <?php if($allies['allies_list']): foreach($allies['allies_list'] as $item): ?>
                <div class="col-6 col-md-3 mb-4 text-center">
                    <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>">
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<?php endif; ?> 