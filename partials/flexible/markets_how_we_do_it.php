   
<?php
/**
 * 
 * Partial Name: how-we-do-it
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
    $how_we_do_it = get_sub_field('how_we_do_it');
    $item_by_step = $how_we_do_it['step_by_step'];
?>
<section class="new-how-we-do-it-partial-7ad96e">
    <div class="container">
            <div class="row">
                <div class="col-12 mb-md-5">
                    <h2 class="title"><?= $how_we_do_it['title'] ?? ''; ?></h2>
                    <p class="description"><?= $how_we_do_it['description'] ?? ''; ?></p>
                </div>
            </div>
        <?php 
            if(!empty($item_by_step)): $key = 0; foreach($item_by_step as $item): $key++; 
        ?>
            <div class="row step-by-step">
                <div class="col-12 col-md-<?= $item['text_colum_size_md']; ?> step-text">
                    <div class="count d-none d-md-flex">
                        <?= sprintf('%02d', $key); ?>
                    </div>
                    <?php if(!empty($item['overly_span']['text'])): ?>
                        <span class="overly d-none d-md-flex" style="background: <?= $item['overly_span']['background_gradient'] ?? 'transparent'; ?>">
                            <?= $item['overly_span']['text']; ?>
                        </span>
                    <?php endif; ?>
                    <h3 class="step-title d-none d-md-block"><?= $item['title'] ?? ''; ?></h3>
                    <div class="description">
                        <?= $item['description'] ?? ''; ?>
                    </div>
                    <?php if(!empty($item['result'])): ?>
                        <div class="result">
                            <span class="before-title">
                                <?= $item['result']['text_before_title'] ?? ''; ?>
                            </span>
                            <h4 class="result-title"><?= $item['result']['title'] ?? ''; ?></h4>
                            <p class="result_descr"><?= $item['result']['description'] ?? ''; ?></p>
                            <?= wp_get_attachment_image($item['result']['icon_image'] ?? '', 'large', false, array(
                                'class' => 'result-icon',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                            )); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($item['know_more']['link'])): ?>
                        <a href="<?= $item['know_more']['link']['url']; ?>" target="<?= $item['know_more']['link']['target'] ?? ''; ?>" class="cta-know-more">
                            <span><?= $item['know_more']['text'] ?? ''; ?></span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-<?= $item['image_colum_size_md']; ?> mb-4 mb-md-0">
                    <div class="step-text ps-0 d-block d-md-none">
                        <div class="count">
                            <?= sprintf('%02d', $key); ?>
                        </div>
                        <?php if(!empty($item['overly_span']['text'])): ?>
                            <span class="overly" style="background: <?= $item['overly_span']['background_gradient'] ?? 'transparent'; ?>">
                                <?= $item['overly_span']['text']; ?>
                            </span>
                        <?php endif; ?>
                        <h3 class="step-title"><?= $item['title'] ?? ''; ?></h3>
                    </div>
                    <?= wp_get_attachment_image($item['image'] ?? '', 'large', false, array(
                        'class' => 'step-image',
                        'loading' => 'lazy',
                        'decoding' => 'async'
                    )); ?>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
</section>