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
			if( get_field('heading1') ) :
				the_field('heading1'); 
			else : ?>
				Såhär går det till...
			<?php
			endif; ?>
		</h4>
		<h4>
			<?php
			if( get_field('heading2') ) :
				the_field('heading2');
			else : ?>
				Vi behöver veta lite om dig...
			<?php
			endif; ?>
		</h4>
		<h4>
			<?php
			if( get_field('heading3') ) :
				the_field('heading3'); 
			else : ?>
				Nu var det nästan klart!
			<?php
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

					else : ?>

						<div class="step">
							<div>
								<span></span>
							</div>
							<p>Du fyller i namn, e-postadress, adress, postnummer och postadress</p>
						</div>
						<div class="step">
							<div>
								<span></span>
							</div>
							<p>
								Du betalar in medlemsavgiften
								medlemskap: 300 kr / år
								familjemedlemskap: 70 kr / år
							</p>
						</div>
						<div class="step">
							<div>
								<span></span>
							</div>
							<p>Du får ett mail när registreringen har genomförts och du är nu medlem i föreningen</p>
						</div>

						<?php
					endif; ?>

				</div>
				<div class="slide form">
					<?php echo do_shortcode('[contact-form-7 id="2278" title="Bli medlem"]'); ?>
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
				else : ?>
					Behöver du läsa mer om medlemskapet? Klicka <a href="<?php echo site_url() . '/om-oss/medlemskapet/'; ?>">här</a>					
				<?php
				endif; ?>
			</span>
		</div>
		<div class="buttons">
			<button class="begin"><?php _e('Börja', 'sverigestamfagelforening'); ?></button>
			<button class="previous"><?php _e('Föregående', 'sverigestamfagelforening'); ?></button>
		</div>
		<div class="slide-navigation"></div>
	</div>
	<?php
	if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<span>Senast ändrad <?php the_modified_date(); ?></span>

			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Redigera sida %s', 'sverigestamfagelforening' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>

		</footer><!-- .entry-footer -->
	<?php
	endif; ?>
</article>