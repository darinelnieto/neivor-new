   
<?php
/**
 * 
 * Partial Name: related-post
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$id = get_the_id();
$size = wp_get_post_terms(get_the_ID(), 'size_cat');
$segment = wp_get_post_terms(get_the_ID(), 'segment_cat');
$zone = wp_get_post_terms(get_the_ID(), 'zone_cat');
$args = [
    'post_type' => 'success_stories',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'rand'
];
if(!empty($size)){
    $args['tax_query'][] = [
        'taxonomy' => 'size_cat',
        'field'    => 'slug',
        'terms'    => $size[0]->slug
    ];
}
if(!empty($segment)){
    $args['tax_query'][] = [
        'taxonomy' => 'segment_cat',
        'field'    => 'slug',
        'terms'    => $segment[0]->slug
    ];
}
if(!empty($zone)){
    $args['tax_query'][] = [
        'taxonomy' => 'zone_cat',
        'field'    => 'slug',
        'terms'    => $zone[0]->slug
    ];
}
$related = new WP_Query($args);
$related_post = [];
if($related->have_posts()){
    while($related->have_posts()){
        $related->the_post();
        array_push($related_post, array(
            'id' => get_the_id(),
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
if($related_post):
?>
<section class="related-post-partial-af8a02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= get_field('related_post_title'); ?></h2>
                <div class="related-post row">
                    <?php foreach($related_post as $post): if($id !== $post['id']): ?>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
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
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>