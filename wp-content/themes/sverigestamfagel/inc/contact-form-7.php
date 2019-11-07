<?php
add_filter( 'wpcf7_validate_text*', function( $result, $tag ) {
    if ( 'your-name' == $tag->name ) {
        // matches any utf words with the first not starting with a number
        $re = '/^[^\p{N}][\p{L}]*/i';

        if (!preg_match($re, $_POST['your-name'], $matches)) {
            $result->invalidate($tag, "Detta är inte ett tillåtet namn!" );
        }
    }

    return $result;
}, 20, 2 );
