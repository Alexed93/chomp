<?php
/**
 *******************************************************************************
 * Post type queries: restaurants
 *******************************************************************************
 *
 * A set of functions to access the restaurants post type results.
 *
 * $. Getters
 * $. Setters
 *
 */
/**
 * $. Getters
 ******************************************************************************/
/**
 * Get restaurants.
 *
 * @param  int     $count   Number of posts you'd like to bring through.
 * @return object           WP_Query instance
 */
function chomp_get_restaurants ($count = -1, $orderby = 'menu_order', $order = 'ASC', $excludes = [] ) {
    // Define arguments for query.
    $args = array(
        'post_type'      => 'restaurant',
        'posts_per_page' => $count,
        'orderby'        => $orderby,
        'order'          => $order,
        'post__not_in'   => $excludes
    );
    // Create new instance of WP_Query class.
    $output = new WP_Query( $args );
    // Return the results
    return $output;
}
/**
 * $. Setters
 ******************************************************************************/
