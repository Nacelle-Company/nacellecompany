<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('Nacelle_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<div class="main-container">

		<div class="main-grid">

			<main class="main-content-full-width">

				<div class="grid-y medium-grid-frame">

					<?php get_template_part('template-parts/logo-bg-header'); ?>

				</div>

			</main>

		</div>

	</div>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
