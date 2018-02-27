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
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div>
				<?php dynamic_sidebar( 'banner' ); ?> 				
			</div>

			<div class="archive-post">

				<h3 class="title">
					<?php single_cat_title(); ?>
				</h3>

				<?php
				$post_types = 
				get_post_types( array(
					'public' => true
				) );
				unset( $post_types['attachment'], $post_types['page'], $post_types['meets'] );

				$Qobject = get_queried_object();
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

				$wp_query = new WP_Query( array(
					'post_type' 		=> $post_types,
					'paged'				=> $paged,
					'category_name'		=> $Qobject->slug,
					'posts_per_page'	=> 1,
				) );

				$wp_query->posts = stf_sort_date($wp_query->posts);

				if( $wp_query->have_posts() ) : ?>
					<div class="posts-container">
						<?php
						while( $wp_query->have_posts() ) : $wp_query->the_post();

							get_template_part( 'template-parts/content' );
							
						endwhile; ?>
						<div class="posts-navigation">
							<?php
							$big = 999999999;
							echo paginate_links(array(
								'base' 				=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
								'format' 			=> '/page/%#%',
								'current' 			=> max(1, $paged),
								'total' 			=> $wp_query->max_num_pages,
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