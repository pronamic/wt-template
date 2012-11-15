<?php

/**
 * Admin initialize
 */
function pronamic_admin_init() {
	register_setting( 'pronamic', 'pronamic_company_form_id' );
	register_setting( 'pronamic', 'pronamic_login_page_id' );
	register_setting( 'pronamic', 'pronamic_show_author' );
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
			<?php _e( 'Pronamic', 'pronamic' ); ?>
		</h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'pronamic' ); ?>

			<h3>
				<?php _e( 'Input fields', 'pronamic' ); ?>
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
				<?php _e( 'Dropdown', 'pronamic' ); ?>
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

			<h3>
				<?php _e( 'Radio buttons', 'pronamic' ); ?>
			</h3>

			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="pronamic_show_author"><?php _e( 'Show theme developer', 'pronamic' ); ?></label>
					</th>
					<td>
						<input name="pronamic_show_author" type="radio" value="1" <?php checked( get_option( 'pronamic_show_author' ), 1 ); ?> /> <?php _e( 'Yes', 'pronamic' ); ?> <br />
						<input name="pronamic_show_author" type="radio" value="0" <?php checked( get_option( 'pronamic_show_author' ), 0 ); ?>  /> <?php _e( 'No', 'pronamic' ); ?>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>

	<?php
}
