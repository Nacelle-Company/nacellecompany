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

<main class="main-container">

	<div class="main-grid">

		<div class="main-content-full-width">

			<?php get_template_part('template-parts/logo-bg-header'); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'team'); ?>

			<?php endwhile; ?>

		</div>

	</div>

</main>

<?php get_footer();
