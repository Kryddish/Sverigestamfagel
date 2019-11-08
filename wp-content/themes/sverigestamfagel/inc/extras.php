<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package stf
 */

add_filter( 'body_class', function( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
});

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', function() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo('pingback_url'), '">';
	}
});

// Register Google API
add_action('acf/init', function() {
	acf_update_setting('google_api_key', get_field('google_api_key', 'option'));
});

// Custom excerpt length
add_filter( 'excerpt_length', function( $length ) {
	return 40;
}, 999);

// Page Slug Body Class
add_filter( 'body_class', function( $classes ) {
	global $post;

	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
});

add_filter('excerpt_more', function( $more ) {
	return '...';
});

function get_file_icon( $path ) {
    $extension = end( explode('.', $path) );

    switch ($extension) {

        // PDF
        case 'pdf':
            $icon = get_template_directory_uri()."/dist/img/icons/pdf.svg";
            break;

        // Microsoft Word
        case 'wbk': case 'dot': case 'doc': case 'docx':
            $icon = get_template_directory_uri()."/dist/img/icons/doc.svg";
            break;

        // Microsoft Excel
        case 'xlsx': case 'xlsm': case 'xlsb': case 'xltx': case 'xltm': case 'xls': case 'xlt': case 'xml': case 'xlam': case 'xla': case 'xlw': case 'xlr':
            $icon = get_template_directory_uri()."/dist/img/icons/xls.svg";
            break;

        default:
			$icon = get_template_directory_uri()."/dist/img/icons/file.svg";
            break;
    }

    return $icon;
}
