<?php
/* Template Name: Arkivsida */

$post_type = get_field( 'post_type' ) ? get_field( 'post_type' ) : 'meets';
$posts_per_page = get_field( 'posts_per_page' ) ? get_field( 'posts_per_page' ) : 5;
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

if( isset( $_GET['kategori'] ) ) {
	switch ($_GET['kategori']) {
		case 'fågelträffar':
			$post_type = 'meets';
			break;

		case 'inlägg':
			$post_type = 'post';
			break;

		case 'artiklar':
			$post_type = 'artiklar';
			break;
	}
}

$args = [
	'post_type' => $post_type,
	'posts_per_page' => $posts_per_page,
	'paged' => $paged
];

$archive_query = new WP_Query( $args );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="posts-container">
				<?php
				if( isset( $_GET['kategori'] ) ): ?>
					<h2><?= ucfirst( $_GET['kategori'] ) ?></h2>
					<?php
				else: ?>
					<h2><?php the_title() ?></h2>
					<?php
				endif; ?>

				<?php
				foreach( $archive_query->posts as $post ): setup_postdata( $post );
					get_template_part( 'template-parts/content/content' );
				endforeach;
				wp_reset_postdata(); ?>

				<div class="posts-navigation">
					<?php
					$big = 999999999;
					echo paginate_links(array(
						'base' 				=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'format' 			=> '/page/%#%',
						'current' 			=> max(1, $paged),
						'total' 			=> $archive_query->max_num_pages,
						'prev_text'         => __('« Föregående sida', 'stf'),
						'next_text'         => __('Nästa sida »', 'stf'),
						'mid_size'          => 2,
						'end_size'          => 0,
					)); ?>
				</div>
			</div>

			<div class="side-archive">
				<h5>Filtreringsalternativ</h5>
				<?= get_search_form(); ?>
				<p>Kategorier</p>
				<div>
					<a href="<?= add_query_arg( 'kategori', 'fågelträffar' ) ?>">Fågelträffar</a>
				</div>
				<div>
					<a href="<?= add_query_arg( 'kategori', 'artiklar' ) ?>">Artiklar</a>
				</div>
				<div>
					<a href="<?= add_query_arg( 'kategori', 'inlägg' ) ?>">Inlägg</a>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
