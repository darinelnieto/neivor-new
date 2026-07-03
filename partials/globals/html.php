<?php
/**
 *
 * Partial Name: html-partial
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$enable_html = get_field('enable_html');
$html_page = get_field('html_page');
if($enable_html === true):
?>
<section class="html-partial-8190bc">
    <?=$html_page; ?>
</section>
<?php endif; ?>
