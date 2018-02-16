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
			
			<?php
			dynamic_sidebar( 'custom-video' ); ?> 
		
		<div class="archive-post">
			<?php
			$posts = get_posts( array(
				'post_type' 		=> 	array( 'meets', 'post', 'articles' ),
				'posts_per_page'	=> 	3,
				'meta_key' 			=> 	'date',
				'orderby' 			=> 	'meta_value',
				'order'				=>	'DESC'
			) );

			foreach( $posts as $post ) : setup_postdata( $post );

				get_template_part( 'template-parts/content' );

				if ( get_edit_post_link() ) : ?>

				<?php
				endif;
				
			endforeach; 
			wp_reset_postdata(); ?>
			
		</div>
		<?php posts_nav_link(); ?>
			<div class="side-archive">				
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();