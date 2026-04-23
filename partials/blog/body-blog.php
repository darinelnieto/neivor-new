   
<?php
/**
 * 
 * Partial Name: body-blog
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$success = new WP_Query([
    'post_type' => 'success_stories',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'DESC'
]);
$the_success = [];
if($success->have_posts()){
    while($success->have_posts()){
        $success->the_post();
        array_push($the_success, array(
            'feature_image' => get_the_post_thumbnail_url(),
            'permalink' => get_permalink(),
            'title' => get_the_title(),
            'short_description' => get_field('short_description'),
            'logo' => get_field('logo'),
            'color' => get_field('primary_color_for_gradient'),
        ));
    }
    wp_reset_postdata();
}
$items = array_chunk($the_success, 3, true);
if($items):
?>
<section class="body-blog-partial-73d001">
    <div class="container" id="post-contain">
        <?php foreach($items as $item): $key = 0; $countItem = count($item); ?>
            <div class="row">
                <?php foreach($item as $post): $key++; if($key < 2): ?>
                    <div class="col-12 col-md-7 col-lg-8 mb-5 mb-md-4">
                        <a href="<?= $post['permalink']; ?>" class="post-item item-lg">
                            <div class="card-post">
                                <img src="<?= $post['feature_image']; ?>" alt="<?= $post['title']; ?>" class="feature-img">
                                <span class="color" style="background:linear-gradient(0deg, <?= $post['color'] ?> 0%, rgba(64,64,127,0) 100%)"></span>
                                <div class="content">
                                    <img src="<?= $post['logo']['url']; ?>" alt="<?= $post['logo']['title']; ?>" class="logo">
                                    <div class="text-content">
                                        <h3><?= $post['title']; ?></h3>
                                        <p><?= $post['short_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; endforeach; 
                if($countItem > 1): $key=0; ?>
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="row">
                            <?php foreach($item as $post): $key++; if($key > 1): ?>
                                <div class="col-12 mb-5 mb-md-4">
                                    <a href="<?= $post['permalink']; ?>" class="post-item">
                                        <div class="card-post">
                                            <img src="<?= $post['feature_image']; ?>" alt="<?= $post['title']; ?>" class="feature-img">
                                            <span class="color" style="background:linear-gradient(0deg, <?= $post['color'] ?> 0%, rgba(64,64,127,0) 100%)"></span>
                                            <div class="content">
                                                <img src="<?= $post['logo']['url']; ?>" alt="<?= $post['logo']['title']; ?>" class="logo">
                                                <div class="text-content">
                                                    <h3><?= $post['title']; ?></h3>
                                                    <p><?= $post['short_description']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>