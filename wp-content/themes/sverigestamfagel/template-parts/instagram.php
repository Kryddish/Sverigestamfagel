<?php
if( get_field( 'instagram_feed' ) ) :
    $insta_feed = get_field( 'instagram_feed' );

    if( !empty( $insta_feed['hide'] ) ) :
        return;
    endif;
endif; ?>

<section class="instagram-feed">
    <h3><i class="fab fa-instagram"></i> Instagram</h3>
    <div>

        <?php
        if( $insta_feed ) {
            $user = $insta_feed['user'];
        } else {
            $user = 'sverigestamfagelforening';
        }

        $instaResult = file_get_contents('https://www.instagram.com/' . $user . '/?__a=1');

        $insta = json_decode($instaResult, true);
        $images = $insta['graphql']['user']['edge_owner_to_timeline_media']['edges'];

        foreach( $images as $image ) : ?>
            <a
            <?php
            if( $insta_feed['new_window'] ) :
                echo 'target="_blank"';
            endif;
            ?> href="<?php echo 'https://www.instagram.com/p/' . $image['node']['shortcode'] . '/'; ?>"><img src="<?php echo $image['node']['thumbnail_src']; ?>" alt=""></a>
        <?php
        endforeach; ?>

    </div>
</section>
