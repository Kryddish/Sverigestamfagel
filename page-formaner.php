<?php
/**
 * Om oss - Förmåner
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h2>Medlemsförmåner</h2>
			<b><p>Som medlem i STF får du inte bara träffa folk med samma intresse och 
				dela erfarenheter, du får får också en del förmåner så som rabatter eller tidningen fågelhobby. 
				Nedan kan du läsa mer om dessa. </p></b>

			<div class="magazine">
				<img src="http://fagelhobby.nu/wp-content/uploads/2014/02/FH-Promotion01_2015.jpg" alt="">
				<div class="magazine-text">
				<h2>Medlemstidning</h2>
				<p>Som medlem i STF blir du automatisk medlem i Riksförbundet Svensk Fågelhobby och får medlemstidningen Fågelhobby.
					Tidningen är i färg och med i A4 formatet.</p>
					<p>
					I tidningen medverkar både erfarna fågelhållare och nybörjare med artiklar som varvas med material från redaktionen. Tidningen är för medlemmar
					 av medlemmar vilket gör att det alltid finns något intressant att läsa för alla olika inriktningar.</p>
					<p>
					Som medlem kan man annonsera gratis under ”köp och sälj”. Det publiceras även information från olika klubbar om till exempel utställningar och uppfödningar.
					Väljer du att bli medlem i till exempel juni, får du under året redan utgivna nummer av tidningen Fågelhobby skickade till dig i efterhand.</p>
				</div>
			</div>

		<div class="rebates">
			<h2>Rabatter</h2>
			<div class="top-rebates">
			<img class="animail" src="https://lauradhave.files.wordpress.com/2017/07/animaillogoafter-2.gif?w=1000" alt="">
				<p>	
					Medlemmar i STF har 10% rabatt på allt inom fågelkategorin på Animails hemida.
				</p>
				<img class="sveland" src="http://resources.mynewsdesk.com/image/upload/c_limit,dpr_1.0,f_auto,h_700,q_auto,w_690/vp6bnuiruqflwti18l60.jpg" alt="">
				<p>	
					Som medlem i STF har du 15% rabatt på fågelförsäkringar. Rabatten gäller vid nyförsäkringar.
				</p>
			</div>
			<div class="rebates-2">
				<img class="zoosajten" src="https://www.papegojforening.se/images/zoobutik-zoosajten1.png" alt="">
					<p>	
						Medlemmar i STF har 10%  rabatt på Zoosajtens Webbshop.
					</p>
			</div>
		</div>

		<div class="rings">
			<img src="http://www.youschi.se/Artiklar/Chip&Ring/Morran.jpg" alt="">
			<div class="rings-content">
				<h2>Ringar</h2>
				<p>Föder du upp fåglar och vill ringmärka dem? Som medlem kan du köpa öppna och slutna ringar via Riksförbundet Svensk Fågelhobby. Tänk på att de fåglar 
					som är upptagna på Cites lista 1 och EU:s bilaga A måste ringmärkas med slutna ringar för att kunna säljas.</p>
				<p>För mer information om ringar, se Riksförbundet Svensk Fågelhobbys hemsida, www.fagelhobby.nu under Ringkonto.
					För mer information om Cites, se Statens Jordbruksverks hemsida, www.sjv.se under Djur och Veterinär.</p>
			</div>
		</div>

		<div class="bird-register">
			<h2>Frivillig fågelregister</h2>
			<p>Det finns ett frivilligt fågelregister vars syfte är att polis, veterinär med mera lättare ska kunna spåra ägare till fåglar som flugit bort eller stulits och sedan upphittats.
			I registret kan du registrera din/dina fåglars ring- eller chipnummer samt information där du kan nås. Du bestämmer själv vilka adressuppgifter du vill införa i registret. Uppgifterna i registret är inte offentliga. Anmälan görs till fagelregister@tamfagel.se.</p>
		<button>Bli medlem</button>
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