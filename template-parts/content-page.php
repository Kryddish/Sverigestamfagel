<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sverigestamfagelforening' ),
				'after'  => '</div>',
			) );
		?>
			<?php
			$args = array( 'posts_per_page' => 5 );

			$myposts = get_posts( $args );
			$i = 0;
			foreach ( $myposts as $post ) : setup_postdata( $post );

				if( $i === 0 ) : ?>
					<div class="main-post">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<p><?php the_excerpt(); ?></p>
					</div>
				<?php
				$i = 1;
				else: ?>
					<div class="post">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<p><?php the_excerpt(); ?></p>
					</div>
				<?php
				endif; ?>

			<?php endforeach; 
			wp_reset_postdata();
			?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'sverigestamfagelforening' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
