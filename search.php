<?php

/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<main class="main-container">
	<div class="main-grid">
		<div id="search-results" class="main-content search-results">

			<header>
				<h1 class="entry-title subheader"><?php _e('Search Results for', 'nacelle'); ?> "<?php echo get_search_query(); ?>"</h1>
			</header>

			<?php if (have_posts()) : ?>
				
				<ul id="search_results">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content-search'); ?>
					<?php endwhile; ?>
				</ul>
				
			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; ?>

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

		</div>
		
		<?php get_sidebar(); ?>

	</div>
</main>
<?php get_footer();
