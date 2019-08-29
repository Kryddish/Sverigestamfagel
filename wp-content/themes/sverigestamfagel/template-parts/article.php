<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}

			get_template_part('template-parts/content/content-page');

		endwhile; ?>
	</main>
</div>

<?php
get_footer();
