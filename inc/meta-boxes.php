<?php

/**
 * Ankeiler
 */
add_action( 'add_meta_boxes', 'pronamic_add_ankeiler_box' );
add_action( 'save_post', 'pronamic_save_ankeiler' );

/* Add ankeiler metabox */
function pronamic_add_ankeiler_box() {
    add_meta_box( 
        'pronamic_ankeiler',
        __( 'Ankeiler', 'pronamic' ),
        'pronamic_ankeiler_box',
        'post' ,
        'side' ,
        'high'
    );

    add_meta_box( 
        'pronamic_ankeiler',
        __( 'Ankeiler', 'pronamic' ),
        'pronamic_ankeiler_box',
        'opinion' ,
        'side' ,
        'high'
    );
}

/* Print ankeiler metabox */
function pronamic_ankeiler_box( $post ) {
	echo '<div>';
	echo '<input type="text" id="ankeiler" name="ankeiler" value="' . get_post_meta( $post->ID, '_ankeiler', true ) . '" size="25" />';
	echo '</div>';
}

/* Save ankeiler metabox */
function pronamic_save_ankeiler( $post_id ) {
	global $post;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
      
    if ( isset ( $_POST['ankeiler'] ) ) {
		update_post_meta( $post->ID, '_ankeiler', $_POST['ankeiler'] );
	}
}

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
function pronamic_video_box($post) {
	$videoUrl = get_post_meta( $post->ID, '_video', true );
	$videoEmbedCode = get_post_meta( $post->ID, '_video_embed_code', true );

	?>
	<p>
		<label for="video"><?php _e( 'Video URL:', 'horses' ); ?></label>

		<input type="text" id="video" name="video" value="<?php echo esc_attr( $videoUrl ); ?>" size="42" />
	</p>

	<p>
		<label for="video_embed_code"><?php _e( 'Video Embed Code (optional):', 'horses' ); ?></label>

		<textarea id="video_embed_code" name="video_embed_code" cols="40" rows="10"><?php echo esc_textarea( $videoEmbedCode ); ?></textarea>
	</p>
	<?php
}

/* Save video metabox */
function pronamic_save_video( $post_id ) {
	global $post;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) 
      return;
      
    if ( isset($_POST['video'] ) ) {
		update_post_meta( $post->ID, '_video', $_POST['video'] );
	}
      
    if( isset( $_POST['video_embed_code'] ) ) {
		update_post_meta( $post->ID, '_video_embed_code', $_POST['video_embed_code'] );
	}
}