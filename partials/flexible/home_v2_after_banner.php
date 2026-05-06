
<?php
// Flexible Builder wrapper. Original: partials/home-v2/after-banner-section.php

/**
 * 
 * Partial Name: after-banner-section
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$after_banner = get_sub_field('after_banner');
if ( $after_banner['enable_conten_after_banner'] === true ) :
    $cards = $after_banner['cards'] ?? [];
?>
<section class="new-after-banner-section-partial-b30c5f">
    <span class="abs-dots" aria-hidden="true">
        <svg width="192" height="75" viewBox="0 0 192 75" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M179.44 6.2288C179.44 9.66887 182.229 12.4576 185.669 12.4576C189.109 12.4576 191.897 9.66887 191.897 6.2288C191.897 2.78873 189.109 -1.21899e-07 185.669 -2.72269e-07C182.229 -4.2264e-07 179.44 2.78873 179.44 6.2288ZM117.152 6.22879C117.152 9.66886 119.941 12.4576 123.381 12.4576C126.821 12.4576 129.609 9.66886 129.609 6.22879C129.609 2.78872 126.821 -2.84459e-06 123.381 -2.99496e-06C119.941 -3.14533e-06 117.152 2.78872 117.152 6.22879ZM61.0927 12.4576C57.6526 12.4576 54.8639 9.66886 54.8639 6.22879C54.8639 2.78872 57.6526 -5.86803e-06 61.0927 -5.71766e-06C64.5327 -5.56729e-06 67.3215 2.78872 67.3215 6.22879C67.3215 9.66886 64.5327 12.4576 61.0927 12.4576ZM-7.42407 6.22879C-7.42407 9.66886 -4.63536 12.4576 -1.19528 12.4576C2.2448 12.4576 5.03351 9.66886 5.03351 6.22879C5.03351 2.78872 2.2448 -8.28998e-06 -1.19528 -8.44035e-06C-4.63536 -8.59072e-06 -7.42407 2.78872 -7.42407 6.22879ZM-63.4832 12.4576C-66.9233 12.4576 -69.712 9.66885 -69.712 6.22879C-69.712 2.78872 -66.9233 -1.13134e-05 -63.4832 -1.1163e-05C-60.0432 -1.10127e-05 -57.2545 2.78872 -57.2545 6.22879C-57.2545 9.66886 -60.0432 12.4576 -63.4832 12.4576ZM-132 6.22878C-132 9.66885 -129.211 12.4576 -125.771 12.4576C-122.331 12.4576 -119.542 9.66885 -119.542 6.22878C-119.542 2.78871 -122.331 -1.37354e-05 -125.771 -1.38857e-05C-129.211 -1.40361e-05 -132 2.78871 -132 6.22878ZM185.669 74.7456C182.229 74.7456 179.44 71.9568 179.44 68.5168C179.44 65.0767 182.229 62.288 185.669 62.288C189.109 62.288 191.897 65.0767 191.897 68.5168C191.897 71.9568 189.109 74.7456 185.669 74.7456ZM117.152 68.5168C117.152 71.9568 119.941 74.7456 123.381 74.7456C126.821 74.7456 129.609 71.9568 129.609 68.5168C129.609 65.0767 126.821 62.288 123.381 62.288C119.941 62.288 117.152 65.0767 117.152 68.5168ZM61.0927 74.7456C57.6526 74.7456 54.8639 71.9568 54.8639 68.5168C54.8639 65.0767 57.6526 62.288 61.0927 62.288C64.5327 62.288 67.3215 65.0767 67.3215 68.5168C67.3215 71.9568 64.5327 74.7456 61.0927 74.7456ZM-7.42408 68.5168C-7.42408 71.9568 -4.63536 74.7456 -1.19529 74.7456C2.24479 74.7456 5.03351 71.9568 5.03351 68.5168C5.03351 65.0767 2.24479 62.288 -1.19528 62.288C-4.63536 62.288 -7.42408 65.0767 -7.42408 68.5168ZM-63.4832 74.7455C-66.9233 74.7455 -69.712 71.9568 -69.712 68.5168C-69.712 65.0767 -66.9233 62.288 -63.4832 62.288C-60.0432 62.288 -57.2545 65.0767 -57.2545 68.5168C-57.2545 71.9568 -60.0432 74.7455 -63.4832 74.7455ZM-132 68.5167C-132 71.9568 -129.211 74.7455 -125.771 74.7455C-122.331 74.7455 -119.542 71.9568 -119.542 68.5167C-119.542 65.0767 -122.331 62.288 -125.771 62.288C-129.211 62.288 -132 65.0767 -132 68.5167Z" fill="#BDB6FF" fill-opacity="0.39"/>
        </svg>
    </span>
    <div class="container">
        <div class="abs-header">
            <?php if ( ! empty( $after_banner['title_bold'] ) || ! empty( $after_banner['title_regular'] ) ) : ?>
                <h2>
                    <?php if ( ! empty( $after_banner['title_bold'] ) ) : ?><strong><?= esc_html( $after_banner['title_bold'] ); ?></strong><?php endif; ?>
                    <?php if ( ! empty( $after_banner['title_regular'] ) ) : ?> <?= esc_html( $after_banner['title_regular'] ); ?><?php endif; ?>
                </h2>
            <?php endif; ?>
            <?php if ( ! empty( $after_banner['subtitle'] ) ) : ?>
                <p class="abs-subtitle"><?= esc_html( $after_banner['subtitle'] ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( ! empty( $cards ) ) : ?>
            <div class="abs-cards">
                <?php foreach ( $cards as $card ) : ?>
                    <div class="abs-card">
                        <?php if ( ! empty( $card['image'] ) ) : ?>
                            <div class="abs-card__image">
                                <?= wp_get_attachment_image( $card['image'], 'large', false, array(
                                    'class' => 'img-fluid',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )); ?>
                            </div>
                        <?php endif; ?>
                        <div class="abs-card__body">
                            <?php if ( ! empty( $card['category'] ) ) : ?>
                                <span class="abs-card__category"><?= esc_html( $card['category'] ); ?></span>
                            <?php endif; ?>
                            <?php if ( ! empty( $card['card_title'] ) ) : ?>
                                <h3><?= esc_html( $card['card_title'] ); ?></h3>
                            <?php endif; ?>
                            <?php if ( ! empty( $card['card_description'] ) ) : ?>
                                <p><?= esc_html( $card['card_description'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $card['link_url'] ) && ! empty( $card['link_text'] ) ) : ?>
                                <a href="<?= esc_url( $card['link_url'] ); ?>" class="abs-card__link">
                                    <?= esc_html( $card['link_text'] ); ?> 
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
