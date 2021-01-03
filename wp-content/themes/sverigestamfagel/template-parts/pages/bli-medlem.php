<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<h4>
			<?php
			if (have_rows('headings')) :
				while (have_rows('headings')) : the_row();
					the_sub_field('intro');
				endwhile;
			endif; ?>
		</h4>
		<h4>
			<?php
			if (have_rows('headings')) :
				while (have_rows('headings')) : the_row();
					the_sub_field('form');
				endwhile;
			endif; ?>
		</h4>
		<h4>
			<?php
			if (have_rows('headings')) :
				while (have_rows('headings')) : the_row();
					the_sub_field('confirm');
				endwhile;
			endif; ?>
		</h4>
		<div class="onboard-slider">
			<div class="holder">
				<div class="slide info">
					<?php
					if (have_rows('intro')) :

						while (have_rows('intro')) : the_row(); // ACF loop

							$steps = get_sub_field('step');

							foreach ($steps as $step) : ?>

								<div class="step">
									<div>
										<i class="icon icon-<?= $step['icon'] ?>"></i>
									</div>
									<p><?= $step['text'] ?></p>
								</div>

					<?php
							endforeach;

						endwhile;
					endif; ?>

				</div>
				<div class="slide form">
					<?= do_shortcode('[contact-form-7 title="Bli medlem"]'); ?>
				</div>
				<div class="slide confirmation">
					<div class="content">
						<p>
							Enklaste sättet att betala medlemsavgiften är med Swish.<br>
							Telefonnummer: <b>123 148 36 84</b>
						</p>
						<img class="qr-code" src="<?= get_field('qr_code', 'option')['sizes']['large'] ?>" alt="">
						<p>
							Behöver du hjälp med betalningen?<br>
							Hör av dig till oss via <a href="mailto:info@sverigestamfagel.se">info@sverigestamfagel.se</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="meta">
			<hr>
			<span>
				<?php
				if (get_field('info')) :
					the_field('info');
				endif; ?>
			</span>
		</div>
		<div class="buttons">
			<button class="begin"><?php _e('Börja', 'stf'); ?></button>
			<button class="previous"><?php _e('Föregående', 'stf'); ?></button>
		</div>
		<div class="slide-navigation"></div>
	</div>
</article>
