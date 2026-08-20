<?php
// $script_handle = 'migas_de_pan-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/migas_de_pan.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: migas_de_pan
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$migas = get_sub_field('migas');

$padding_top = isset( $migas['padding_top'] ) ? (int) $migas['padding_top'] : 20;
$padding_bottom = isset( $migas['padding_bottom'] ) ? (int) $migas['padding_bottom'] : 20;
$width_class = ! empty( $migas['width'] ) ? sanitize_text_field( $migas['width'] ) : 'col-12 col-md-10 col-lg-8';

$breadcrumbs = array();
$breadcrumbs[] = array(
    'title' => 'Inicio',
    'url'   => home_url( '/' ),
);

$add_post_type_archive_breadcrumb = static function ( &$items, $post_type ) {
    $post_type_object = get_post_type_object( $post_type );
    if ( empty( $post_type_object ) || empty( $post_type_object->has_archive ) ) {
        return;
    }

    $items[] = array(
        'title' => $post_type_object->labels->name,
        'url'   => get_post_type_archive_link( $post_type ),
    );
};

$append_term_hierarchy = static function ( &$items, $term ) {
    if ( empty( $term ) || is_wp_error( $term ) ) {
        return;
    }

    $taxonomy_object = get_taxonomy( $term->taxonomy );
    if ( ! empty( $taxonomy_object ) && ! empty( $taxonomy_object->hierarchical ) ) {
        $term_ancestors = array_reverse( get_ancestors( $term->term_id, $term->taxonomy, 'taxonomy' ) );
        foreach ( $term_ancestors as $ancestor_id ) {
            $ancestor_term = get_term( $ancestor_id, $term->taxonomy );
            if ( empty( $ancestor_term ) || is_wp_error( $ancestor_term ) ) {
                continue;
            }

            $items[] = array(
                'title' => $ancestor_term->name,
                'url'   => get_term_link( $ancestor_term ),
            );
        }
    }

    $items[] = array(
        'title' => $term->name,
        'url'   => get_term_link( $term ),
    );
};

$queried_object = get_queried_object();

if ( is_front_page() ) {
    $breadcrumbs = array();
} elseif ( is_home() && ! is_front_page() ) {
    $posts_page_id = (int) get_option( 'page_for_posts' );
    if ( $posts_page_id > 0 ) {
        $breadcrumbs[] = array(
            'title' => get_the_title( $posts_page_id ),
            'url'   => get_permalink( $posts_page_id ),
        );
    }
} elseif ( is_singular() ) {
    $post_id = get_queried_object_id();
    $post_type = get_post_type( $post_id );

    if ( is_post_type_hierarchical( $post_type ) ) {
        $ancestors = array_reverse( get_post_ancestors( $post_id ) );

        foreach ( $ancestors as $ancestor_id ) {
            $breadcrumbs[] = array(
                'title' => get_the_title( $ancestor_id ),
                'url'   => get_permalink( $ancestor_id ),
            );
        }
    } elseif ( 'post' === $post_type ) {
        $posts_page_id = (int) get_option( 'page_for_posts' );
        if ( $posts_page_id > 0 ) {
            $breadcrumbs[] = array(
                'title' => get_the_title( $posts_page_id ),
                'url'   => get_permalink( $posts_page_id ),
            );
        }
    } else {
        $add_post_type_archive_breadcrumb( $breadcrumbs, $post_type );
    }

    if ( ! empty( $post_type ) ) {
        $taxonomies = get_object_taxonomies( $post_type, 'names' );
        foreach ( $taxonomies as $taxonomy_name ) {
            if ( in_array( $taxonomy_name, array( 'post_format', 'autor' ), true ) ) {
                continue;
            }

            $terms = get_the_terms( $post_id, $taxonomy_name );
            if ( empty( $terms ) || is_wp_error( $terms ) ) {
                continue;
            }

            usort( $terms, static function ( $left, $right ) {
                return strcmp( $left->name, $right->name );
            } );

            $append_term_hierarchy( $breadcrumbs, $terms[0] );
        }
    }

    $breadcrumbs[] = array(
        'title' => get_the_title( $post_id ),
        'url'   => '',
    );
} elseif ( is_tax() ) {
    $term = get_queried_object();

    if ( ! empty( $term ) && ! is_wp_error( $term ) && ! empty( $term->taxonomy ) ) {
        $taxonomy_object = get_taxonomy( $term->taxonomy );
        $post_type = ! empty( $taxonomy_object->object_type[0] ) ? $taxonomy_object->object_type[0] : '';

        if ( ! empty( $post_type ) ) {
            $add_post_type_archive_breadcrumb( $breadcrumbs, $post_type );
        }

        $append_term_hierarchy( $breadcrumbs, $term );

        if ( ! empty( $breadcrumbs ) ) {
            $last_index = array_key_last( $breadcrumbs );
            if ( null !== $last_index ) {
                $breadcrumbs[ $last_index ]['url'] = '';
            }
        }
    }
} elseif ( is_archive() ) {
    $breadcrumbs[] = array(
        'title' => wp_strip_all_tags( get_the_archive_title() ),
        'url'   => '',
    );
} elseif ( ! empty( $queried_object ) && ! empty( $queried_object->post_title ) ) {
    $breadcrumbs[] = array(
        'title' => $queried_object->post_title,
        'url'   => '',
    );
}
?>
<section class="migas-de-pan-partial-ea8700" style="padding-top: <?= $padding_top; ?>px; padding-bottom: <?= $padding_bottom; ?>px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?= esc_attr( $width_class ); ?>">
                <?php if ( ! empty( $breadcrumbs ) ) : ?>
                    <nav class="migas-de-pan" aria-label="Migas de pan">
                        <ol class="migas-de-pan__list">
                            <?php foreach ( $breadcrumbs as $index => $breadcrumb ) : ?>
                                <?php $is_last = $index === array_key_last( $breadcrumbs ); ?>
                                <li class="migas-de-pan__item<?= $is_last ? ' is-current' : ''; ?>">
                                    <?php if ( ! $is_last && ! empty( $breadcrumb['url'] ) ) : ?>
                                        <a class="migas-de-pan__link p" href="<?= esc_url( $breadcrumb['url'] ); ?>"><?= esc_html( $breadcrumb['title'] ); ?></a>
                                    <?php else : ?>
                                        <span class="migas-de-pan__current p"><?= esc_html( $breadcrumb['title'] ); ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    