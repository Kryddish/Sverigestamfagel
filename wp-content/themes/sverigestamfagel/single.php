<?php get_header(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCas882K6W9VfSaxZZ_m4JwfwIajyqWtlY"></script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content/content', 'single' ); ?>

				<?php
			endwhile; ?>

		</main>
	</div>

<?php
get_footer();
