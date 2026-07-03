<?php
/**
 * 
 * Template Name: financial-services
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="financial-services-template-c8ceb6">
    <?php get_template_part('partials/globals/generic-banner'); ?>
    <?php get_template_part('partials/financial-services/benefits'); ?>
    <?php get_template_part('partials/financial-services/how-it-works'); ?>
    <?php 
        if(get_field('enable_how_to_hire_it') === true): 
            get_template_part('partials/financial-services/how-to-hire-it'); 
        endif; 
    ?>
    <?php get_template_part('partials/globals/blog'); ?>
</main>
<?php get_footer(); ?>
                    
