   
<?php
/**
 * 
 * Partial Name: how-we-do-it
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
    $how_we_do_it = get_field('how_we_do_it');
    $step_by_step = get_field('how_we_do_it_step_by_step');
?>
<section class="how-we-do-it-partial-7ad96e">
    <div class="container">
        <?php if(get_field('enable_how_we_do_it')): ?>
            <div class="row how-we-do-it justify-content-between">
                <div class="col-12 col-md-6">
                    <h2 class="title d-none d-md-block"><?= $how_we_do_it['title']; ?></h2>
                    <p class="description"><?= $how_we_do_it['description']; ?></p>
                    <?php if($how_we_do_it['add_cta_demo']): ?>
                        <a href="<?= $how_we_do_it['add_cta_demo']['url']; ?>" target="<?= $how_we_do_it['add_cta_demo']['target']; ?>" class="cta-get-demo">
                            <span><?= $how_we_do_it['add_cta_demo']['title']; ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                <path d="M6.91724 11.175L9.51694 8.57529L6.91724 5.97559" stroke="white" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-5">
                    <h2 class="title d-block d-md-none"><?= $how_we_do_it['title']; ?></h2>
                    <div class="image-contain mb-4 mb-md-0">
                        <img src="<?= $how_we_do_it['image']['url']; ?>" alt="<?= $how_we_do_it['image']['title']; ?>">
                    </div>
                </div>
            </div>
        <?php 
            endif; 
            if(get_field('enable_how_we_do_it_step_by_step')):
                if($step_by_step): foreach($step_by_step as $item):
        ?>
            <div class="row step-by-step justify-content-center">
                <div class="col-12">
                    <h2 class="title-step-by-step"><?= $item['title']; ?></h2>
                    <p class="introduction"><?= $item['introduction']; ?></p>
                </div>
                <?php if($item['step_by_step']): foreach($item['step_by_step'] as $step): ?>
                    <div class="row step p-0">
                        <div class="col-12 col-md-<?= $step['image_colum_size_md']; ?> mb-4 mb-md-0">
                            <img src="<?= $step['image']['url']; ?>" alt="<?= $step['image']['title']; ?>">
                        </div>
                        <div class="col-12 col-md-<?= $step['text_colum_size_md']; ?>">
                            <?php if($step['before_title']): ?>
                                <span class="before-title"><?= $step['before_title']; ?></span>
                            <?php endif; ?>
                            <h4><?= $step['title']; ?></h4>
                            <div class="description"><?= $step['description']; ?></div>
                            <?php if($step['know_more']): ?>
                                <a href="<?= $step['know_more']['url']; ?>" target="<?= $step['know_more']['target']; ?>" class="cta-know-more">
                                    <span><?= $step['know_more']['title']; ?></span>
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.58936 11.28L9.18906 8.68027L6.58936 6.08057" stroke="#1A1728" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        <?php endforeach; endif; endif; ?>
    </div>
</section>