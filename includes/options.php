<?php

/**
 * Admin menu
 */
function pronamic_admin_menu() {
	add_theme_page( 
		__( 'Theme Options', 'pronamic' ),
		__( 'Theme Options', 'pronamic' ),
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
	// add_settings_section( id, title, callback, page );
	// add_settings_field( id, title, callback, page, section, args );

	/**
	 * Tab 1
	 */

	// Settings Section - Texts
	add_settings_section(
		'pronamic_settings_texts',
		__( 'Texts', 'pronamic' ),
		'__return_false',
		'pronamic_settings_general'
	);

	add_settings_field(
		'pronamic_text',
		__( 'Text', 'pronamic' ),
		'pronamic_field_input_text',
		'pronamic_settings_general',
		'pronamic_settings_texts',
		array( 'label_for' => 'pronamic_text' )
	);

	// Settings Section - Pages
	add_settings_section(
		'pronamic_settings_pages',
		__( 'Pages', 'pronamic' ),
		'__return_false',
		'pronamic_settings_general'
	);

	add_settings_field(
		'pronamic_page_id',
		__( 'Page', 'pronamic' ),
		'pronamic_field_dropdown_pages',
		'pronamic_settings_general',
		'pronamic_settings_pages',
		array( 'label_for' => 'pronamic_page_id' )
	);

	// Settings Section - Extra
	add_settings_section(
		'pronamic_settings_extra',
		__( 'Extra', 'pronamic' ),
		'__return_false',
		'pronamic_settings_general'
	);

	add_settings_field(
		'pronamic_gravityforms_id',
		__( 'Gravity Forms ID', 'pronamic' ),
		'pronamic_field_dropdown_gravityforms',
		'pronamic_settings_general',
		'pronamic_settings_extra',
		array( 'label_for' => 'pronamic_gravityforms_id' )
	);

	add_settings_field(
		'pronamic_color',
		__( 'Color', 'pronamic' ),
		'pronamic_field_input_color',
		'pronamic_settings_general',
		'pronamic_settings_extra',
		array( 'label_for' => 'pronamic_color' )
	);

	add_settings_field(
		'pronamic_media_id',
		__( 'Media', 'pronamic' ),
		'pronamic_field_input_media',
		'pronamic_settings_general',
		'pronamic_settings_extra',
		array( 'label_for' => 'pronamic_media_id' )
	);

	add_settings_field(
		'pronamic_editor',
		__( 'Editor', 'pronamic' ),
		'pronamic_field_wp_editor',
		'pronamic_settings_general',
		'pronamic_settings_extra',
		array( 'label_for' => 'pronamic_editor' )
	);

	// Register Settings
	register_setting( 'pronamic_settings_general', 'pronamic_text' );
	register_setting( 'pronamic_settings_general', 'pronamic_page_id' );
	register_setting( 'pronamic_settings_general', 'pronamic_gravityforms_id' );
	register_setting( 'pronamic_settings_general', 'pronamic_color' );
	register_setting( 'pronamic_settings_general', 'pronamic_media_id' );
	register_setting( 'pronamic_settings_general', 'pronamic_editor' );

	/**
	 * Tab 2
	 */

	// Settings Section - Texts
	add_settings_section(
		'pronamic_settings_advanced_texts',
		__( 'Texts', 'pronamic' ),
		'__return_false',
		'pronamic_settings_advanced'
	);

	add_settings_field(
		'pronamic_advanced_text',
		__( 'Text', 'pronamic_ideal' ),
		'pronamic_field_input_text',
		'pronamic_settings_advanced',
		'pronamic_settings_advanced_texts',
		array( 'label_for' => 'pronamic_advanced_text' )
	);

	// Register Settings
	register_setting( 'pronamic_settings_advanced', 'pronamic_advanced_text' );
}

add_action( 'admin_init', 'pronamic_admin_init' );

/**
 * Render
 */
function pronamic_settings_page_render() {
	$tabs = array(
		'pronamic_settings_general'  => __( 'General', 'pronamic' ),
		'pronamic_settings_advanced' => __( 'Advanced', 'pronamic' ),
	);

	$current_tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING );
	$current_tab = empty( $current_tab ) ? key( $tabs ) : $current_tab;

	?>
	<div class="wrap">
		<?php screen_icon(); ?>

		<?php if ( empty( $tabs ) ) : ?>
			
			<h2><?php echo get_admin_page_title(); ?></h2>
			
		<?php else : ?>
		
			<h2 class="nav-tab-wrapper">
				<?php 
				
				foreach ( $tabs as $tab => $title ) {
					$classes = array( 'nav-tab' );
					
					if ( $current_tab == $tab ) 
						$classes[] = 'nav-tab-active';
					
					$url = add_query_arg( 'tab', $tab );

					printf(
						'<a class="nav-tab %s" href="%s">%s</a>',
						esc_attr( implode( ' ', $classes ) ),
						esc_attr( $url ),
						$title
					);
				}

				?>
			</h2>

		<?php endif; ?>

		<form action="options.php" method="post">
			<?php settings_fields( $current_tab ); ?>

			<?php do_settings_sections( $current_tab ); ?>

			<?php submit_button(); ?>
		</form>
	</div>

	<?php
}