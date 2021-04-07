<?php
/*
Template Name: Front Grid
*/
get_header(); ?>

<?php do_action('Nacelle_before_content'); ?>

<?php while (have_posts('')) : the_post(); ?>

	<main class="front-grid">

		<div class="grid-x front-grid__top grid-padding-x align-center-middle">

			<div class="cell medium-12 large-8 py-medium-4 mt-medium-4">

				<?php the_content(); ?>

			</div>

			<div class="front-grid__overlay" style="background-color:<?php the_field('bk_color') ?>;opacity: .<?php the_field('bk_opacity') ?>;"></div>

		</div>

		<div class="grid-x more front-grid__bottom align-center align-middle grid-padding-y grid-padding-x" id="more">

			<div class="cell medium-12 large-6">

				<?php echo the_field('btm_content'); ?>

			</div>

		</div>

	</main>

<?php endwhile; ?>
<?php // END LOOP 
?>

<?php get_footer(); ?>