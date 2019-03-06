<?php
/**
 * The template for displaying Album search results pages.
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

							<h1 class="entry-title"> <?php _e('Album', 'comedy-dynamics'); ?> </h1>

						</div>

						<div class="cell small-6 text-right sorting">

							<a data-toggle="searchAlbumOffCanvas"> <?php _e('Sort & Filter', 'comedy-dynamics'); ?> </a>

						</div>

					</div>

				</header>

				<div class="grid-x small-2 medium-4 large-6 align-center-middle" id="results">

					<?php
                    if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>

							<?php if (get_field('square_image', $post->ID)): ?>


							<div class="media-container cell medium-2 mb-4 mb-medium-5 mb-medium-4 mb-large-5 mb-xlarge-3">

									<a href="<?php the_permalink(); ?>">

										<div class="callout callout-hover-reveal" data-callout-hover-reveal>

											<div class="callout-body">

												<?php

                                                $image = get_field('square_image');

                                                if (!empty($image)): ?>

													<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

												<?php endif; ?>

											</div>

											<div class="callout-footer">

												<p>

													<?php $summary = get_field('synopsis', $post->ID); echo $summary; ?>

												</p>

											</div>

										</div>

									</a>

								</div>

							<?php endif; ?>

						<?php endwhile; ?>

						<?php else : ?>

							<div class="cell text-center">

								<h3>Sorry no results for " <?php echo esc_html(get_search_query(false)); ?> "</h3>

								<a class="button" data-toggle="searchAlbumOffCanvas"><?php _e('Try another search!', 'comedy-dynamics'); ?></a>

							</div>

					<?php endif; ?>

				</div>
			</div>
		</div>

	</div>
</main>

<div class="off-canvas-wrapper">

	<div class="off-canvas position-right" id="searchAlbumOffCanvas" data-off-canvas>

		<div class="off-canvas-content" data-off-canvas-content>

			<button class="close-button" aria-label="Close menu" type="button" data-close>

			  <span aria-hidden="true">&times;</span>

			</button>

			<div class="grid-x grid-margin-y align-center-middle oc-container">

				<div class="cell align-self-middle filter-sidebar">

					<h4 class="ml-2"><?php _e('Search Album', 'comedy-dynamics'); ?></h4>

					<?php echo do_shortcode('[searchandfilter slug="album-search"]'); ?>

				</div>
			</div>

		</div>

	</div>

</div>

<?php get_footer();
