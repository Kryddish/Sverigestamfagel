	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<div class="social-menu">
				<a target="_blank" class="icon-facebook-official" href="https://www.facebook.com/groups/6200961175/">Facebook</a>
				<a target="_blank" class="icon-instagram" href="https://www.instagram.com/sverigestamfagelforening/">Instagram</a>
			</div>

			<div class="email">
				Har du frågor?</br>
				<a class="icon-mail-alt" href="mailto:info@sverigestamfagel.se"><?= __( 'Maila oss!', 'stf' ); ?></a>
			</div>
			<div class="donate">
				Vill du stödja vår förening?</br>
				Swisha till <b>123 148 36 84</b>
			</div>
		</div>
		<div class="site-info">
			<span>
				<?php _e( '© 2019 Sveriges Tamfågelförening. All rights reserved', 'stf' ); ?>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Utvecklad av %1$s och %2$s.', 'stf' ), '<a href="https://www.linkedin.com/in/emmelie-sundell-41bba2128/">Emmelie</a>', '<a href="https://www.linkedin.com/in/max-trewhitt-965109127/">Max</a>' ); ?>
			</span>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
