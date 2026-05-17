   
<?php
/**
 * 
 * Partial Name: autor_hero
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$hero = get_sub_field('autor_hero_group');
$posttype = get_queried_object();
?>
<section class="autor-hero-partial-464040">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0">
                <div class="text-content">
                    <?php if(!empty($hero['rol'])): ?>
                        <span class="rol"><?= $hero['rol']; ?></span>
                    <?php endif; ?>
                    <h1 class="title"><?= $posttype->name ?? the_title(); ?></h1>
                    <p class="description"><?= $hero['description'] ?? ''; ?></p>
                    <ul class="contact">
                        <?php if(!empty($hero['linkedin'])): $in = $hero['linkedin']; ?>
                            <li class="linkedin">
                                <a href="<?= $in['url']; ?>" target="<?= $in['target'] ?? '_self'; ?>">
                                    <?= wp_get_attachment_image($hero['linkedin_icon'] ?? '', 'medium', false, array(
                                        'class' => 'in-icon',
                                        'fetchpriority' => 'high',
                                    )) ?>
                                    <?= $in['title'] ?>
                                </a>
                            </li>
                        <?php endif; if($hero['social_netwrk']): foreach($hero['social_netwrk'] as $item): ?>
                            <li class="item-social">
                                <a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target'] ?? '_self'; ?>">
                                    <?= wp_get_attachment_image($item['icon'] ?? '', 'medium', false, array(
                                        'class' => 'social-icon',
                                        'fetchpriority' => 'high',
                                    )) ?>
                                </a>
                            </li>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="autor-photo-contain">
                    <?= wp_get_attachment_image(
                        $hero['authors_photo'],
                        'larget',
                        false,
                        array(
                            'class' => 'authors-photo',
                            'fetchpriority' => 'high',
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    