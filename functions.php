<?php

/**
 * Theme includes
 */
require_once get_template_directory() . '/includes/post.php';
require_once get_template_directory() . '/includes/template.php';
require_once get_template_directory() . '/includes/widgets.php';
require_once get_template_directory() . '/includes/admin.php';

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
	add_image_size( 'featured', 640, 480, true );
}
add_action( 'after_setup_theme', 'pronamic_setup' );

/**
 * Enqueue scripts & styles
 */
function pronamic_load_scripts() {
	/*

	wp_enqueue_script( 
		'jquery-fancybox' , 
		get_bloginfo( 'stylesheet_directory' ) . '/fancybox/jquery.fancybox-1.3.4.pack.js' , 
		array( 'jquery' )
	);

	wp_enqueue_script( 
		'jquery-config' , 
		get_bloginfo( 'stylesheet_directory' ) . '/fancybox/jquery.fancybox-1.3.4.pack.js' , 
		array( 'jquery', 'jquery-fancybox' )
	);

	wp_enqueue_style( 
		'fancybox-style' , 
		get_bloginfo( 'stylesheet_directory' ) . '/fancybox/jquery.fancybox-1.3.4.css'
	);

	*/
}
add_action( 'wp_enqueue_scripts', 'pronamic_load_scripts' );