<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<?php get_template_part('template-parts/featured-image'); ?>
<main class="main-container">
	<div class="main-grid">
		<div class="main-content">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content/content'); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
