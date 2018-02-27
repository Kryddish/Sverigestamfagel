<?php
/**
 * Regler & Länkar
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if( have_rows('headline') ):
				while ( have_rows('headline') ) : the_row(); ?>
					<h2><?php the_field(); ?></h2>

				<?php
				endwhile;
			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();