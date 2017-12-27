<?php

/**
 *******************************************************************************
 * Vendors
 *******************************************************************************
 *
 * Any 3rd party plugins or modules that are used should be configured within
 * here, if needs must, a `/lib/config/vendors/` folder should be created.
 *
 * $. Advanced Custom Fields
 * $. Gravity Forms
 *
 */



/**
 * $. Advanced Custom Fields
 ******************************************************************************/

// Add ACF options page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}



/**
 * $. Gravity Forms
 ******************************************************************************/

// Better validation message
function chomp_update_validation_message( $msg, $form ){
    $output  = '<div class="alert alert--error">';
    $output .= '<strong>Error:</strong> Please complete the required fields and try again';
    $output .= '</div>';

    return $output;
}

add_filter( 'gform_validation_message', 'chomp_update_validation_message', 10, 2 );

// Update the Form submit button
function chomp_gforms_submit_button( $btn, $form ){
    $output  = '<button type="submit" class="btn btn--primary" id="gform_submit_button_' . $form['id'] . '">';
    $output .= $form['button']['text'];
    $output .= '</button>';

    return $output;
}

add_filter( 'gform_submit_button', 'chomp_gforms_submit_button', 10, 2 );

function chomp_filter_gform_ip_address( $ip ) {
    return isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['HTTP_CLIENT_IP'];
}

add_filter( 'gform_ip_address', 'chomp_filter_gform_ip_address' );




/**
 * $. TinyMCE editor
 ******************************************************************************/

// Modify TinyMCE editor to remove H1 tags
function chomp_tinymce_specify_formats($init) {
    // Add block format elements you want to show in dropdown
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;';
    return $init;
}

add_filter('tiny_mce_before_init', 'chomp_tinymce_specify_formats' );



/**
 * $. Check for images in ACF field
 ******************************************************************************/
function filterValidACF($fieldPrefix, $fieldCount) {

$items = [];
    for($i = 1; $i <= $fieldCount; $i++) {
        $fieldName = $fieldPrefix . '_' . $i;
        if(!empty(get_field($fieldName))) {
            array_push($items, get_field($fieldName));
        }
    }

    return $items;
}
