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
			<h3>
				<span class="fa fa-calendar"></span> Aktuellt
			</h3>
			<div class="posts-container">

				<?php
				$post_types = 
				get_post_types( array(
					'public' => true
				) );
				unset($post_types['attachment'], $post_types['page']);

				if( get_field( 'posts_per_page' ) ) {
					$ppp = get_field( 'posts_per_page' );
				} else {
					$ppp = 3;
				}

				$posts = get_posts( array(
					'post_type' 		=> 	$post_types,
					'posts_per_page'	=> 	$ppp
				) );

				// Sort posts
				foreach ($posts as $key => $part) {
					$date = get_post_meta($part->ID, 'date', true);

					if ( !empty( $date ) ) {
						$sort[$key] = strtotime($date);
					} else {
						$sort[$key] = strtotime($part->post_date);
					}
				}
				array_multisort($sort, SORT_DESC, $posts);

				foreach( $posts as $post ) : setup_postdata( $post );

					get_template_part( 'template-parts/content' );
					
				endforeach; 
				wp_reset_postdata(); ?>
					
			</div>
		<hr>
		<h3><span class="fa fa-instagram"></span> Instagram</h3>
		<section class="instagram-feed">

			<?php
			$insta_feed = get_field( 'instagram_feed' );

			if( $insta_feed ) {
				$user = $insta_feed['user'];
			} else {
				$user = 'sverigestamfagelforening';
			}

			$instaResult = file_get_contents('https://www.instagram.com/' . $user . '/?__a=1');

			$insta = json_decode($instaResult, true);
			$images = $insta['user']['media']['nodes'];

			foreach( $images as $image ) : ?>
				<a <?php if( $insta_feed['new_window'] ) : echo 'target="_blank"'; endif;?> href="<?php echo 'https://www.instagram.com/p/' . $image['code'] . '/'; ?>"><img src="<?php echo $image['thumbnail_src']; ?>" alt=""></a>
			<?php
			endforeach; ?>

		</section>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<span>Senast ändrad <?php the_modified_date(); ?></span>

			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Redigera sida %s', 'sverigestamfagelforening' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->