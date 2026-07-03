   
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
$purple = $properties['card_with_purple_border'];
?>
<section class="new-properties-you-trust-partial-88f88c" style="nackground: <?= $properties['background'] ?? '#ffffff'; ?>">
    <div class="container">
        <?php if($properties['enable_trusting_properties'] === true): ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="title"><?= $properties['trusting_properties']['title']; ?></h2>
                    <p class="intro-before-title"><?= $properties['trusting_properties']['intro']; ?></p>
                </div>
                <?php 
                $cards = $properties['trusting_properties']['cards'];
                $total = count($cards);
                if($cards): foreach($cards as $item): ?>
                    <div class="<?= $properties['trusting_properties']['column_width'] ?? 'col-12 md-4 col-lg-3'; ?> mb-4">
                        <div class="card-property"> 
                            <div class="icon">
                                <?= wp_get_attachment_image($item['icon']['ID'] ?? '', 'medium', false, array(
                                    'class' => 'card-icon',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                    'style' => 'width: ' . ($properties['trusting_properties']['icon_width'] ?? '50') . 'px;',
                                )) ?>
                            </div>
                            <p class="name" style="font-size: <?= $properties['trusting_properties']['title_size'] ?? '19' ?>px"><?= $item['item_name']; ?></p>
                            <p class="description" style="font-size: <?= $properties['trusting_properties']['paragraph_size'] ?? '15' ?>px"><?= $item['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        <?php endif; if($properties['enable_card'] == true): ?>
            <div class="row justify-content-center">
                <div class="<?= $purple['width'] ?? 'col-12' ?>">
                    <div class="card-border-purple">
                        <span class="overly-purple"><?= $purple['number'] ?? ''; ?></span>
                        <div class="description" style="font-size: <?= $purple['text_size'] ?? 'text_size' ?>px;"><?= $purple['description'] ?? '';  ?></div>
                        <?php if(!empty($purple['link'])): $cta = $purple['link']; ?>
                            <a href="<?= $cta['url']; ?>" target="<?= $cta['target'] ?? '_self'; ?>" class="call-to-action">
                                <?= $cta['title']; ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>