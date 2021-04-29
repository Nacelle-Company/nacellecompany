<?php

/**
 * Template name: Wonder
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

	<main class="main-content-full-width split-layout">

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part('template-parts/content/content-split', 'page'); ?>

		<?php endwhile; ?>

	</main>

<?php get_footer();
