   
<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('banner_content');
$size = wp_get_post_terms(get_the_ID(), 'size_cat');
if($size){
    $size_icon = get_field('icon', 'size_cat_' . $size[0]->term_id);
}
$segment = wp_get_post_terms(get_the_ID(), 'segment_cat');
if($segment){
    $segment_icon = get_field('icon', 'segment_cat_' . $segment[0]->term_id);
}
$zone = wp_get_post_terms(get_the_ID(), 'zone_cat');
if($zone){
    $zone_icon = get_field('icon', 'segment_cat_' . $zone[0]->term_id);
}
?>
<section class="banner-partial-6c95c4" style="<?= $banner['background_gradient']; ?>">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="text-content">
                        <div class="title-content">
                            <?php if($banner['project_name']): ?>
                                <h1 class="project-name"><?= $banner['project_name']; ?></h1>
                            <?php endif; if($banner['description']): ?>
                                <h2 class="description"><?= $banner['description']; ?></h2>
                            <?php endif; if($banner['texts']): ?>
                                <p class="texts d-none d-md-block"><?= $banner['texts']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="taxonomies-tab d-none d-md-block">
                            <ul>
                                <?php if($size): ?>
                                    <li>
                                        <div class="icon">
                                            <img src="https://www.neivor.com/wp-content/uploads/2025/03/Group-2.png" alt="Edificio" class="icon">
                                        </div>
                                        <div class="text">
                                            <span class="size"><?php if(get_bloginfo("language") == "en-US"): ?>Size<?php else: ?>Tamaño<?php endif; ?></span>
                                            <p class="size-name"><?= $size[0]->name; ?></p>
                                        </div>
                                    </li>
                                <?php endif; if($segment): ?>
                                    <li>
                                        <div class="icon">
                                            <img src="<?= $segment_icon['url']; ?>" alt="<?= $segment_icon['title']; ?>" class="icon">
                                        </div>
                                        <div class="text">
                                            <span class="size"><?php if(get_bloginfo("language") == "en-US"): ?>Segment<?php else: ?>Segmento<?php endif; ?></span>
                                            <p class="size-name"><?= $segment[0]->name; ?></p>
                                        </div>
                                    </li>
                                <?php endif; if($zone): ?>
                                    <li>
                                        <div class="icon">
                                            <img src="<?= $zone_icon['url']; ?>" alt="<?= $zone_icon['title']; ?>" class="icon">
                                        </div>
                                        <div class="text">
                                            <span class="size"><?php if(get_bloginfo("language") == "en-US"): ?>Zone<?php else: ?>Zona<?php endif; ?></span>
                                            <p class="size-name"><?= $zone[0]->name; ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if($banner['project_link']): ?>
                            <a href="<?= $banner['project_link']['url']; ?>" target="<?= $banner['project_link']['target']; ?>" class="project-link d-none d-md-flex">
                                <span><?= $banner['project_link']['title']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <?php if($banner['enable_video_right_content'] === false): ?>
                    <div class="image-content">
                        <?php if($banner['desktop_image']): ?>
                            <img src="<?= $banner['desktop_image']['url']; ?>" alt="<?= $banner['desktop_image']['title']; ?>" <?php if($banner['custom_style_image_desktop'] === true): ?>style="max-width:<?= $banner['max_width_desktop']; ?>; margin:<?= $banner['desktop_margin']; ?>;"<?php endif; ?> class="d-none d-md-block">
                        <?php endif; if($banner['movil_image']): ?>
                            <img src="<?= $banner['movil_image']['url']; ?>" alt="<?= $banner['movil_image']['title']; ?>" <?php if($banner['custom_style_for_mobile_image'] === true): ?>style="max-width:<?= $banner['max_width_movil']; ?>; margin:<?= $banner['margin_movil']; ?>;"<?php endif; ?> class="d-block d-md-none">
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                        <div class="video">
                            <?= $banner['video_right']; ?>
                        </div>
                    <?php endif; if($banner['texts']): ?>
                        <div class="title-content d-block d-md-none">
                            <p class="texts"><?= $banner['texts']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-content">
                        <div class="taxonomies-tab d-flex d-md-none">
                            <ul>
                                <?php if($size): ?>
                                    <li>
                                        <div class="icon">
                                            <img src="<?= $size_icon['url']; ?>" alt="<?= $size_icon['title']; ?>" class="icon">
                                        </div>
                                        <div class="text">
                                            <span class="size"><?php if(get_bloginfo("language") == "en-US"): ?>Size<?php else: ?>Tamaño<?php endif; ?></span>
                                            <p class="size-name"><?= $size[0]->name; ?></p>
                                        </div>
                                    </li>
                                <?php endif; if($segment): ?>
                                    <li>
                                        <div class="icon">
                                            <img src="<?= $segment_icon['url']; ?>" alt="<?= $segment_icon['title']; ?>" class="icon">
                                        </div>
                                        <div class="text">
                                            <span class="size"><?php if(get_bloginfo("language") == "en-US"): ?>Segment<?php else: ?>Segmento<?php endif; ?></span>
                                            <p class="size-name"><?= $segment[0]->name; ?></p>
                                        </div>
                                    </li>
                                <?php endif; if($zone): ?>
                                    <li>
                                        <div class="icon">
                                            <img src="<?= $zone_icon['url']; ?>" alt="<?= $zone_icon['title']; ?>" class="icon">
                                        </div>
                                        <div class="text">
                                            <span class="size"><?php if(get_bloginfo("language") == "en-US"): ?>Zone<?php else: ?>Zona<?php endif; ?></span>
                                            <p class="size-name"><?= $zone[0]->name; ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if($banner['project_link']): ?>
                            <a href="<?= $banner['project_link']['url']; ?>" target="<?= $banner['project_link']['target']; ?>" class="project-link d-flex d-md-none">
                                <span><?= $banner['project_link']['title']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($banner['enable_video'] === true): ?>
        <div class="video-after-banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 col-lg-10 mt-5">
                        <div class="video">
                            <?= $banner['video_url']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
                    
