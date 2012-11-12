<?php

/**
 * Video
 */
add_action( 'add_meta_boxes', 'pronamic_add_video_box' );
add_action( 'save_post', 'pronamic_save_video' );

/* Add video metabox */
function pronamic_add_video_box() {
    add_meta_box(  
        'pronamic_video',
        __( 'Video', 'pronamic' ),
        'pronamic_video_box',
        'video' ,
        'side' ,
        'high'
    );
}

/* Print video metabox */
function pronamic_video_box( $post ) {

	wp_nonce_field( 'pronamic_save_video_box_nonce', 'pronamic_video_box_nonce' );

	?>

	<p>
		<label for="video"><?php _e( 'Video:', 'pronamic' ); ?></label>

		<input type="text" id="video" name="video" value="<?php echo esc_attr( get_post_meta( $post->ID, '_video', true ) ); ?>" size="42" />
	</p>

	<?php
}

/* Save video metabox */
function pronamic_save_video( $post_id ) {
	global $post;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) 
    	return;

	if ( ! isset( $_POST['pronamic_video_box_nonce'] ) || ! wp_verify_nonce( $_POST['pronamic_video_box_nonce'], 'pronamic_save_video_box_nonce' ) ) 
		return;

	if ( ! current_user_can( 'edit_post' ) ) 
		return;

	/* Save */
    if ( isset($_POST['video'] ) ) {
		update_post_meta( $post->ID, '_video', $_POST['video'] );
	}
}