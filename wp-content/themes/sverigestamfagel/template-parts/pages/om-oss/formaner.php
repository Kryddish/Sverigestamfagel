<?php
if( have_rows('header') ):
    while ( have_rows('header') ) : the_row(); ?>

		<h2> <?php
			if( get_sub_field( 'headline' ) ) :
				the_sub_field( 'headline' );
			endif; ?>
		</h2>
		<p>
			<?php
			if( get_sub_field( 'header_text' ) ) :
				the_sub_field( 'header_text' );
			endif; ?>
		</p>

		<?php
	endwhile;
endif;
if( have_rows('paper') ):
    while ( have_rows('paper') ) : the_row(); ?>
		<div class="magazine">
			<img src="
				<?php
				if( get_sub_field( 'paper_img' ) ) :
					echo get_sub_field( 'paper_img' )['sizes']['medium'];
				else:
					echo 'http://fagelhobby.nu/wp-content/uploads/2014/02/FH-Promotion01_2015.jpg';
				endif; ?>" alt="">
			<div class="magazine-text">
				<h2>
					<?php
					if( get_sub_field( 'headline' ) ) :
						the_sub_field( 'headline' );
					endif; ?>
				</h2>
				<p>
					<?php
					if( get_sub_field( 'text' ) ) :
						the_sub_field( 'text' );
					endif; ?>
				</p>
			</div><!-- .magazine-text -->
		</div><!-- .magazine -->
		<?php
	endwhile;
endif; ?>

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
    </div><!-- .top-rebates -->

    <div class="rebates-2">
        <img class="zoosajten" src="https://www.papegojforening.se/images/zoobutik-zoosajten1.png" alt="">
        <p>
            Medlemmar i STF har 10%  rabatt på Zoosajtens Webbshop.
        </p>
    </div><!-- .rebates-2 -->
</div><!-- .rebates -->

<?php
if( have_rows('ringar') ):
    while ( have_rows('ringar') ) : the_row(); ?>
		<div class="rings">
			<img src="<?php
				if(get_sub_field('rings_img')):
					echo get_sub_field( 'rings_img' )['sizes']['medium'];
				endif; ?>" alt="">

			<div class="rings-content">
				<h2>
					<?php if( get_sub_field( 'rings_headline' ) ) :
						the_sub_field( 'rings_headline' );
					endif; ?>
				</h2>
				<p>
				<?php if( get_sub_field( 'rings_info' ) ) :
						the_sub_field( 'rings_info' );
					endif; ?>
				</p>
			</div><!-- .rings-content -->
		</div><!-- .rings -->
		<?php
	endwhile;
endif; ?>

<div class="bird-register">
    <h2>Frivillig fågelregister</h2>
    <p>
        Det finns ett frivilligt fågelregister vars syfte är att polis, veterinär med mera lättare ska kunna spåra ägare till fåglar som flugit bort eller stulits och sedan upphittats.
        I registret kan du registrera din/dina fåglars ring- eller chipnummer samt information där du kan nås. Du bestämmer själv vilka adressuppgifter du vill införa i registret. Uppgifterna i registret är inte offentliga. Anmälan görs till fagelregister@tamfagel.se.
    </p>
    <button>Bli medlem</button>
</div><!-- .bird-register -->
