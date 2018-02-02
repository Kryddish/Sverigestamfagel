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
	$class = 'post';
endif;

$location = get_field( 'location' );

if( !empty( $location['address'] ) ) :
	$address = $location['address'];
	$address = explode(', ', $address);
	array_pop( $address );
	$num = array(0,1,2,3,4,5,6,7,8,9);
	$address[1] = str_replace($num, '', $address[1]);
	$address = implode('', $address);
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>

	<a class="link" href="<?php the_permalink(); ?>">
		<img src="<?php if( get_the_post_thumbnail_url() ) : the_post_thumbnail_url(); else: echo get_stylesheet_directory() . '/dist/img/image.png'; endif; ?>" alt="Post image">
		<div class="text">
			<header>
				<h5 class="date"><?php the_field( 'date' ); ?></h5>
				<h6 class="category"><?php echo get_post_type_object('meets')->labels->singular_name; ?></h6>
			</header>
			<h5><?php the_title(); ?></h5>
			<?php the_excerpt();

			if( $address ) : ?>
				<h6><?php echo $address; ?></h6>
			<?php
			endif; ?>

		</div>
	</a>

	<?php if ( get_edit_post_link() ) : ?>
	
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

	<?php endif; ?>

</article>