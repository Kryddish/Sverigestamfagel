<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Inget hittat', 'stf' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>

			<p><?php esc_html_e( 'Ledsen, men din sökning gav inga träffar. Var vänlig prova igen med andra sökord.', 'stf' ); ?></p>
		<?php
		elseif ( is_404() ) : ?>

			<p><?php _e( 'Det verkar som sidan du letade efter finns inte. Kontrollera URL:en och försök igen.', 'stf' ); ?></p>
		<?php
		else: ?>

			<p><?php esc_html_e( 'Det verkar inte finnas något innehåll ännu.', 'stf' ); ?></p>
		<?php
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->