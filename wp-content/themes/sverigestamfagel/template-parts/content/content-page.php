<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stf' ),
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
</article><!-- #post-## -->
