<section class="instagram-feed">
    <h3><span class="fa fa-instagram"></span> Instagram</h3>
    <div>

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
            <a
            <?php
            if( $insta_feed['new_window'] ) :
                echo 'target="_blank"';
            endif;
            ?> href="<?php echo 'https://www.instagram.com/p/' . $image['code'] . '/'; ?>"><img src="<?php echo $image['thumbnail_src']; ?>" alt=""></a>
        <?php
        endforeach; ?>

    </div>
</section>