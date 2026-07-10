<?php
$script_handle = "flexible-body_blog-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-body_blog.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 *
 * Partial Name: body_blog (Flexible Builder)
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
if ($paged < 1) {
    $paged = 1;
}

$posts_per_page = 9;
$allowed_taxonomies = array('success_cat', 'size_cat', 'segment_cat', 'zone_cat');
$body_blog_settings = get_sub_field('body_blog_settings');
$configured_taxonomy = sanitize_key($body_blog_settings['taxonomy_type'] ?? 'all');

if (!in_array($configured_taxonomy, array_merge(array('all'), $allowed_taxonomies), true)) {
    $configured_taxonomy = 'all';
}

$configured_term_id = 0;
if ($configured_taxonomy === 'success_cat') {
    $configured_term_id = absint($body_blog_settings['success_catregory'] ?? 0);
} elseif ($configured_taxonomy === 'size_cat') {
    $configured_term_id = absint($body_blog_settings['size_catregory'] ?? 0);
} elseif ($configured_taxonomy === 'segment_cat') {
    $configured_term_id = absint($body_blog_settings['segment_catregory'] ?? 0);
} elseif ($configured_taxonomy === 'zone_cat') {
    $configured_term_id = absint($body_blog_settings['zone_catregory'] ?? 0);
}

$query_args = array(
    'post_type' => 'success_stories',
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'order' => 'DESC',
    'orderby' => 'date',
);

$selected_term = null;
if (is_tax($allowed_taxonomies)) {
    $queried = get_queried_object();
    if ($queried instanceof WP_Term && in_array($queried->taxonomy, $allowed_taxonomies, true)) {
        $selected_term = $queried;
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => $selected_term->taxonomy,
                'field' => 'term_id',
                'terms' => $selected_term->term_id,
            )
        );
    }
} elseif ($configured_taxonomy !== 'all' && $configured_term_id > 0) {
    $selected_term = get_term($configured_term_id, $configured_taxonomy);
    if ($selected_term instanceof WP_Term) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => $configured_taxonomy,
                'field' => 'term_id',
                'terms' => $configured_term_id,
            )
        );
    }
}

$success = new WP_Query($query_args);
$the_success = array();

if ($success->have_posts()) {
    while ($success->have_posts()) {
        $success->the_post();

        $logo = get_field('logo');
        $the_success[] = array(
            'feature_image' => get_the_post_thumbnail(get_the_ID(), 'large', array(
                'class' => 'feature-img',
                'loading' => 'lazy',
                'decoding' => 'async'
            )),
            'permalink' => get_permalink(),
            'title' => get_the_title(),
            'short_description' => get_field('short_description'),
            'logo' => is_array($logo) ? $logo : array(),
            'color' => get_field('primary_color_for_gradient') ?: '#40407f',
        );
    }
    wp_reset_postdata();
}

$items = array_chunk($the_success, 3, true);
$pagination_links = paginate_links(array(
    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
    'format' => '?paged=%#%',
    'current' => $paged,
    'total' => max(1, (int) $success->max_num_pages),
    'type' => 'array',
    'prev_next' => false,
));
?>
<section class="body-blog-partial-73d001 flexible-body-blog-71b8ee">
    <div class="container" id="post-contain">
        <?php if ($selected_term instanceof WP_Term): ?>
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="h4 mb-0"><?= esc_html($selected_term->name); ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): $key = 0; $countItem = count($item); ?>
                <div class="row">
                    <?php foreach ($item as $post_item): $key++; if ($key < 2): ?>
                        <div class="col-12 col-md-7 col-lg-8 mb-5 mb-md-4">
                            <a href="<?= esc_url($post_item['permalink']); ?>" class="post-item item-lg">
                                <div class="card-post">
                                    <?= wp_kses_post($post_item['feature_image']); ?>
                                    <span class="color" style="background:linear-gradient(0deg, <?= esc_attr($post_item['color']); ?> 0%, rgba(64,64,127,0) 100%)"></span>
                                    <div class="content">
                                        <?php
                                        if (!empty($post_item['logo']['ID'])) {
                                            echo wp_get_attachment_image($post_item['logo']['ID'], 'large', false, array(
                                                'class' => 'logo',
                                                'loading' => 'lazy',
                                                'decoding' => 'async'
                                            ));
                                        }
                                        ?>
                                        <div class="text-content">
                                            <h3><?= esc_html($post_item['title']); ?></h3>
                                            <p><?= esc_html($post_item['short_description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; endforeach; ?>

                    <?php if ($countItem > 1): $key = 0; ?>
                        <div class="col-12 col-md-5 col-lg-4 mb-5 mb-md-4">
                            <div class="posts">
                                <?php foreach ($item as $post_item): $key++; if ($key > 1): ?>
                                    <a href="<?= esc_url($post_item['permalink']); ?>" class="post-item">
                                        <div class="card-post">
                                            <?= wp_kses_post($post_item['feature_image']); ?>
                                            <span class="color" style="background:linear-gradient(0deg, <?= esc_attr($post_item['color']); ?> 0%, rgba(64,64,127,0) 100%)"></span>
                                            <div class="content">
                                                <?php
                                                if (!empty($post_item['logo']['ID'])) {
                                                    echo wp_get_attachment_image($post_item['logo']['ID'], 'large', false, array(
                                                        'class' => 'logo',
                                                        'loading' => 'lazy',
                                                        'decoding' => 'async'
                                                    ));
                                                }
                                                ?>
                                                <div class="text-content">
                                                    <h3 class="h3"><?= esc_html($post_item['title']); ?></h3>
                                                    <p><?= esc_html($post_item['short_description']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <p><?= esc_html(get_bloginfo('language') === 'en-US' ? 'No posts available.' : 'No hay publicaciones disponibles.'); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($pagination_links) && is_array($pagination_links) && count($pagination_links) > 1): ?>
            <div class="row">
                <div class="col-12">
                    <nav class="body-blog-pagination" aria-label="<?= esc_attr(get_bloginfo('language') === 'en-US' ? 'Posts pagination' : 'Paginacion de publicaciones'); ?>">
                        <ul class="page-numbers">
                            <?php foreach ($pagination_links as $link): ?>
                                <li><?= wp_kses_post($link); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
