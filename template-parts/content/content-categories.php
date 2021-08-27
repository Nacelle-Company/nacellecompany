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
				<div class="cell small-6 flex-container align-middle">
					<div class="pr-1 pb-1 pb-medium-0 flex-container">
						<?php
						if (is_category('album')) {
							get_template_part('template-parts/svg/icon-disk');
						} elseif (is_category('film')) {
							get_template_part('template-parts/svg/icon-film');
						} elseif (is_category('series')) {
							get_template_part('template-parts/svg/icon-mic');
						} elseif (is_category('special')) {
							get_template_part('template-parts/svg/icon-video');
						}
						?>
					</div>
					<h1 class="catalog-title h3 mb-0">
						<span class="invisible">Comedy</span>
						<?php single_cat_title(); ?>
					</h1>
				</div>
				<div class="cell small-6 text-right sorting">
					<a data-toggle="searchOffCanvas">Sort & Filter</a>
				</div>
			</div>
		</header>
		<div class="catalog-cards macro-cat-cards grid-x small-up-2 medium-up-4 large-up-6 align-top mt-medium-3">
			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content/content-categories-card'); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; // End have_posts() check. 
		?>

		<?php wp_reset_postdata(); ?>

		</div>
	</div>
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<div id="site-content" class="text-center"></div>
	<?php
	// if (function_exists('Nacelle_pagination')) :
	// 	Nacelle_pagination();
	// elseif (is_paged()) :
	?>

	<!-- <nav id="post-nav">
			<div class="post-previous"><?php //next_posts_link(__('&larr; Older posts', 'nacelle')); 
																	?></div>
			<div class="post-next"><?php //previous_posts_link(__('Newer posts &rarr;', 'nacelle')); 
															?></div>
		</nav> -->
	<?php // endif; 
	?>
	<?php get_footer();
