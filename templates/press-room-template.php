<?php
/**
 * 
 * Template Name: press-room
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="press-room-template-b6d044">
    <?php get_template_part('partials/press-room/banner'); ?>
    <?php get_template_part('partials/press-room/neivor-in-media'); ?>
    <?php get_template_part('partials/press-room/featured-section'); ?>
    <?php get_template_part('partials/press-room/the-most-recent'); ?>
    <?php get_template_part('partials/press-room/events'); ?>
    <?php get_template_part('partials/about/recognitions'); ?>
</main>
<?php get_footer(); ?>

                    
