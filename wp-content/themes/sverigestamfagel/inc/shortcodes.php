<?php
/**
 * [pris {medlemskap}]
 */
add_shortcode('pris', function($atts) {

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
});

add_shortcode('file', function($atts) {
    $url = $atts['src'];
    $icon = get_file_icon( $atts['src'] );

    $attachment = attachment_url_to_postid($url);
    $attachment_title = get_post($attachment)->post_title;

    return '
        <div class="file-icon '. $type .'">
            <a target="_blank" href="'. $url .'">
                <img class="file-icon" src="'. $icon .'" />
                <p>'. $attachment_title .'</p>
            </a>
        </div>
    ';
});
