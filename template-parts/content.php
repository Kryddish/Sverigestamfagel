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
	<a class="link" href="<?php the_permalink(); ?>">
		<img src="<?php if( get_the_post_thumbnail_url() ) : the_post_thumbnail_url(); else: echo get_stylesheet_directory() . '/dist/img/image.png'; endif; ?>" alt="Post image">
		<div class="text">
			<header>
				<h5 class="date"><?php the_field( 'date' ); ?></h5>
				<h6 class="category"><?php echo get_post_type_object('meets')->label; ?></h6>
			</header>
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?>
		</div>
	</a>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<span>Senast ändrad <?php the_modified_date(); ?></span>

			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Redigera inlägg %s', 'sverigestamfagelforening' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article>