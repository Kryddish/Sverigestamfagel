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
		<h4>Såhär går det till...</h4>
		<div class="onboard-slider">
			<div class="holder">
				<div class="slide info">
					<div class="step">
						<div>
							<span></span>
						</div>
						<p>
							Du fyller i namn, e-postadress, adress, postnummer och postadress
						</p>
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
						<p>
							Du får ett mail när registreringen har genomförts och du är nu medlem i föreningen
						</p>
					</div>
				</div>
				<div class="slide form">
					<?php echo do_shortcode('[contact-form-7 id="1949" title="Kontaktformulär 1"]'); ?>
				</div>
				<div class="slide confirmation">
					<h4>Tack, nu återstår bara det sista...</h4>
				</div>
			</div>
		</div>
		<div class="meta">
			<hr>
			<span>Behöver du läsa mer om medlemskapet? Klicka <a href="#">här</a></span>
		</div>
		<button class="next-slide">Börja</button>
		<div class="slide-navigation"></div>
	</div>
</article>