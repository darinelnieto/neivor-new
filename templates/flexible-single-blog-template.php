   
<?php
/**
 * 
 * Template Name: flexible-single-blog
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$term_id = isset( $args['term_id'] ) ? $args['term_id'] : null;
$prefix = $term_id ? 'term_' . $term_id : '';
?>
<main id="flexible-builder-template">
    <?php
        if ( have_rows( 'page_sections', $prefix ) ):
            while ( have_rows( 'page_sections', $prefix ) ): the_row();
                $layout = get_row_layout();
                if($layout === 'blog_hero' || $layout === 'blog-hero-with-video'){
                    get_template_part( 'partials/flexible/' . $layout );
                }
            endwhile;
        endif;
    ?>
   <div class="container py-4">
        <div class="row">
            <div class="col-12 col-md-8">
                <?php
                    if ( have_rows( 'page_sections', $prefix ) ):
                        while ( have_rows( 'page_sections', $prefix ) ): the_row();
                            $layout = get_row_layout();
                            if($layout !== 'blog_hero' && $layout !== 'single_blog-suscription_form' && $layout !== 'single_blog_content_table' && $layout !== 'home_v2_cta_banner' && $layout !== 'blog-hero-with-video'){
                                get_template_part( 'partials/flexible/' . $layout );
                            }
                        endwhile;
                    endif;
                ?>
            </div>
            <aside class="col-12 col-md-4" style="position: sticky; top: 2rem; align-self: flex-start;">
                <?php get_template_part('partials/flexible/single_blog_content_table'); ?>
            </aside>
        </div>
    </div>
    <?php
        if ( have_rows( 'page_sections', $prefix ) ):
            while ( have_rows( 'page_sections', $prefix ) ): the_row();
                $layout = get_row_layout();
                if($layout === 'home_v2_cta_banner'){
                    get_template_part( 'partials/flexible/' . $layout );
                }
            endwhile;
        endif;
        // Suscription
        get_template_part('partials/flexible/single_blog-suscription_form'); 
    ?>
</main>
<?php get_footer(); ?>
                    