<?php
// $script_handle = 'coparativas-condo-purple-content-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/coparativas-condo-purple-content.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: coparativas-condo-purple-content
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_sub_field('coparativas_condo_purple');
$competence = $content['competence_group'];
$neivor = $content['neivor_card'];
$end = $content['end_card_group'];
?>
<section class="comparativas-condo-purple-content-partial-441381 bg-purple-dark">
    <div class="container">
        <!-- Title content -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="comparativas-title-contain d-flex flex-column-reverse gap-3">
                    <?php if(!empty($content['title'])): ?>
                        <h2 class="white-color fw-800 t-size-45"><?= $content['title']; ?></h2>
                    <?php endif; if(!empty($content['label_group']['text'])): ?>
                        <span class="comparativas-label d-flex gap-3 justify-content-center align-items-center bg-white-10 w-max-content rounded-45 mx-auto pueple-color-pr px-3 py-2 t-size-12 fw-700">
                            <?= wp_get_attachment_image($content['label_group']['icon'] ?? '', 'large', false, array(
                                'class' => 'comparativas-label-icon',
                                'loading' => 'lazy',
                                'decoding' => 'async',
                                'alt' => 'Imagen de ' . $content['label_group']['text']
                            )); ?>
                            <?= $content['label_group']['text']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if(!empty($content['description'])): ?>
                    <p class="fw-500 purple-light h-size-20"><?= $content['description']; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comparison cards -->
        <div class="row gap-4 gap-md-0">
            <?php if(!empty($competence)): ?>
                <div class="col-12 col-md-6">
                    <div class="comparativas-card competence p-4">
                        <div class="head d-flex align-items-center justify-content-between">
                            <div class="text-head">
                                <?php if(!empty($competence['label'])): ?>
                                    <span class="label t-size-12 fw-700"><?= $competence['label']; ?></span>
                                <?php endif; if(!empty($competence['card_title'])): ?>
                                    <h3 class="title m-0 white-color fw-700 h2"><?= $competence['card_title']; ?></h3>
                                <?php endif; if(!empty($competence['intro'])): ?>
                                    <p class="intro m-0 white-color fw-400 t-size-14"><?= $competence['intro']; ?></p>
                                <?php endif; ?>
                            </div>
                            <?= wp_get_attachment_image($competence['card_icon'] ?? '', 'large', false, array(
                                'class' => 'icon',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                            )); ?>
                        </div>
                        <?php if(!empty($competence['list_items'])): ?>
                            <ul class="body-list ps-md-0 px-md-5 ">
                                <?php foreach($competence['list_items'] as $item): ?>
                                    <li class="item t-size-14 d-flex gap-3">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.16667 11.6667L0 10.5L4.66667 5.83333L0 1.16667L1.16667 0L5.83333 4.66667L10.5 0L11.6667 1.16667L7 5.83333L11.6667 10.5L10.5 11.6667L5.83333 7L1.16667 11.6667V11.6667" fill="#FFDAD6"/>
                                        </svg>
                                        <span><?= $item['text']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; if(!empty($competence['text_end'])): ?>
                            <div class="footer">
                                <p class="t-size-14 fw-600 text-center m-0"><?= $competence['text_end']; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; if(!empty($neivor)): ?>
                <div class="col-12 col-md-6">
                    <div class="comparativas-card neivor p-4">
                        <div class="head d-flex align-items-center justify-content-between">
                            <div class="text-head">
                                <?php if(!empty($neivor['label'])): ?>
                                    <span class="label t-size-12 fw-700"><?= $neivor['label']; ?></span>
                                <?php endif; if(!empty($neivor['card_title'])): ?>
                                    <h3 class="title m-0 white-color fw-700 h2"><?= $neivor['card_title']; ?></h3>
                                <?php endif; if(!empty($neivor['intro'])): ?>
                                    <p class="intro m-0 white-color fw-400 t-size-14"><?= $neivor['intro']; ?></p>
                                <?php endif; ?>
                            </div>
                            <?= wp_get_attachment_image($neivor['card_icon'] ?? '', 'large', false, array(
                                'class' => 'icon',
                                'loading' => 'lazy',
                                'decoding' => 'async'
                            )); ?>
                        </div>
                        <?php if(!empty($neivor['list_items'])): ?>
                            <ul class="body-list">
                                <?php foreach($neivor['list_items'] as $item): ?>
                                    <li class="item t-size-14 d-flex gap-3">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.16667 12.1667L13.0417 6.29167L11.875 5.125L7.16667 9.83333L4.79167 7.45833L3.625 8.625L7.16667 12.1667V12.1667M8.33333 16.6667C7.18056 16.6667 6.09722 16.4479 5.08333 16.0104C4.06944 15.5729 3.1875 14.9792 2.4375 14.2292C1.6875 13.4792 1.09375 12.5972 0.65625 11.5833C0.21875 10.5694 0 9.48611 0 8.33333C0 7.18056 0.21875 6.09722 0.65625 5.08333C1.09375 4.06944 1.6875 3.1875 2.4375 2.4375C3.1875 1.6875 4.06944 1.09375 5.08333 0.65625C6.09722 0.21875 7.18056 0 8.33333 0C9.48611 0 10.5694 0.21875 11.5833 0.65625C12.5972 1.09375 13.4792 1.6875 14.2292 2.4375C14.9792 3.1875 15.5729 4.06944 16.0104 5.08333C16.4479 6.09722 16.6667 7.18056 16.6667 8.33333C16.6667 9.48611 16.4479 10.5694 16.0104 11.5833C15.5729 12.5972 14.9792 13.4792 14.2292 14.2292C13.4792 14.9792 12.5972 15.5729 11.5833 16.0104C10.5694 16.4479 9.48611 16.6667 8.33333 16.6667V16.6667M8.33333 15C10.1944 15 11.7708 14.3542 13.0625 13.0625C14.3542 11.7708 15 10.1944 15 8.33333C15 6.47222 14.3542 4.89583 13.0625 3.60417C11.7708 2.3125 10.1944 1.66667 8.33333 1.66667C6.47222 1.66667 4.89583 2.3125 3.60417 3.60417C2.3125 4.89583 1.66667 6.47222 1.66667 8.33333C1.66667 10.1944 2.3125 11.7708 3.60417 13.0625C4.89583 14.3542 6.47222 15 8.33333 15V15M8.33333 8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333V8.33333" fill="#7DFAB6"/>
                                        </svg>
                                        <span><?= $item['text']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; if(!empty($neivor['texts_end'])): ?>
                            <div class="footer d-md-flex justify-content-between">
                                <p class="left t-size-14 fw-600 m-0 text-center text-md-start"><?= $neivor['texts_end']['left']; ?></p>
                                <p class="right t-size-14 fw-600 m-0 text-center text-md-end"><?= $neivor['texts_end']['right']; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- End card -->
        <div class="row mt-4 mt-md-5">
            <div class="col-12">
                <div class="end-card">
                    <?= wp_get_attachment_image($end['icon'] ?? '', 'large', false, array(
                        'class' => 'icon-image',
                        'loading' => 'lazy',
                        'decoding' => 'async'
                    )); ?>
                    <div class="texts">
                        <?php if(!empty($end['title'])): ?>
                            <h3 class="pueple-color-pr fw-700 m-0 t-size-14"><?= $end['title']; ?></h3>
                        <?php endif; if(!empty($end['description'])): ?>
                            <p class=""><?= $end['description']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    