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
$term_id = isset( $args['term_id'] ) ? $args['term_id'] : null;
$prefix = $term_id ? 'term_' . $term_id : '';
?>
<main id="flexible-builder-template">
    <?php
    if ( have_rows( 'page_sections', $prefix ) ):
        while ( have_rows( 'page_sections', $prefix ) ): the_row();
            $layout = get_row_layout();
            get_template_part( 'partials/flexible/' . $layout );
        endwhile;
    endif;
    ?>
</main>
<?php get_footer(); ?>
