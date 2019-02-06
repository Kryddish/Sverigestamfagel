<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stf
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<div class="social-menu">
				<a class="icon-facebook-official" href="#">Facebook</a>
				<a class="icon-instagram" href="#">Instagram</a>
			</div>

			<div class="email">
				Har du frågor?</br>
				<a class="icon-mail-alt" href="mailto:info@sverigestamfagel.se"><?= __( 'Maila oss!', 'stf' ); ?></a>
			</div>
			<div class="donate">
				Vill du stödja vår förening?</br>
				Swisha till <a href="tel:+46721234567">+46 72 123 45 67</a>
			</div>
		</div>
		<div class="site-info">
			<span>
				<?php _e( '© 2019 Sveriges Tamfågelförening. All rights reserved', 'stf' ); ?>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Utvecklad av %1$s och %2$s.', 'stf' ), '<a href="#">Emmelie</a>', '<a href="https://github.com/spizeak">Max</a>' ); ?>
			</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
