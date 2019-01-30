<?php
/**
 * Regler & Länkar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if( have_rows('headline') ):
				while ( have_rows('headline') ) : the_row();

				get_template_part( 'template-parts/content', 'none' );

				endwhile;
			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
