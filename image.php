<?php get_header(); ?>

<div id="content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

	<nav id="nav-single">
		<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous' , 'pronamic' ) ); ?></span>
		<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;' , 'pronamic' ) ); ?></span>
	</nav>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php

				$metadata = wp_get_attachment_metadata();

				printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'pronamic' ),
					esc_attr( get_the_time() ),
					get_the_date(),
					esc_url( wp_get_attachment_url() ),
					$metadata['width'],
					$metadata['height'],
					esc_url( get_permalink( $post->post_parent ) ),
					esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
					get_the_title( $post->post_parent )
				);

				?>
			</div>
		</header>

		<div class="entry-content">
			<div class="entry-attachment">
				<div class="attachment">
					<?php

					$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
					
					foreach( $attachments as $k => $attachment ) {
						if( $attachment->ID == $post->ID ) {
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
						
						$attachment_size = apply_filters( 'pronamic_attachment_size', 848 );

						echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) );

						?>
					</a>

					<?php if ( ! empty( $post->post_excerpt ) ) : ?>

					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div>

					<?php endif; ?>
				</div>
			</div>

			<div class="entry-description">
				<?php the_content(); ?>

				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'pronamic' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div>
		</div>
	</article>

	<?php comments_template(); ?>

	<?php endwhile; ?>
</div>

<?php get_footer(); ?>