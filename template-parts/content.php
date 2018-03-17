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

	<a class="link" href="<?php the_permalink(); ?>">
		<?php
		if( get_the_post_thumbnail() ) : ?>
			<img src="<?php the_post_thumbnail_url(); ?>" alt="Post image">
		<?php
		else:
			$images = get_field('images');

			if( $images ): ?>
				<img src="<?php echo $images[0]['url']; ?>" alt="Post image">
			<?php
			endif;

		endif; ?>

		<div class="text">
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
				if( !is_front_page() ) : ?>
				
					<h6 class="category">

						<?php
						$post_type = get_post_type();

						if( $post_type != 'post' ) :
							echo get_post_type_object( $post_type )->labels->singular_name;
						else :
							_e('Inlägg', 'sverigestamfagelforening');
						endif; ?>

					</h6>

				<?php
				endif; ?>
			</header>
			<h5><?php the_title(); ?></h5>
			<?php the_excerpt();

			if( is_front_page() ) : ?>
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

			if( !empty( $location['adress'] ) ) : ?>
				<h6 class="location"><?php echo $location['adress']; ?></h6>
			<?php
			endif; ?>

		</div>
	</a>

</article>