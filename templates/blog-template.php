<?php
/**
 * 
 * Template Name: blog
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$script_handle = 'blog-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/blog.js',
    array('jquery', 'owl-carousel.js'),
    null,
    true
);
?>
<main id="blog-template-d76d1c">
    <?php get_template_part('partials/home/banner'); ?>
    <?php get_template_part('partials/blog/filter-blog'); ?>
    <?php get_template_part('partials/blog/body-blog'); ?>
</main>
<?php get_footer(); ?>
                    
