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
		'width' => 90,
		'height' => 90,
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

	// Stylesheet
	wp_enqueue_style( 'stf-style', get_template_directory_uri() . '/dist/css/style.css', array(), filemtime( get_stylesheet_directory() . '/dist/css/style.css' ) );

	// Google fonts
	wp_enqueue_style( 'sverigestamfagel-fonts', 'https://fonts.googleapis.com/css?family=Averia+Sans+Libre:400,700|Open+Sans:400,700' );
	wp_enqueue_script( 'stf-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCas882K6W9VfSaxZZ_m4JwfwIajyqWtlY', '1.0', true );

	//JS Bundle
	wp_enqueue_script( 'stf-bundle', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery') );
	wp_localize_script( 'stf-bundle', 'stf', array(
		'expand' => __( 'Expand child menu', 'stf'),
		'collapse' => __( 'Collapse child menu', 'stf'),
	));

	// Jquery Lazy plugin
	wp_enqueue_script( 'stf-bundle', get_template_directory_uri() . '/dist/js/jquery.lazy.min.js', array('jquery'), '1.0', true );

	// Font awesome JS
	wp_enqueue_script( 'stf-fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/js/all.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stf_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom post types
 */
require get_template_directory() . '/inc/custom-post-types/custom-post-types.php';

function my_awesome_func( $data ) {
	$output = shell_exec( 'bash ./deploy.sh' );

	if( $output ) echo $output;
	else echo 'Deployment failed.';
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'webhook', '/deploy', array(
		'methods' => 'POST',
		'callback' => 'my_awesome_func',
	) );
} );
