   
<?php
// Flexible Builder wrapper. Original: partials/home-v2/neivor-intelligence.php

/**
 *
 * Partial Name: home/neivor-intelligence
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$ni = get_sub_field('neivor_intelligence');
if ( empty( $ni ) || empty( $ni['enable'] ) ) return;
?>
<section class="new-neivor-intelligence-partial">
    <span class="ni-dots" aria-hidden="true">
        <svg width="34" height="148" viewBox="0 0 34 148" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.83333 5.66667C4.39814 5.66667 5.66667 4.39814 5.66667 2.83333C5.66667 1.26853 4.39814 0 2.83333 0C1.26853 0 0 1.26853 0 2.83333C0 4.39814 1.26853 5.66667 2.83333 5.66667ZM2.83333 34C4.39814 34 5.66667 32.7315 5.66667 31.1667C5.66667 29.6019 4.39814 28.3333 2.83333 28.3333C1.26853 28.3333 0 29.6019 0 31.1667C0 32.7315 1.26853 34 2.83333 34ZM5.66667 59.5C5.66667 61.0648 4.39814 62.3333 2.83333 62.3333C1.26853 62.3333 0 61.0648 0 59.5C0 57.9352 1.26853 56.6667 2.83333 56.6667C4.39814 56.6667 5.66667 57.9352 5.66667 59.5ZM2.83333 90.6667C4.39814 90.6667 5.66667 89.3981 5.66667 87.8333C5.66667 86.2685 4.39814 85 2.83333 85C1.26853 85 0 86.2685 0 87.8333C0 89.3981 1.26853 90.6667 2.83333 90.6667ZM5.66667 116.167C5.66667 117.731 4.39814 119 2.83333 119C1.26853 119 0 117.731 0 116.167C0 114.602 1.26853 113.333 2.83333 113.333C4.39814 113.333 5.66667 114.602 5.66667 116.167ZM2.83333 147.333C4.39814 147.333 5.66667 146.065 5.66667 144.5C5.66667 142.935 4.39814 141.667 2.83333 141.667C1.26853 141.667 0 142.935 0 144.5C0 146.065 1.26853 147.333 2.83333 147.333ZM34 2.83333C34 4.39814 32.7315 5.66667 31.1667 5.66667C29.6019 5.66667 28.3333 4.39814 28.3333 2.83333C28.3333 1.26853 29.6019 0 31.1667 0C32.7315 0 34 1.26853 34 2.83333ZM31.1667 34C32.7315 34 34 32.7315 34 31.1667C34 29.6019 32.7315 28.3333 31.1667 28.3333C29.6019 28.3333 28.3333 29.6019 28.3333 31.1667C28.3333 32.7315 29.6019 34 31.1667 34ZM34 59.5C34 61.0648 32.7315 62.3333 31.1667 62.3333C29.6019 62.3333 28.3333 61.0648 28.3333 59.5C28.3333 57.9352 29.6019 56.6667 31.1667 56.6667C32.7315 56.6667 34 57.9352 34 59.5ZM31.1667 90.6667C32.7315 90.6667 34 89.3981 34 87.8333C34 86.2685 32.7315 85 31.1667 85C29.6019 85 28.3333 86.2685 28.3333 87.8333C28.3333 89.3981 29.6019 90.6667 31.1667 90.6667ZM34 116.167C34 117.731 32.7315 119 31.1667 119C29.6019 119 28.3333 117.731 28.3333 116.167C28.3333 114.602 29.6019 113.333 31.1667 113.333C32.7315 113.333 34 114.602 34 116.167ZM31.1667 147.333C32.7315 147.333 34 146.065 34 144.5C34 142.935 32.7315 141.667 31.1667 141.667C29.6019 141.667 28.3333 142.935 28.3333 144.5C28.3333 146.065 29.6019 147.333 31.1667 147.333Z" fill="#BDB6FF" fill-opacity="0.39"/>
        </svg>
    </span>
    <div class="container">
        <div class="ni-inner">
            <div class="ni-content">
                <?php if ( ! empty( $ni['label'] ) ) : ?>
                    <span class="ni-label"><?= esc_html( $ni['label'] ); ?></span>
                <?php endif; ?>

                <?php if ( ! empty( $ni['title_bold'] ) || ! empty( $ni['title_regular'] ) ) : ?>
                    <h2>
                        <?php if ( ! empty( $ni['title_bold'] ) ) : ?><strong><?= esc_html( $ni['title_bold'] ); ?></strong><?php endif; ?>
                        <?php if ( ! empty( $ni['title_regular'] ) ) : ?> <?= esc_html( $ni['title_regular'] ); ?><?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ( ! empty( $ni['description'] ) ) : ?>
                    <p><?= esc_html( $ni['description'] ); ?></p>
                <?php endif; ?>

                <?php if ( ! empty( $ni['cta_link']['url'] ) ) : ?>
                    <a href="<?= esc_url( $ni['cta_link']['url'] ); ?>"
                       class="ni-cta"
                       <?= ! empty( $ni['cta_link']['target'] ) ? 'target="' . esc_attr( $ni['cta_link']['target'] ) . '"' : ''; ?>>
                        <?= esc_html( $ni['cta_link']['title'] ); ?> &rsaquo;
                    </a>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $ni['image'] ) ) : ?>
                <div class="ni-media">
                    <?= wp_get_attachment_image( $ni['image'], 'large', false, array(
                        'class' => 'ni-image',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    ) ); ?>

                    <?php if ( ! empty( $ni['pill_text_regular'] ) || ! empty( $ni['pill_text_colored'] ) ) :
                        $pill_link = $ni['pill_link'] ?? [];
                    ?>
                        <div class="ni-pill-wrap">
                            <a href="<?= esc_url( $pill_link['url'] ?? '#' ); ?>"
                               class="ni-pill"
                               <?= ! empty( $pill_link['target'] ) ? 'target="' . esc_attr( $pill_link['target'] ) . '"' : ''; ?>>
                                <?php if ( ! empty( $ni['pill_text_regular'] ) ) : ?>
                                    <span class="ni-pill__regular"><?= esc_html( $ni['pill_text_regular'] ); ?></span>
                                <?php endif; ?>
                                <?php if ( ! empty( $ni['pill_text_colored'] ) ) : ?>
                                    <span class="ni-pill__colored"><?= esc_html( $ni['pill_text_colored'] ); ?></span>
                                <?php endif; ?>
                            </a>
                            <?php if ( ! empty( $ni['pill_icon'] ) ) : ?>
                                <span class="ni-pill__icon">
                                    <?= wp_get_attachment_image( $ni['pill_icon'], 'large', false, array( 'alt' => '', 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
