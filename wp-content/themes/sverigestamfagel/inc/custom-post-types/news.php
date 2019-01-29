<?php
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Nyheter';
    $submenu['edit.php'][5][0] = 'Nyheter';
    $submenu['edit.php'][10][0] = 'Lägg till Nyhet';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Nyheter';
    $labels->singular_name = 'Nyhet';
    $labels->add_new = 'Lägg till Nyhet';
    $labels->add_new_item = 'Lägg till Nyhet';
    $labels->edit_item = 'Ändra Nyhet';
    $labels->new_item = 'Nyhet';
    $labels->view_item = 'View Nyhet';
    $labels->search_items = 'Sök Nyheter';
    $labels->not_found = 'Inga nyheter hittade';
    $labels->not_found_in_trash = 'Inga nyheter hittade i Papperskorgen';
    $labels->all_items = 'Alla Nyheter';
    $labels->menu_name = 'Nyheter';
    $labels->name_admin_bar = 'Nyheter';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
