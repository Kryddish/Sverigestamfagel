<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<h4>
			<?php
			if( have_rows('headings') ): 
				while( have_rows('headings') ): the_row();
					the_sub_field('intro');
				endwhile;
			endif; ?>
		</h4>
		<h4>
		<?php
			if( have_rows('headings') ): 
				while( have_rows('headings') ): the_row();
					the_sub_field('form');
				endwhile;
			endif; ?>
		</h4>
		<h4>
			<?php
			if( have_rows('headings') ): 
				while( have_rows('headings') ): the_row();
					the_sub_field('confirm');
				endwhile;
			endif; ?>
		</h4>
		<div class="onboard-slider">
			<div class="holder">
				<div class="slide info">
					<?php
					if( have_rows('intro') ):

						while ( have_rows('intro') ) : the_row(); // ACF loop

							$steps = get_sub_field('step');

							foreach( $steps as $step ) : ?>

								<div class="step">
									<div>
										<span><?php echo $step['icon'] ?></span>
									</div>
									<p><?php echo $step['text'] ?></p>
								</div>

							<?php
							endforeach;

						endwhile;
					endif; ?>

				</div>
				<div class="slide form">
					<?php echo do_shortcode('[contact-form-7 title="Bli medlem"]'); ?>
				</div>
				<div class="slide confirmation">
					<h4>Tack, nu återstår bara det sista...</h4>
				</div>
			</div>
		</div>
		<div class="meta">
			<hr>
			<span>
				<?php
				if( get_field('info') ) :
					the_field('info');
				endif; ?>
			</span>
		</div>
		<div class="buttons">
			<button class="begin"><?php _e('Börja', 'sverigestamfagelforening'); ?></button>
			<button class="previous"><?php _e('Föregående', 'sverigestamfagelforening'); ?></button>
		</div>
		<div class="slide-navigation"></div>
	</div>
</article>