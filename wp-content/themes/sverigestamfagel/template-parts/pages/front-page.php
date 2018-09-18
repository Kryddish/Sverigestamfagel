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

	<div class="entry-content">
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stf' ),
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

			<?php
			$post_types =
			get_post_types( array(
				'public' => true
			) );
			unset($post_types['attachment'], $post_types['page']);

			if( get_field( 'meets_count' ) ) {
				$meets_count = get_field( 'meets_count' );
			} else {
				$meets_count = 3;
			}

			if( get_field( 'news_count' ) ) {
				$news_count = get_field( 'news_count' );
			} else {
				$news_count = 3;
			}

			$posts = get_posts( array(
				'post_type' 		=> 	'meets',
				'posts_per_page'	=>  -1
			) ); ?>

			<div class="posts-container">
				<h4>Senaste fågelträffarna</h4>

				<?php
				$index = 0;
				foreach( $posts as $post ) : setup_postdata( $post );

					if( $index < $meets_count ) :
						get_template_part( 'template-parts/content/content' );
						$index++;
					else:
						break;
					endif;

				endforeach;
				wp_reset_postdata(); ?>
			</div>

			<div class="article-container">
				<h4>Senaste nyheterna</h4>

				<?php
				dynamic_sidebar( 'sidebar-1' );

				$posts = get_posts( array(
					'post_type' 		=> 	'articles',
					'posts_per_page'	=>  $news_count
				) );
				$index = 0;
				foreach( $posts as $post ) : setup_postdata( $post );

					if( $post->post_type !== 'meets' ) : ?>
						<a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
						<a href="<?php echo get_category_link( get_the_category()[0]->cat_ID ) ?>"><?php echo get_the_category()[0]->name; ?></a>
						<h6 class="article-date">
							<?php echo get_the_date(); ?>
						</h6>
						<hr>
						<?php
					endif;

				endforeach;
				wp_reset_postdata(); ?>

			</div>
		</div>

	</div><!-- .entry-content -->
</article><!-- #post-## -->