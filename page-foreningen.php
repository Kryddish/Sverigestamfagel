<?php
/**
 * Om oss - Föreningen
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<div class="about-stf">
					<img src="https://scontent-arn2-1.xx.fbcdn.net/v/t31.0-8/27368787_1623716201050523_4938098733160723649_o.jpg?oh=ef41e1a5efdc94ac025d2a59e25f3d62&oe=5B005A57" alt="">
				<div class="about-text">
				<h2>Vilka är vi? </h2>
					<p>Sveriges Tamfågelförening (STF) är en ideell förening för dig som har eller är intresserad av fåglar.
					Vi är anslutna till Svensk Fågelhobby och är således rikstäckande.
					</p>
					<p>	Oavsett var du bor eller vad du har för fåglar är man välkommen till vår gemenskap.
						Ett medlemskap hos oss blir både givande för dig och din fågel
					</p>
					<a href="#">Visa STFs stadgar *img*</a>
				</div>	
			</div>
				
			<div class="about-img">
			<img src="https://scontent-arn2-1.xx.fbcdn.net/v/t31.0-8/20988424_10213087457917722_1228120172698785271_o.jpg?oh=35dca9c2b19272a2d44277d50974d5ab&oe=5B181AA3" alt="">
			</div>
				
				<div class="about-do">
					<div class="about-content">
					<h2>Vad gör vi? </h2>
					<p>
						På sommarna träffas vi utomhus i vårt stora friflygningstält. Här ges fåglarna möjlighet att umgås med varandra, flyga runt och tränas socialt. Under vinterhalvåret anordnar vi friflygningar inomhus, filmvisningar, studiebesök och föredrag av olika slag. <br>
						Som medlem i STF blir du automatiskt medlem i Riksförbundet Svensk Fågelhobby (SF). Medlemskapet ger dig även vår populära medlemstidning "Fågelhobby" kostnadsfritt tio gånger per år.
					</p>
					<p>Passa på att bli medlem för att snabbt ta del av våra Medemsförmåner. Mer info kan du hitta här</p>
					</div>
					
				</div>

		<div class="page-content">
			<h3><span class="fa fa-instagram"></span> Instagram</h3>
			<section class="instagram-feed">

				<?php
				$insta_feed = get_field( 'instagram_feed' );

				if( $insta_feed ) {
					$user = $insta_feed['user'];
				} else {
					$user = 'sverigestamfagelforening';
				}

				$instaResult = file_get_contents('https://www.instagram.com/' . $user . '/?__a=1');

				$insta = json_decode($instaResult, true);
				$images = $insta['user']['media']['nodes'];

				foreach( $images as $image ) : ?>
					<a <?php if( $insta_feed['new_window'] ) : echo 'target="_blank"'; endif;?> href="<?php echo 'https://www.instagram.com/p/' . $image['code'] . '/'; ?>"><img src="<?php echo $image['thumbnail_src']; ?>" alt=""></a>
				<?php
				endforeach; ?>

			</section>
	</div><!-- .entry-content -->
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();