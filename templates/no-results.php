<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title">
			<?php _e( 'Nothing Found', 'pronamic' ); ?>
		</h1>
	</header>

	<div class="entry-content">
		<?php if ( is_search() ) : ?>

			<p>
				<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'pronamic' ); ?>
			</p>
			
			<?php get_search_form(); ?>
		
		<?php else : ?>

			<p>
				<?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'pronamic' ); ?>
			</p>
			
			<?php get_search_form(); ?>
		
		<?php endif; ?>
	</div>
</article>