   
<?php
/**
 * 
 * Partial Name: properties-that-trust-neivor
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$before_properties = get_field('content_group_before_properties_that_trust_neivor');
$properties = get_field('group_content_properties_that_trust_neivor');
?>
<section class="properties-that-trust-neivor-partial-243d09">
    <div class="container">
        <?php if(get_field('enable_content_group_before_properties_that_trust_neivor')): ?>
            <div class="row content-group-before-properties-that-trust-neivor">
                <div class="col-2 d-none d-md-block">
                    <div class="icon-contain">
                        <svg width="99" height="94" viewBox="0 0 99 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_i_437_9635)">
                                <rect x="0.282715" width="98.6468" height="93.5" rx="17.156" fill="white"/>
                            </g>
                            <defs>
                                <filter id="filter0_i_437_9635" x="0.282715" y="0" width="107.225" height="102.078" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dx="8.57798" dy="8.57798"/>
                                    <feGaussianBlur stdDeviation="21.445"/>
                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0.92549 0 0 0 0 0.92549 0 0 0 0 0.964706 0 0 0 1 0"/>
                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_437_9635"/>
                                </filter>
                            </defs>
                        </svg>
                        <img src="<?= $before_properties['icon']['url']; ?>" alt="<?= $before_properties['icon']['title']; ?>">
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <h2><?= $before_properties['title']; ?></h2>
                    <p><?= $before_properties['description']; ?></p>
                </div>
            </div>
        <?php 
            endif;
            if(get_field('enable_properties_that_trust_neivor')):
        ?>
        <div class="row properties-that-trust-neivor">
            <div class="col-12">
                <h2 class="title"><?= $properties['title']; ?></h2>
                <p class="intro-before-title"><?= $properties['description']; ?></p>
            </div>
            <?php if($properties['cards_items']): foreach($properties['cards_items'] as $item): ?>
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
        <?php endif; ?>
    </div>
</section>
                    