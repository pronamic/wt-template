<?php get_header(); ?>

<div id="content" role="main">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php pronamic_archive_title(); ?>
			</h1>
	
			<?php pronamic_archive_description(); ?>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/content', get_post_type() ); ?>

		<?php endwhile; ?>
	
		<?php pronamic_content_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'templates/no-results' ); ?>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>