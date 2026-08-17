<?php
$script_handle = "flexible-filter_blog-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-filter_blog.min.js",
    array("jquery"),
    null,
    true
);
/**
 *
 * Partial Name: filter_blog (Flexible Builder)
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$filter = get_sub_field('filter_group');
$size    = get_terms(array('taxonomy' => 'size_cat',    'hide_empty' => true));
$segment = get_terms(array('taxonomy' => 'segment_cat', 'hide_empty' => true));
$zone    = get_terms(array('taxonomy' => 'zone_cat',    'hide_empty' => true));
$current_size_label = get_bloginfo('language') == 'en-US' ? 'Size' : 'Tamano';
$current_segment_label = get_bloginfo('language') == 'en-US' ? 'Product/Segment' : 'Producto/Segmento';
$current_zone_label = get_bloginfo('language') == 'en-US' ? 'Zone' : 'Zona';

$queried_object = get_queried_object();
if ($queried_object instanceof WP_Term) {
    if ($queried_object->taxonomy === 'size_cat') {
        $current_size_label = $queried_object->name;
    }
    if ($queried_object->taxonomy === 'segment_cat') {
        $current_segment_label = $queried_object->name;
    }
    if ($queried_object->taxonomy === 'zone_cat') {
        $current_zone_label = $queried_object->name;
    }
}

$archive_link = get_post_type_archive_link('success_stories');
if (!$archive_link) {
    $archive_link = home_url('/');
}
?>
<section class="filter-blog-partial-0a1dca flexible-filter-blog-5d8e91">

    <div class="svg-top">
        <svg width="1440" height="148" viewBox="0 0 1440 148" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M180 11.1572C631.821 56.9782 976.136 74.0841 1261.01 67.8119C1545.89 61.5396 1563.72 134.768 1274.57 146.844C985.427 158.921 710.787 46.7969 177.663 61.6097C-355.461 76.4226 -271.822 -34.6639 180 11.1572Z" fill="url(#paint0_linear_3837_17083_flex)" fill-opacity="0.2"/>
            <defs>
                <linearGradient id="paint0_linear_3837_17083_flex" x1="-205.092" y1="19.2056" x2="1524.7" y2="-277.549" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#723EC7"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="svg-left">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg" width="61" height="263" viewBox="0 0 61 263" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.04487 10.0897C7.83108 10.0897 10.0897 7.83108 10.0897 5.04487C10.0897 2.25867 7.83108 0 5.04487 0C2.25867 0 0 2.25867 0 5.04487C0 7.83108 2.25867 10.0897 5.04487 10.0897ZM5.04487 60.5385C7.83108 60.5385 10.0897 58.2798 10.0897 55.4936C10.0897 52.7074 7.83108 50.4487 5.04487 50.4487C2.25867 50.4487 0 52.7074 0 55.4936C0 58.2798 2.25867 60.5385 5.04487 60.5385ZM10.0897 105.942C10.0897 108.729 7.83108 110.987 5.04487 110.987C2.25867 110.987 0 108.729 0 105.942C0 103.156 2.25867 100.897 5.04487 100.897C7.83108 100.897 10.0897 103.156 10.0897 105.942ZM5.04487 161.436C7.83108 161.436 10.0897 159.177 10.0897 156.391C10.0897 153.605 7.83108 151.346 5.04487 151.346C2.25867 151.346 0 153.605 0 156.391C0 159.177 2.25867 161.436 5.04487 161.436ZM10.0897 206.84C10.0897 209.626 7.83108 211.885 5.04487 211.885C2.25867 211.885 0 209.626 0 206.84C0 204.054 2.25867 201.795 5.04487 201.795C7.83108 201.795 10.0897 204.054 10.0897 206.84ZM5.04487 262.333C7.83108 262.333 10.0897 260.075 10.0897 257.288C10.0897 254.502 7.83108 252.244 5.04487 252.244C2.25867 252.244 0 254.502 0 257.288C0 260.075 2.25867 262.333 5.04487 262.333ZM60.5385 5.04487C60.5385 7.83108 58.2798 10.0897 55.4936 10.0897C52.7074 10.0897 50.4487 7.83108 50.4487 5.04487C50.4487 2.25867 52.7074 0 55.4936 0C58.2798 0 60.5385 2.25867 60.5385 5.04487ZM55.4936 60.5385C58.2798 60.5385 60.5385 58.2798 60.5385 55.4936C60.5385 52.7074 58.2798 62.288 55.4936 50.4487C52.7074 50.4487 50.4487 52.7074 50.4487 55.4936C50.4487 58.2798 52.7074 60.5385 55.4936 60.5385Z" fill="#723EC7" fill-opacity="0.15"/>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-content">
                    <?php if (!empty($filter['title'])): ?>
                        <h2><?= $filter['title']; ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($filter['description'])): ?>
                        <p><?= $filter['description']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="filter-contain">
                    <?php if (!empty($filter['text_before_filter'])): ?>
                        <p><?= wp_kses_post($filter['text_before_filter']); ?></p>
                    <?php endif; ?>

                    <div class="filter">
                        <div class="row justify-content-center">
                            <?php if (!is_wp_error($size) && !empty($size)): ?>
                                <div class="col-12 col-md-4 mb-3 mb-lg-0">
                                    <div class="size filter-item">
                                        <div class="open-filter">
                                            <span class="text"><?= esc_html($current_size_label); ?></span>
                                            <span class="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path d="M5.13672 6.88654L9.36371 11.1135L13.5907 6.88654" stroke="#A3A3A3" stroke-width="1.409" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="options">
                                            <ul>
                                                <li>
                                                    <a href="#" class="this-option this-option--noop">
                                                        <span class="name"><?php if(get_bloginfo('language') == 'en-US'): ?>Size<?php else: ?>Tamano<?php endif; ?></span>
                                                    </a>
                                                </li>
                                                <?php foreach($size as $item): ?>
                                                    <?php $term_link = get_term_link($item); if (is_wp_error($term_link)) { continue; } ?>
                                                    <li>
                                                        <a href="<?= esc_url($term_link); ?>" class="this-option">
                                                            <span class="name"><?= esc_html($item->name); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!is_wp_error($segment) && !empty($segment)): ?>
                                <div class="col-12 col-md-4 mb-3 mb-lg-0">
                                    <div class="segment filter-item">
                                        <div class="open-filter">
                                            <span class="text"><?= esc_html($current_segment_label); ?></span>
                                            <span class="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path d="M5.13672 6.88654L9.36371 11.1135L13.5907 6.88654" stroke="#A3A3A3" stroke-width="1.409" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="options">
                                            <ul>
                                                <li>
                                                    <a href="#" class="this-option this-option--noop">
                                                        <span class="name"><?php if(get_bloginfo('language') == 'en-US'): ?>Product/Segment<?php else: ?>Producto/Segmento<?php endif; ?></span>
                                                    </a>
                                                </li>
                                                <?php foreach($segment as $item): ?>
                                                    <?php $term_link = get_term_link($item); if (is_wp_error($term_link)) { continue; } ?>
                                                    <li>
                                                        <a href="<?= esc_url($term_link); ?>" class="this-option">
                                                            <span class="name"><?= esc_html($item->name); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!is_wp_error($zone) && !empty($zone)): ?>
                                <div class="col-12 col-md-4 mb-3 mb-lg-0">
                                    <div class="zone filter-item">
                                        <div class="open-filter">
                                            <span class="text"><?= esc_html($current_zone_label); ?></span>
                                            <span class="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path d="M5.13672 6.88654L9.36371 11.1135L13.5907 6.88654" stroke="#A3A3A3" stroke-width="1.409" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="options">
                                            <ul>
                                                <li>
                                                    <a href="#" class="this-option this-option--noop">
                                                        <span class="name"><?php if(get_bloginfo('language') == 'en-US'): ?>Zone<?php else: ?>Zona<?php endif; ?></span>
                                                    </a>
                                                </li>
                                                <?php foreach($zone as $item): ?>
                                                    <?php $term_link = get_term_link($item); if (is_wp_error($term_link)) { continue; } ?>
                                                    <li>
                                                        <a href="<?= esc_url($term_link); ?>" class="this-option">
                                                            <span class="name"><?= esc_html($item->name); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
