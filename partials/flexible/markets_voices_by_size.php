<?php
$script_handle = 'voices-by-size-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/voices-by-size.js',
    array('jquery'),
    null,
    true
);
/**
 * * Partial Name: voices-by-size
 * */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$voices_by_size = get_sub_field('voices_by_size');
?>
<section class="new-voices-by-size-partial-07bb70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $voices_by_size['title']; ?></h2>
                <p class="introduction"><?= $voices_by_size['introduction']; ?></p>
            </div>
            <div class="col-12">
                <?php  
                    if($voices_by_size['items']):  
                        $key = -1;
                        $key_item = -1;
                ?>
                <div class="row desktop-content">
                    <div class="col-4 tabs" id="tabs-voices-by-size">
                        <ul>
                            <?php foreach($voices_by_size['items'] as $tab): $key++; ?>
                                <li class="item-tab-<?= $key; ?> <?php if($key === 0): ?>active<?php endif; ?>">
                                    <a href="#" rel="nofollow" data-tab="<?= $key; ?>" class="tab-item">
                                        <div class="icon">
                                            <?= wp_get_attachment_image( $tab['icon'], 'medium', false, array(
                                                'class' => 'icon-img',
                                                'loading' => 'lazy',
                                                'decoding' => 'async',
                                            ) ); ?>
                                        </div>
                                        <div class="texts">
                                            <span class="name"><?= $tab['address']; ?></span>
                                            <span class="units"><?= $tab['units']; ?></span>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-8">
                        <div class="body-tab">
                            <div class="owl-carousel" id="slide-desktop">
                                <?php foreach($voices_by_size['items'] as $item): $key_item++; ?>
                                    <div class="body-item this-item-<?= $key_item; ?>">
                                        <input type="hidden" class="position-item" value="<?= $key_item; ?>">
                                        <div class="description-contain">
                                            <h3><?= $item['address'] ?? '' ?></h3>
                                            <p class="description"><?= $item['descriptions'] ?? ''; ?></p>
                                            <hr>
                                            <div class="end-content">
                                                <?php if(!empty($item['link'])): ?>
                                                    <span class="name">
                                                        <a style="color:#7D65FE" href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>">
                                                            <?= $item['link']['title']; ?> 
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                                                            </svg>
                                                        </a>  
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="image-contain">
                                            <?= wp_get_attachment_image( $item['photo'], 'large', false, array(
                                                'class' => 'image-item',
                                                'loading' => 'lazy',
                                                'decoding' => 'async',
                                            ) ); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="movil-content">
                    <div class="slide-voices owl-carousel">
                        <?php foreach($voices_by_size['items'] as $item): ?>
                            <div class="item">
                                 <div class="tab-item">
                                    <div class="icon">
                                        <?= wp_get_attachment_image( $item['icon'], 'medium', false, array(
                                            'class' => 'icon-img',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                        ) ); ?>
                                    </div>
                                    <div class="texts">
                                        <span class="name"><?= $item['address']; ?></span>
                                        <span class="units"><?= $item['units']; ?></span>
                                    </div>
                                </div>
                                <div class="body-item">
                                    <div class="description-contain">
                                        <h3><?= $item['address'] ?? '' ?></h3>
                                        <p class="description"><?= $item['descriptions']; ?></p>
                                        <div class="end-content">
                                            <span class="name">
                                                 <a style="color:#7D65FE" href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>"><?= $item['link']['title']; ?></a>   
                                            </span>
                                            <span><?= $item['units']; ?></span>
                                        </div>
                                    </div>
                                    <div class="image-contain">
                                        <?= wp_get_attachment_image( $item['photo'], 'large', false, array(
                                            'class' => 'image-item',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                        ) ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; if($voices_by_size['see_all']): ?>
                    <a href="<?= $voices_by_size['see_all']['url']; ?>" target="<?= $voices_by_size['see_all']['target']; ?>" class="see-all-btn">
                        <?= $voices_by_size['see_all']['title']; ?>
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
