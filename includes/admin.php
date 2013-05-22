<?php

/**
 * Remove dashboard metaboxes
 */
function pronamic_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'pronamic_remove_dashboard_widgets' );

/**
 * Add extra styles to the TinyMCE editor
 */
function pronamic_add_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}
add_filter( 'mce_buttons_2', 'pronamic_add_mce_buttons' );

function pronamic_set_mce_formats( $settings ) {
    $style_formats = array(
    	array(
    		'title'    => 'Button',
    		'selector' => 'a',
    		'classes'  => 'btn'
    	),
    	array(
    		'title'    => 'Button important',
    		'selector' => 'a',
    		'classes'  => 'btn alt'
    	),
    	array(
    		'title'    => 'Intro',
    		'selector' => 'p',
    		'classes'  => 'lead'
    	)
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
add_filter( 'tiny_mce_before_init', 'pronamic_set_mce_formats' );

function pronamic_custom_image_sizes_dropdown( $sizes ) {
	global $_wp_additional_image_sizes;
	
	if ( empty( $_wp_additional_image_sizes ) )
		return $sizes;
	
	foreach ( $_wp_additional_image_sizes as $id => $meta ) {
		if ( ! isset( $sizes[ $id ] ) )
			$sizes[ $id ] = ucfirst( str_replace( '-', ' ', $id ) );
	}
	
	return $sizes;
}

add_filter( 'image_size_names_choose', 'pronamic_custom_image_sizes_dropdown' );