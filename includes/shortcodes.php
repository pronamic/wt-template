<?php

/**
 * Shortcodes
 */

function pronamic_featured_shortcode( $atts, $content = null ) {
   return '<div class="featured">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'featured', 'pronamic_featured_shortcode' );