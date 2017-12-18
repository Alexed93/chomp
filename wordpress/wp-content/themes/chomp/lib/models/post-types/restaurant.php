<?php

/**
 *******************************************************************************
 * Public Restaurant
 *******************************************************************************
 *
 * This is an Restaurant post type which you can use as a baseline for your
 * project's needs. The idea of a `public` post type is one which a user
 * would navigate to through permalinks, rather than something you'd just
 * integrate onto your website via queries.
 *
 */



function chomp_restaurants () {
    register_post_type(
        'restaurant',
        array(
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'restaurant',
            'map_meta_cap' => true,
            'capabilities' => array(
                'edit_posts' => 'edit_restaurants',
                'read_private_posts' => 'read_private_restaurants',
                'edit_post' => 'edit_restaurant',
                'read_post' => 'read_restaurant',
            ),
            'hierarchical' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-carrot',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'Restaurants', 'with_front' => false ),
            'supports' => array( 'title', 'page-attributes', 'editor', 'excerpt', 'revisions' ),
            'labels' => array(
                'name' => __( 'Restaurants' ),
                'singular_name' => __( 'restaurant' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add new restaurant' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit restaurant' ),
                'new_item' => __( 'New restaurant' ),
                'view' => __( 'View' ),
                'view_item' => __( 'View restaurant' ),
                'search_items' => __( 'Search restaurants' ),
                'not_found' => __( 'No restaurants found' ),
                'not_found_in_trash' => __( 'No restaurants found in Trash' )
            )
        )
    );
}

add_action('init', 'chomp_restaurants');


