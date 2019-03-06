<?php
$labels = array(
    'name'                  => _x( 'Fågelträffar', 'Post Type General Name', 'stf' ),
    'singular_name'         => _x( 'Fågelträff', 'Post Type Singular Name', 'stf' ),
    'menu_name'             => __( 'Fågelträffar', 'stf' ),
    'name_admin_bar'        => __( 'Fågelträff', 'stf' ),
    'all_items'             => __( 'All Fågelträffar', 'stf' ),
    'add_new_item'          => __( 'Skapa ny Fågelträff', 'stf' ),
    'add_new'               => __( 'Skapa ny', 'stf' ),
    'new_item'              => __( 'Skapa Fågelträff', 'stf' ),
    'edit_item'             => __( 'Ändra Fågelträff', 'stf' ),
    'update_item'           => __( 'Uppdatera Fågelträff', 'stf' ),
    'view_item'             => __( 'Visa Fågelträff', 'stf' ),
    'view_items'            => __( 'Visa Fågelträffar', 'stf' ),
    'search_items'          => __( 'Sök Fågelträffar', 'stf' ),
);
$args = array(
    'label'                 => __( 'Fågelträff', 'stf' ),
    'description'           => __( 'Post Type Description', 'stf' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    'taxonomies'            => array(),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
    'rest_base'             => 'meets',
    'menu_icon'				=> 'dashicons-twitter'
);
register_post_type( 'meets', $args );
