<?php
// $script_handle = 'comparatives_success_story-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/comparatives_success_story.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: comparatives_success_story
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$comp_suc = get_sub_field('comparatives_success_story_group');
?>
<section class="comparatives-success-story-partial-273956" style="background:<?= $comp_suc['bg_color'] ?? '#ffffff'; ?>; padding-top: <?= $comp_suc['padding_top'] ?? '80'; ?>px; padding-bottom: <?= $comp_suc['padding_bottom'] ?? '80'; ?>px;">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <?= wp_get_attachment_image($comp_suc['main_image'] ?? '', 'large', false, array(
                    'class' => 'main-image',
                    'loading' => 'lazy',
                    'decoding' => 'async'
                )) ?>
            </div>
            <div class="col-12 col-md-7">
                <?php if(!empty($comp_suc['description'])): ?>
                    <p class="description"><?= $comp_suc['description']; ?></p>
                <?php endif; if(!empty($comp_suc['case_group'])): $case = $comp_suc['case_group']; ?>
                    <div class="case">
                        <?php if(!empty($case['case_initials'])): ?>
                            <span class="initials"><?= $case['case_initials']; ?></span>
                        <?php endif; ?>
                        <div class="case-texts">
                            <?php if(!empty($case['label'])): ?>
                                <p class="label"><?= $case['label']; ?></p>
                            <?php endif; if(!empty($case['name'])): ?>
                                <p class="name"><?= $case['name']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; if(!empty($comp_suc['call_to_action'])): $cta = $comp_suc['call_to_action']; ?>
                    <a href="<?= $cta['url']; ?>" target="<?= $cta['target'] ?? '_self'; ?>" class="learn-more">
                        <?= $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    