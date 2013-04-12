<?php

/**
 * Initialize the custom post types and taxonomies
 */
function pronamic_init() {
	add_post_type_support( 'page', 'excerpt' );

	/*

	// Register post type
	register_post_type( 'slide', array( 
		'labels' => array( 
			'name'               => _x( 'Slides', 'post type general name', 'pronamic' ), 
			'singular_name'      => _x( 'Slide', 'post type singular name', 'pronamic' ), 
			'add_new'            => _x( 'Add New', 'slide', 'pronamic' ), 
			'add_new_item'       => __( 'Add New Slide', 'pronamic' ), 
			'edit_item'          => __( 'Edit Slide', 'pronamic' ), 
			'new_item'           => __( 'New Slide', 'pronamic' ), 
			'view_item'          => __( 'View Slide', 'pronamic' ), 
			'search_items'       => __( 'Search Slides', 'pronamic' ), 
			'not_found'          => __( 'No slides found', 'pronamic' ), 
			'not_found_in_trash' => __( 'No slides found in Trash', 'pronamic' ),  
			'parent_item_colon'  => __( 'Parent Slide:', 'pronamic' ), 
			'menu_name'          => __( 'Slides',  'pronamic' )
		) , 
		'public'                 => true, 
		'publicly_queryable'     => true, 
		'show_ui'                => true,  
		'show_in_menu'           => true,  
		'capability_type'        => 'post', 
		'has_archive'            => true, 
		'rewrite'                => array( 'slug' => 'klanten' ),
		'menu_icon'              => get_bloginfo( 'template_url' ) . '/admin/icons/client.png',
		'supports'               => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ) 
	) );

	// Register taxonomy
	register_taxonomy( 'region', 'slide', array(  
		'hierarchical' => true , 
		'labels' => array( 
			'name'              => _x( 'Specialisms', 'class general name', 'pronamic' ), 
			'singular_name'     => _x( 'Specialism', 'class singular name', 'pronamic' ), 
			'search_items'      => __( 'Search Specialisms', 'pronamic' ), 
			'all_items'         => __( 'All Specialisms', 'pronamic' ), 
			'parent_item'       => __( 'Parent Specialisms', 'pronamic' ), 
			'parent_item_colon' => __( 'Parent Specialism:', 'pronamic' ), 
			'edit_item'         => __( 'Edit Specialism', 'pronamic' ),  
			'update_item'       => __( 'Update Specialism', 'pronamic' ), 
			'add_new_item'      => __( 'Add New Specialism', 'pronamic' ), 
			'new_item_name'     => __( 'New Specialism Name', 'pronamic' ), 
			'menu_name'         => __( 'Specialisms', 'pronamic' ) 
		) , 
		'show_ui' => true , 
		'query_var' => true , 
		'rewrite' => array( 'slug' => 'regio' ) 
	) );
	
	register_taxonomy_for_object_type( 'post_tag', 'page' );

	*/
}
add_action( 'init', 'pronamic_init' );