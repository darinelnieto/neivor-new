<?php
/**
 * 
 * Template Name: about-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="about-us-template-df799a">
   <?php get_template_part('partials/about/banner-about'); ?>
   <?php get_template_part('partials/about/who-supports-us'); ?>
   <?php get_template_part('partials/about/today-we-are-in'); ?>
   <?php get_template_part('partials/about/corporate-groups'); ?>
   <?php get_template_part('partials/about/success-stories'); ?>
   <?php get_template_part('partials/about/recognitions'); ?>
   <?php get_template_part('partials/about/we-are-the-ally'); ?>
   <?php get_template_part('partials/about/neivor-in-media'); ?>
   <?php get_template_part('partials/about/about'); ?>
</main>
<?php get_footer(); ?>
                    
