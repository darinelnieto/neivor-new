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
?>
<main id="blog-template-d76d1c">
    <?php get_template_part('partials/home/banner'); ?>
    <?php get_template_part('partials/blog/filter-blog'); ?>
    <?php get_template_part('partials/blog/body-blog'); ?>
</main>
<script src="<?= get_template_directory_uri() ?>/js/blog.js"></script>
<?php get_footer(); ?>
                    
