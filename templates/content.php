<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() ) : ?>

		<hgroup>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'pronamic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

			<h3 class="entry-format">
				<?php _e( 'Featured', 'pronamic' ); ?>
			</h3>
		</hgroup>

		<?php else : ?>

		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'pronamic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>

		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<div class="entry-meta">
			<?php pronamic_posted_on(); ?>
		</div>

		<?php endif; ?>
	</header>

	<?php if ( is_search() ) : ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<?php else: ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pronamic' ) ); ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'pronamic' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>

	<?php endif; ?>

	<footer class="entry-meta">
		<?php $show_sep = false; ?>
	
		<?php if( 'post' == get_post_type() ) : ?>

		<?php

		$categories_list = get_the_category_list( __( ',  ', 'pronamic' ) );
	
		if( $categories_list ) :

		?>

		<span class="cat-links">
			<?php 
			
			printf( __( '<span class="%1$s">Posted in</span> %2$s', 'pronamic' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );

			$show_sep = true; 
			
			?>
		</span>

		<?php endif; ?>

		<?php

		$tags_list = get_the_tag_list( '', __( ',  ', 'pronamic' ) );

		if( $tags_list ) : if( $show_sep ) : ?>

		<span class="sep"> | </span>

		<?php endif; ?>

		<span class="tag-links">
			<?php 
			
			printf( __( '<span class="%1$s">Tagged</span> %2$s', 'pronamic' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );

			$show_sep = true; 
			
			?>
		</span>

		<?php endif; endif; ?>

		<?php if ( comments_open() ) : if ( $show_sep ) : ?>

		<span class="sep"> | </span>

		<?php endif; ?>

		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'pronamic' ) . '</span>', __( '1 Reply', 'pronamic' ), __( '% Replies', 'pronamic' ) ); ?>
		</span>
		
		<?php endif; ?>
	</footer>
</article>