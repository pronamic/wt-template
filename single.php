<?php get_header(); ?>

<div id="content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<nav id="nav-single">
			<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'pronamic' ) ); ?></span>
			<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'pronamic' ) ); ?></span>
		</nav>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
		
				<?php if ( 'post' == get_post_type() ) : ?>
		
					<div class="entry-meta">
						<?php pronamic_posted_on(); ?>
					</div>
		
				<?php endif; ?>
			</header>
		
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		
			<footer class="entry-meta">
				<?php
		
				$categories_list = get_the_category_list( __( ', ', 'pronamic' ) );
		
				$tag_list = get_the_tag_list( '', __( ', ', 'pronamic' ) );
				if ( '' != $tag_list ) {
					$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>.', 'pronamic' );
				} elseif( '' != $categories_list ) {
					$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>.', 'pronamic' );
				} else {
					$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>.', 'pronamic' );
				}
		
				printf( 
					$utility_text ,
					$categories_list ,
					$tag_list ,
					esc_url( get_permalink() ) ,
					the_title_attribute( 'echo=0' ) ,
					get_the_author() ,
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
				);
		
				?>
		
				<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || ! is_multi_author() ) ) : ?>
		
					<div id="author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pronamic_author_bio_avatar_size', 68 ) ); ?>
						</div>
			
						<div id="author-description">
							<h2>
								<?php printf( __( 'About %s', 'pronamic' ), get_the_author() ); ?>
							</h2>
			
							<?php the_author_meta( 'description' ); ?>
			
							<div id="author-link">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'pronamic' ), get_the_author() ); ?>
								</a>
							</div>
						</div>
					</div>
		
				<?php endif; ?>
			</footer>
		</article>
	
		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>