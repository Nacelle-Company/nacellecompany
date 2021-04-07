<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<main class="main-container">
	<div class="main-grid sidebar-left">
		<div class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		 </div>
	<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();
