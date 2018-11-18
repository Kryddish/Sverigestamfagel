<section>
<?php if( have_rows('block_1') ): 
        while ( have_rows('block_1') ) : the_row(); ?> 
   
   <img src=" <?php
    if( get_sub_field( 'bild_1' ) ) : 
                        the_sub_field( 'bild_1' );
                    else : echo 'https://www.sverigestamfagel.se/wp-content/uploads/2015/11/STF-logo.gif';
                    endif; ?>" alt="">

    <div class="text">
        <h2><?php if( get_sub_field( 'headline' ) ) : 
                        the_sub_field( 'headline' );
                    else : echo 'Vilka är vi?';
                    endif; ?></h2>
        <p>
        <?php if( get_sub_field( 'text' ) ) : 
                        the_sub_field( 'text' );
                    else : echo 'Mer info kommer snart';
                    endif; ?></h2>
        </p>
        <a href="<?php 
            if( get_sub_field( 'link' ) ) : 
                the_sub_field( 'link' );
            endif;?>
                "> <?php if(get_sub_field( 'link_text' ) ) : 
                            the_sub_field( 'link_text' );
                            else : echo 'Visa Stadgar';
            endif;?>
        </a>                              
                            
    </div>
    <?php 
        endwhile;
        endif; ?>
</section>

<section>
<?php if( have_rows('block_2') ): 
        while ( have_rows('block_2') ) : the_row(); ?>
    <img src=" <?php
    if( get_sub_field( 'bild_2' ) ) : 
                        the_sub_field( 'bild_2' );
                    else : echo 'https://www.sverigestamfagel.se/wp-content/uploads/2015/11/STF-logo.gif';
                    endif; ?>" alt="">    
    
    <div class="text">
        <h2><?php if( get_sub_field( 'headline' ) ) : 
                        the_sub_field( 'headline' );
                    else : echo 'Vilka är vi?';
                    endif; ?></h2>
        <p>
        <?php if( get_sub_field( 'info_text' ) ) : 
                        the_sub_field( 'info_text' );
                    else : echo 'Mer info kommer snart';
                    endif; ?></h2>
        </p>
        <a href="<?php 
            if( get_sub_field( 'link' ) ) : 
                the_sub_field( 'link' );
            endif;?>
                "> <?php if(get_sub_field( 'link_text' ) ) : 
                            the_sub_field( 'link_text' );
                            else : echo '';
            endif;?>
        </a> 
                               
    <?php 
        endwhile;
        endif; ?>
</section>

<?php include( get_stylesheet_directory() . '/template-parts/instagram.php' ); ?> 