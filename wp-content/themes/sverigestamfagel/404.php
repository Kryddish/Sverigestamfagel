<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package stf
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h3 class="page-title"><?php esc_html_e( 'Ojdå, Har du flugit vilse?', 'stf' ); ?></h3>
				</header>

				<div class="page-content">
					<p>
						<?php esc_html_e( 'Det verkar som att ingenting hittades på denna plats. Kanske prova göra en sökning eller använda länkarna i menyn?', 'stf' ); ?>
					</p>
				</div>
			</section>

		</main>
	</div>

<?php
get_footer();
