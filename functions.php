<?php

/**
 * Theme includes
 */
require_once get_template_directory() . '/includes/post.php';
require_once get_template_directory() . '/includes/template.php';
require_once get_template_directory() . '/includes/widgets.php';
require_once get_template_directory() . '/includes/admin.php';
// require_once get_template_directory() . '/includes/options.php';
// require_once get_template_directory() . '/includes/meta-boxes.php';
// require_once get_template_directory() . '/includes/shortcodes.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 620;
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
		'primary' => __( 'Primary Menu', 'pronamic' ),
		'utility' => __( 'Utility Menu', 'pronamic' )
	) );

	/* Add image sizes */
	add_image_size( 'featured', 620, 480, true );
}
add_action( 'after_setup_theme', 'pronamic_setup' );

/**
 * Enqueue scripts & styles
 */
function pronamic_load_scripts() {
	/*

	wp_enqueue_script( 
		'jquery-plugin', 
		get_bloginfo( 'template_directory' ) . '/js/jquery.plugin.js', 
		array( 'jquery' )
	);

	wp_enqueue_script( 
		'jquery-config', 
		get_bloginfo( 'template_directory' ) . '/js/jquery.config.js', 
		array( 'jquery', 'jquery-plugin' )
	);

	wp_enqueue_style( 
		'plugin-style',
		get_bloginfo( 'template_directory' ) . '/css/plugin.css'
	);


	*/
}
add_action( 'wp_enqueue_scripts', 'pronamic_load_scripts' );

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
    		'selector' => 'p, h1, h2, h3, h4, h5, h6',
    		'classes'  => 'lead'
    	)
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
add_filter( 'tiny_mce_before_init', 'pronamic_set_mce_formats' );

/**
 * Fix shortcode output
 */
function stormmc_shortcode_empty_paragraph_fix( $content ) {   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr( $content, $array );

	return $content;
}
add_filter( 'the_content', 'stormmc_shortcode_empty_paragraph_fix' );