<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Get cache-busting version based on file modified time.
 */
function sajo_asset_version($relative_path) {
  $file_path = get_template_directory() . $relative_path;

  if (file_exists($file_path)) {
    return (string) filemtime($file_path);
  }

  return null;
}

/**
 * Register Theme Styles
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function sajo_styles() {
  // wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/css/main.bundle.css', array(), sajo_asset_version('/css/main.bundle.css'));
  wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), sajo_asset_version('/css/bootstrap.min.css'));
  wp_enqueue_style('owl-carousel.css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), sajo_asset_version('/css/owl.carousel.min.css'));

  // wp_enqueue_style('font-awesome.css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'sajo_styles');

/**
 * Force Google Fonts to use display=swap to reduce FOIT and Lighthouse warnings.
 */
function sajo_force_google_fonts_display_swap($src) {
  if (!is_string($src) || '' === $src) {
    return $src;
  }

  if (false === strpos($src, 'fonts.googleapis.com/css')) {
    return $src;
  }

  if (false !== strpos($src, 'display=swap') || false !== strpos($src, 'display=optional')) {
    return $src;
  }

  if (preg_match('/([?&])display=[^&]*/', $src)) {
    return (string) preg_replace('/([?&])display=[^&]*/', '${1}display=swap', $src, 1);
  }

  $separator = false === strpos($src, '?') ? '?' : '&';
  return $src . $separator . 'display=swap';
}
add_filter('style_loader_src', 'sajo_force_google_fonts_display_swap', 20);

/**
 * Load jQuery first with highest priority (HEAD, NO DEFER!)
 */
function sajo_load_jquery_first() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', array(), sajo_asset_version('/js/jquery-3.5.1.min.js'), false);
    wp_enqueue_script('jquery');
    // FORCE - remove any defer that might be added
    wp_script_add_data('jquery', 'strategy', false);
  }
}
add_action('wp_enqueue_scripts', 'sajo_load_jquery_first', 0);

/**
 * Remove defer from jQuery specifically
 */
function sajo_remove_defer_from_jquery($tag, $handle) {
  if ('jquery' === $handle) {
    return str_replace(' defer', '', $tag);
  }
  return $tag;
}
add_filter('script_loader_tag', 'sajo_remove_defer_from_jquery', 10, 2);

/**
 * Register Theme Scripts
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function sajo_scripts() {
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), sajo_asset_version('/js/bootstrap.min.js'), true);
  wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), sajo_asset_version('/js/owl.carousel.min.js'), true);
  wp_enqueue_script('main-scripts', get_template_directory_uri() . '/js/main.bundle.js', array('jquery', 'owl-carousel-js'), sajo_asset_version('/js/main.bundle.js'), true);

  // Defer non-critical JS while keeping it in footer.
  wp_script_add_data('bootstrap-js', 'strategy', 'defer');
  wp_script_add_data('owl-carousel-js', 'strategy', 'defer');
  wp_script_add_data('main-scripts', 'strategy', 'defer');

  $inline_js = 'const _sajoURI_ = "' . esc_js(get_template_directory_uri()) . '", _sajoURL_ = "' . esc_js(get_site_url()) . '";';
  wp_add_inline_script('main-scripts', $inline_js, 'before');
}
add_action('wp_enqueue_scripts', 'sajo_scripts');

/**
 * Register Navigation Menus
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function sajo_navigation_menus() {
  $locations = array(
    'main_menu' => __( 'Main Menu', 'text_domain' )
  );
  register_nav_menus( $locations );
}
add_action( 'init', 'sajo_navigation_menus' );

/**
 * Theme support
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support( 'custom-logo' );

// Options page
function sajo_register_acf_options_pages() {
  if (!function_exists('acf_add_options_page')) {
    return;
  }

  acf_add_options_page(array(
	  'page_title'    => 'Options theme',
	  'menu_title'    => 'Options theme',
	  'menu_slug'     => 'theme-settings',
	  'capability'    => 'edit_posts',
	  'redirect'      =>  true
	));
  acf_add_options_sub_page(array(
    'page_title'     => 'Footer',
    'menu_title'     => 'Footer',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Header',
    'menu_title'     => 'Header',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'News',
    'menu_title'     => 'News',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Allies',
    'menu_title'     => 'Allies',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'How to hire it',
    'menu_title'     => 'How to hire it',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Suscription',
    'menu_title'     => 'Suscription',
    'parent_slug'   => 'theme-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Error Page',
    'menu_title'     => 'Error Page',
    'parent_slug'   => 'theme-settings',
  ));
}
add_action('acf/init', 'sajo_register_acf_options_pages');

function neivor_preload_lcp_image() {
  if (is_admin() || is_feed()) {
    return;
  }

  $current_id = get_queried_object_id();
  $preload_url = '';
  $preload_media = '';

  if (is_front_page()) {
    $banner = get_field('add_banner', $current_id);

    if (!empty($banner) && is_array($banner)) {
      $first_item = reset($banner);

      if (!empty($first_item['main_image']['ID'])) {
        $preload_url = wp_get_attachment_image_url($first_item['main_image']['ID'], 'full');
      } elseif (!empty($first_item['main_image_movil']['ID'])) {
        $preload_url = wp_get_attachment_image_url($first_item['main_image_movil']['ID'], 'full');
      }
    }
  } elseif (is_page(array('condominios', 'preventas', 'rentas'))) {
    $banner_section = get_field('banner_section', $current_id);

    if (is_array($banner_section)) {
      if (!empty($banner_section['main_image']['ID'])) {
        $preload_url = wp_get_attachment_image_url($banner_section['main_image']['ID'], 'full');
      } elseif (!empty($banner_section['desktop_background']['ID'])) {
        $preload_url = wp_get_attachment_image_url($banner_section['desktop_background']['ID'], 'full');
        $preload_media = '(min-width: 768px)';
      } elseif (!empty($banner_section['movil_background']['ID'])) {
        $preload_url = wp_get_attachment_image_url($banner_section['movil_background']['ID'], 'full');
        $preload_media = '(max-width: 767px)';
      }
    }
  }

  if (empty($preload_url)) {
    return;
  }

  echo '<link rel="preload" as="image" href="' . esc_url($preload_url) . '"';

  if ($preload_media !== '') {
    echo ' media="' . esc_attr($preload_media) . '"';
  }

  echo ' fetchpriority="high">' . "\n";
}
add_action('wp_head', 'neivor_preload_lcp_image', 2);

function sajo_defer_theme_scripts($tag, $handle, $src) {
  if (is_admin()) {
    return $tag;
  }

  // NEVER add defer to jQuery
  if ('jquery' === $handle) {
    return str_replace(' defer', '', $tag);
  }

  $defer_handles = array(
    'bootstrap-js',
    'owl-carousel-js',
    'main-scripts',
  );

  if (!in_array($handle, $defer_handles, true)) {
    return $tag;
  }

  if (false !== strpos($tag, ' defer')) {
    return $tag;
  }

  return str_replace(' src=', ' defer src=', $tag);
}
add_filter('script_loader_tag', 'sajo_defer_theme_scripts', 10, 3);

function sajo_add_missing_image_dimensions($html) {
  if (is_admin() || wp_doing_ajax() || is_feed()) {
    return $html;
  }

  if (false === stripos($html, '<img')) {
    return $html;
  }

  if (!class_exists('DOMDocument')) {
    return $html;
  }

  $internal_errors = libxml_use_internal_errors(true);
  $document = new DOMDocument();

  if (!$document->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD)) {
    libxml_clear_errors();
    libxml_use_internal_errors($internal_errors);
    return $html;
  }

  $upload = wp_get_upload_dir();
  $baseurl = isset($upload['baseurl']) ? $upload['baseurl'] : '';
  $basedir = isset($upload['basedir']) ? $upload['basedir'] : '';

  foreach ($document->getElementsByTagName('img') as $img) {
    $src = $img->getAttribute('src');
    if ('' === $src) {
      continue;
    }

    if (!$img->hasAttribute('decoding')) {
      $img->setAttribute('decoding', 'async');
    }

    if ($img->hasAttribute('width') && $img->hasAttribute('height')) {
      continue;
    }

    $width = 0;
    $height = 0;
    $attachment_id = attachment_url_to_postid($src);

    if ($attachment_id) {
      $metadata = wp_get_attachment_metadata($attachment_id);
      if (is_array($metadata)) {
        $width = isset($metadata['width']) ? (int) $metadata['width'] : 0;
        $height = isset($metadata['height']) ? (int) $metadata['height'] : 0;
      }
    }

    if (($width <= 0 || $height <= 0) && $baseurl && $basedir && false === strpos($src, 'data:')) {
      $normalized_src = strtok($src, '?');
      $normalized_baseurl = rtrim($baseurl, '/');

      if (0 === strpos($normalized_src, $normalized_baseurl)) {
        $local_path = $basedir . str_replace($normalized_baseurl, '', $normalized_src);
        if (is_readable($local_path)) {
          $image_size = @getimagesize($local_path);
          if (is_array($image_size)) {
            $width = isset($image_size[0]) ? (int) $image_size[0] : 0;
            $height = isset($image_size[1]) ? (int) $image_size[1] : 0;
          }
        }
      }
    }

    if ($width > 0 && $height > 0) {
      if (!$img->hasAttribute('width')) {
        $img->setAttribute('width', (string) $width);
      }
      if (!$img->hasAttribute('height')) {
        $img->setAttribute('height', (string) $height);
      }
    }
  }

  $optimized_html = $document->saveHTML();
  $optimized_html = preg_replace('/^<\?xml[^>]*>/', '', $optimized_html);

  libxml_clear_errors();
  libxml_use_internal_errors($internal_errors);

  return null !== $optimized_html ? $optimized_html : $html;
}

function sajo_start_frontend_html_optimization() {
  if (is_admin() || wp_doing_ajax() || is_feed() || is_robots() || is_trackback()) {
    return;
  }

  ob_start('sajo_add_missing_image_dimensions');
}
add_action('template_redirect', 'sajo_start_frontend_html_optimization', 0);

function sajo_optimize_attachment_image_attributes($attr, $attachment) {
  if (is_admin()) {
    return $attr;
  }

  if (!isset($attr['decoding'])) {
    $attr['decoding'] = 'async';
  }

  if (empty($attr['width']) || empty($attr['height'])) {
    $meta = wp_get_attachment_metadata($attachment->ID);
    if (is_array($meta)) {
      if (empty($attr['width']) && !empty($meta['width'])) {
        $attr['width'] = (string) (int) $meta['width'];
      }
      if (empty($attr['height']) && !empty($meta['height'])) {
        $attr['height'] = (string) (int) $meta['height'];
      }
    }
  }

  $class_name = isset($attr['class']) ? (string) $attr['class'] : '';
  $is_critical = false !== strpos($class_name, 'custom-logo') || false !== strpos($class_name, 'img-desktop') || false !== strpos($class_name, 'img-movil');

  if ($is_critical) {
    $attr['loading'] = 'eager';
    $attr['fetchpriority'] = 'high';
    $attr['data-no-lazy'] = '1';

    if (false === strpos($class_name, 'skip-lazy')) {
      $attr['class'] = trim($class_name . ' skip-lazy');
    }
  }

  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'sajo_optimize_attachment_image_attributes', 10, 2);

function sajo_optimize_custom_logo_html($html) {
  if (is_admin() || '' === trim($html)) {
    return $html;
  }

  if (false === strpos($html, 'custom-logo')) {
    return $html;
  }

  if (false === strpos($html, 'data-no-lazy=')) {
    $html = preg_replace('/<img\b(?![^>]*\bdata-no-lazy=)/i', '<img data-no-lazy="1"', $html, 1);
  }

  if (false === strpos($html, 'fetchpriority=')) {
    $html = preg_replace('/<img\b(?![^>]*\bfetchpriority=)/i', '<img fetchpriority="high"', $html, 1);
  }

  return $html;
}
add_filter('get_custom_logo', 'sajo_optimize_custom_logo_html');

function sajo_allow_svg_uploads($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'sajo_allow_svg_uploads');

function sajo_fix_svg_filetype_check($data, $file, $filename, $mimes) {
  $ext = isset($data['ext']) ? $data['ext'] : '';

  if (!$ext) {
    $wp_filetype = wp_check_filetype($filename, $mimes);
    if ('svg' === $wp_filetype['ext']) {
      $data['ext'] = 'svg';
      $data['type'] = 'image/svg+xml';
      $data['proper_filename'] = $filename;
    }
  }

  return $data;
}
add_filter('wp_check_filetype_and_ext', 'sajo_fix_svg_filetype_check', 10, 4);

add_theme_support('post-thumbnails');

function comprehensive_protection_post() {
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label' => 'Proteccion integral',
    'menu_icon' => 'dashicons-building',
    'supports' => array('title', 'editor', 'thumbnail')
  );

  register_post_type('protection_post', $arg);
}
add_action('init', 'comprehensive_protection_post', 3);

function is_mobile() {
  return preg_match('/(android|iphone|ipad|ipod|windows phone|blackberry|iemobile|opera mini|mobile)/i', $_SERVER['HTTP_USER_AGENT']);
}

function sajo_get_banner_breadcrumb_items() {
  if (is_front_page()) {
    return array();
  }

  $items = array(
    array(
      'title' => 'Inicio',
      'url' => home_url('/'),
    ),
  );

  if (is_home() && !is_front_page()) {
    $posts_page_id = (int) get_option('page_for_posts');
    if ($posts_page_id > 0) {
      $items[] = array(
        'title' => get_the_title($posts_page_id),
        'url' => '',
      );
    }
    return $items;
  }

  if (is_singular()) {
    $current_id = get_queried_object_id();

    if (is_page()) {
      $ancestor_ids = get_post_ancestors($current_id);
      if (!empty($ancestor_ids)) {
        $ancestor_ids = array_reverse($ancestor_ids);

        foreach ($ancestor_ids as $ancestor_id) {
          $items[] = array(
            'title' => get_the_title($ancestor_id),
            'url' => get_permalink($ancestor_id),
          );
        }
      }
    }

    $items[] = array(
      'title' => get_the_title($current_id),
      'url' => '',
    );
    return $items;
  }

  if (is_archive()) {
    $items[] = array(
      'title' => wp_strip_all_tags(get_the_archive_title()),
      'url' => '',
    );
    return $items;
  }

  $queried_object = get_queried_object();
  if (!empty($queried_object) && !empty($queried_object->post_title)) {
    $items[] = array(
      'title' => $queried_object->post_title,
      'url' => '',
    );
  } elseif (!empty($queried_object) && !empty($queried_object->name)) {
    $items[] = array(
      'title' => $queried_object->name,
      'url' => '',
    );
  }

  return $items;
}

function sajo_render_banner_breadcrumbs() {
  $breadcrumbs = sajo_get_banner_breadcrumb_items();
  if (empty($breadcrumbs)) {
    return;
  }
  ?>
  <nav class="migas-de-pan banner-breadcrumbs" aria-label="Migas de pan">
    <ol class="migas-de-pan__list">
      <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
        <?php $is_last = $index === array_key_last($breadcrumbs); ?>
        <li class="migas-de-pan__item<?= $is_last ? ' is-current' : ''; ?>">
          <?php if (!$is_last && !empty($breadcrumb['url'])): ?>
            <a class="migas-de-pan__link p" href="<?= esc_url($breadcrumb['url']); ?>"><?= esc_html($breadcrumb['title']); ?></a>
          <?php else: ?>
            <span class="migas-de-pan__current p"><?= esc_html($breadcrumb['title']); ?></span>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </nav>
  <?php
}

function fqas_posts() {
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label' => 'Preguntas frecuentes',
    'menu_icon' => 'dashicons-excerpt-view',
    'supports' => array('title', 'editor', 'thumbnail')
  );

  register_post_type('fqas_post', $arg);
}
add_action('init', 'fqas_posts', 4);

function blog_posts() {
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label' => 'Blog',
    'menu_icon' => 'dashicons-book',
    'supports' => array('title', 'editor', 'thumbnail'),
    'taxonomies' => array('blog_cat', 'autor')
  );

  register_post_type('blogs', $arg);

  $category = array(
    'name' => _x('Categoria', 'taxonomy general name'),
    'singular_name' => _x('Categoria', 'taxonomy singular name'),
    'search_items' => __('Search Categoria'),
    'all_items' => __('All Categoria'),
    'parent_item' => __('Parent Categoria'),
    'parent_item_colon' => __('Parent Categoria:'),
    'edit_item' => __('Edit Categoria'),
    'update_item' => __('Update Categoria'),
    'add_new_item' => __('Add New Categoria'),
    'new_item_name' => __('New Categoria Name'),
    'menu_name' => __('Categoria'),
  );

  register_taxonomy('blog_cat', array('blogs'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'blog_cat'),
  ));

  $category = array(
    'name' => _x('Autor', 'taxonomy general name'),
    'singular_name' => _x('Autor', 'taxonomy singular name'),
    'search_items' => __('Search Autor'),
    'all_items' => __('All Autor'),
    'parent_item' => __('Parent Autor'),
    'parent_item_colon' => __('Parent Autor:'),
    'edit_item' => __('Edit Autor'),
    'update_item' => __('Update Autor'),
    'add_new_item' => __('Add New Autor'),
    'new_item_name' => __('New Autor Name'),
    'menu_name' => __('Autor'),
  );

  register_taxonomy('autor', array('blogs'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'autor'),
  ));
}
add_action('init', 'blog_posts', 5);

function successStories() {
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label' => 'Success stories',
    'menu_icon' => 'dashicons-building',
    'supports' => array('title', 'editor', 'thumbnail'),
    'taxonomies' => array('size_cat', 'segment_cat', 'zone_cat', 'success_cat')
  );

  register_post_type('success_stories', $arg);

  $category = array(
    'name' => _x('Size', 'taxonomy general name'),
    'singular_name' => _x('Size', 'taxonomy singular name'),
    'search_items' => __('Search Size'),
    'all_items' => __('All Size'),
    'parent_item' => __('Parent Size'),
    'parent_item_colon' => __('Parent Size:'),
    'edit_item' => __('Edit Size'),
    'update_item' => __('Update Size'),
    'add_new_item' => __('Add New Size'),
    'new_item_name' => __('New Size Name'),
    'menu_name' => __('Size'),
  );

  register_taxonomy('size_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'size_cat'),
  ));

  $category = array(
    'name' => _x('Product segment', 'taxonomy general name'),
    'singular_name' => _x('Product segment', 'taxonomy singular name'),
    'search_items' => __('Search Product segment'),
    'all_items' => __('All Product segment'),
    'parent_item' => __('Parent Product segment'),
    'parent_item_colon' => __('Parent Product segment:'),
    'edit_item' => __('Edit Product segment'),
    'update_item' => __('Update Product segment'),
    'add_new_item' => __('Add New Product segment'),
    'new_item_name' => __('New Product segment Name'),
    'menu_name' => __('Product segment'),
  );

  register_taxonomy('segment_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'segment_cat'),
  ));

  $category = array(
    'name' => _x('Zone', 'taxonomy general name'),
    'singular_name' => _x('Zone', 'taxonomy singular name'),
    'search_items' => __('Search Zone'),
    'all_items' => __('All Zone'),
    'parent_item' => __('Parent Zone'),
    'parent_item_colon' => __('Parent Zone:'),
    'edit_item' => __('Edit Zone'),
    'update_item' => __('Update Zone'),
    'add_new_item' => __('Add New Zone'),
    'new_item_name' => __('New Zone Name'),
    'menu_name' => __('Zone'),
  );

  register_taxonomy('zone_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'zone_cat'),
  ));

  $category = array(
    'name' => _x('Category', 'taxonomy general name'),
    'singular_name' => _x('Category', 'taxonomy singular name'),
    'search_items' => __('Search Category'),
    'all_items' => __('All Category'),
    'parent_item' => __('Parent Category'),
    'parent_item_colon' => __('Parent Category:'),
    'edit_item' => __('Edit Category'),
    'update_item' => __('Update Category'),
    'add_new_item' => __('Add New Category'),
    'new_item_name' => __('New Category Name'),
    'menu_name' => __('Category'),
  );

  register_taxonomy('success_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'success_cat'),
  ));
}
add_action('init', 'successStories', 5);

add_action('rest_api_init', function () {
  register_rest_route('success-histories', '/list', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'success_historie_list_handler',
      'permission_callback' => '__return_true',
    )
  ));

  register_rest_route('nav', '/movil', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'nav_menu_movil_handler',
      'permission_callback' => '__return_true',
    )
  ));
});

function success_historie_list_handler($request) {
  $args = array(
    'post_type' => 'success_stories',
    'post_status' => 'publish',
    'tax_query' => array(array('relation' => 'AND')),
    'meta_query' => array(),
    'posts_per_page' => -1,
    'orderby' => 'title',
  );

  if (!empty($request['size'])) {
    $args['tax_query'][] = array(
      'taxonomy' => 'size_cat',
      'field' => 'slug',
      'terms' => $request['size']
    );
  }
  if (!empty($request['segment'])) {
    $args['tax_query'][] = array(
      'taxonomy' => 'segment_cat',
      'field' => 'slug',
      'terms' => $request['segment']
    );
  }
  if (!empty($request['zone'])) {
    $args['tax_query'][] = array(
      'taxonomy' => 'zone_cat',
      'field' => 'slug',
      'terms' => $request['zone']
    );
  }

  $success = new WP_Query($args);
  $the_success = array();

  if ($success->have_posts()) {
    while ($success->have_posts()) {
      $success->the_post();
      $the_success[] = array(
        'feature_image' => get_the_post_thumbnail_url() ?: '',
        'permalink' => get_permalink() ?: '#',
        'title' => get_the_title() ?: 'Sin titulo',
        'short_description' => get_field('short_description') ?: '',
        'logo' => get_field('logo') ?: array('url' => '', 'title' => ''),
        'color' => get_field('primary_color_for_gradient') ?: '#000000',
      );
    }
    wp_reset_postdata();
  }

  return $the_success;
}

add_action('rest_api_init', function () {
  register_rest_route('blog-listing', '/posts', array(
    array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'blog_listing_posts_handler',
      'permission_callback' => '__return_true',
    )
  ));
  register_rest_route('blog-listing', '/change-view', array(
    array(
      'methods' => WP_REST_Server::EDITABLE,
      'callback' => 'blog_listing_change_view_handler',
      'permission_callback' => '__return_true',
    )
  ));
});

function blog_listing_posts_handler($request) {
  $paged = intval($request['paged']) ?: 1;
  $posts_per_page = intval($request['per_page']) ?: 6;
  $post_type = sanitize_key($request['post_type']) ?: 'blogs';
  $taxonomy = sanitize_key($request['taxonomy']) ?: '';
  $term_id = intval($request['term_id']) ?: 0;

  $allowed_post_types = array('blogs', 'success_stories');
  if (!in_array($post_type, $allowed_post_types, true)) {
    $post_type = 'blogs';
  }

  $allowed_taxonomies = array(
    'blogs' => array('blog_cat'),
    'success_stories' => array('success_cat', 'size_cat', 'segment_cat', 'zone_cat')
  );

  if (empty($taxonomy) || !in_array($taxonomy, $allowed_taxonomies[$post_type], true)) {
    $taxonomy = $post_type === 'blogs' ? 'blog_cat' : 'success_cat';
  }

  $args = array(
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
  );

  if (!empty($term_id)) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $term_id
      )
    );
  }

  $blog_query = new WP_Query($args);
  $posts = array();

  if ($blog_query->have_posts()) {
    while ($blog_query->have_posts()) {
      $blog_query->the_post();
      $thumbnail_id = get_post_thumbnail_id();
      $featured_image_html = '';

      if ($thumbnail_id) {
        $featured_image_html = wp_get_attachment_image(
          $thumbnail_id,
          'large',
          false,
          array(
            'class' => 'featured-image',
            'loading' => 'lazy',
            'decoding' => 'async'
          )
        );
      }

      $time_ago = '';
      if ($post_type === 'blogs') {
        $post_time = get_the_time('U');
        $current_time = time();
        $time_diff = $current_time - $post_time;

        if ($time_diff < 60) {
          $time_ago = 'hace poco';
        } elseif ($time_diff < 3600) {
          $minutes = floor($time_diff / 60);
          $time_ago = 'hace ' . $minutes . ' ' . ($minutes == 1 ? 'minuto' : 'minutos');
        } elseif ($time_diff < 86400) {
          $hours = floor($time_diff / 3600);
          $time_ago = 'hace ' . $hours . ' ' . ($hours == 1 ? 'hora' : 'horas');
        } elseif ($time_diff < 604800) {
          $days = floor($time_diff / 86400);
          $time_ago = 'hace ' . $days . ' ' . ($days == 1 ? 'dia' : 'dias');
        } elseif ($time_diff < 2592000) {
          $weeks = floor($time_diff / 604800);
          $time_ago = 'hace ' . $weeks . ' ' . ($weeks == 1 ? 'semana' : 'semanas');
        } elseif ($time_diff < 31536000) {
          $months = floor($time_diff / 2592000);
          $time_ago = 'hace ' . $months . ' ' . ($months == 1 ? 'mes' : 'meses');
        } else {
          $years = floor($time_diff / 31536000);
          $time_ago = 'hace ' . $years . ' ' . ($years == 1 ? 'ano' : 'anos');
        }
      }

      $post_categories = get_the_terms(get_the_ID(), $taxonomy);
      $category_name = '';
      if ($post_categories && !is_wp_error($post_categories)) {
        $category_name = $post_categories[0]->name;
      }

      $excerpt = get_field('short_description') ?: '';

      $read_more_label = get_bloginfo('language') == 'en-US' ? 'READ MORE' : 'LEER MAS';

      $posts[] = array(
        'id' => get_the_ID(),
        'title' => get_the_title() ?: 'Sin titulo',
        'excerpt' => $excerpt,
        'featured_image' => $featured_image_html,
        'permalink' => get_permalink() ?: '#',
        'category' => $category_name,
        'date' => $time_ago,
        'read_more_label' => $read_more_label,
      );
    }
    wp_reset_postdata();
  }

  return array(
    'posts' => $posts,
    'total' => $blog_query->found_posts,
    'pages' => $blog_query->max_num_pages,
  );
}

function blog_listing_change_view_handler($request) {
  $view_type = sanitize_text_field($request['view']);

  if (!in_array($view_type, array('grid', 'column'))) {
    return new WP_Error('invalid_view', 'View type must be grid or column', array('status' => 400));
  }

  return array('view' => $view_type);
}

add_action('rest_api_init', function () {
  register_rest_route('neivor/v1', '/hubspot-subscribe', array(
    array(
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'neivor_hubspot_subscribe_handler',
      'permission_callback' => '__return_true',
    )
  ));
});

function neivor_hubspot_subscribe_handler($request) {
  $portal_id = sanitize_text_field($request['portalId']);
  $form_id = sanitize_text_field($request['formId']);
  $email = sanitize_email($request['email']);
  $first_name = sanitize_text_field($request['firstname'] ?: $request['fullName']);
  $content_preference = sanitize_text_field($request['contentPreference']);

  if (empty($portal_id) || empty($form_id) || empty($email)) {
    return new WP_Error('missing_required_fields', 'portalId, formId y email son obligatorios', array('status' => 400));
  }

  if (!is_email($email)) {
    return new WP_Error('invalid_email', 'El email no es valido', array('status' => 400));
  }

  $fields = array(
    array(
      'name' => 'email',
      'value' => $email,
    ),
    array(
      'name' => 'firstname',
      'value' => $first_name,
    ),
  );

  if (!empty($content_preference)) {
    $fields[] = array(
      'name' => 'por_que_te_interesa_este_contenido_',
      'value' => $content_preference,
    );
  }

  $payload = array(
    'fields' => $fields,
    'context' => array(
      'pageUri' => esc_url_raw($request['pageUri'] ?: home_url('/')),
      'pageName' => sanitize_text_field($request['pageName'] ?: get_bloginfo('name')),
    ),
  );

  $hubspot_url = sprintf(
    'https://api.hsforms.com/submissions/v3/integration/submit/%s/%s',
    rawurlencode($portal_id),
    rawurlencode($form_id)
  );

  $response = wp_remote_post(
    $hubspot_url,
    array(
      'headers' => array(
        'Content-Type' => 'application/json',
      ),
      'body' => wp_json_encode($payload),
      'timeout' => 20,
    )
  );

  if (is_wp_error($response)) {
    return new WP_Error('hubspot_request_error', $response->get_error_message(), array('status' => 500));
  }

  $status_code = wp_remote_retrieve_response_code($response);
  $response_body = wp_remote_retrieve_body($response);

  if ($status_code < 200 || $status_code >= 300) {
    return new WP_Error(
      'hubspot_submit_error',
      'HubSpot rechazo la suscripcion',
      array(
        'status' => $status_code ?: 500,
        'hubspot_response' => $response_body,
      )
    );
  }

  return array(
    'success' => true,
    'message' => 'Suscripcion enviada correctamente',
  );
}

function nav_menu_movil_handler($request) {
  $menu = get_field('nav', 'option');
  $nav_menu = array();
  $requested_menu = sanitize_text_field($request->get_param('menu'));

  if (!is_array($menu)) {
    return $nav_menu;
  }

  foreach ($menu as $items) {
    $menu_name = isset($items['name_menu']) ? $items['name_menu'] : '';

    if ($menu_name === '') {
      continue;
    }

    if (!isset($nav_menu[$menu_name])) {
      $nav_menu[$menu_name] = array(
        'menu' => $menu_name,
        'sub_menu' => array(),
      );
    }

    if (empty($items['sub_menu']) || !is_array($items['sub_menu'])) {
      continue;
    }

    foreach ($items['sub_menu'] as $item) {
      $sub_menu_name = isset($item['sub_menu_name']) ? $item['sub_menu_name'] : '';
      $icon = '';
      $links = array();

      if (!empty($item['sub_menu_icon']) && is_array($item['sub_menu_icon']) && !empty($item['sub_menu_icon']['ID'])) {
        $icon = wp_get_attachment_image((int) $item['sub_menu_icon']['ID'], 'medium', false, array(
          'class' => 'nav-icon background-desktop',
          'fetchpriority' => 'high',
        ));
      }

      if (!empty($item['sub_menu_links']) && is_array($item['sub_menu_links'])) {
        foreach ($item['sub_menu_links'] as $a) {
          $external_url = isset($a['external_url']) ? $a['external_url'] : '';

          if (is_array($external_url)) {
            $url = isset($external_url['url']) ? $external_url['url'] : '';
            $target = isset($external_url['target']) ? $external_url['target'] : '';
            $text = isset($external_url['title']) ? $external_url['title'] : '';
          } else {
            $url = is_string($external_url) ? $external_url : '';
            $target = '';
            $text = '';
          }

          $links[] = array(
            'url' => $url,
            'target' => $target,
            'text' => $text,
          );
        }
      }

      $nav_menu[$menu_name]['sub_menu'][] = array(
        'name' => $sub_menu_name,
        'icon' => $icon,
        'nav' => $links,
      );
    }
  }

  $result = array_values($nav_menu);

  if ($requested_menu === '') {
    return $result;
  }

  return array_values(array_filter($result, function ($item) use ($requested_menu) {
    return isset($item['menu']) && $item['menu'] === $requested_menu;
  }));
}

function ditto_webp_add_tools_page() {
  add_theme_page(
    'WebP Tools',
    'WebP Tools',
    'edit_theme_options',
    'ditto-webp-tools',
    'ditto_webp_render_tools_page'
  );
}
add_action('admin_menu', 'ditto_webp_add_tools_page');

function ditto_webp_render_tools_page() {
  if (!current_user_can('edit_theme_options')) {
    return;
  }

  $uploads = wp_get_upload_dir();
  ?>
  <div class="wrap">
    <h1>WebP Tools</h1>
    <p>Convierte imagenes por bloques (JPG/JPEG/PNG) y omite automaticamente las que ya tienen .webp.</p>
    <table class="form-table" role="presentation">
      <tr>
        <th scope="row"><label for="ditto_webp_quality">Calidad</label></th>
        <td><input id="ditto_webp_quality" type="number" min="1" max="100" value="82" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="ditto_webp_batch">Tamano de bloque</label></th>
        <td><input id="ditto_webp_batch" type="number" min="1" max="1000" value="250" /></td>
      </tr>
      <tr>
        <th scope="row">Ruta uploads</th>
        <td><code><?php echo esc_html($uploads['basedir']); ?></code></td>
      </tr>
    </table>

    <p>
      <button class="button button-primary" id="ditto_webp_start">Convertir todo</button>
      <button class="button" id="ditto_webp_one">Convertir 1 bloque</button>
      <button class="button" id="ditto_webp_reset">Revertir WebP (borrar por bloques)</button>
      <button class="button" id="ditto_webp_stop">Detener</button>
    </p>

    <pre id="ditto_webp_log" style="background:#fff; border:1px solid #ccd0d4; padding:12px; max-height:360px; overflow:auto;"></pre>
  </div>

  <script>
    (function($){
      var running = false;
      var nonce = '<?php echo esc_js(wp_create_nonce('ditto_webp_tools')); ?>';

      function log(msg) {
        var el = $('#ditto_webp_log');
        el.append(msg + "\n");
        el.scrollTop(el[0].scrollHeight);
      }

      function runBatch(keepRunning) {
        if (!running && keepRunning) return;

        var quality = parseInt($('#ditto_webp_quality').val(), 10) || 82;
        var batch = parseInt($('#ditto_webp_batch').val(), 10) || 250;

        $.post(ajaxurl, {
          action: 'ditto_webp_convert_batch',
          nonce: nonce,
          quality: quality,
          batch_size: batch
        }).done(function(resp){
          if (!resp || !resp.success) {
            log('Error: ' + ((resp && resp.data && resp.data.message) ? resp.data.message : 'No response'));
            running = false;
            return;
          }

          var data = resp.data;
          log('Convertidas: ' + data.converted + ' | Omitidas: ' + data.skipped + ' | Errores: ' + data.errors + ' | Pendientes: ' + data.remaining);

          if (data.engine_counts) {
            log('Motores: wp_editor=' + (data.engine_counts.wp_editor || 0) + ' | cwebp=' + (data.engine_counts.cwebp || 0) + ' | gd=' + (data.engine_counts.gd || 0));
          }

          if (data.error_reasons) {
            Object.keys(data.error_reasons).forEach(function(reason){
              log('Error [' + reason + ']: ' + data.error_reasons[reason]);
            });
          }

          if (data.error_samples && data.error_samples.length) {
            data.error_samples.forEach(function(item){
              log('Fallo: ' + item.file + ' -> ' + item.reason);
            });
          }

          if (keepRunning && running && data.remaining > 0) {
            runBatch(true);
          } else if (data.remaining <= 0) {
            running = false;
            log('Proceso terminado.');
          }
        }).fail(function(){
          log('Error de conexion con AJAX.');
          running = false;
        });
      }

      function runResetBatch(keepRunning) {
        if (!running && keepRunning) return;

        var batch = parseInt($('#ditto_webp_batch').val(), 10) || 250;

        $.post(ajaxurl, {
          action: 'ditto_webp_cleanup_batch',
          nonce: nonce,
          batch_size: batch
        }).done(function(resp){
          if (!resp || !resp.success) {
            log('Error reset: ' + ((resp && resp.data && resp.data.message) ? resp.data.message : 'No response'));
            running = false;
            return;
          }

          var data = resp.data;
          log('Reset WebP -> Borradas: ' + data.deleted + ' | Errores: ' + data.errors + ' | Pendientes: ' + data.remaining);

          if (data.error_samples && data.error_samples.length) {
            data.error_samples.forEach(function(item){
              log('No se pudo borrar: ' + item.file);
            });
          }

          if (keepRunning && running && data.remaining > 0) {
            runResetBatch(true);
          } else if (data.remaining <= 0) {
            running = false;
            log('Reset terminado. Ya puedes volver a convertir.');
          }
        }).fail(function(){
          log('Error de conexion con AJAX (reset).');
          running = false;
        });
      }

      $('#ditto_webp_start').on('click', function(){
        if (running) return;
        running = true;
        log('Iniciando conversion completa...');
        runBatch(true);
      });

      $('#ditto_webp_one').on('click', function(){
        log('Procesando 1 bloque...');
        runBatch(false);
      });

      $('#ditto_webp_reset').on('click', function(){
        if (running) return;
        running = true;
        log('Iniciando reset de WebP por bloques...');
        runResetBatch(true);
      });

      $('#ditto_webp_stop').on('click', function(){
        running = false;
        log('Proceso detenido por el usuario.');
      });
    })(jQuery);
  </script>
  <?php
}

function ditto_webp_is_valid_file($path) {
  return is_string($path) && $path !== '' && is_file($path) && filesize($path) > 0;
}

function ditto_webp_get_existing_webp_files($limit = 0) {
  $uploads = wp_get_upload_dir();
  $base = isset($uploads['basedir']) ? $uploads['basedir'] : '';
  $results = array();

  if ($base === '' || !is_dir($base)) {
    return $results;
  }

  $it = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($base, FilesystemIterator::SKIP_DOTS)
  );

  foreach ($it as $file) {
    if (!$file->isFile()) {
      continue;
    }

    $path = $file->getPathname();
    if (strtolower(pathinfo($path, PATHINFO_EXTENSION)) !== 'webp') {
      continue;
    }

    $jpgSource = preg_replace('/\.webp$/i', '.jpg', $path);
    $jpegSource = preg_replace('/\.webp$/i', '.jpeg', $path);
    $pngSource = preg_replace('/\.webp$/i', '.png', $path);

    if (!is_file($jpgSource) && !is_file($jpegSource) && !is_file($pngSource)) {
      continue;
    }

    $results[] = $path;

    if ($limit > 0 && count($results) >= $limit) {
      break;
    }
  }

  return $results;
}

function ditto_webp_get_pending_files($limit = 0) {
  $uploads = wp_get_upload_dir();
  $base = isset($uploads['basedir']) ? $uploads['basedir'] : '';
  $results = array();

  if ($base === '' || !is_dir($base)) {
    return $results;
  }

  $it = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($base, FilesystemIterator::SKIP_DOTS)
  );

  foreach ($it as $file) {
    if (!$file->isFile()) {
      continue;
    }

    $path = $file->getPathname();
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    if (!in_array($ext, array('jpg', 'jpeg', 'png'), true)) {
      continue;
    }

    $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $path);
    if (ditto_webp_is_valid_file($webpPath)) {
      continue;
    }

    $results[] = $path;

    if ($limit > 0 && count($results) >= $limit) {
      break;
    }
  }

  return $results;
}

function ditto_webp_convert_file($source, $quality = 82, &$meta = null) {
  $meta = array(
    'ok' => false,
    'engine' => 'none',
    'reason' => 'unknown',
  );

  if (!is_string($source) || $source === '' || !is_file($source) || !is_readable($source)) {
    $meta['reason'] = 'source_unreadable';
    return false;
  }

  $quality = (int) $quality;
  if ($quality < 1 || $quality > 100) {
    $quality = 82;
  }

  $target = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $source);
  if (!$target) {
    $meta['reason'] = 'target_path_invalid';
    return false;
  }

  if (is_file($target)) {
    $meta['ok'] = true;
    $meta['engine'] = 'existing';
    $meta['reason'] = 'already_exists';
    return true;
  }

  if (function_exists('wp_get_image_editor')) {
    $editor = wp_get_image_editor($source);

    if (!is_wp_error($editor)) {
      if (method_exists($editor, 'set_quality')) {
        $editor->set_quality($quality);
      }

      $saved = $editor->save($target, 'image/webp');
      if (!is_wp_error($saved) && is_file($target) && filesize($target) > 0) {
        $meta['ok'] = true;
        $meta['engine'] = 'wp_editor';
        $meta['reason'] = 'ok';
        return true;
      }
    }
  }

  $execEnabled = function_exists('exec');
  if ($execEnabled) {
    $disabledFunctions = (string) ini_get('disable_functions');
    if ($disabledFunctions !== '') {
      $disabled = array_map('trim', explode(',', strtolower($disabledFunctions)));
      if (in_array('exec', $disabled, true)) {
        $execEnabled = false;
      }
    }
  }

  if ($execEnabled) {
    exec('command -v cwebp >/dev/null 2>&1', $noop, $hasCwebp);
    if ($hasCwebp === 0) {
      $cmd = sprintf(
        'cwebp -quiet -q %d %s -o %s 2>/dev/null',
        $quality,
        escapeshellarg($source),
        escapeshellarg($target)
      );
      exec($cmd, $out, $status);

      if ($status === 0 && is_file($target) && filesize($target) > 0) {
        $meta['ok'] = true;
        $meta['engine'] = 'cwebp';
        $meta['reason'] = 'ok';
        return true;
      }
    }
  }

  if (!function_exists('imagewebp')) {
    $meta['reason'] = 'imagewebp_unavailable';
    return false;
  }

  $ext = strtolower(pathinfo($source, PATHINFO_EXTENSION));
  $img = null;

  if (($ext === 'jpg' || $ext === 'jpeg') && function_exists('imagecreatefromjpeg')) {
    $img = @imagecreatefromjpeg($source);
  } elseif ($ext === 'png' && function_exists('imagecreatefrompng')) {
    $img = @imagecreatefrompng($source);
  }

  if (!$img) {
    $meta['reason'] = 'source_decode_failed';
    return false;
  }

  if ($ext === 'png') {
    if (function_exists('imagepalettetotruecolor')) {
      @imagepalettetotruecolor($img);
    }
    imagealphablending($img, false);
    imagesavealpha($img, true);
  }

  $ok = imagewebp($img, $target, $quality);
  imagedestroy($img);

  $written = (bool) $ok && is_file($target) && filesize($target) > 0;
  if ($written) {
    $meta['ok'] = true;
    $meta['engine'] = 'gd';
    $meta['reason'] = 'ok';
    return true;
  }

  $meta['reason'] = 'gd_write_failed';
  return false;
}

function ditto_webp_convert_batch_ajax() {
  if (!current_user_can('edit_theme_options')) {
    wp_send_json_error(array('message' => 'No autorizado.'), 403);
  }

  check_ajax_referer('ditto_webp_tools', 'nonce');

  $batchSize = isset($_POST['batch_size']) ? (int) $_POST['batch_size'] : 250;
  $quality = isset($_POST['quality']) ? (int) $_POST['quality'] : 82;

  if ($batchSize < 1) {
    $batchSize = 1;
  }
  if ($batchSize > 1000) {
    $batchSize = 1000;
  }
  if ($quality < 1 || $quality > 100) {
    $quality = 82;
  }

  $files = ditto_webp_get_pending_files($batchSize);
  $converted = 0;
  $skipped = 0;
  $errors = 0;
  $engineCounts = array(
    'wp_editor' => 0,
    'cwebp' => 0,
    'gd' => 0,
  );
  $errorReasons = array();
  $errorSamples = array();

  foreach ($files as $source) {
    $target = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $source);

    if ($target && ditto_webp_is_valid_file($target)) {
      $skipped++;
      continue;
    }

    if ($target && is_file($target) && !ditto_webp_is_valid_file($target)) {
      @unlink($target);
    }

    $meta = null;
    if (ditto_webp_convert_file($source, $quality, $meta)) {
      $converted++;
      if (is_array($meta) && !empty($meta['engine']) && isset($engineCounts[$meta['engine']])) {
        $engineCounts[$meta['engine']]++;
      }
    } else {
      $errors++;
      $reason = 'conversion_failed';
      if (is_array($meta) && !empty($meta['reason'])) {
        $reason = (string) $meta['reason'];
      }

      if (!isset($errorReasons[$reason])) {
        $errorReasons[$reason] = 0;
      }
      $errorReasons[$reason]++;

      if (count($errorSamples) < 5) {
        $errorSamples[] = array(
          'file' => wp_basename($source),
          'reason' => $reason,
        );
      }
    }
  }

  $remaining = count(ditto_webp_get_pending_files(0));

  wp_send_json_success(array(
    'converted' => $converted,
    'skipped' => $skipped,
    'errors' => $errors,
    'remaining' => $remaining,
    'engine_counts' => $engineCounts,
    'error_reasons' => $errorReasons,
    'error_samples' => $errorSamples,
  ));
}
add_action('wp_ajax_ditto_webp_convert_batch', 'ditto_webp_convert_batch_ajax');

function ditto_webp_cleanup_batch_ajax() {
  if (!current_user_can('edit_theme_options')) {
    wp_send_json_error(array('message' => 'No autorizado.'), 403);
  }

  check_ajax_referer('ditto_webp_tools', 'nonce');

  $batchSize = isset($_POST['batch_size']) ? (int) $_POST['batch_size'] : 250;
  if ($batchSize < 1) {
    $batchSize = 1;
  }
  if ($batchSize > 1000) {
    $batchSize = 1000;
  }

  $files = ditto_webp_get_existing_webp_files($batchSize);
  $deleted = 0;
  $errors = 0;
  $errorSamples = array();

  foreach ($files as $path) {
    if (@unlink($path)) {
      $deleted++;
      continue;
    }

    $errors++;
    if (count($errorSamples) < 5) {
      $errorSamples[] = array(
        'file' => wp_basename($path),
      );
    }
  }

  $remaining = count(ditto_webp_get_existing_webp_files(0));

  wp_send_json_success(array(
    'deleted' => $deleted,
    'errors' => $errors,
    'remaining' => $remaining,
    'error_samples' => $errorSamples,
  ));
}
add_action('wp_ajax_ditto_webp_cleanup_batch', 'ditto_webp_cleanup_batch_ajax');

function ditto_webp_replace_url_if_exists($url) {
  if (!is_string($url) || $url === '' || strpos($url, '.webp') !== false) {
    return $url;
  }

  $uploads = wp_get_upload_dir();
  $baseurl = isset($uploads['baseurl']) ? $uploads['baseurl'] : '';
  $basedir = isset($uploads['basedir']) ? $uploads['basedir'] : '';

  if ($baseurl === '' || $basedir === '' || strpos($url, $baseurl) !== 0) {
    return $url;
  }

  if (!preg_match('/\.(jpe?g|png)$/i', $url)) {
    return $url;
  }

  $relative = substr($url, strlen($baseurl));
  $sourcePath = $basedir . $relative;
  $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $sourcePath);

  if ($webpPath && ditto_webp_is_valid_file($webpPath)) {
    return preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $url);
  }

  return $url;
}

function ditto_webp_filter_attachment_url($url) {
  if (is_admin()) {
    return $url;
  }
  return ditto_webp_replace_url_if_exists($url);
}
add_filter('wp_get_attachment_url', 'ditto_webp_filter_attachment_url', 20);

function ditto_webp_filter_attachment_image_src($image) {
  if (is_admin() || !is_array($image) || empty($image[0])) {
    return $image;
  }
  $image[0] = ditto_webp_replace_url_if_exists($image[0]);
  return $image;
}
add_filter('wp_get_attachment_image_src', 'ditto_webp_filter_attachment_image_src', 20);

function ditto_webp_filter_srcset($sources) {
  if (is_admin() || !is_array($sources)) {
    return $sources;
  }

  foreach ($sources as $w => $item) {
    if (!empty($item['url'])) {
      $sources[$w]['url'] = ditto_webp_replace_url_if_exists($item['url']);
    }
  }

  return $sources;
}
add_filter('wp_calculate_image_srcset', 'ditto_webp_filter_srcset', 20);