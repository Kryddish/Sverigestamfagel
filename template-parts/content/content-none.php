<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Inget hittat', 'sverigestamfagelforening' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sverigestamfagelforening' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php
		elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Ledsen, men din sökning gav inga träffar. Var vänlig prova igen med andra sökord.', 'sverigestamfagelforening' ); ?></p>
		<?php
		elseif ( is_404() ) : ?>

			<p><?php _e( 'Det verkar som sidan du letade efter finns inte. Kontrollera URL:en och försök igen.', 'sverigestamfagelforening' ); ?></p>
		<?php
		else: ?>

			<p><?php esc_html_e( 'Det verkar inte finnas något innehåll ännu.', 'sverigestamfagelforening' ); ?></p>
		<?php
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->