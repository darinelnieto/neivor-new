<?php
/**
 * Template Name: Flexible Page Builder
 *
 * Itera el flexible content "page_sections".
 * Cada layout carga su partial wrapper en partials/flexible/.
 * El contenido es independiente por pagina.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<main id="flexible-builder-template">
    <?php
    if ( have_rows( 'page_sections' ) ):
        while ( have_rows( 'page_sections' ) ): the_row();
            $layout = get_row_layout();
            get_template_part( 'partials/flexible/' . $layout );
        endwhile;
    endif;
    ?>
</main>
<?php get_footer(); ?>
