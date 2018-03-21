<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */
?>

<?php
$location = get_field( 'location' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('stf-post'); ?>>

	<?php
	if( get_the_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="Post image"></a>
	<?php
	else:
		$images = get_field('images');

		if( $images ): ?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $images[0]['url']; ?>" alt="Post image"></a>
		<?php
		endif;

	endif; ?>

	<div class="text">
		<?php
		$archive_year  = get_the_time('Y'); 
		$archive_month = get_the_time('m'); 
		$archive_day   = get_the_time('d'); ?>
		
		<header>
			<?php
			if( !is_front_page() ) : ?>

				<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>">
					<h6 class="date">
						<?php
						if(get_field( 'date' )) :
							the_field( 'date' );
						else :
							echo get_the_date();
						endif;?>
					</h6>
				</a>
			<?php
			endif;
			if( !is_front_page() ) : 
				$post_type = get_post_type();

				if( $post_type != 'post' ) : ?>
					
					<h6 class="category">
						<a href="<?php echo site_url() . '/' . get_post_type_object( $post_type )->name ?>">
							<?php echo get_post_type_object( $post_type )->labels->singular_name; ?>
						</a>
					</h6>
				<?php
				else : ?>
					<h6 class="category">
						<?php _e('Inlägg', 'sverigestamfagelforening'); ?>
					</h6>
				<?php
				endif; ?>

			<?php
			endif; ?>
		</header>
		<h5><?php the_title(); ?></h5>
		<?php the_excerpt();

		if( is_front_page() ) : ?>
			<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>">
				<h6 class="date">
					<?php
					if(get_field( 'date' )) :
						the_field( 'date' );
					else :
						echo get_the_date();
					endif;?>
				</h6>
			</a>
		<?php
		endif;

		if( !empty( $location['adress'] ) ) : ?>
			<h6 class="location"><?php echo $location['adress']; ?></h6>
		<?php
		endif; ?>

	</div>

</article>