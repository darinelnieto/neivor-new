<?php
/**
 * 
 * Template Name: markets
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="markets-template-db26f4">
    <?php get_template_part('partials/globals/generic-banner'); ?>
    <?php get_template_part('partials/markets/properties-that-trust-neivor'); ?>
    <?php get_template_part('partials/markets/logos-slide'); ?>
    <?php get_template_part('partials/markets/how-we-do-it'); ?>
    <?php get_template_part('partials/markets/join-us'); ?>
    <?php get_template_part('partials/markets/we-are-here'); ?>
    <!-- Aquí lo que cambia -->
    <?php if (is_mobile()): ?>
        <?php get_template_part('partials/markets/comprehensive-protection'); ?>
        <?php get_template_part('partials/markets/regional-perspectives'); ?>
        <?php get_template_part('partials/markets/protect-your-condo'); ?>
        <?php get_template_part('partials/markets/voices-by-size'); ?>
    <?php else: ?>
        <?php get_template_part('partials/markets/voices-by-size'); ?>
        <?php get_template_part('partials/markets/comprehensive-protection'); ?>
        <?php get_template_part('partials/markets/regional-perspectives'); ?>
        <?php get_template_part('partials/markets/protect-your-condo'); ?>
    <?php endif; ?>
    <?php get_template_part('partials/globals/true-history-repeat'); ?>
    <?php get_template_part('partials/markets/true-story'); ?>
    <?php if(get_field('enable_faqs_section')): ?>
        <?php get_template_part('partials/globals/fqas'); ?>
    <?php endif; ?>
    <?php get_template_part('partials/markets/community'); ?>
    <?php 
        if(get_field('enable_blog')){
            get_template_part('partials/globals/blog');
        }
    ?>
</main>
<?php get_footer(); ?>
                    
