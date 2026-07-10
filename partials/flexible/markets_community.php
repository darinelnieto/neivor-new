<?php
$script_handle = "flexible-markets_community-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-markets_community.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: community
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_sub_field('enable_community')):
    $community = get_sub_field('community');
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
                                        <?= wp_get_attachment_image( $item['image']['ID'], 'large', false, array(
                                            'class' => 'community-image', 
                                            'loading' => 'lazy', 
                                            'decoding' => 'async' 
                                        ) ); ?>
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