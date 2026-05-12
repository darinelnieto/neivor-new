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
}
?>