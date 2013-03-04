<?php

/**
 * Admin menu
 */
function pronamic_admin_menu() {
	add_theme_page( 
		__( 'Pronamic Settings', 'pronamic' ),
		__( 'Pronamic Settings', 'pronamic' ),
		'edit_theme_options',
		'pronamic_settings',
		'pronamic_settings_page_render'
	);
}
add_action( 'admin_menu', 'pronamic_admin_menu' );

/**
 * Admin initialize
 */
function pronamic_admin_init() {
	register_setting( 'pronamic_general_options', 'pronamic_slogan' );
	register_setting( 'pronamic_footer_options', 'pronamic_login_page_id' );
	register_setting( 'pronamic_footer_options', 'pronamic_theme_developer' );
}
add_action( 'admin_init', 'pronamic_admin_init' );

/**
 * Render
 */
function pronamic_settings_page_render() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>

		<h2>
			<?php _e( 'Pronamic Theme Options', 'pronamic' ); ?>
		</h2>

        <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_options'; ?>  
          
        <h2 class="nav-tab-wrapper">  
            <a href="?page=pronamic_settings&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General</a>  
            <a href="?page=pronamic_settings&tab=footer_options" class="nav-tab <?php echo $active_tab == 'footer_options' ? 'nav-tab-active' : ''; ?>">Footer</a>  
        </h2> 

		<form method="post" action="options.php">
			<?php if ( $active_tab == 'general_options' ) : ?>
			
				<?php settings_fields( 'pronamic_general_options' ); ?>
			
				<h3>
					<?php _e( 'Input fields', 'pronamic' ); ?>
				</h3>
	
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<label for="pronamic_slogan"><?php _e( 'Slogan', 'pronamic' ); ?></label>
						</th>
						<td>
							<input id="pronamic_slogan" name="pronamic_slogan" type="text" value="<?php echo get_option( 'pronamic_slogan', '' ); ?>" class="regular-text" />
						</td>
					</tr>
				</table>
			
			<?php else : ?>
				
				<?php settings_fields( 'pronamic_footer_options' ); ?>
				
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
								'name'             => 'pronamic_login_page_id', 
								'selected'         => get_option( 'pronamic_login_page_id', '' ),  
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
							<label for="pronamic_theme_developer"><?php _e( 'Show theme developer', 'pronamic' ); ?></label>
						</th>
						<td>
							<input name="pronamic_theme_developer" type="radio" value="1" <?php checked( get_option( 'pronamic_theme_developer' ), 1 ); ?> /> <?php _e( 'Yes', 'pronamic' ); ?> 
							<input name="pronamic_theme_developer" type="radio" value="0" <?php checked( get_option( 'pronamic_theme_developer' ), 0 ); ?>  /> <?php _e( 'No', 'pronamic' ); ?>
						</td>
					</tr>
				</table>
			
			<?php endif; ?>

			<?php submit_button(); ?>
		</form>
	</div>

	<?php
}