<?php

/**
 * Template name: Products
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<main class="main-grid">
	<div class="main-content-full-width">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/content/content-products', 'page'); ?>
			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer();
