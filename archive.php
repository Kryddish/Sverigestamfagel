<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div>
				<?php dynamic_sidebar( 'banner' ); ?> 				
			</div>

			<div class="archive-post">
				<div class="posts-container">

					<?php
					$qobject = get_queried_object();
					if( is_date() ) : ?>
					
						<h2>
							<?php
							$length = strlen( $monthnum );

							if( $length < 2 ) {
								$monthStr = '0' . (string)$monthnum;
							} else {
								$monthStr = (string)$monthnum;
							}

							if( $day !== 0 ) : 
								echo $day . ' ' . $month[$monthStr] . ', ' . $year;
							else: 
								echo $month[$monthStr] . ' ' . $year;
							endif; ?>
						</h2>
					<?php
					else : 
						if( $qobject->label ) : ?>
							<h2><?php echo $qobject->label ?></h2>
						<?php
						else : ?>
							<h2><?php echo $qobject->name ?></h2>
						<?php
						endif;
					endif; ?>

					<?php
					global $wp_query;
					if ( $wp_query->have_posts() ) :
						$wp_query->posts = stf_sort_date( $wp_query->posts );

						while ( $wp_query->have_posts() ) : $wp_query->the_post();

							get_template_part( 'template-parts/content/content' );
						
						endwhile;
					else :
						get_template_part( 'template-parts/content/content', 'none' );
					endif; ?>
					
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
			</div>
			<div class="side-archive">				
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();