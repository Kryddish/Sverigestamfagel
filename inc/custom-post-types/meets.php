<?php
$labels = array(
    'name'                  => _x( 'Fågelträffar', 'Post Type General Name', 'sverigestamfagelforening' ),
    'singular_name'         => _x( 'Fågelträff', 'Post Type Singular Name', 'sverigestamfagelforening' ),
    'menu_name'             => __( 'Fågelträffar', 'sverigestamfagelforening' ),
    'name_admin_bar'        => __( 'Fågelträffar', 'sverigestamfagelforening' ),
    'archives'              => __( 'Item Archives', 'sverigestamfagelforening' ),
    'attributes'            => __( 'Item Attributes', 'sverigestamfagelforening' ),
    'parent_item_colon'     => __( 'Parent Item:', 'sverigestamfagelforening' ),
    'all_items'             => __( 'All Items', 'sverigestamfagelforening' ),
    'add_new_item'          => __( 'Add New Item', 'sverigestamfagelforening' ),
    'add_new'               => __( 'Add New', 'sverigestamfagelforening' ),
    'new_item'              => __( 'New Item', 'sverigestamfagelforening' ),
    'edit_item'             => __( 'Edit Item', 'sverigestamfagelforening' ),
    'update_item'           => __( 'Update Item', 'sverigestamfagelforening' ),
    'view_item'             => __( 'View Item', 'sverigestamfagelforening' ),
    'view_items'            => __( 'View Items', 'sverigestamfagelforening' ),
    'search_items'          => __( 'Search Item', 'sverigestamfagelforening' ),
    'not_found'             => __( 'Not found', 'sverigestamfagelforening' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'sverigestamfagelforening' ),
    'featured_image'        => __( 'Featured Image', 'sverigestamfagelforening' ),
    'set_featured_image'    => __( 'Set featured image', 'sverigestamfagelforening' ),
    'remove_featured_image' => __( 'Remove featured image', 'sverigestamfagelforening' ),
    'use_featured_image'    => __( 'Use as featured image', 'sverigestamfagelforening' ),
    'insert_into_item'      => __( 'Insert into item', 'sverigestamfagelforening' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'sverigestamfagelforening' ),
    'items_list'            => __( 'Items list', 'sverigestamfagelforening' ),
    'items_list_navigation' => __( 'Items list navigation', 'sverigestamfagelforening' ),
    'filter_items_list'     => __( 'Filter items list', 'sverigestamfagelforening' ),
);
$args = array(
    'label'                 => __( 'Fågelträff', 'sverigestamfagelforening' ),
    'description'           => __( 'Post Type Description', 'sverigestamfagelforening' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
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
    'menu_icon'				=> 'http://localhost/~max/lightweb/wp-content/uploads/2018/02/meets-icon.png'
);
register_post_type( 'meets', $args );