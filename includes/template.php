<?php

/**
 * Display navigation
 */
function pronamic_content_nav() {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>

	<nav class="content-navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pronamic' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pronamic' ) ); ?></div>
	</nav>

	<?php endif;
}

/**
 * Template for comments and pingbacks.
 */
function pronamic_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p>
			<?php _e( 'Pingback:', 'pronamic' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'pronamic' ), '<span class="edit-link">', '</span>' ); ?>
		</p>

	<?php break; default: ?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php

					$avatar_size = 68;

					if ( '0' != $comment->comment_parent ) {
						$avatar_size = 39;
					}

					echo get_avatar( $comment, $avatar_size );

					printf( __( '%1$s on %2$s <span class="says">said:</span>', 'pronamic' ),
						sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
						sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link($comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( __( '%1$s at %2$s', 'pronamic' ), get_comment_date(), get_comment_time() )
						)
					);

					?>

					<?php edit_comment_link( __( 'Edit', 'pronamic' ), '<span class="edit-link">', '</span>'); ?>
				</div>

				<?php if ( $comment->comment_approved == '0' ) : ?>
	
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'pronamic' ); ?></em><br />

				<?php endif; ?>
			</footer>

			<div class="comment-content">
				<?php comment_text(); ?>
			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'pronamic' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article>
	<?php

	break; endswitch;
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function pronamic_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'pronamic' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url(get_the_author_meta('ID') ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'pronamic' ), get_the_author() ) ),
		get_the_author()
	);
}

/**
 * Sets the post excerpt length.
 */
function pronamic_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'pronamic_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function pronamic_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pronamic' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and pronamic_continue_reading_link().
 */
function pronamic_auto_excerpt_more( $more ) {
	return ' &hellip;' . pronamic_continue_reading_link();
}
add_filter( 'excerpt_more', 'pronamic_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function pronamic_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= pronamic_continue_reading_link();
	}

	return $output;
}
add_filter( 'get_the_excerpt', 'pronamic_custom_excerpt_more' );