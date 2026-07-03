<?php
/**
 * 
 * Template Name: home
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="home-template-6c9394">
    <?php get_template_part('partials/home/banner'); ?>
    <?php get_template_part('partials/home/after-banner-section'); ?>
    <?php get_template_part('partials/home/ideal-products'); ?>
    <?php get_template_part('partials/home/properties-you-trust'); ?>
    <?php get_template_part('partials/home/boost-your-business'); ?>
    <?php get_template_part('partials/markets/logos-slide'); ?>
    <?php get_template_part('partials/home/allies'); ?>
</main>
<?php get_footer(); ?> 
