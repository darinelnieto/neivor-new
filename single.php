<?php
/**
 * 
 * Default single.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$posttype = get_post_type();
switch ($posttype){ 
	case 'success_stories':
		get_template_part('templates/single-success-stories-template');
	break;
}
?>