<?php
/*
Template Name: Front Grid
*/
get_header(); ?>
<?php do_action('Nacelle_before_content'); ?>
<?php while (have_posts('')) : the_post(); ?>
	<main class="front-grid">
		<div class="grid-x front-grid__top grid-padding-x align-center-middle">
			<div class="cell medium-12 large-10 xlarge-8 py-4 mt-medium-4">
				<?php the_content(); ?>
			</div>
			<div class="front-grid__overlay" style="background-color:<?php echo get_post_meta(get_the_ID(), 'bk_color', true);  ?>;opacity: .<?php echo get_post_meta(get_the_ID(), 'bk_opacity', true);  ?>;"></div>
		</div>
		<div class="grid-x more front-grid__bottom align-center align-middle grid-padding-y grid-padding-x" id="more">
			<div class="cell medium-12 large-6">
				<?php echo get_post_meta(get_the_ID(), 'btm_content', true);  ?>
			</div>
		</div>
	</main>
<?php endwhile; ?>
<?php get_footer(); ?>