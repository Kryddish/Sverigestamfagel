<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */
?>

<?php
$location = get_field( 'location' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('stf-post'); ?>>

	<?php
	if( get_the_post_thumbnail() ) : ?>
		<a class="image" href="<?php the_permalink(); ?>">
			<img src="<?php the_post_thumbnail_url(); ?>" alt="Post image">
		</a>
	<?php
	else:
		$images = get_field('images');

		if( $images ): ?>
			<a class="image" href="<?php the_permalink(); ?>">
				<img src="<?= $images[0]['url']; ?>" alt="Post image">
			</a>
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
				<h6 class="date">
					<?php
					if(get_field( 'date' )) :
						the_field( 'date' );
					else :
						echo get_the_date();
					endif;?>
				</h6>
			<?php
			endif;
			if( !is_front_page() ) :
				$post_type = get_post_type($post);

				if( $post_type != 'post' ) : ?>

					<h6 class="category">
						<a href="<?= site_url() . '/' . get_post_type_object( $post_type )->name ?>">Kategorier</a>
					</h6>
				<?php
				else : ?>
					<h6 class="category">
						<?php _e('Inlägg', 'stf'); ?>
					</h6>
				<?php
				endif; ?>

			<?php
			endif; ?>

			<h5>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h5>
		</header>

		<?php the_excerpt();

		if( is_front_page() ) : ?>
			<footer>
				<h6 class="date">

						<?php
						if(get_field( 'date' )) :
							the_field( 'date' );
						else :
							echo get_the_date();
						endif;?>

				</h6>
			</footer>
		<?php
		endif;

		if( !empty( $location['adress'] ) ) : ?>
			<h6 class="location"><?php echo $location['adress']; ?></h6>
		<?php
		endif; ?>

	</div>

</article>
