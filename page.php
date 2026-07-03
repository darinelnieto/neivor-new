<?php
/**
 * 
 * Default page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>
<style>
	#header-wrapper{
		background:#1A1728;
	}
</style>
<main id="ditto-page">
	<?= the_content(); ?>
</main>

<?php get_footer(); ?>