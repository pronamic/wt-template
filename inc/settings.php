<?php

/**
 * Admin initialize
 */
function pronamic_admin_init() {
	register_setting( 'pronamic', 'pronamic_company_form_id' );
	register_setting( 'pronamic', 'pronamic_login_page_id' );
}

add_action( 'admin_init', 'pronamic_admin_init' );

/**
 * Admin menu
 */
function pronamic_admin_menu() {
	add_theme_page( 
		__( 'Pronamic', 'pronamic' ) , // Page Title 
		__( 'Pronamic', 'pronamic' ) , // Menu Title
		'edit_theme_options' , // Capability
		'pronamic_settings' , // Menu Slug
		'pronamic_settings_page_render' // Function
	);
}

add_action( 'admin_menu', 'pronamic_admin_menu' );

/**
 * Render
 */
function pronamic_settings_page_render() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>

		<h2>
			<?php _e( 'pronamic', 'pronamic' ); ?>
		</h2>

		<form method="post" action="options.php">
			<?php 

			// @doc http://codex.wordpress.org/Function_Reference/settings_fields
			settings_fields( 'pronamic' ); 

			?>

			<h3>
				<?php _e( 'Forms', 'pronamic' ); ?>
			</h3>

			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="pronamic_company_form_id"><?php _e( 'Company Form ID', 'pronamic' ); ?></label>
					</th>
					<td>
						<input id="pronamic_company_form_id" name="pronamic_company_form_id" type="text" value="<?php echo get_option( 'pronamic_company_form_id', '' ); ?>" class="regular-text" />
					</td>
				</tr>
			</table>

			<h3>
				<?php _e( 'Pages', 'pronamic' ); ?>
			</h3>

			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="pronamic_login_page_id"><?php _e( 'Login Page', 'pronamic' ); ?></label>
					</th>
					<td>
						<?php 

						wp_dropdown_pages( array( 
							'name' => 'pronamic_login_page_id' , 
							'selected' => get_option( 'pronamic_login_page_id', '' ) ,  
							'show_option_none' => __( '&mdash; Select a page &mdash;', 'pronamic' ) 
						) ); 

						?>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>

	<?php
}
