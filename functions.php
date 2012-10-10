<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 580;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function pronamic_setup() {

	/* Custom template tags for this theme. */
	require( get_template_directory() . '/inc/template-tags.php' );

	/* Make theme available for translation */
	load_theme_textdomain( 'pronamic', get_template_directory() . '/languages' );

	/* Editor style */
	add_editor_style();

	/* Add theme support */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'image', 'video' ) );
	add_theme_support( 'post-thumbnails' );

	/* Register navigation menu's */
	register_nav_menus( array( 
		'primary' => __( 'Primary Menu', 'pronamic' ) ,
		'utility' => __( 'Utility Menu', 'pronamic' )
	) );

	/* Add image sizes */
	add_image_size( 'featured', 500, 300, true );
}
add_action( 'after_setup_theme', 'pronamic_setup' );

/**
 * Unregister default WP Widgets
 */
function pronamic_unregister_wp_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
}
add_action( 'widgets_init', 'pronamic_unregister_wp_widgets', 1 );

/**
 * Register our sidebars and widgetized areas.
 */
function pronamic_widgets_init() {
	register_sidebar( array(  
		'name'          => __( 'Main Widget', 'pronamic' ),
		'id'            => 'main-widget',
		'description'   => __( 'The main widget', 'pronamic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array( 
		'name'          => __( 'Sidebar Widget', 'pronamic' ),
		'id'            => 'sidebar-widget',
		'description'   => __( 'The widget for the sidebar', 'pronamic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
}
add_action('widgets_init', 'pronamic_widgets_init');

/**
 * Enqueue scripts & styles
 */
function pronamic_load_scripts() {
	/*

	wp_enqueue_script( 
		'jquery-fancybox' , 
		get_bloginfo( 'stylesheet_directory' ) . '/fancybox/jquery.fancybox-1.3.4.pack.js' , 
		array('jquery')
	);

	wp_enqueue_style( 
		'fancybox-style' , 
		get_bloginfo( 'stylesheet_directory' ) . '/fancybox/jquery.fancybox-1.3.4.css'
	);

	*/
}
add_action( 'wp_enqueue_scripts', 'pronamic_load_scripts' );

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
			'search_items'      =>  __( 'Search Specialisms', 'pronamic' ) , 
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

/**
 * Sets the post excerpt length.
 */
function pronamic_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'pronamic_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function pronamic_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pronamic' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and pronamic_continue_reading_link().
 */
function pronamic_auto_excerpt_more( $more ) {
	return ' &hellip;' . pronamic_continue_reading_link();
}
add_filter( 'excerpt_more', 'pronamic_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function pronamic_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= pronamic_continue_reading_link();
	}

	return $output;
}
add_filter( 'get_the_excerpt', 'pronamic_custom_excerpt_more' );