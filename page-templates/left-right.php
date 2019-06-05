<?php
/*
Template Name: Left Right
*/
get_header(); ?>

<?php do_action('Nacelle_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<div class="main-container">

		<div class="main-grid">

			<main class="main-content-full-width">

				<?php get_template_part('template-parts/logo-bg-header'); ?>

				<div class="grid-x medium-up-2">

					<!-- DOMESTIC/LEFT -->
					<div class="cell center-vertical-line">

						<div class="grid-x grid-padding-x">

							<!-- logos -->
							<div class="cell medium-6 small-order-2 large-order-1">

								<?php if( have_rows('logo_repeater') ): ?>

									<div class="grid-x align-center pt-medium-4">

									<?php while( have_rows('logo_repeater') ): the_row();

										// vars
										$image = get_sub_field('logo');
										$link = get_sub_field('logo_link');

										$link_url = $link['url'];

										?>

										<div class="small-6 columns text-center">

											<?php if( $link ): ?>
												<a href="<?php echo esc_url($link_url); ?>">
											<?php endif; ?>

												<img class="thumbnail" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

											<?php if( $link ): ?>
												</a>
											<?php endif; ?>

										</div>

									<?php endwhile; ?>

									</div>

								<?php endif; ?>

							</div>

							<!-- left content -->
							<div class="cell medium-6 small-order-1 large-order-2">

								<h1 class="fadeIn"><?php the_field('left_icon'); ?><?php the_field('left_title'); ?></h1>
								<?php the_field('left_content'); ?>

							</div>

						</div>

					</div>

					<!-- INTERNATIONAL/RIGHT -->
					<!-- right -->
					<div class="cell">

						<div class="grid-x grid-padding-x">

							<div class="cell small-12">

								<h1 class="fadeIn"><?php the_field('right_icon'); ?><?php the_field('right_title'); ?></h1>

							</div>
							<!-- right content -->
							<div class="cell medium-6">

								<?php the_field('right_content'); ?>

							</div>

							<!-- right image -->
							<div class="cell medium-6">

								<?php

								$image = get_field('right_image');

								if( !empty($image) ): ?>

									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

								<?php endif; ?>

							</div>

						</div>

					</div>

				</div>

			</main>
		</div>
	</div>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
