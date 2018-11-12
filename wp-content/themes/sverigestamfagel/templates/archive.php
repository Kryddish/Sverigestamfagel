<?php
/*
 * Template Name: Arkivsida
 */

$posts_per_page = get_field( 'posts_per_page' ) ? get_field( 'posts_per_page' ) : 5;
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$post_type = [
	'meets',
	'articles',
	'post'
];
$post_types = [
	'meets' => 'Fågelträffar',
	'articles' => 'Artiklar',
	'post' => 'Inlägg'
];

// Get post type field if set
if( isset( $_GET['type'] ) ) {
	$post_type = $_GET['type'];
}

/**
 * Query arguments
 */
$args = [
	'post_type' => $post_type,
	'posts_per_page' => $posts_per_page,
	'offset' => ($paged-1) * $posts_per_page
];

// Add search query to query arguments if set
if( isset( $_GET['q'] ) ) {
	$search = $_GET['q'];
	$args['s'] = $_GET['q'];
} else {
	$search = '';
}

// Add categories to query if set
if( isset( $_GET['category'] ) ) {
	$args['category_name'] = $_GET['category'];
}

/**
 * Get posts
 */
$archive_query = new WP_Query( $args );

/**
 * Sort array with custom function
 */
// if( $archive_query->have_posts() )
// 	$archive_query->posts = stf_sort_date( $archive_query->posts );

$categories = get_categories();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="posts-container">
				<h2><?php the_title() ?></h2>

				<?php
				if( $archive_query->have_posts() ):
					foreach( $archive_query->posts as $post ): setup_postdata( $post );

						get_template_part( 'template-parts/content/content' );

					endforeach;
					wp_reset_postdata();
				else: ?>
					<h5>Inga inlägg hittades.</h5>
					<?php
				endif; ?>

				<div class="posts-navigation">
					<?php
					$big = 999999999;
					echo paginate_links(array(
						'base' 				=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'format' 			=> '/page/%#%',
						'current' 			=> max(1, $paged),
						'total' 			=> $archive_query->max_num_pages,
						'prev_text'         => __('', 'stf'),
						'next_text'         => __('', 'stf'),
						'mid_size'          => 2,
						'end_size'          => 0,
					)); ?>
				</div>
			</div>

			<div class="c-sidebar c-sidebar--search">

				<form role="search" method="get" class="search-form">
					<label>
						<span class="screen-reader-text">Sök efter:</span>
						<input type="search" class="search-field" placeholder="Sök …" value="<?= $search ?>" name="q">
					</label>
					<input name="search" type="submit" class="search-submit" value="Sök">
				</form>

				<h6>Typ av inlägg</h6>
				<?php
				if( !isset( $_GET['type'] ) or $_GET['type'] === 'any' ): ?>
					<div>
						<a class="current" href="<?= add_query_arg( 'type', 'any' ) ?>">Alla</a>
					</div>
					<?php
				else: ?>
					<div>
						<a href="<?= add_query_arg( 'type', 'any' ) ?>">Alla</a>
					</div>
					<?php
				endif;

				foreach( $post_types as $key => $value ):
					if( isset( $_GET['type'] ) and $_GET['type'] === $key ): ?>
						<div>
							<a class="current" href="<?= add_query_arg( 'type', $key ) ?>"><?= $value ?></a>
						</div>
						<?php
					else: ?>
						<div>
							<a href="<?= add_query_arg( 'type', $key ) ?>"><?= $value ?></a>
						</div>
						<?php
					endif;
				endforeach; ?>

				<h6>Kategorier</h6>
				<?php
				if( !isset( $_GET['category'] ) or $_GET['category'] === '' ): ?>
					<div>
						<a class="current" href="<?= add_query_arg( 'category', '' ) ?>">Alla</a>
					</div>
				<?php
				else: ?>
					<div>
						<a href="<?= add_query_arg( 'category', '' ) ?>">Alla</a>
					</div>
					<?php
				endif;
				foreach ( $categories as $category ):
					if( isset( $_GET['category'] ) and $_GET['category'] === $category->slug ): ?>
						<div>
							<a class="current" href="<?= add_query_arg( 'category', $category->slug ) ?>"><?= $category->name ?></a>
						</div>
					<?php
					else: ?>
						<div>
							<a href="<?= add_query_arg( 'category', $category->slug ) ?>"><?= $category->name ?></a>
						</div>
						<?php
					endif;
				endforeach; ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
