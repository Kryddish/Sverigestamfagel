<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php echo do_shortcode( '[contact-form-7 id="2145" title="Kontakt"]' ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php
	endwhile ?>

<?php
get_sidebar();
get_footer();