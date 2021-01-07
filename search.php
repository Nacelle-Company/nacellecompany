<?php

/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main id="search-results" class="main-content search-results">

			<header>
				<h1 class="entry-title subheader"><?php _e('Search Results for', 'foundationpress'); ?> "<?php echo get_search_query(); ?>"</h1>
			</header>

			<?php if (have_posts()) : ?>

				<ul>
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', 'search', get_post_format()); ?>
					<?php endwhile; ?>
				</ul>

			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; ?>

			<div class="pagination-container">
				<div class="grid-x">
					<div id="catalog-pagination" class=" cell text-center">
						<?php
						$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$per_page = '24';
						$catalog_items_args = array(
							'post_type' => 'catalog',
							'posts_per_page' => $per_page,
							'paged' => $current_page,
						);
						$catalog_items = new WP_Query($catalog_items_args);
						$big = 999999999; // need an unlikely intege

						echo paginate_links(array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'current' => max(1, get_query_var('paged')),
							'total' => $catalog_items->max_num_pages
						));
						?>
					</div>
				</div>
			</div>


			<?php
			if (function_exists('foundationpress_pagination')) :
				foundationpress_pagination();
			elseif (is_paged()) :
			?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
					<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
				</nav>
			<?php endif; ?>

		</main>
		<?php get_sidebar(); ?>

	</div>
</div>
<?php get_footer();
