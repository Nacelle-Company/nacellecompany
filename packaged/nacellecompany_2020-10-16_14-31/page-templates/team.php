<?php
/**
 * Template name: Team
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">

	<div class="main-grid">

		<main class="main-content-full-width">

			<?php get_template_part('template-parts/logo-bg-header'); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'team'); ?>

			<?php endwhile; ?>

		</main>

	</div>

</div>

<?php get_footer();
