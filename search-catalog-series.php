<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<main class="mt-3">
	<div class="grid-container full">
		<div class="grid-x">

			<div class="cell medium-12">

				<header class="grid-container archive">

					<div class="grid-x align-center-middle">

						<div class="cell small-6">

							<h1 class="entry-title">Series</h1>

						</div>

						<div class="cell small-6 text-right sorting">

							<a data-toggle="searchSeriesOffCanvas">Sort & Filter</a>

						</div>

					</div>

				</header>

				<div class="grid-x small-2 medium-4 large-6 align-center-middle">

					<?php
                    if (have_posts($args)) : ?>

						<?php while (have_posts()) : the_post(); ?>

							<?php if (get_field('square_image', $post->ID)): ?>


							<div class="media-container cell medium-2 mb-4 mb-medium-5 mb-medium-4 mb-large-5 mb-xlarge-3">

									<a href="<?php the_permalink(); ?>">

										<div class="callout callout-hover-reveal" data-callout-hover-reveal>

											<div class="callout-body">

												<?php if (get_field('square_image', $post->ID)): ?>

													<img src="<?php the_field('square_image', $post->ID); ?>" />


												<?php endif; ?>

											</div>

											<div class="callout-footer">

												<p>

													<?php $summary = get_field('synopsis', $post->ID); echo $summary; ?>

												</p>

											</div>

										</div>

									</a>
									<!-- Premiere -->
							   				 <?php
                                             // get raw date
                                             $date = get_field('premiere_date', false, false);

                                             // make date object
                                             $date = new DateTime($date);

                                             ?>
							   				 <div class="grid-x">

							   					 <div class="cell small-8">
							   						 <p><?php echo $date->format('m/d/Y'); ?></p>
							   					 </div>
							   				 </div>
								</div>

							<?php endif; ?>

						<?php endwhile; ?>

						<?php else : ?>
							<div class="cell text-center">
								<h3>Sorry, no results for that search.</h3>
								<a class="button" data-toggle="searchSeriesOffCanvas">Try another search!</a>
								<input type="submit" class="button search-filter-reset" name="_sf_reset" value="Or Reset" data-search-form-id="4737" data-sf-submit-form="auto">
							</div>
					<?php endif; ?>

				</div>
			</div>
		</div>

	</div>
</main>

<div class="off-canvas-wrapper">
	<div class="off-canvas position-right" id="searchSeriesOffCanvas" data-off-canvas>
		<div class="off-canvas-content" data-off-canvas-content>
			<button class="close-button" aria-label="Close menu" type="button" data-close>
			  <span aria-hidden="true">&times;</span>
			</button>
			<div class="grid-x grid-margin-y align-center-middle" style="height: 90vh;">
				<div class="cell align-self-middle filter-sidebar">

					<?php
                        echo '<h4 class="ml-2">Search Series</h4>';
                        echo do_shortcode('[searchandfilter id="4737"]'); // film
                    ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();
