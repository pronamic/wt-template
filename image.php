<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<div class="entry-attachment">
				<div class="attachment">
					<?php

					$attachments = array_values( get_children( array( 
						'post_parent'    => $post->post_parent, 
						'post_status'    => 'inherit', 
						'post_type'      => 'attachment', 
						'post_mime_type' => 'image', 
						'order'          => 'ASC', 
						'orderby'        => 'menu_order ID' 
					) ) );
					
					foreach ( $attachments as $k => $attachment ) {
						if ( $attachment->ID == $post->ID ) {
							break;
						}
					}
					
					$k++;

					if( count( $attachments ) > 1 ) {
						if ( isset( $attachments[$k] ) ) {
							$next_attachment_url = get_attachment_link( $attachments[$k]->ID );
						 } else {
							$next_attachment_url = get_attachment_link( $attachments[0]->ID );
						}
					} else {
						$next_attachment_url = wp_get_attachment_url();
					}

					?>
				
					<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
						<?php
						
						$attachment_size = apply_filters( 'pronamic_attachment_size', 940 );

						echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) );

						?>
					</a>

					<?php if ( ! empty( $post->post_excerpt ) ) : ?>

						<p class="entry-caption">
							<?php the_excerpt(); ?>
						</p>

					<?php endif; ?>
				</div>
			</div>

			<div class="entry-description">
				<?php the_content(); ?>
			</div>
		</div>
	</article>

	<nav id="nav-single">
		<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous' , 'pronamic' ) ); ?></span>
		<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;' , 'pronamic' ) ); ?></span>
	</nav>

<?php endwhile; ?>

<?php get_footer(); ?>