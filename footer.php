<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sverigestamfagelforening
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php
			// Make sure there is a social menu to display.
			if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
				</nav><!-- .social-menu -->
			<?php endif; ?>
			<div class="email">
				Har du frågor?</br>
				<a href="mailto:info@sverigestamfagel.se"><span class="fa fa-envelope"></span><?php _e( 'Maila oss!', 'sverigestamfagelforening' ); ?></a>
			</div>
			<div class="donate">
				Vill du stödja vår förening?</br>
				Swisha till <a href="tel:+46721234567">+46 72 123 45 67</a>
			</div>
		</div>
		<div class="site-info">
			<span>
				<?php _e( '© 2018 Sveriges Tamfågelförening. All rights reserved', 'sverigestamfagelforening' ); ?>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Utvecklad av %1$s och %2$s.', 'sverigestamfagelforening' ), '<a href="https://memlisen.se" rel="designer">Emmelie</a>', '<a href="https://maxtrewhitt.se" rel="coder">Max</a>' ); ?>
			</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
