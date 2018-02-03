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
        
        <header class="entry-header">

            <?php if ( get_edit_post_link() ) : ?>
                <span>Senast ändrad <?php the_modified_date(); ?></span>

                <?php
                edit_post_link(
                    sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__( 'Redigera inlägg %s', 'sverigestamfagelforening' ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ),
                    '<span class="edit-link">',
                    '</span>'
                ); ?>

            <?php 
            endif; ?>

            <h2><?php the_title(); ?></h2>            

        </header><!-- .entry-footer -->

    <div class="entry-info">
        <div>

            <?php
            $location = get_field( 'location' ); 
            
            if( !empty( $location['address'] ) ) :
                $address = $location['address'];
                $address = explode(', ', $address);
                array_pop( $address );
                $num = array(0,1,2,3,4,5,6,7,8,9);
                $address[1] = str_replace($num, '', $address[1]);
                $address = implode('', $address);
            endif; 

            if( get_post_type_object('meets') ) : ?>

                <h5 class="category">Typ av event:</h5>
                <p><?php echo get_post_type_object('meets')->labels->singular_name; ?></p>

                <h5 class="date">När:</h5>
                <p>Kl. <?php the_field( 'time' ); ?>, <?php the_field( 'date' ); ?></p>

                <?php
                if( $address ) : ?>
                    <h5>Var:</h5>
                    <p><?php echo $address ?></p>
                <?php
                endif;
                
            endif;

            if( get_the_excerpt() ) : ?>
                <h5>Info:</h5>
                <?php the_content(); ?>
            <?php
            endif; ?>

        </div>
        <div>
            <img src="<?php if( get_the_post_thumbnail_url() ) : the_post_thumbnail_url(); else: echo get_stylesheet_directory() . '/dist/img/image.png'; endif; ?>" alt="Post image">            
        </div>
    </div>

    <?php
    if( !empty($location) ): ?>

        <h4>Karta:</h4>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>

    <?php
    endif;

    $images = get_field('images');

    if( $images ): ?>

        <h4>Bilder:</h4>
        <ul>
            <?php foreach( $images as $image ): ?>
                <li>
                    <a target="_blank" href="<?php echo $image['url']; ?>">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php
    endif; ?>

</article>