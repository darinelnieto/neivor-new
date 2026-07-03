   
<?php
/**
 * 
 * Partial Name: slide-cards-with-gradient
 * Layout: flexible_slide_cards_with_gradient
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$slide_cards = get_sub_field('slide_cards_with_gradient');
if(!empty($slide_cards['cards'])):
$script_handle = 'slide-cards-with-gradient-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/slide-cards-with-gradient.js',
    array('jquery'),
    null,
    true
);
?>
<section class="slide-cards-with-gradient-partial-da9845">
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="inro-content">
                <h2 class="title"><?= $slide_cards['title'] ?? '';  ?></h2>
                <p class="introduction_desc"><?= $slide_cards['description'] ?? ''; ?></p>
            </div>
            <div class="cards-slide owl-carousel">
                <?php foreach ($slide_cards['cards'] as $card) : ?>
                    <?php if($card['enable_link'] === true): ?>
                        <div class="item">
                            <a href="<?= $card['call_to_action']['link']['url'] ?? '#'; ?>" target="<?= $card['call_to_action']['link']['target'] ?? '_self'; ?>">
                    <?php endif ?>
                        <div class="card-item">
                            <div class="image">
                                <?= wp_get_attachment_image($card['image'], 'large', false, array(
                                    'class' => 'img',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )); ?>
                            </div>
                            <div class="text_card">
                                <h3 class="card-title"><?= $card['title'] ?? ''; ?></h3>
                                <div class="card-description">
                                    <?= $card['description'] ?? ''; ?>
                                </div>
                                <?php if(!empty($card['sorted_list'])): ?>
                                    <ul class="sorted_list">
                                        <?php foreach ($card['sorted_list'] as $item) : ?>
                                            <li>
                                                <span class="bullet" style="background: <?= $card['gradient'] ?? 'linear-gradient(180deg, #86B5B6 0%, #62B7EE 100%)'; ?>;">
                                                    <i class="fa-solid fa-check"></i>
                                                </span>
                                                <span class="li-text">
                                                    <?= $item['text'] ?? ''; ?>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="result-card">
                                    <span class="overly-gradient" style="background: <?= $card['gradient'] ?? ''; ?>;"></span>
                                    <span class="text-color-gradient" style="background: <?= $card['gradient'] ?? ''; ?>; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                        <?= $card['end_content']['span'] ?? ''; ?>
                                    </span>
                                    <p class="result-text"><?= $card['end_content']['text'] ?? ''; ?></p>
                                </div>
                                <?php if($card['enable_link'] === true): ?>
                                    <span class="call-to-action-text mt-3">
                                        <?= $card['call_to_action']['text'] ?? 'Conocer más'; ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                                        </svg>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php if($card['enable_link'] === true): ?>
                            </a>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
   </div>
</section>
<?php endif; ?>