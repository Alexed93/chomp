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
function chomp_get_restaurants($excludes = [], $text ) {
    // Define arguments for query.
    $args = array(
        'post_type' => 'restaurant',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'post__not_in'   => $excludes,
        'offset' => 0,
        's' => $text,
    );

    $offset = isset( $_GET["offset"] ) ? sanitize_text_field( $_GET["offset"] ) : 0;
    if ( $offset ) {
        $args['offset'] = $offset;
    }
    return new WP_Query( $args );
}

/**
 * $. Setters
 ******************************************************************************/
