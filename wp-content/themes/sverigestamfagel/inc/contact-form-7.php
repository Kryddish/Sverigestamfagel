<?php
add_filter( 'wpcf7_validate_text*', function( $result, $tag ) {
    if ( 'your-name' == $tag->name ) {
        $pattern = '/^[a-zåäöA-ZÅÄÖ\.\'\-]{2,50}(?: [a-zåäöA-ZÅÄÖ\.\'\-]{2,50})+$/mi';

        if (!preg_match($pattern, $_POST['your-name'])) {
            $result->invalidate($tag, "Ange hela ditt namn." );
        }
    }

    return $result;
}, 20, 2 );
