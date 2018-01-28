<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sverigestamfagelforening
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sverigestamfagelforening' ),
				'after'  => '</div>',
			) ); ?>

			<div class="top-info">
				<div class="stf-slider">
					<img src="<?php echo get_stylesheet_directory_uri() . '/dist/img/parrot.png'?>" alt="Parrot image">
					<img src="<?php echo get_stylesheet_directory_uri() . '/dist/img/parrot.png'?>" alt="Parrot image">
				</div>
				<div class="container">
					<div>
						<h2>Bli medlem</h2>
						<p>
							Vi är en ideell förening för alla tamfågelälskare.
							Oavsett fågel eller vart du befinner dig är du välkommen som medlem.
							Bli medlem idag och ta del av rabatter samt medlemstidningen “Fågelhobby”.
						</p>
					</div>
					<div>
						<h2>Facebook</h2>
						<p>
						Har du en fågel? Eller kanske vill du skaffa en fågel?
						Glöm inte att gå med i vår facebookgrupp för att få tips och råd bland andra med samma intresse!
						</p>
					</div>
				</div>
			</div>
			<div class="page-content">
			<h1><span class="fa fa-calendar"></span> Aktuellt</h1>

				<div class="main-post">
					<a href="#">
						<img class="main-post-img" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/image.png' ?>" alt="">
						<div class="main-post-text">
							<span class="publiced-date">Publicerad November 19, 2017   </span>
							<span class="category">FÅGELTRÄFFAR </span>	
								<h4>Nya styrelsen</h4>
								<p>
									Lo-fi cray kinfolk readymade pug quinoa actually small batch narwhal celiac slow-carb vexillologist.
									Hell of etsy hashtag kale chips sriracha occupy jianbing vape...
								</p>							
						</div>
					</a>
				</div>

				<div class="basic-post">
					<a href="#">
							<img class="post-img" src="<?php echo get_stylesheet_directory_uri() . '/dist/img/image.png' ?>" alt="">
							<div class="post-text">
								<span class="publiced-date">Publicerad November 19, 2017   </span>
								<span class="category">FÅGELTRÄFFAR </span>	
									<div class="post-content">
									<h4>Nya styrelsen</h4>
									<p>
										Lo-fi cray kinfolk readymade pug quinoa actually small batch narwhal celiac slow-carb vexillologist.
										Hell of etsy hashtag kale chips sriracha occupy jianbing vape...
									</p>	
									</div>						
							</div>
					</a>
				</div>
				<button class="more-post">Visa fler</button>

			</div>

				<?php
			$args = array(
				'posts_per_page' => 5
			);

			$myposts = get_posts( $args );
			$i = 0;
			foreach ( $myposts as $post ) : setup_postdata( $post );

				if( $i === 0 ) : ?>
					<div class="main-post">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<p><?php the_excerpt(); ?></p>
					</div>
				<?php
				$i = 1;
				else: ?>
					<div class="post">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<p><?php the_excerpt(); ?></p>
					</div>
				<?php
				endif;
			endforeach; 
			wp_reset_postdata(); ?>

			</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<span>Senast ändrad <?php the_modified_date(); ?></span>

			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Redigera %s', 'sverigestamfagelforening' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			); ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->