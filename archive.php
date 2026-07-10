<?php
/**
 * 
 * Default archive.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$posttype = get_queried_object();
switch($posttype->taxonomy)
{
    case 'blog_cat':
		get_template_part('templates/flexible-builder-template', null, ['term_id' => $posttype->term_id]);
	break;
	case 'autor':
		get_template_part('templates/flexible-builder-template', null, ['term_id' => $posttype->term_id]);
	break;
	case 'success_cat':
		get_template_part('templates/flexible-builder-template', null, ['term_id' => $posttype->term_id]);
	break;
	case 'segment_cat':
		get_template_part('templates/flexible-builder-template', null, ['term_id' => $posttype->term_id]);
	break;
	case 'zone_cat':
		get_template_part('templates/flexible-builder-template', null, ['term_id' => $posttype->term_id]);
	break;
	case 'size_cat':
		get_template_part('templates/flexible-builder-template', null, ['term_id' => $posttype->term_id]);
	break;
}
?>