<?php
global $post;
$parents = get_post_ancestors(get_the_ID());

if ($parents == null) {
	$first_parent_id = $post->ID;
} else {
	$first_parent_id = end($parents);
}

$pages = get_pages([
	'child_of' => $first_parent_id
]);

$first_page = get_post($first_parent_id); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('c-article'); ?>>
	<?php
	if ($pages): ?>
		<aside class="c-article__sidebar">
			<h5>
				<a href="<?= get_permalink($first_parent_id) ?>">
					<?= $first_page->post_title ?>
				</a>
			</h5>
			<ul>
				<?php
				foreach ($pages as $page):
					if ($page->ID == $post->ID): ?>
						<li class="current">
							<a href="<?= get_permalink($page->ID) ?>"><?= get_the_title($page->ID) ?></a>
						</li>
					<?php
					else:  ?>
						<li>
							<a href="<?= get_permalink($page->ID) ?>"><?= get_the_title($page->ID) ?></a>
						</li>
						<?php
					endif;
				endforeach; ?>
			</ul>
		</aside>
		<?php
	endif; ?>
	<div class="c-article__content">
		<h1><?= get_the_title() ?></h1>
		<?= the_content() ?>
	</div>
</article>
