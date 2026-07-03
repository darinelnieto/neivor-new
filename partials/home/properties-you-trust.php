   
<?php
/**
 * 
 * Partial Name: properties-you-trust
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$properties = get_field('properties_you_trust_content');
if($properties['enable_trusting_properties'] === true):
?>
<section class="properties-you-trust-partial-88f88c">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $properties['trusting_properties']['title']; ?></h2>
                <p class="intro-before-title"><?= $properties['trusting_properties']['intro']; ?></p>
            </div>
            <?php if($properties['trusting_properties']['cards']): foreach($properties['trusting_properties']['cards'] as $item): ?>
                <div class="col-6 col-lg-3 mb-4">
                    <div class="card-property">
                        <div class="icon">
                            <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>">
                        </div>
                        <h4 class="name"><?= $item['item_name']; ?></h4>
                        <p class="description"><?= $item['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>