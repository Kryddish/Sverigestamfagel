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
			<?php dynamic_sidebar( 'custom-video' ); ?>


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'none' );

			endwhile; // End of the loop.
			?>

			<div class="posts-container">

				<?php
				$posts = get_posts( array(
					'post_type' 		=> 	array( 'meets', 'post' ),
					'posts_per_page'	=> 	3,
					'meta_key' 			=> 	'date',
					'orderby' 			=> 	'meta_value',
					'order'				=>	'DESC'
				) );

				foreach( $posts as $post ) : setup_postdata( $post );

					get_template_part( 'template-parts/content' );

					if ( get_edit_post_link() ) : ?>

						<footer class="entry-footer">
							<span>Senast ändrad <?php the_modified_date(); ?></span>

							<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Redigera inlägg %s', 'sverigestamfagelforening' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							); ?>

						</footer><!-- .entry-footer -->

					<?php
					endif;
					
				endforeach; 
				wp_reset_postdata(); ?>
					
			</div>

			<div class="archive-post">
				<h3>Detta är ett inlägg</h3>
				<em><span>Publicerad: 20/1 - 2018</span></em>
				<hr>
				<img src="https://assets.bakker.com/ProductPics/810x978/86762-02-BAKI_20150112160335.jpg">
				<p>Detta är postens text. Dock ska den bara visa de 100 första orden och inte mer för annars blir designen
					ful. Förstår du? Dock är detta inte 100 ord men detta är bara ett test. Hejdå
				</p>
			</div>
			
			<div class="side-archive">				
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();