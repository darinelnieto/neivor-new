<?php
/**
 * 
 * Template Name: single-success-stories
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$customized_part = get_field('enable_custom_partial');
?>
<main id="single-success-stories-template-132d3d">
    <?php get_template_part('partials/success-stories-single/banner'); ?>
    <?php get_template_part('partials/success-stories-single/challenge'); ?>
    <?php get_template_part('partials/success-stories-single/solitions'); ?>
    <?php get_template_part('partials/success-stories-single/featured-results'); ?>
    <?php get_template_part('partials/success-stories-single/feature-person'); ?>
    <?php get_template_part('partials/financial-services/how-to-hire-it'); ?>
    <?php 
        if($customized_part === true){
            get_template_part('partials/success-stories-single/custom-part');
        }
    ?>
    <?php get_template_part('partials/success-stories-single/related-post'); ?>
</main>
<?php get_footer(); ?>
                    
