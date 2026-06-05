<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Theme Styles
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function ditto_styles() {
  wp_enqueue_style( 'plus-jakarta-sans', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', array(), null );
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.bundle.css' );
  wp_enqueue_style( 'bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'owl-carousel.css', get_template_directory_uri() . '/css/owl.carousel.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ditto_styles' );

/**
 * Register Theme Scripts in footer
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function ditto_scripts() {
  wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'owl-carousel.js', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'font-awesome.js', get_template_directory_uri() . '/js/font-awesome.js', array(), null, true );
  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.bundle.js', array( 'jquery', 'owl-carousel.js' ), '', true );
  wp_enqueue_script( 'custom.js', get_template_directory_uri() . '/js/custom.js', array( 'jquery', 'owl-carousel.js' ), '1', true );
}
add_action( 'wp_enqueue_scripts', 'ditto_scripts' );

/**
 * Register Navigation Menus
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function ditto_navigation_menus() {
  $locations = array(
    'main_menu' => __( 'Main Menu', 'text_domain' )
  );
  register_nav_menus( $locations );
}
add_action( 'init', 'ditto_navigation_menus' );

/**
 * Theme support
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support( 'custom-logo' );

/**
 * Login Styles
 */
function ditto_login_styles() { ?>
  <style type="text/css">
    body {
      background-color: #222 !important;
    }
    #login h1 a, .login h1 a {
      display: none;
    }
    #login h1 img {
      width: 100%;
      max-width: 240px;
      max-height: 180px;
    }
  </style>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
      let loginImg = document.createElement("img");
        loginImg.src = "<?= get_template_directory_uri() ?>/images/pipe-code-logo.svg";
        loginImg.alt = "WordPress login image";
        document.querySelector('#login h1').appendChild(loginImg);
    });
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'ditto_login_styles' );

/**
 * Install latest jQuery version 3.5.1 in footer
 */
function ditto_register_jquery_in_footer() {
  if ( is_admin() ) {
    return;
  }

  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true );
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'ditto_register_jquery_in_footer', 1 );

/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

/**
 * Allow SVG uploads in Media Library.
 */
function ditto_allow_svg_uploads( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'ditto_allow_svg_uploads' );

function ditto_fix_svg_filetype_check( $data, $file, $filename, $mimes ) {
  $ext = isset( $data['ext'] ) ? $data['ext'] : '';

  if ( ! $ext ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    if ( 'svg' === $wp_filetype['ext'] ) {
      $data['ext'] = 'svg';
      $data['type'] = 'image/svg+xml';
      $data['proper_filename'] = $filename;
    }
  }

  return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'ditto_fix_svg_filetype_check', 10, 4 );
/*
*  Options
*/
if (function_exists('acf_add_options_page')) {
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
}
/*=================== Comprehensive protection ===================*/
add_theme_support('post-thumbnails');
add_post_type_support( 'comprehensive_protection', 'thumbnail' );
function comprehensive_protection_post(){
  /*====== Argument post type =====*/
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Protección integral',
    'menu_icon' => 'dashicons-building',
    'supports' => ['title', 'editor', 'thumbnail']
  );
  /*============ Register post type ============*/
  register_post_type('protection_post', $arg);
}
add_action('init', 'comprehensive_protection_post', 3);
function is_mobile() {
  return preg_match('/(android|iphone|ipad|ipod|windows phone|blackberry|iemobile|opera mini|mobile)/i', $_SERVER['HTTP_USER_AGENT']);
}
/*=================== FQAs ===================*/
add_theme_support('post-thumbnails');
add_post_type_support( 'fqas', 'thumbnail' );
function fqas_posts(){
  /*====== Argument post type =====*/
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Preguntas frecuentes',
    'menu_icon' => 'dashicons-excerpt-view',
    'supports' => ['title', 'editor', 'thumbnail']
  );
  /*============ Register post type ============*/
  register_post_type('fqas_post', $arg);
}
add_action('init', 'fqas_posts', 4);
/*=================== FQAs ===================*/
add_theme_support('post-thumbnails');
add_post_type_support( 'blogs', 'thumbnail' );
function blog_posts(){
  /*====== Argument post type =====*/
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Blog',
    'menu_icon' => 'dashicons-book',
    'supports' => ['title', 'editor', 'thumbnail'],
    'taxonomies' => array('blog_cat', 'autor')
  );
  /*============ Register post type ============*/
  register_post_type('blogs', $arg);
  /*============ Categories ============*/
  $category = array(
    'name' => _x('Categoria', 'taxonomy general name'),
    'singular_name' => _x('Categoria', 'taxonomy singular name'),
    'search_items' =>  __('Search Categoria'),
    'all_items' => __('All Categoria'),
    'parent_item' => __('Parent Categoria'),
    'parent_item_colon' => __('Parent Categoria:'),
    'edit_item' => __('Edit Categoria'),
    'update_item' => __('Update Categoria'),
    'add_new_item' => __('Add New Categoria'),
    'new_item_name' => __('New Categoria Name'),
    'menu_name' => __('Categoria'),
  );
  /*========== Register taxonomy ==========*/
  register_taxonomy('blog_cat', array('blogs'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'blog_cat'),
  ));

  /*============ Auton ============*/
  $category = array(
    'name' => _x('Autor', 'taxonomy general name'),
    'singular_name' => _x('Autor', 'taxonomy singular name'),
    'search_items' =>  __('Search Autor'),
    'all_items' => __('All Autor'),
    'parent_item' => __('Parent Autor'),
    'parent_item_colon' => __('Parent Autor:'),
    'edit_item' => __('Edit Autor'),
    'update_item' => __('Update Autor'),
    'add_new_item' => __('Add New Autor'),
    'new_item_name' => __('New Autor Name'),
    'menu_name' => __('Autor'),
  );
  /*========== Register taxonomy ==========*/
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
/*=============== Exit case custom post type ===============*/
add_theme_support('post-thumbnails');
add_post_type_support( 'success_stories', 'thumbnail' );
function successStories(){
  /*====== Argument post type =====*/
  $arg = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Success stories',
    'menu_icon' => 'dashicons-building',
    'supports' => ['title', 'editor', 'thumbnail'],
    'taxonomies' => array('size_cat', 'segment_cat', 'zone_cat')
  );
  /*============ Register post type ============*/
  register_post_type('success_stories', $arg);
  /*============ Size ============*/
  $category = array(
    'name' => _x('Size', 'taxonomy general name'),
    'singular_name' => _x('Size', 'taxonomy singular name'),
    'search_items' =>  __('Search Size'),
    'all_items' => __('All Size'),
    'parent_item' => __('Parent Size'),
    'parent_item_colon' => __('Parent Size:'),
    'edit_item' => __('Edit Size'),
    'update_item' => __('Update Size'),
    'add_new_item' => __('Add New Size'),
    'new_item_name' => __('New Size Name'),
    'menu_name' => __('Size'),
  );
  /*========== Register taxonomy ==========*/
  register_taxonomy('size_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'size_cat'),
  ));
  /*============ Segment ============*/
  $category = array(
    'name' => _x('Product segment', 'taxonomy general name'),
    'singular_name' => _x('Product segment', 'taxonomy singular name'),
    'search_items' =>  __('Search Product segment'),
    'all_items' => __('All Product segment'),
    'parent_item' => __('Parent Product segment'),
    'parent_item_colon' => __('Parent Product segment:'),
    'edit_item' => __('Edit Product segment'),
    'update_item' => __('Update Product segment'),
    'add_new_item' => __('Add New Product segment'),
    'new_item_name' => __('New Product segment Name'),
    'menu_name' => __('Product segment'),
  );
  /*========== Register taxonomy ==========*/
  register_taxonomy('segment_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'segment_cat'),
  ));
  /*============ Zone ============*/
  $category = array(
    'name' => _x('Zone', 'taxonomy general name'),
    'singular_name' => _x('Zone', 'taxonomy singular name'),
    'search_items' =>  __('Search Zone'),
    'all_items' => __('All Zone'),
    'parent_item' => __('Parent Zone'),
    'parent_item_colon' => __('Parent Zone:'),
    'edit_item' => __('Edit Zone'),
    'update_item' => __('Update Zone'),
    'add_new_item' => __('Add New Zone'),
    'new_item_name' => __('New Zone Name'),
    'menu_name' => __('Zone'),
  );
  /*========== Register taxonomy ==========*/
  register_taxonomy('zone_cat', array('success_stories'), array(
    'hierarchical' => true,
    'labels' => $category,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'zone_cat'),
  ));
}
add_action('init', 'successStories', 5);
/*============== Success histories API ==============*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'success-histories', '/list', array(
      array(
          'methods'               => WP_REST_Server::READABLE,
          'callback'              => 'success_historie_list_handler',
          'permission_callback'   => '__return_true',          
      )
  ));
  // Nav menu movil
  register_rest_route( 'nav', '/movil', array(
      array(
          'methods'               => WP_REST_Server::READABLE,
          'callback'              => 'nav_menu_movil_handler',
          'permission_callback'   => '__return_true',          
      )
  ));
});
/*============ Historis return ============*/
function success_historie_list_handler($request){
  $args = [
    'post_type'      => 'success_stories',
    'post_status'    => 'publish',
    'tax_query'      => [['relation' => 'AND']],
    'meta_query'     => [],
    'posts_per_page' => -1,
    'orderby'        => 'title',
  ];

  if(!empty($request['size'])){
    $args['tax_query'][] = [
      'taxonomy' => 'size_cat',
      'field'    => 'slug',
      'terms'    => $request['size']
    ];
  }
  if(!empty($request['segment'])){
    $args['tax_query'][] = [
      'taxonomy' => 'segment_cat',
      'field'    => 'slug',
      'terms'    => $request['segment']
    ];
  }
  if(!empty($request['zone'])){
    $args['tax_query'][] = [
      'taxonomy' => 'zone_cat',
      'field'    => 'slug',
      'terms'    => $request['zone']
    ];
  }

  $success = new WP_Query($args);
  $the_success = [];

  if($success->have_posts()){
    while($success->have_posts()){
        $success->the_post();
        $the_success[] = [
            'feature_image'   => get_the_post_thumbnail_url() ?: '',
            'permalink'       => get_permalink() ?: '#',
            'title'           => get_the_title() ?: 'Sin título',
            'short_description' => get_field('short_description') ?: '',
            'logo'            => get_field('logo') ?: ['url' => '', 'title' => ''],
            'color'           => get_field('primary_color_for_gradient') ?: '#000000',
        ];
    }
    wp_reset_postdata();
  }

  return $the_success;
}

/*============== Blog Listing API ==============*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'blog-listing', '/posts', array(
      array(
          'methods'               => WP_REST_Server::READABLE,
          'callback'              => 'blog_listing_posts_handler',
          'permission_callback'   => '__return_true',
      )
  ));
  register_rest_route( 'blog-listing', '/change-view', array(
      array(
          'methods'               => WP_REST_Server::EDITABLE,
          'callback'              => 'blog_listing_change_view_handler',
          'permission_callback'   => '__return_true',
      )
  ));
});

/*============ Blog Posts Return ============*/
function blog_listing_posts_handler($request){
  $paged = intval($request['paged']) ?: 1;
  $posts_per_page = intval($request['per_page']) ?: 6;
  $blog_cat = intval($request['blog_cat']) ?: 0;

  $args = [
    'post_type'      => 'blogs',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  if(!empty($blog_cat)){
    $args['tax_query'] = [
      [
        'taxonomy' => 'blog_cat',
        'field'    => 'term_id',
        'terms'    => $blog_cat
      ]
    ];
  }

  $blog_query = new WP_Query($args);
  $posts = [];

  if($blog_query->have_posts()){
    while($blog_query->have_posts()){
        $blog_query->the_post();
        $thumbnail_id = get_post_thumbnail_id();
        $featured_image_html = '';

        if($thumbnail_id){
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
          $time_ago = 'hace ' . $days . ' ' . ($days == 1 ? 'día' : 'días');
        } elseif ($time_diff < 2592000) {
          $weeks = floor($time_diff / 604800);
          $time_ago = 'hace ' . $weeks . ' ' . ($weeks == 1 ? 'semana' : 'semanas');
        } elseif ($time_diff < 31536000) {
          $months = floor($time_diff / 2592000);
          $time_ago = 'hace ' . $months . ' ' . ($months == 1 ? 'mes' : 'meses');
        } else {
          $years = floor($time_diff / 31536000);
          $time_ago = 'hace ' . $years . ' ' . ($years == 1 ? 'año' : 'años');
        }

        $post_categories = get_the_terms(get_the_ID(), 'blog_cat');
        $category_name = '';
        if($post_categories && !is_wp_error($post_categories)){
          $category_name = $post_categories[0]->name;
        }

        $posts[] = [
            'id'              => get_the_ID(),
            'title'           => get_the_title() ?: 'Sin título',
            'excerpt'         => get_field('short_description') ?: '', 
            'featured_image'  => $featured_image_html,
            'permalink'       => get_permalink() ?: '#',
            'category'        => $category_name,
            'date'            => $time_ago,
        ];
    }
    wp_reset_postdata();
  }

  return [
    'posts' => $posts,
    'total' => $blog_query->found_posts,
    'pages' => $blog_query->max_num_pages,
  ];
}

/*============ Blog Change View ============*/
function blog_listing_change_view_handler($request){
  $view_type = sanitize_text_field($request['view']);

  if(!in_array($view_type, ['grid', 'column'])){
    return new WP_Error('invalid_view', 'View type must be grid or column', array('status' => 400));
  }

  return ['view' => $view_type];
}

/*============== HubSpot Subscription API ==============*/
add_action( 'rest_api_init', function () {
  register_rest_route( 'neivor/v1', '/hubspot-subscribe', array(
      array(
          'methods'               => WP_REST_Server::CREATABLE,
          'callback'              => 'neivor_hubspot_subscribe_handler',
          'permission_callback'   => '__return_true',
      )
  ));
});

function neivor_hubspot_subscribe_handler($request){
  $portal_id = sanitize_text_field($request['portalId']);
  $form_id = sanitize_text_field($request['formId']);
  $email = sanitize_email($request['email']);
  $first_name = sanitize_text_field($request['firstname'] ?: $request['fullName']);
  $content_preference = sanitize_text_field($request['contentPreference']);

  if(empty($portal_id) || empty($form_id) || empty($email)){
    return new WP_Error('missing_required_fields', 'portalId, formId y email son obligatorios', array('status' => 400));
  }

  if(!is_email($email)){
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

  if(!empty($content_preference)){
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

  if(is_wp_error($response)){
    return new WP_Error('hubspot_request_error', $response->get_error_message(), array('status' => 500));
  }

  $status_code = wp_remote_retrieve_response_code($response);
  $response_body = wp_remote_retrieve_body($response);

  if($status_code < 200 || $status_code >= 300){
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
/*=========== Nav menu movil ==========*/
function nav_menu_movil_handler($request){
  $menu = get_field('nav', 'option');
  $nav_menu = array();
  $requested_menu = sanitize_text_field($request->get_param('menu'));

  if(!is_array($menu)){
    return $nav_menu;
  }

  foreach($menu as $items){
    $menu_name = isset($items['name_menu']) ? $items['name_menu'] : '';

    if($menu_name === ''){
      continue;
    }

    if(!isset($nav_menu[$menu_name])){
      $nav_menu[$menu_name] = array(
        'menu' => $menu_name,
        'sub_menu' => array(),
      );
    }

    if(empty($items['sub_menu']) || !is_array($items['sub_menu'])){
      continue;
    }

    foreach($items['sub_menu'] as $item){
      $sub_menu_name = isset($item['sub_menu_name']) ? $item['sub_menu_name'] : '';
      $icon = '';
      $links = array();

      if(!empty($item['sub_menu_icon']) && is_array($item['sub_menu_icon']) && !empty($item['sub_menu_icon']['ID'])){
        $icon = wp_get_attachment_image((int) $item['sub_menu_icon']['ID'], 'medium', false, array(
          'class' => 'nav-icon background-desktop',
          'fetchpriority' => 'high',
        ));
      }

      if(!empty($item['sub_menu_links']) && is_array($item['sub_menu_links'])){
        foreach($item['sub_menu_links'] as $a){
          $external_url = isset($a['external_url']) ? $a['external_url'] : '';

          if(is_array($external_url)){
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

  if($requested_menu === ''){
    return $result;
  }

  return array_values(array_filter($result, function($item) use ($requested_menu){
    return isset($item['menu']) && $item['menu'] === $requested_menu;
  }));
}