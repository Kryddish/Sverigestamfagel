<?php
function custom_post_type() {

	require 'meets.php';
	require 'articles.php';

}
add_action( 'init', 'custom_post_type', 0 );