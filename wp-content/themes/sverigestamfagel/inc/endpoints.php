<?php
add_action('rest_api_init', function () {
	register_rest_route('api/v1', '/members', array(
		'methods' => 'GET',
		'callback' => 'get_subscriber_emails',
	));
});

function get_subscriber_emails()
{
	if (isset($_GET['token']) && $_GET['token'] === 'hbkNs1dJ5XzMZi3eFv0jR4TW4wdgNm9F') {
		$return = [];

		$args = [
			'role' => 'Subscriber'
		];

		$users = new WP_User_Query($args);

		foreach ($users->results as $user) {
			$number = get_field('number', 'user_' . $user->data->ID);

			if ($number) {
				$return[] = $user->data->user_email;
			}
		}

		return $return;
	} else {
		return 'Missing token';
	}
}
