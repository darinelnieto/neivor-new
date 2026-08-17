<?php
/**
 * 
 * Partial Name: add-script-to-the-head
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$h_scripts = get_field('heads_scripts');
if(!empty($h_scripts)){
    add_action( 'wp_head', function() use ( $h_scripts ) {
        foreach ( $h_scripts as $item ) {
            if ( ! empty( $item['scripts'] ) ) {
                echo $item['scripts'] . "\n";
            }
        }
    }, 20 );
}
?>