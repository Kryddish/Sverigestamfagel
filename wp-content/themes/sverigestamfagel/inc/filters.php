<?php

// Add shortcode functionality to ACF fields
add_filter('acf/format_value', 'do_shortcode', 10, 3);
