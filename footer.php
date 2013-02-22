				<div class="clear"></div>
			</div> <!-- #main -->

			<footer id="footer">
				<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?> 

					<div class="row">
						<?php dynamic_sidebar( 'footer-widget' ); ?>
					</div>

				<?php endif; ?>

				<div id="bottom" class="clearfix">
					<div class="statement">
						<?php
						
						printf( __( '&copy; %1$s %2$s. All rights reserved.', 'pronamic' ),
							date( 'Y' ),
							get_bloginfo( 'site-title' )
						);
					
						?>
					</div>
	
					<div class="builder">
						<?php
						
						printf( __( 'Website by <a href="%1$s">%2$s</a>.', 'pronamic' ),
							'http://pronamic.nl',
							'Pronamic'
						);
					
						?>
					</div>
				</div>
			</footer>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>