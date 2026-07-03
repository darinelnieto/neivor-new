   
<?php
/**
 * 
 * Partial Name: benefits_time_line
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$time_line = get_sub_field('time_line_group');
$left = $time_line['left_content'];
$content_right = $time_line['right'];
if(!empty($content_right)):
?>
<section class="benefits-time-line-partial-174187">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-4 col-lg-3 intro mb-5 mb-md-0">
                    <?php if(!empty($left['label'])): ?>
                        <span class="label"><?= $left['label']; ?></span>
                    <?php endif; if(!empty($left['title'])): ?>
                        <h2 class="title"><?= $left['title']; ?></h2>
                    <?php endif; if(!empty($left['intro'])): ?>
                        <p class="intro"><?= $left['intro'] ?></p>
                    <?php endif; ?>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                <?php foreach($content_right as $right): ?>
                    <div class="time-line mb-5 mb-md-4">
                        <?php if(!empty($right['label'])): ?>
                            <span class="label"><?= $right['label']; ?></span>
                        <?php endif; if(!empty($right['title'])): ?>
                            <h3 class="title"><?= $right['title']; ?></h3>
                        <?php endif; if(!empty($right['description'])): ?>
                            <p class="description"><?= $right['description'] ?></p>
                        <?php endif; if(!empty($right['image'])): ?>
                            <div class="main-image">
                                <?= wp_get_attachment_image($right['image'], 'medium', false, array(
                                    'calss' => 'img-fluid',
                                    'loading' => 'lazy',
                                    'decoding' => 'async'
                                )) ?>
                            </div>
                        <?php endif; if(!empty($right['call_to_action'])): $cta = $right['call_to_action']; ?>
                            <a href="<?= $cta['url']; ?>" target="<?= $cta['target'] ?? '_self' ?>" class="call-to-action">
                                <?= $cta['title'] ?> 
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.10208 5.25H0V4.08333H7.10208L3.83542 0.816667L4.66667 0L9.33333 4.66667L4.66667 9.33333L3.83542 8.51667L7.10208 5.25Z" fill="#7E66FC"/>
                                </svg>
                            </a>
                        <?php endif; if($right['result'] == true): $result = $right['result_grup']; ?>
                            <div class="result">
                                <span class="result-label"><?= $result['label'] ?? ''; ?></span>
                                <h4 class="result-title"><?= $result['title'] ?? ''; ?></h4>
                                <p class="result-description"><?= $result['info'] ?? ''; ?></p>
                                <?= wp_get_attachment_image($result['icono'] ?? '', 'medium', false, array(
                                    'class' => 'img-fluid',
                                    'loading' => 'lazy',
                                    'decoding' => 'async'
                                )); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>