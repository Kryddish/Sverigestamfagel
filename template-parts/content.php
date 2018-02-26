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
if( $post === reset($posts) && is_front_page() ) :
	$class = 'main-post';
else:
	$class = 'stf-post';
endif;

$location = get_field( 'location' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>

	<a class="link" href="<?php the_permalink(); ?>">
		<img src="<?php
		if( get_the_post_thumbnail_url() ) :
			the_post_thumbnail_url();
		else:
			$images = get_field('images');

			if( $images ):
				echo $images[0]['url'];
			else :
				echo get_stylesheet_directory_uri() . '/dist/img/placeholder.png';				
			endif;

		endif; ?>" alt="Post image">

		<div class="text">
			<header>
				<h6 class="date">
					<?php
					if(get_field( 'date' )) :
						the_field( 'date' );
					else :
						echo get_the_date();
					endif;?>
				</h6>
				<h6 class="category">

					<?php
					$post_type = get_post_type();

					if( $post_type != 'post' ) :
						echo get_post_type_object( $post_type )->labels->singular_name;
					else :
						_e('Inlägg', 'sverigestamfagelforening');
					endif; ?>

				</h6>
			</header>
			<h5><?php the_title(); ?></h5>
			<?php the_excerpt();

			if( !empty( $location['adress'] ) ) : ?>
				<h6 class="location"><?php echo $location['adress']; ?></h6>
			<?php
			endif; ?>

		</div>
	</a>

</article>