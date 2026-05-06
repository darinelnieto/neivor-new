   
<?php
// Flexible Builder wrapper. Original: partials/home-v2/properties-you-trust.php

/**
 * 
 * Partial Name: properties-you-trust
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$properties = get_sub_field('properties_you_trust_content');
if($properties['enable_trusting_properties'] === true):
    $key = 0;
?>
<section class="new-properties-you-trust-partial-88f88c">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $properties['trusting_properties']['title']; ?></h2>
                <p class="intro-before-title"><?= $properties['trusting_properties']['intro']; ?></p>
            </div>
            <?php 
            $cards = $properties['trusting_properties']['cards'];
            $total = count($cards);
            if($cards): foreach($cards as $item): $key++; ?>
                <div class="<?php if($total % 2 !== 0 && $key === $total): ?>col-12<?php else: ?>col-6<?php endif; ?> col-lg-4 mb-4 mb-lg-0">
                    <div class="card-property">
                        <div class="icon">
                            <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>">
                        </div>
                        <p class="name"><?= $item['item_name']; ?></p>
                        <p class="description"><?= $item['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>