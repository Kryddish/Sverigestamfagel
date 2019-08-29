<?php
// Add shortcode functionality to ACF fields
add_filter('acf/format_value/type=textarea', 'do_shortcode', 10, 3);

// Change default page template label
add_filter('default_page_template_title', function() {
    return __('Artikelsida', 'stf');
});

// add_filter( 'wp_nav_menu_objects', function($items) {
//     $parents = array();

//     foreach ( $items as $item ) {
//         if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
//             $parents[] = $item->menu_item_parent;
//         }
//     }

//     foreach ( $items as $item ) {
//         if ( in_array( $item->ID, $parents ) ) {
//             $item->title .= ' <i class="icon-angle-down" />';
//         }
//     }

//     return $items;
// });
