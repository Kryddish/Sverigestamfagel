<?php
/**
 * Template Name: ACF - learn */

get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_field('gallery_group'); ?>
			<p><?php the_field('caption'); ?></p>
		<?php endwhile; // end of the loop. ?>

<?php
get_sidebar();
get_footer();
?>