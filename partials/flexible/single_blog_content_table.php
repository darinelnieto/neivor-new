<?php
$script_handle = "flexible-single_blog_content_table-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-single_blog_content_table.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: single_blog_content_table
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$link_class = sanitize_text_field( get_sub_field( 'link_class' ) ?? '' );
?>
<section class="single-blog-content-table-partial-b93a11" data-link-class="<?= esc_attr( $link_class ); ?>" aria-label="Tabla de contenido">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="toc-card">
                    <div class="toc-head">
                        <h2 class="toc-title h4">En este artículo</h2>
                    </div>
                    <ul class="toc-list" data-toc-list></ul>
                </div>
            </div>
        </div>
    </div>
</section>
                    