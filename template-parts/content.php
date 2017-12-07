<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
  
	<header class="entry-header">
		<?php sverigestamfagelforening_the_category_list(); ?>
		<?php
		if ( is_single() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php sverigestamfagelforening_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			// the_content( sprintf(
			// 	/* translators: %s: Name of current post. */
			// 	wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sverigestamfagelforening' ), array( 'span' => array( 'class' => array() ) ) ),
			// 	the_title( '<span class="screen-reader-text">"', '"</span>', false )
			// ) );

			if ( is_single() ) :
				the_content();
			else :
				the_excerpt();
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sverigestamfagelforening' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php sverigestamfagelforening_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


