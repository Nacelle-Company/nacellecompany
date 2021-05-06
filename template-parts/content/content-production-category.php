<?php

/**
 * The template for displaying the media taxonomy archive pages
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
?>

<div class="grid-x align-center">

	<div class="cell">
		<header class="grid-container archive pb-2 pb-medium-0">
			<div class="grid-x align-center-middle grid-padding-y category-intro">
				<div class="cell large-2">
					<h1 class="entry-title h3">
						<?php single_cat_title(); ?>
					</h1>
				</div>
				<div class="cell medium-8">
					<p><?php
							if (is_category('special-production')) {
								echo the_field('production_special_content', 'option');
							} elseif (is_category('series-production')) {
								echo the_field('production_series_content', 'option');
							}
							?>
					</p>
				</div>
				<div class="cell medium-2 text-right sorting">
					<a data-toggle="searchOffCanvas">Sort & Filter</a>
				</div>
			</div>
		</header>

		<div class="catalog-cards macro-cat-cards grid-x medium-up-4 large-up-5 mt-medium-3">

			<?php
			// sort posts by title
			// https://www.shilling.id.au/2011/11/30/how-to-change-the-order-of-posts-in-the-wordpress-loop/
			$args = array_merge($wp_query->query, array('orderby' => 'title', 'order' => 'ASC'));

			query_posts($args);

			if (have_posts($args)) : ?>

				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/content/content-categories-card'); ?>



				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; ?>

		</div>

	</div>

</div>