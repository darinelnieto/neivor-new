   
<?php
/**
 * 
 * Partial Name: community
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_community')):
    $community = get_field('community');
?>
<section class="community-partial-4ae738">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $community['title']; ?></h2>
                <?php if($community['community_items']): ?>
                    <div class="row">
                        <?php foreach($community['community_items'] as $item): ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="community-card">
                                    <div class="image-contain">
                                        <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                                    </div>
                                    <div class="body-item">
                                        <div class="description">
                                            <?= $item['description']; ?>
                                        </div>
                                        <a href="<?= $item['video_link']['url']; ?>" target="_blank" class="cta">
                                            <span><?= $item['video_link']['title']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>