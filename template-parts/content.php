<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */
?>

<?php
if( $post === reset($posts) ) :
	$class = 'main-post';
else:
	$class = 'post';
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<a href="<?php the_permalink(); ?>">
		<img src="<?php the_post_thumbnail_url(); ?>" alt="Post image">
		<div class="text">
			<header>
				<h5 class="date"><?php the_field( 'date' ); ?></h5>
				<h6 class="category"><?php echo get_post_type_object('meets')->label; ?></h6>
			</header>
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?>
		</div>
	</a>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sverigestamfagelforening' ),
		'after'  => '</div>',
	) ); ?>

	<footer class="entry-footer">
		<?php sverigestamfagelforening_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>