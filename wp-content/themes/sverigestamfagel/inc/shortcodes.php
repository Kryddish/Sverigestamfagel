<?php
/**
 * [pris {medlemskap}]
 */
add_shortcode( 'pris', function( $atts ) {

    switch ($atts[0]) {
        case 'medlem':
            $result = get_field( 'membership_fees', 'option' )['regular'];
            break;

        case 'familj':
            $result = get_field( 'membership_fees', 'option' )['family'];
            break;

        // In case no parameter is specified
        default:
            $result = get_field( 'membership_fees', 'option' )['regular'];
            break;
    }

	return $result;
} );
