<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Theme Scripts
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function ditto_scripts() {
  wp_enqueue_style( 'plus-jakarta-sans', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', [], null );
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.bundle.css' );
  wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('owl-carousel.css', get_template_directory_uri() . '/css/owl.carousel.min.css');

  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.bundle.js', array( 'jquery' ), '', true );
  wp_enqueue_script('jquery.js', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', true);
  wp_enqueue_script('bootstrap.js',  get_template_directory_uri() . '/js/bootstrap.min.js');
  wp_enqueue_script('owl-carousel.js', get_template_directory_uri() . '/js/owl.carousel.min.js');
  wp_enqueue_script('font-awesome.js', get_template_directory_uri() . '/js/font-awesome.js');
  wp_register_script('custom.js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1', true);
  wp_enqueue_script('custom.js');
  wp_enqueue_script('new-nav', get_template_directory_uri() . '/js/partials/new-nav.js', array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'ditto_scripts');

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
 * Install latest jQuery version 3.5.1
 */
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);
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
    'taxonomies' => array('blog_cat')
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