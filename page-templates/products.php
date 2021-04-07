<?php
/*
Template Name: Products
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
	<main class="main-grid">
		<div class="main-content-full-width">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/content-products', 'page' ); ?>

				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
	</main>
<?php get_footer();
