<?php

/**
 * Condional tag to check if a post has attachments
 */
function pronamic_has_attachment( $post_id ) {
	$args = array( 
		'post_type'   => 'attachment',
		'post_parent' => $post_id
	);

	$attachments = get_posts( $args );

	if ( $attachments )
		return true;
}


///////////////////////////////////////////////


/**
 * Sets custom excerpt length.
 */
function pronamic_excerpt_length( $length ) {
	global $pronamic_excerpt_length;

	if ( isset( $pronamic_excerpt_length ) ) {
		$length = $pronamic_excerpt_length;
	} else {
		$length = 40;
	}

	return $length;
}
add_filter( 'excerpt_length', 'pronamic_excerpt_length' );

/**
 * Adds custom excerpt length
 */
function pronamic_the_excerpt( $length ) {
	global $pronamic_excerpt_length;
	$pronamic_excerpt_length = $length;

	$pronamic_excerpt = get_the_excerpt();

	echo $pronamic_excerpt;

	unset( $pronamic_excerpt_length );
}


///////////////////////////////////////////////


/**
 * Change archive query
 */
function pronamic_client_archive_query( $query ) {
    if ( $query->is_main_query() && $query->is_post_type_archive( 'client' ) ) {
    	$query->set( 'posts_per_page', '20' );
    }
}
add_filter( 'pre_get_posts', 'pronamic_client_archive_query' );


///////////////////////////////////////////////


/**
 * Active archive links
 */
function pronamic_nav_menu_css_class( $classes, $item ) {
	if ( $item->type == 'custom' ) {
		$isAncestor = strncmp( get_permalink(), $item->url, strlen( $item->url ) ) == 0;
		$isHome = untrailingslashit( $item->url ) == home_url();

		if ( $isAncestor && ! $isHome ) {
			$classes[] = 'current-url-ancestor';
		}
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'pronamic_nav_menu_css_class', 10, 2 );


///////////////////////////////////////////////


/**
 * Get blog URL
 */
function pronamic_get_blog_url(){
	if ( $posts_page_id = get_option( 'page_for_posts' ) ) {
		return home_url( get_page_uri( $posts_page_id ) );
	} else {
		return home_url();
	}
}


///////////////////////////////////////////////


/**
 * Only search posts
 */
function pronamic_search_posts( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', 'post' );
    }

    return $query;
}
add_filter( 'pre_get_posts','pronamic_search_posts' );


///////////////////////////////////////////////


/**
 * Contact information
 */
function pronamic_contact_info( $contactmethods ) {
	// Remove methods
	unset( $contactmethods['aim'] );
	unset( $contactmethods['yim'] );
	unset( $contactmethods['jabber'] );

	// Add methods
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['linkedin'] = 'LinkedIn';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'pronamic_contact_info' );


///////////////////////////////////////////////


/**
 * Get root page slug
 */
function pronamic_get_root_page_slug() {
	global $post;
	
	$root_page_id = ( empty( $post->ancestors ) ) ? $post->ID : end ( $post->ancestors );

	$post = get_post( $root_page_id ); 
	$slug = $post->post_name;

	return $slug;
}


///////////////////////////////////////////////


/**
 * Fix shortcode output
 */
function pronamic_shortcode_empty_paragraph_fix( $content ) {   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr( $content, $array );

	return $content;
}
add_filter( 'the_content', 'pronamic_shortcode_empty_paragraph_fix' );


///////////////////////////////////////////////


/**
 * Add attachment link
 */
function pronamic_add_class_attachment_link( $content, $id, $size, $permalink, $icon, $text ) {
	if ( $permalink ) {
		return $content;

	} else {
   		$content = str_replace( '<a', '<a class="fancybox" rel="gallery"', $content );

   		return $content;
   	}
}
add_filter( 'wp_get_attachment_link', 'pronamic_add_class_attachment_link', 10, 6 );