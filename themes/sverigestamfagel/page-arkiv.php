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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php dynamic_sidebar( 'custom-video' ); ?>
			
			<div class="archive-post">
				<h3>Detta är ett inlägg</h3>
				<em><span>Publicerad: 20/1 - 2018</span></em>
				<hr>
				<img src="https://assets.bakker.com/ProductPics/810x978/86762-02-BAKI_20150112160335.jpg">
				<p>Detta är postens text. Dock ska den bara visa de 100 första orden och inte mer för annars blir designen
					ful. Förstår du? Dock är detta inte 100 ord men detta är bara ett test. Hejdå
				</p>
			</div>
			
			<div class="side-archive">				
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();