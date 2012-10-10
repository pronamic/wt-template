					<div class="clear"></div>
				</div> <!-- #main -->
		
				<footer id="footer">
					<div class="col">
						<h3>
							<a href="#">Lorum delta peros</a>
						</h3>
		
						<p>
							Lorum ipsum dolar amit delta deros, consenta delta peros. Non commonda peros alta sur ipsum.
						</p>
					</div>
		
					<div class="col">
						<h3>
							<a href="#">Lorum delta peros</a>
						</h3>
		
						<p>
							Lorum ipsum dolar amit delta deros, consenta delta peros. Non commonda peros alta sur ipsum.
						</p>
					</div>
		
					<div class="col last">
						<h3>
							<a href="#">Lorum delta peros</a>
						</h3>
						
						<nav id="social-nav">
							<ul>
								<li class="twitter"><a href="#">Twitter</a></li>
								<li class="facebook"><a href="#">Facebook</a></li>
								<li class="linkedin"><a href="#">LinkedIn</a></li>
							</ul>
						</nav>
					</div>
		
					<div class="clear"></div>
		
					<div id="bottom">
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
		
						<div class="clear"></div>
					</div>
				</footer>
			</div>
		</div>
		
		<?php wp_footer(); ?>
	</body>
</html>