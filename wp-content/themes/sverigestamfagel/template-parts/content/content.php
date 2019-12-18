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
	if (strtotime(get_field('date')) > strtotime("now")): ?>
		<div class="banner">
			<h6>Kommande</h6>
		</div>
		<?php
	endif;
	if (get_the_post_thumbnail()) : ?>
		<a class="image" href="<?php the_permalink(); ?>">
			<img src="<?php the_post_thumbnail_url('large'); ?>" alt="Post image">
		</a>
	<?php
	else:
		$images = get_field('images');

		if ($images): ?>
			<a class="image" href="<?php the_permalink(); ?>">
				<img src="<?= $images[0]['url']; ?>" alt="Post image">
			</a>
			<?php
		endif;
	endif; ?>

	<div class="text">
		<header>
			<h5>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h5>
		</header>

		<?php the_excerpt(); ?>

		<footer>
			<h6 class="date">
				<?php
				if( get_field( 'date' ) ) :
					the_field( 'date' );
				else :
					echo get_the_date();
				endif;?>
			</h6>
		</footer>

		<?php
		if (!empty($location['adress'])) : ?>
			<h6 class="location"><?= $location['adress']; ?></h6>
			<?php
		endif; ?>
	</div>
</article>
