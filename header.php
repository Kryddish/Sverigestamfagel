<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sverigestamfagelforening
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if( is_single() ) :?>
	<style type="text/css">
		.acf-map {
			width: 100%;
			height: 400px;
			border: #ccc solid 1px;
			margin: 20px 0;
		}

		.acf-map img {
			max-width: inherit !important;
		}
	</style>
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/dist/img/foggy_birds.png'; ?>);" tabindex="-1" <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sverigestamfagelforening' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="top-header">
				<div class="site-branding">
					
					<?php the_custom_logo(); ?>

					<div class="text">
						<h1 class="site-title">
							<?php bloginfo( 'name' ); ?>
						</h1>
						
						<?php
						$description = get_bloginfo( 'description', 'display' );

							if ( $description || is_customize_preview() ) : ?>
								<h5 class="site-description">
									<?php echo $description; /* WPCS: xss ok. */ ?>
								</h5>
							<?php
							endif; ?>

					</div><!-- .text -->
				</div><!-- .site-branding -->
				<div class="contact-header">
					<a href="mailto:info@sverigestamfagel.se"><span class="fa fa-envelope"></span>info@sverigestamfagel.se</a>
				</div><!-- .contact-header -->
			</div><!-- .top-header -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'sverigestamfagelforening' ); ?></button>
				
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu'
				) ); ?>
			</nav><!-- .main-navigation -->

		</header><!-- .site-header -->
		<div id="content" class="site-content">