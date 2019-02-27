<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body style="background-image: url(<?= get_stylesheet_directory_uri() . '/dist/img/foggy_birds.png'; ?>);" tabindex="-1" <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'stf' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="top-header">
				<div class="site-branding">
					<?php the_custom_logo(); ?>

					<div class="text">
						<h2 class="site-title">
							<?php bloginfo( 'name' ); ?>
						</h2>
						<?php
						$description = get_bloginfo( 'description', 'display' );

							if ( $description || is_customize_preview() ) : ?>
								<h5 class="site-description">
									<?= $description; ?>
								</h5>
								<?php
							endif; ?>
					</div>
				</div>

				<div class="contact-header">
					<a class="icon-mail-alt" href="mailto:info@sverigestamfagel.se"> info@sverigestamfagel.se</a>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="mobile-navbar">
					<?php the_custom_logo(); ?>
					<button class="hamburger hamburger--spin menu-toggle" aria-controls="primary-menu" aria-expanded="false" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu'
				) ); ?>
			</nav>

		</header>
		<div id="content" class="site-content">
