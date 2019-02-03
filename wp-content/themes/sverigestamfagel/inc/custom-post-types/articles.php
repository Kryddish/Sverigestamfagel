<?php
$labels = array(
    'name'                  => _x( 'Artiklar', 'Post Type General Name', 'stf' ),
    'singular_name'         => _x( 'Artikel', 'Post Type Singular Name', 'stf' ),
    'menu_name'             => __( 'Artiklar', 'stf' ),
    'name_admin_bar'        => __( 'Artiklar', 'stf' ),
    'all_items'             => __( 'Alla Artiklar', 'stf' ),
    'add_new_item'          => __( 'Skapa ny Artikel', 'stf' ),
    'add_new'               => __( 'Skapa ny', 'stf' ),
    'new_item'              => __( 'Ny Artikel', 'stf' ),
    'edit_item'             => __( 'Redigera Artikel', 'stf' ),
    'update_item'           => __( 'Uppdatera Artikel', 'stf' ),
    'view_item'             => __( 'Visa Artikel', 'stf' ),
	'view_items'            => __( 'Visa Artiklar', 'stf' ),
	'search_items'          => __( 'Sök Artiklar', 'stf' ),
);
$args = array(
    'label'                 => __( 'Artiklar', 'stf' ),
    'description'           => __( 'Post Type Description', 'stf' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    'taxonomies'            => array( 'category', 'post_tag' ),
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
    'rest_base'             => 'articles',
    'menu_icon'				=> 'dashicons-welcome-write-blog'
);
register_post_type( 'articles', $args );
