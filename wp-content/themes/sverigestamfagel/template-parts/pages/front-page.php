<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */

/**
 * Fields
 */
$posts_per_page = get_field( 'meets_count' ) ? get_field( 'meets_count' ) : 3;

$args = [
	'post_type' => 'meets',
	'posts_per_page' => $posts_per_page,
	'meta_key' => 'date',
	'orderby' => 'meta_value_num'
];
$meets_query = new WP_Query( $args ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<section class="top-info">
			<div class="stf-slider">
				<ul>
					<?php
					if( have_rows('slider') ):
						while ( have_rows('slider') ) : the_row(); ?>

							<div class="slide">
								<img src="<?= get_sub_field('bild')['sizes']['large']; ?>" alt="Parrot image">
								<div>

									<?php
									if( get_sub_field('headline') ) : ?>
										<h4><?= get_sub_field('headline'); ?></h4>
									<?php
									endif;

									if( get_sub_field('text') ) : ?>
										<p><?= get_sub_field('text'); ?></p>
									<?php
									endif;

									if( get_sub_field('button') ) : ?>
										<a href="<?php if( get_sub_field('link') ) : the_sub_field('link'); else: echo '#'; endif; ?>">
											<?= get_sub_field('button'); ?>
										</a>
									<?php
									endif; ?>

								</div>
							</div>

						<?php
						endwhile;
					else : ?>
						<img src="<?= get_stylesheet_directory_uri() . '/dist/img/parrot.png'?>" alt="Parrot image">
					<?php
					endif; ?>
				</ul>
				<button class="previous">
					<i class="icon-left-open" aria-hidden="true"></i>
				</button>
				<button class="next">
					<i class="icon-right-open" aria-hidden="true"></i>
				</button>
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
					<?php
					if( $top_info['top']['lank'] ) { ?>
						<button class="lank_1" target="_blank" href="<?= $top_info['top']['lank']; ?>">Läs mer</button>
						<?php
					} ?>
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
					<?php
					if( $top_info['bottom']['lank2'] ): ?>
						<button class="lank_2" target="_blank" href="<?= $top_info['bottom']['lank2']; ?>">Läs mer</button>
						<?php
					endif; ?>
				</div>
			</div>
		</section>
		<hr>
		<div class="page-content">
			<?php $posts_per_page = get_field( 'news_count' ) ? get_field( 'news_count' ) : 8; ?>

			<div class="posts-container">
				<h4>Senaste fågelträffarna</h4>

				<?php
				foreach( $meets_query->posts as $post ) : setup_postdata( $post );

					get_template_part( 'template-parts/content/content' );

				endforeach;
				wp_reset_postdata(); ?>
			</div>

			<div class="c-sidebar">
				<h4>Senaste nyheterna</h4>

				<?php
				$posts = get_posts( array(
					'post_type' 		=> 	'articles',
					'posts_per_page'	=>  $posts_per_page
				) );

				foreach( $posts as $post ) : setup_postdata( $post ); ?>
					<article <?php post_class(); ?>>
						<header>
							<span class="category"><?= get_the_category()[0]->name; ?></span>
							<span class="date"><?= get_the_date(); ?></span>
						</header>
						<a href="<?php the_permalink(); ?>">
							<h6><?php the_title(); ?></h6>
						</a>
					</article>
					<?php
				endforeach;
				wp_reset_postdata(); ?>
			</div>
		</div>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
