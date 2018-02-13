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
if( $post === reset($posts) ) :
	$class = 'main-post';
else:
	$class = 'stf-post';
endif;

$location = get_field( 'location' );

if( !empty( $location['address'] ) ) :
	$address = $location['address'];
	$address = explode(',', $address);
	array_pop( $address );
	$num = array(0,1,2,3,4,5,6,7,8,9);
	$address[1] = str_replace($num, '', $address[1]);
	$address = implode('', $address);
endif; ?>

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
				echo get_stylesheet_directory_uri() . '/dist/img/stf_logo.png';				
			endif;

		endif; ?>" alt="Post image">

		<div class="text">
			<header>
				<h6 class="date"><?php the_field( 'date' ); ?></h6>
				<h6 class="category">

					<?php
					$post_type = get_post_type();

					if( $post_type != 'post' ) :
						echo get_post_type_object( $post_type )->labels->singular_name;
					else:
						$categories = get_the_category();
						echo $categories[0]->name;
					endif; ?>

				</h6>
			</header>
			<h5><?php the_title(); ?></h5>
			<?php the_excerpt();

			if( $address ) : ?>
				<h6 class="location"><?php echo $address; ?></h6>
			<?php
			endif; ?>

		</div>
	</a>

</article>