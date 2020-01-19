<?php
/**
 * stf functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stf
 */

if ( ! function_exists( 'stf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stf_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on stf, use a find and replace
	 * to change 'stf' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'stf', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Huvudmeny', 'stf' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stf_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width' => 130,
		'height' => 130,
		'flex-width' => true,
	));

}
endif;
add_action( 'after_setup_theme', 'stf_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stf_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stf_content_width', 640 );
}
add_action( 'after_setup_theme', 'stf_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stf_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stf' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stf' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar archive', 'stf' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'stf' ),
		'before_widget' => '<div id="%1$s" class="archive-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Banner', 'stf' ),
		'id'            => 'banner',
		'description'   => esc_html__( 'Add widgets here.', 'stf' ),
		'before_widget' => '<div id="%1$s" class="banner">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'stf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stf_scripts() {

	// Google fonts
	wp_enqueue_style( 'sverigestamfagel-fonts', 'https://fonts.googleapis.com/css?family=Averia+Sans+Libre:400,700|Open+Sans:400,700' );

	// Stylesheet
	wp_enqueue_style( 'stf-style', get_template_directory_uri() . '/dist/css/style.css', array(), filemtime( get_stylesheet_directory() . '/dist/css/style.css' ) );

	//JS Bundle
	wp_enqueue_script( 'stf-bundle', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), filemtime( get_stylesheet_directory() . '/dist/js/bundle.js'), true);
	wp_localize_script( 'stf-bundle', 'stf', array(
		'expand' => __( 'Expand child menu', 'stf'),
		'collapse' => __( 'Collapse child menu', 'stf'),
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stf_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load custom post types
 */
require get_template_directory() . '/inc/custom-post-types/custom-post-types.php';

/**
 * Load ACF option pages
 */
require get_template_directory() . '/inc/acf-options.php';

/**
 * Load Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Filters
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Custom validation
 */
require get_template_directory() . '/inc/contact-form-7.php';

/**
 * Auto deployment to staging site
 */
function auto_deployment( $data ) {
	$output = shell_exec( 'screen -d -m bash ./deploy.sh' );

	if( $output ) echo $output;
	else echo 'Deployment failed.';
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'webhook', '/deploy', array(
		'methods' => 'POST',
		'callback' => 'auto_deployment',
	) );
} );

/**
 * Custom pagination for archive
 */
function custom_pagination($pages = '', $range = 2) {
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='o-pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

// Custom image sizes
add_image_size( 'small', 100, 100 );
add_image_size( 'single-hero', 1200, 800 );
