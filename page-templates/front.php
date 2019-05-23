<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('Nacelle_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

<div class="grid-y medium-grid-frame">

	<!-- header -->
	<div class="grid-x tagline">

		<div class="medium-12 cell text-center">

			<h1 class="hide">Nacelle Company</h1>

			<h2>
				<strong><?php the_field('heading'); ?></strong>
			</h2>

		</div>

	</div>

	<main class="main grid-x grid-padding-x align-center">

		<div class="cell medium-6">

			<?php the_content(); ?>

		</div>

	</main>

</div>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
