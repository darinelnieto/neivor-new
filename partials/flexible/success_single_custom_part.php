<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( get_sub_field( 'enable_custom_partial' ) ) {
    get_template_part( 'partials/success-stories-single/custom-part' );
}
