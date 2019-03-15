<?php
/*
Template Name: Featured Page
*/
get_header(); ?>

<div class="main-container grid-container full featured-page">
	<div class="main-grid">
		<main class=" grid-x">
			<?php while (have_posts()) : the_post(); ?>

				<div class="cell large-6 feat-img">

					<img class=" feat-pg" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]"/>

				</div>

				<div class="cell auto feat-content">

					<div class="grid-x main align-center">

						<div class="cell small-3 large-4 dk-border">
							<div class="grid-x align-center grid-padding-y icons-container">

								<a class="bounce button success" href="<?php the_field('feat_trailer_embed'); ?>" target="_blank">
									<?php _e('Watch Trailer', 'comedy-dynamics'); ?>
								</a>
								<?php

								$imdb = get_field('imdb');
								$instagram = get_field('instagram');
								$twitter = get_field('twitter');
								$facebook = get_field('facebook');

								?>

								<div class="cell">

									<div class="grid-x">

										<?php if ($imdb) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $imdb; ?>" target="_blank">
													<i class="fab fa-imdb"></i>
										<?php endif; ?>
										<?php if ($imdb): ?>
												</a>
											</div>
										<?php endif; ?>

										<?php if ($instagram) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $instagram; ?>" target="_blank">
													<i class="fab fa-instagram"></i>
										<?php endif; ?>
										<?php if ($instagram): ?>
												</a>
											</div>
										<?php endif; ?>

										<?php if ($twitter) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $twitter; ?>" target="_blank">
													<i class="fab fa-twitter"></i>
										<?php endif; ?>
										<?php if ($twitter): ?>
												</a>
											</div>
										<?php endif; ?>

										<?php if ($facebook) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $facebook; ?>" target="_blank">
													<i class="fab fa-facebook-square"></i>
										<?php endif; ?>
										<?php if ($facebook): ?>
												</a>
											</div>
										<?php endif; ?>

									</div>

								</div>

								<div class="cell">

									<div class="grid-x">

									<?php if( have_rows('repeater') ): ?>

										<div class="cell">

											<header class="text-center">
												<h3><?php _e('Theatres', 'comedy-dynamics'); ?></h3>
												<hr>
											</header>

										</div>

										<?php while( have_rows('repeater') ): the_row();

											// vars
											$title = get_sub_field('title');
											$link = get_sub_field('link');
											$date = get_sub_field('date');
											$info = get_sub_field('info');
											$onSale = get_sub_field('on_sale');

											?>

											<div class="cell medium-6 text-center details-container">

												<h4><?php echo $title; ?></h4>



												<details name="hello">
													<summary>

														<h5>
															<strong>
															<?php _e('Info', 'comedy-dynamics'); ?>
															</strong>
														</h5>

													</summary>

													<div class="info">

															<!-- 			on sale -->
													<?php // if( $onSale ): ?>

														<!-- <p class="on-sale"><strong>ON SALE</strong></p> -->

													<?php //else: ?>

														<!-- <p>Not on sale</p> -->

													<?php //endif; ?>
										<!-- 			on sale END -->

														<p>
														<?php echo $date; ?>
														</p>

														<p class="info-text">
														<strong><?php echo $info; ?></strong>
														</p>

										<!-- 				link -->
														<?php if( $link ): ?>
															<a class="hollow" href="<?php echo $link; ?>" target="_blank">
														<?php endif; ?>

															<?php _e('View', 'comedy-dynamics'); ?>

														<?php if( $link ): ?>
														</a>
														<?php endif; ?>
										<!-- 				link END-->

													</div>

												</details>

											</div>

										<?php endwhile; ?>

									<?php endif; ?>

									</div>

								</div>

							</div>

						</div>

						<div class="cell auto feat-info">

							<?php the_content(); ?>
						</div>

					</div>

					<a href="<?php echo esc_url(home_url('/')); ?>">

						<footer class="feat-pg grid-x align-bottom">
							<div class="cell small-12 medium-9">
								<?php the_field('footer'); ?>
							</div>
							<div class="cell small-12 medium-3">
								<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/comedy-dynamics-officail-logo.svg" />
							</div>
						</footer>

					</a>


				</div>

				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>

<!-- VIDEO MODAL -->
<?php

$featTrailerEmbed = get_field('feat_trailer_embed');

if (!empty($featTrailerEmbed)): ?>

	<div class="reveal" id="videoModal1" data-reveal>

			<!-- <div class="embed-container"> -->

				<!-- <iframe width="560" height="315" src="<?php echo $featTrailerEmbed ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

			<!-- </div> -->

	  <button class="close-button" data-close aria-label="Close reveal" type="button">

		<span aria-hidden="true">&times;</span>

	  </button>

	</div>
<?php endif ?>

<?php get_footer();
