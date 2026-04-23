   
<?php
/**
 * 
 * Partial Name: we-are-the-ally
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$allies = get_field('we_are_allies');
if($allies['allies_list']):
?>
<section class="we-are-the-ally-partial-b5ee70">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <p class="description"><?= $allies['description']; ?></p>
                <div class="allies-contain">
                    <?php foreach($allies['allies_list'] as $item): ?>
                        <div class="ally">
                            <div class="logo">
                                <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>">
                            </div>
                            <div class="description-contain">
                                <p><?= $item['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>              