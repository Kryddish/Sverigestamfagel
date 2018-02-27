<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 * 
 * Template name: Archives
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div>
				<?php dynamic_sidebar( 'banner' ); ?> 				
			</div>

			<div class="archive-post">

				<h3 class="title">
					<?php
					if( is_day() ) {
						echo get_the_date();
					}
					elseif( is_month() ) {
						echo get_the_date('F Y');
					}
					elseif( is_year() ) {
						echo get_the_date('Y');
					} ?>
				</h3>

				<?php
				$post_types = 
				get_post_types( array(
					'public' => true
				) );
				unset($post_types['attachment'], $post_types['page']);

				if( get_field( 'posts_per_page' ) ) {
					$ppp = get_field( 'posts_per_page' );
				} else {
					$ppp = 5;
				}

				$loop = new WP_Query( array(
					'post_type' 		=> $post_types,
					'paged'				=> get_query_var( 'paged' ),
					'posts_per_page'	=> $ppp,
				) );

				$loop->posts = stf_sort_date($loop->posts);

				if( $loop->have_posts() ) : ?>
					<div class="posts-container">
						<?php
						while( $loop->have_posts() ) : $loop->the_post();

							get_template_part( 'template-parts/content' );
							
						endwhile; ?>
						<div class="posts-navigation">
						<?php
							echo paginate_links(array(
								'total' 			=> $loop->max_num_pages,
								'prev_text'         => __('« Föregående sida', 'sverigestamfagelforening'),
								'next_text'         => __('Nästa sida »', 'sverigestamfagelforening'),
								'mid_size'          => 2,
								'end_size'          => 0,
							)); ?>
						</div>
					</div>
				<?php
				endif; ?>
			</div>
			<div class="side-archive">				
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();