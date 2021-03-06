<?php

/**
 *******************************************************************************
 * Helpers
 *******************************************************************************
 *
 * Helper functions which makes life easier and remove any unnecessary
 * repetition.
 *
 * $. Conditionals
 *
 */



/**
 * Conditionals
 ******************************************************************************/

/**
 * Check whether a given page is an ancestor of another
 *
 * @param  int   $id  The ID of the parent post
 * @return bool       simple true/false
 */
function is_tree($pid) {
    global $post;
    if( is_page() && ($post->post_parent==$pid || is_page($pid)) ):
        return true;
    else:
        return false;
    endif;
};


/**
 * Other
 ******************************************************************************/

/**
 * Get a post's excerpt by its ID
 *
 * @param  int     $id  The ID of the post
 * @return string       The post's excerpt
 */
function chomp_get_excerpt_by_id ( $id ) {

    // Get current post
    $page = get_post($id);

    // Get it's excerpt
    $excerpt = $page->post_excerpt;

    // Return the excerpt
    return $excerpt;
}

/**
 * Get a post's ACF image, with specific dimension
 *
 * @param  string  $key   The ACF key for the image
 * @param string   $size  The image size, based on add_image_size();
 * @param  int     $id    The ID of the post
 *
 * @return string         The full URL of the given ACF image
 */
function chomp_get_acf_image_url($key = 'image', $size = 'full', $id = '') {

    if( $id == '' ):
        global $post;
        $id = $post->ID;
    endif;

    // default output false
    $output = '';

    // get ACF field
    $image = get_field($key, $id);

    // if field is present
    if( !empty($image) ):
        $output = !empty($image['sizes'][$size]) ? $image['sizes'][$size] : $image['url'];
    else:
        $output = false;
    endif;

    return $output;
}

/**
 * Adding a cache busting parameter of the theme's current
 * version to the end of a file.
 *
 * @param   string  $url  The URL of the file to modify
 * @return  string  The updated file URL
 */
function chomp_file_cache_busting ($url) {
	// Get theme info
	$theme = wp_get_theme();
	$theme_version = $theme->get('Version');

	$output = $url . '?ver=' . $theme_version;

	return $output;
}



/**
 * Hide categories taxonomy for restaurants CPT
 *
*/

function chomp_unregister_tags() {
    unregister_taxonomy_for_object_type( 'category', 'restaurant' );
}
add_action( 'init', 'chomp_unregister_tags' );



 /**
  * Add API key for Google Map
  *
 */

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyC2P8-neUAbMuvh0X-FOFo3NkZmgw-PFRo';
return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



/**
    * Create properly formatted tel: links
    * $input = <p>(01423) 598 008</p>
    * $output = 01423598008
*/

function chomp_format_tel($text){
    $exp = "/[^0-9]/";
    $text = preg_replace($exp, '', strip_tags($text));
    return $text;
}



/**
    * Get total amount of posts found
*/

function chomp_total_posts($query) {
    return $query->found_posts;
}




/**
    * Try tidy the URL for checkbox term thing
*/
function chomp_format_search($text){
    $exp = "/[%5B]/";
    $text = preg_replace($exp, '', strip_tags($text));
    return $text;
}

