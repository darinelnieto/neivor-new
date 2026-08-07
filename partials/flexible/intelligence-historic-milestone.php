<?php
// $script_handle = 'intelligence-historic-milestone-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/intelligence-historic-milestone.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: intelligence-historic-milestone
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$his_mil = get_sub_field('historic_milestone');
$left_c = $his_mil['left_content'];
$right_c = $his_mil['right_content'];
?>
<section class="intelligence-historic-milestone-partial-eff3fd">
    <div class="container">
        <div class="row">
            <?php if(!empty($left_c)): ?>
                <div class="col-12 col-md-6 left_c">
                    <div class="title-content-top">
                        <?php if(!empty($left_c['label'])): ?>
                            <span class="label"><?= $left_c['label']; ?></span>
                        <?php endif; if(!empty($left_c['title'])): ?>
                            <h2 class="title"><?= $left_c['title']; ?></h2>
                        <?php endif; if($left_c['subtitle']): ?>
                            <p class="subtitle"><?= $left_c['subtitle']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-description">
                        <?php if(!empty($left_c['card_description'])): ?>
                            <p class="description"><?= $left_c['card_description'] ?></p>
                        <?php endif; if(!empty($left_c['user'])): $user = $left_c['user']; ?>
                            <div class="user">
                                <?php if(!empty($user['initials'])): ?>
                                    <span class="initial"><?= $user['initials']; ?></span>
                                <?php endif; if(!empty($user['name']) || !empty($user['rol'])): ?>
                                    <div class="texts">
                                        <?php if(!empty($user['name'])): ?>
                                            <p class="name"><?= $user['name']; ?></p>
                                        <?php endif; if(!empty($user['rol'])): ?>
                                            <p class="rol"><?= $user['rol']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; if(!empty($right_c)): ?>
                <div class="col-12 col-md-6 mt-5 mt-md-0 right_c">
                    <?php if(!empty($right_c['video'])): ?>
                        <div class="video-content">
                            <?= $right_c['video'] ?>
                        </div>
                    <?php endif; if(!empty($right_c['purple_card'])): $purple = $right_c['purple_card'] ?>
                        <div class="purple-card">
                            <?php if(!empty($purple['percentage'])): ?>
                                <p class="percentage"><?= $purple['percentage']; ?></p>
                            <?php endif; if(!empty($purple['description'])): ?>
                                <p class="card-descripion"><?= $purple['description']; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; if(!empty($right_c['logos'])): ?>
                        <div class="logos-contain">
                            <?php foreach($right_c['logos'] as $img): ?>
                                <div class="img-item">
                                    <?= wp_get_attachment_image($img, 'large', false, array(
                                        'class' => 'full-image',
                                        'loading' => 'lazy',
                                        'decoding' => 'async'
                                    )); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
                    