<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('stf-post'); ?>>
	<?php
	if (get_field('date') and strtotime(get_field('date')) > time()): ?>
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
		<p><?= get_the_excerpt() ?></p>
		<footer>
			<h6 class="date <?= strtotime(get_field('date')) > time() ? 'highlight' : '' ?>">
				<?php
				if (get_field('date')) {
					echo date('j F, Y', strtotime(get_field('date')));
				} else {
					echo get_the_date('j F, Y');
				} ?>
			</h6>
		</footer>

		<?php
		if (!empty(get_field('location')['adress'])) : ?>
			<h6 class="location"><?= get_field('location')['adress']; ?></h6>
			<?php
		endif; ?>
	</div>
</article>
