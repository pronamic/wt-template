<?php get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title">
			<?php 
			
			if ( is_category() ) {
				printf( __( 'Category Archives: %s', 'pronamic' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			} elseif ( is_tag() ) {
				printf( __( 'Tag Archives: %s', '_s' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			
			} elseif ( is_author() ) {
				the_post();

				printf( __( 'Author Archives: %s', '_s' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );

				rewind_posts();

			} elseif ( is_day() ) {
				printf( __( 'Daily Archives: %s', 'pronamic' ), '<span>' . get_the_date() . '</span>' );

			} elseif ( is_month() ) {
				printf( __( 'Monthly Archives: %s', 'pronamic' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'pronamic' ) ) . '</span>' );

			} elseif ( is_year() ) {
				printf( __( 'Yearly Archives: %s', 'pronamic' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'pronamic' ) ) . '</span>' );
			
			} else {
				_e( 'Archive', 'pronamic' );

			}
			
			?>
		</h1>

		<?php

		if ( is_category() ) {
			$category_description = category_description();

			if ( ! empty( $category_description ) ) {
				echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
			}

		} elseif ( is_tag() ) {
			$tag_description = tag_description();

			if ( ! empty( $tag_description ) ) {
				echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
			}
		}

		?>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'templates/content' ); ?>

	<?php endwhile; ?>

	<?php pronamic_content_nav(); ?>

	<?php else : ?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php _e( 'Nothing Found', 'pronamic' ); ?>
			</h1>
		</header>

		<div class="entry-content">
			<p>
				<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pronamic' ); ?>
			</p>

			<?php get_search_form(); ?>
		</div>
	</article>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>