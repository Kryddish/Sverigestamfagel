<?php
add_filter('wpcf7_validate_text*', function ($result, $tag) {
	if ('your-name' == $tag->name) {
		preg_match('/[^ ]{2,} *( {1,}[^ ]{2,}){1,}/', $_POST['your-name'], $matches);

		if (!$matches) {
			$result->invalidate($tag, "Ange hela ditt namn.");
		}
	}

	return $result;
}, 20, 2);
