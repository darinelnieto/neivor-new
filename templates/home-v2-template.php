<?php
/**
 * 
 * Template Name: Home V2
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="home-v2-template-368378">
    <?php get_template_part('partials/home-v2/banner'); ?>
    <?php get_template_part('partials/home-v2/after-banner-section'); ?>
    <?php get_template_part('partials/home-v2/ideal-products'); ?>
    <?php get_template_part('partials/home-v2/neivor-intelligence'); ?>
    <?php get_template_part('partials/home-v2/properties-you-trust'); ?>
    <?php get_template_part('partials/home-v2/boost-your-business'); ?>
    <?php get_template_part('partials/home-v2/free-tools'); ?>
    <?php get_template_part('partials/home-v2/allies'); ?>
    <?php get_template_part('partials/home-v2/cta-banner'); ?>
</main>
<?php get_footer(); ?>
