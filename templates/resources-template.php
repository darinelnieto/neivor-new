   
<?php
/**
 * 
 * Template Name: resources
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$term_id = isset( $args['term_id'] ) ? $args['term_id'] : null;
$prefix = $term_id ? 'term_' . $term_id : '';
$taxonimy = get_the_terms(get_the_ID(), 'resources_cat');
$hero_img = get_post_thumbnail_id();
?>
<main id="resources-template-9e5994">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 title-content">
                <?php if(!empty($taxonimy)): ?>
                    <div class="taxonomies mb-4">
                        <?php foreach($taxonimy as $tax): ?>
                            <span class="taxonomy fw-700 violeta t-size-12">
                                <?= wp_get_attachment_image(get_field('icon', $tax) ?? '', 'medium', false, array(
                                    'class' => 'icon-tax',
                                    'loadin' => 'eage',
                                    'fetchpriority' => 'high',
                                    'alt' => $tax->name
                                )); ?>
                                <?= $tax->name; ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <h1 class="t-size-36 fw-700 mb-4"><?= the_title(); ?></h1>
                <?= wp_get_attachment_image($hero_img ?? '', 'large', false, array(
                    'class' => 'hero-image mb-5 d-block d-md-none',
                    'loadin' => 'eage',
                    'fetchpriority' => 'high',
                    'alt' => get_the_title()
                )) ?>
            </div>
        </div>
        <div class="row" id="body-c">
            <div class="col-12 col-md-8">
                <?= wp_get_attachment_image($hero_img ?? '', 'large', false, array(
                    'class' => 'hero-image mb-5 d-none d-md-block',
                    'loadin' => 'eage',
                    'fetchpriority' => 'high',
                    'alt' => get_the_title()
                )) ?>
                <div class="body">
                    <?php
                        if ( have_rows( 'page_sections', $prefix ) ):
                            while ( have_rows( 'page_sections', $prefix ) ): the_row();
                                $layout = get_row_layout();
                                if($layout !== 'single_blog-suscription_form' && $layout !== 'single_blog_content_table' && $layout !== 'home_v2_cta_banner' && $layout !== 'blog-hero-with-video'){
                                    if($layout === 'blog_hero'){
                                        get_template_part( 'partials/flexible/' . $layout, null, array( 'context' => 'body' ));
                                    }else{
                                        get_template_part( 'partials/flexible/' . $layout );
                                    }
                                }
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-4 sticky-content mb-5 mb-md-0">
                <?php get_template_part('partials/globals/resources-suscription'); ?>
            </div>
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
    ?>
</main>
<?php get_footer(); ?>
                    