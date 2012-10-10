<?php get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title">
			<?php printf( __( 'Search Results for: %s', 'pronamic' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content' ); ?>

	<?php endwhile; ?>

	<?php pronamic_content_nav(); ?>

	<?php else: ?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php _e( 'Nothing Found', 'pronamic' ); ?>
			</h1>
		</header>

		<div class="entry-content">
			<p>
				<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'pronamic' ); ?>
			</p>

			<?php get_search_form(); ?>
		</div>
	</article>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>