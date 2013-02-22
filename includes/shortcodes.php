<?php

/**
 * Shortcodes
 */

/* Panel */
function pronamic_panel_shortcode( $atts, $content = null ) {
   return '<div class="panel">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'panel', 'pronamic_panel_shortcode' );

/* Structure */
function pronamic_row( $atts, $content = null ) {
	return '<div class="row">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'row', 'pronamic_row' );

function pronamic_one_columns( $atts, $content = null ) {
	return '<div class="one columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'one', 'pronamic_one_columns' );

function pronamic_two_columns( $atts, $content = null ) {
	return '<div class="two columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'two', 'pronamic_two_columns' );

function pronamic_three_columns( $atts, $content = null ) {
	return '<div class="three columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'three', 'pronamic_three_columns' );

function pronamic_four_columns( $atts, $content = null ) {
	return '<div class="four columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'four', 'pronamic_four_columns' );

function pronamic_five_columns( $atts, $content = null ) {
	return '<div class="five columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'five', 'pronamic_five_columns' );

function pronamic_six_columns( $atts, $content = null ) {
	return '<div class="six columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'six', 'pronamic_six_columns' );

function pronamic_seven_columns( $atts, $content = null ) {
	return '<div class="seven columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'seven', 'pronamic_seven_columns' );

function pronamic_eight_columns( $atts, $content = null ) {
	return '<div class="eight columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'eight', 'pronamic_eight_columns' );

function pronamic_nine_columns( $atts, $content = null ) {
	return '<div class="nine columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'nine', 'pronamic_nine_columns' );

function pronamic_ten_columns( $atts, $content = null ) {
	return '<div class="ten columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'ten', 'pronamic_ten_columns' );

function pronamic_eleven_columns( $atts, $content = null ) {
	return '<div class="eleven columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'eleven', 'pronamic_eleven_columns' );

function pronamic_twelve_columns( $atts, $content = null ) {
	return '<div class="twelve columns">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'twelve', 'pronamic_twelve_columns' );