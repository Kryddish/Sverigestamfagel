<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sveriges_Tamfågelförening
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '%s', 'sverigestamfagel' ), 'Sveriges tamfågelförening' );
			?>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Utvecklad av %2$s', 'sverigestamfagel' ), 'sverigestamfagel', '<a href="http://www.memlisen.se">Emmelie Sundell</a> och <a href="http://www.maxtrewhitt.se">Max Trewhitt</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
