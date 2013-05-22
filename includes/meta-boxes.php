<?php

/**
 * Add meta boxes
 */
function pronamic_add_meta_boxes() {
    add_meta_box(  
        'pronamic_video',
        __( 'Video', 'pronamic' ),
        'pronamic_video_box',
        'video',
        'normal',
        'high'
    );
}

add_action( 'add_meta_boxes', 'pronamic_add_meta_boxes' );

/**
 * Print video metabox
 */
function pronamic_video_box( $post ) {
	wp_nonce_field( 'pronamic_save_video_box_nonce', 'pronamic_video_box_nonce' );

	?>

	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="video_title">
						<?php _e( 'Title', 'pronamic' ); ?>
					</label>
				</th>
				<td>
					<input id="video_title" name="_video_title" value="<?php echo esc_attr( get_post_meta( $post->ID, '_video_title', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="video_url">
						<?php _e( 'URL', 'pronamic' ); ?>
					</label>
				</th>
				<td>
					<input id="video_url" name="_video_url" value="<?php echo esc_attr( get_post_meta( $post->ID, '_video_url', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
		</tbody>
	</table>

	<?php
}

/**
 * Save video metabox
 */
function pronamic_save_video( $post_id, $post ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) 
    	return;

	if ( ! isset( $_POST['pronamic_video_box_nonce'] ) || ! wp_verify_nonce( $_POST['pronamic_video_box_nonce'], 'pronamic_save_video_box_nonce' ) ) 
		return;

	if ( ! current_user_can( 'edit_post' ) ) 
		return;

	// Save data
	$data = filter_input_array( INPUT_POST, array( 
		'_video_url'       => FILTER_SANITIZE_STRING,
		'_video_title'     => FILTER_SANITIZE_STRING
	) );

	foreach ( $data as $key => $value ) {
		if ( empty( $value ) ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $value );
		}
	}
}

add_action( 'save_post', 'pronamic_save_video', 10, 2 );