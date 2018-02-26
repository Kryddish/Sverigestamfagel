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
				<?php dynamic_sidebar( 'custom-video' ); ?> 				
			</div>

			<div class="archive-post">

				<?php
				$post_types = 
				get_post_types( array(
					'public' => true
				) );
				unset($post_types['attachment'], $post_types['page']);

				$loop = new WP_Query( array(
					'post_type' 		=> $post_types,
					'paged'				=> get_query_var( 'paged' ),
					'posts_per_page'	=> 3,
				) );

				$loop->posts = stf_sort_date($loop->posts);

				if( $loop->have_posts() ) :
					while( $loop->have_posts() ) : $loop->the_post();

						get_template_part( 'template-parts/content' );
						
					endwhile;
				endif; ?>

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
			<div class="side-archive">				
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();