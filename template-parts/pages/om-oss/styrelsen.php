<h2>STFs Styrelse. </h2>
<p>
    Var vänlig och kontakta oss under våra mailadresser nedan om du vill komma i kontakt med en av oss i styrelsen. Alternativt maila till 
    vår infobrevlåda under info@sverigestamfagel.se eller använda kontaktformuläret på den här hemsidan.
</p>

<div class="board-members">
    
    <?php 
    if( have_rows('members') ): 
        while ( have_rows('members') ) : the_row(); ?>

            <div class="member">
                <img src="<?php
                if( get_sub_field( 'image' ) ) : 
                    the_sub_field( 'image' );
                else : echo 'https://www.sverigestamfagel.se/wp-content/uploads/2015/11/STF-logo.gif';
                endif; ?>" alt="">
                
                <div class="member-info">
                    <p>
                        <?php
                        if( get_sub_field( 'role' ) ) : ?>
                            <strong><?php the_sub_field( 'role' ); ?></strong><br>
                        <?php 
                        endif;
                        if( get_sub_field( 'name' ) ) : ?>
                            <?php the_sub_field( 'name' ); ?><br>
                        <?php
                        endif;
                        if( get_sub_field( 'email' ) ) : ?>
                            <a href="mailto:<?php the_sub_field( 'email' ); ?>"><?php the_sub_field( 'email' ); ?></a>
                        <?php
                        endif; ?>
                    </p>
                </div>
            </div>
        
        <?php
        endwhile;
    endif; ?>
    
</div><!-- .board-members -->