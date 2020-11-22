<div class="header">
    <h2><?= get_the_title() ?></h2>
    <p>
        Vill du komma i kontakt med någon i styrelsen? Här nedan finns kontaktuppgifter till oss,
        alternativt använd <a href="<?= site_url(); ?>/kontakt">kontaktformuläret</a>.
    </p>
</div>

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
