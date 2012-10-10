<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text">
		<?php _e( 'Search', 'pronamic' ); ?>
	</label>

	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'pronamic' ); ?>" />
	<input type="submit" class="submit" name="submit" value="<?php esc_attr_e( 'Search', 'pronamic' ); ?>" />
</form>
