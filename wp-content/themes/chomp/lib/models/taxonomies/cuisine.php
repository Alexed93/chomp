<?php

/**
 *******************************************************************************
 * Cuisine
 *******************************************************************************
 *
 * This is an Cuisine taxonomy which you can use as a baseline for your
 * project's needs.
 *
 */



function chomp_taxonomy_cuisine () {
    register_taxonomy(
        'cuisine',
        array( 'restaurant' ),
        array(
            'labels' => array(
                'name' => __( 'Cuisines' ),
                'singular_name' => __( 'Cuisine' ),
                'search_items' => __( 'Search Cuisines' ),
                'popular_items' => __( 'Popular Cuisines' ),
                'all_items' => __( 'All Cuisines' ),
                'parent_item' => __( 'Parent Cuisine' ),
                'parent_item_colon' => __( 'Parent Cuisine:' ),
                'edit_item' => __( 'Edit Cuisine' ),
                'update_item' => __( 'Update Cuisine' ),
                'add_new_item' => __( 'Add New Cuisine' ),
                'new_item_name' => __( 'New Cuisine' ),
            ),
            'public' => true,
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'cuisines', 'with_front' => false ),
        )
    );
}

add_action('init', 'chomp_taxonomy_cuisine');
