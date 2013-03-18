<?php get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php printf( __( 'Search Results for: %s', 'pronamic' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
		</header>
	
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'templates/content' ); ?>
	
		<?php endwhile; ?>
	
		<?php pronamic_content_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'templates/no-results' ); ?>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>