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
 * Add extra styles to the TinyMCE editor
 */
function pronamic_add_mce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}
add_filter( 'mce_buttons_2', 'pronamic_add_mce_buttons' );

function pronamic_set_mce_formats( $settings ) {
	$settings['theme_advanced_styles'] = "Intro=lead;Meta=meta";

	return $settings;
}
add_filter( 'tiny_mce_before_init', 'pronamic_set_mce_formats' );


///////////////////////////////////////////////


/**
 * Change archive query
 */
function pronamic_candidates_query( $query ) {
    if ( $query->is_main_query() && $query->is_post_type_archive( 'candidate' ) ) {
    	$query->set( 'posts_per_page', '20' );
    }
}
add_filter( 'pre_get_posts', 'pronamic_candidates_query' );


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
 * Filter query
 */
function pronamic_filter_results( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && ! is_admin()  ) {
        $query->set( 'posts_per_page', '10' );

        $filter_provider =  filter_input( INPUT_GET, 'filter_provider', FILTER_SANITIZE_STRING );
        $filter_region =  filter_input( INPUT_GET, 'filter_region', FILTER_SANITIZE_STRING );
        $filter_accommodation =  filter_input( INPUT_GET, 'filter_accommodation', FILTER_SANITIZE_STRING );
        $filter_facility =  filter_input( INPUT_GET, 'filter_facility', FILTER_SANITIZE_STRING );
        $filter_distance =  filter_input( INPUT_GET, 'filter_distance', FILTER_SANITIZE_STRING );

		// Meta query
		$meta_query = array(  'relation' => 'AND' );

		if ( $filter_provider ) {
			$provider_ids = explode( ',', $filter_provider );
			
			foreach($provider_ids as $provider_id) {
				$meta_query[] = array(
					'key'     => '_camping_providers',
					'value'   =>  $provider_id ,
					'compare' => '=',
				);
			}
		} 

		if ( $filter_region ) {
			$region_ids = explode( ',', $filter_region );

			$meta_query[] = array(
				'key'      => '_camping_region',
				'value'    =>  $region_ids ,
				'compare'  => 'IN',
			);
		}

		if ( $filter_distance ) {
			$meta_query[] = array(
				'key'     => '_camping_distance' , 
				'value'   => explode( '-', $filter_distance ) , 
				'type'    => 'numeric' , 
				'compare' => 'BETWEEN'
			);
		}

		$query->set( 'meta_query', $meta_query );

        // Tax query
		$tax_query = array(  'relation' => 'AND' );

		if ( $filter_accommodation ) {
			$tax_query[] = array(
				'taxonomy' => 'accommodation',
				'field'    => 'id',
				'terms'    => explode( ',', $filter_accommodation ) ,
				'operator' => 'IN'
			);
		} 
		
		if ( $filter_facility ) {
			$tax_query[] = array(
				'taxonomy' => 'facility',
				'field'    => 'id',
				'terms'    => explode( ',', $filter_facility ) ,
				'operator' => 'AND'
			);
		}

		$query->set( 'tax_query', $tax_query );
    }
}
add_action( 'pre_get_posts', 'pronamic_filter_results' );


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