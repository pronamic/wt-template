<?php

/**
 * Initialize the custom post types and taxonomies
 */
function pronamic_init() {
	/*

	// Register post type
	register_post_type( 'client', array( 
		'labels' => array( 
			'name'               => _x( 'Clients', 'post type general name', 'pronamic' ) , 
			'singular_name'      => _x( 'Client', 'post type singular name', 'pronamic' ) , 
			'add_new'            => _x( 'Add New', 'client', 'pronamic' ) , 
			'add_new_item'       => __( 'Add New Client', 'pronamic' ) , 
			'edit_item'          => __( 'Edit Client', 'pronamic' ) , 
			'new_item'           => __( 'New Client', 'pronamic' ) , 
			'view_item'          => __( 'View Client', 'pronamic' ) , 
			'search_items'       => __( 'Search Clients', 'pronamic' ) , 
			'not_found'          =>  __( 'No clients found', 'pronamic' ) , 
			'not_found_in_trash' => __( 'No clients found in Trash', 'pronamic' ) ,  
			'parent_item_colon'  => __( 'Parent Client:', 'pronamic' ) , 
			'menu_name'          => __( 'Clients',  'pronamic' )
		) , 
		'public' => true , 
		'publicly_queryable' => true , 
		'show_ui' => true ,  
		'show_in_menu' => true ,  
		'capability_type' => 'page' , 
		'has_archive' => true , 
		'rewrite' => array( 'slug' => 'klanten' ) ,
		'menu_icon' => get_bloginfo( 'template_url' ) . '/admin/icons/client.png' ,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ) 
	) );

	// Register taxonomy
	register_taxonomy( 'region', 'client', array(  
		'hierarchical' => true , 
		'labels' => array( 
			'name'              => _x( 'Specialisms', 'class general name', 'pronamic' ) , 
			'singular_name'     => _x( 'Specialism', 'class singular name', 'pronamic' ) , 
			'search_items'      => __( 'Search Specialisms', 'pronamic' ) , 
			'all_items'         => __( 'All Specialisms', 'pronamic' ) , 
			'parent_item'       => __( 'Parent Specialisms', 'pronamic' ) , 
			'parent_item_colon' => __( 'Parent Specialism:', 'pronamic' ) , 
			'edit_item'         => __( 'Edit Specialism', 'pronamic' ) ,  
			'update_item'       => __( 'Update Specialism', 'pronamic' ) , 
			'add_new_item'      => __( 'Add New Specialism', 'pronamic' ) , 
			'new_item_name'     => __( 'New Specialism Name', 'pronamic' ) , 
			'menu_name'         => __( 'Specialisms', 'pronamic' ) 
		) , 
		'show_ui' => true , 
		'query_var' => true , 
		'rewrite' => array( 'slug' => 'regio' ) 
	) );

	*/
}
add_action( 'init', 'pronamic_init' );