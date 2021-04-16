<?php

/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php if (have_posts()) : ?>

	<div class="cell medium-12">
		<header class="grid-container archive pb-2 pb-medium-0">
			<div class="grid-x align-center-middle pt-2 category-intro">
				<div class="cell small-6 medium-2">
					<h1 class="entry-title">
						<?php single_cat_title(); ?>
					</h1>
				</div>
				<div class="cell small-6 medium-2 medium-order-3 text-right sorting">
					<a data-toggle="searchOffCanvas">Sort & Filter</a>
				</div>
				<div class="cell medium-8 pb-2">
					<?php
					if (is_category('album')) {
						echo the_field('album_content', 'option');
					} elseif (is_category('film')) {
						echo the_field('film_content', 'option');
					} elseif (is_category('series')) {
						echo the_field('series_content', 'option');
					} elseif (is_category('special')) {
						echo the_field('special_content', 'option');
					} elseif (is_category('special-production')) {
						echo the_field('production_special_content', 'option');
					} elseif (is_category('series-production')) {
						echo the_field('production_series_content', 'option');
					}
					?>
				</div>
			</div>
		</header>
		<div class="catalog-cards grid-x small-up-2 medium-up-4 large-up-6 align-top mt-medium-3">
			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content/content-categories-img'); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; // End have_posts() check. 
		?>

		<?php wp_reset_postdata(); ?>

		</div>
	</div>
	<?php /* Display navigation to next/previous pages when applicable */ ?>

	<?php
	if (function_exists('Nacelle_pagination')) :
		Nacelle_pagination();
	elseif (is_paged()) :
	?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'nacelle')); ?></div>
			<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'nacelle')); ?></div>
		</nav>
	<?php endif; ?>
	<?php get_footer();
