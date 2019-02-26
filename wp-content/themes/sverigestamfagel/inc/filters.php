<?php
// Add shortcode functionality to ACF fields
add_filter('acf/format_value/type=textarea', 'do_shortcode', 10, 3);

// Change default page template label
add_filter('default_page_template_title', function() {
    return __('Artikelsida', 'stf');
});
