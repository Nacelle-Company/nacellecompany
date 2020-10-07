<?php
/*
Template Name: Front
*/
get_header();

?>

<?php do_action('Nacelle_before_content'); ?>


<div class="grid-x front-page-template">
	<div class="cell">

		<?php while (have_posts('')) : the_post(); ?>
		<!-- clean hero slider -->
		<?php get_template_part('template-parts/blocks/full-hero-slider'); ?>

			<div class="circle-slider orbit mb-4" role="region" aria-label="Nacelle News Slider" data-orbit data-auto-play="false" data-use-m-u-i="false">

				<ul class="orbit-container" id="circle-posts">

					<div class="grid-x background-slide-container orbit-group">
						<div class="small-12 medium-4 large-4 press-title-background columns">
							<!-- <img src="<?php //bloginfo('template_directory'); 
											?>/dist/assets/images/news-slider-title-bkgnd.png" alt="press title background" /> -->

						</div>
					</div>

					<?php get_template_part('template-parts/blocks/circle-slider'); ?>

				</ul>

			</div>
		<?php endwhile; ?>
		<!-- END LOOP -->

		<?php get_template_part('template-parts/front-partners'); ?>

	</div>
</div>

<?php get_footer(); ?>