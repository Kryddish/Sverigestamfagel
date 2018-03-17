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

	<div class="entry-content">
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sverigestamfagelforening' ),
			'after'  => '</div>',
		) ); ?>

		<section class="top-info">
			<div class="stf-slider">
				<ul>

					<?php
					if( have_rows('slider') ):
						while ( have_rows('slider') ) : the_row(); ?>

							<div class="slide">
								<img src="<?php the_sub_field('bild'); ?>" alt="Parrot image">
								<div>

									<?php 
									if( get_sub_field('headline') ) : ?>

										<h4><?php the_sub_field('headline'); ?></h4>

									<?php
									endif;

									if( get_sub_field('text') ) : ?>

										<p><?php the_sub_field('text'); ?></p>

									<?php
									endif;

									if( get_sub_field('button') ) : ?>

										<a href="<?php if( get_sub_field('link') ) : the_sub_field('link'); else: echo '#'; endif; ?>"><?php the_sub_field('button'); ?></a>

									<?php
									endif; ?>

								</div>
							</div>

						<?php
						endwhile;
					else : ?>

						<img src="<?php echo get_stylesheet_directory_uri() . '/dist/img/parrot.png'?>" alt="Parrot image">

					<?php
					endif; ?>

				</ul>
				<button class="previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
				<button class="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
			</div>
			<div class="container">

				<?php $top_info = get_field('top_info'); ?>

				<div>
					<h2>
						<?php
						if( $top_info['top']['headline'] ) {
							echo $top_info['top']['headline'];
						} ?>
					</h2>
					<p>
						<?php
						if( $top_info['top']['text'] ) {
							echo $top_info['top']['text'];
						} ?>
					</p>
				</div>
				<div>
					<h2>
						<?php
						if( $top_info['bottom']['headline'] ) {
							echo $top_info['bottom']['headline'];
						} ?>
					</h2>
					<p>
						<?php
						if( $top_info['bottom']['text'] ) {
							echo $top_info['bottom']['text'];
						} ?>
					</p>
				</div>
			</div>
		</section>
		<hr>
		<div class="page-content">
			
			<div class="posts-container">
			<h4>Senaste fågelträffarna</h4>
				<?php
				$post_types = 
				get_post_types( array(
					'public' => true
				) );
				unset($post_types['attachment'], $post_types['page'], $post_types['articles']);

				if( get_field( 'posts_per_page' ) ) {
					$ppp = get_field( 'posts_per_page' );
				} else {
					$ppp = 3;
				}

				$posts = get_posts( array(
					'post_type' 		=> 	$post_types,
					'posts_per_page'	=> 	$ppp
				) );

				stf_sort_date( $posts );

				foreach( $posts as $post ) : setup_postdata( $post );

					get_template_part( 'template-parts/content' );
					
				endforeach; 
				wp_reset_postdata(); ?>
					
			</div>

			<div class="article-container">
				<h4>Senaste artiklarna</h4>
			</div>
		
		
		<?php include( get_stylesheet_directory() . '/template-parts/instagram.php' ); ?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->