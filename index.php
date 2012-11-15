<?php get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'templates/content' ); ?>
	
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
				<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pronamic' ); ?>
			</p>

			<?php get_search_form(); ?>
		</div>
	</article>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>