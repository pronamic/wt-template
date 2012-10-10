<?php get_header(); ?>

<div id="content" role="main">
	<article id="post-0" class="post error404 not-found">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php _e( 'Page not found', 'pronamic' ); ?>
			</h1>
		</header>

		<div class="entry-content">
			<p>
				<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pronamic' ); ?>
			</p>

			<?php get_search_form(); ?>
		</div>
	</article>
</div>

<?php get_footer(); ?>