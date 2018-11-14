<?php
// Add shortcode functionality to ACF fields
add_filter('acf/format_value/type=textarea', 'do_shortcode', 10, 3);
