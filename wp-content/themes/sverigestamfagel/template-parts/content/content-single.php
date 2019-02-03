<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stf
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h3 class="title"><?php the_title(); ?></h3>
        <h5 class="category">

            <?php
            $categories = get_the_category();

            foreach($categories as $category) :
                if( reset($categories) === $category) {
                    echo $category->name;
                } else {
                    echo ', ' . $category->name;
                }
            endforeach; ?>

        </h5>
    </header><!-- .entry-footer -->
    <div class="entry">

            <?php
            if( get_the_post_thumbnail_url() ) : ?>
                <div class="image">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="Post image">
                </div>
            <?php
            else:
                $images = get_field('images');

                if( $images ): ?>
                    <div class="image">
                        <img src="<?php echo $images[0]['url']; ?>" alt="Post image">
                    </div>
                <?php
                endif;

            endif; ?>

        <div class="event">

            <?php
            if( get_field( 'time' ) || get_field( 'date' ) || get_field( 'location' ) ) : ?>

                <div class="text">

                    <?php
                    $location = get_field( 'location' );

                    if( get_post_type_object('meets') ) :
                        if( get_field( 'time' ) || get_field( 'date' ) ) : ?>

                            <h5 class="date">När:</h5>
                            <p>

                                <?php
                                if( get_field( 'time' ) ) : ?>
                                    Kl. <?php the_field( 'time' ); ?><br>
                                <?php
                                endif;
                                if( get_field( 'date' ) ) :
                                    the_field( 'date' );
                                endif; ?>

                            </p>

                        <?php
                        endif;

                        if( !empty( $location['address'] ) ) : ?>
                            <h5>Var:</h5>
                            <p><?php echo $location['address'] ?></p>
                        <?php
                        endif;

                    endif; ?>

                </div>

            <?php
            endif; ?>

            <div class="info">
                <?php
                if( get_the_excerpt() ) : ?>


                        <?php the_content(); ?>


                <?php
                else : ?>

                    <h5>
                        <?php _e('Inget innehåll hittades.', 'stf'); ?>
                    </h5>
                <?php
                endif; ?>
            </div>
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
                        <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						<div class="caption">
							<span><?= $image['caption'] ?></span>
						</div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php
    endif; ?>

</article>
