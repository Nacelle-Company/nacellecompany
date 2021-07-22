<?php

/**
 * The template for displaying Series search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<main class="mt-3">

	<div class="grid-container full">

		<div class="grid-x">

			<div class="cell medium-12">

				<header class="grid-container archive pb-2 pb-medium-0">

					<div class="grid-x align-center-middle pt-2 category-intro">

						<div class="cell small-6">

							<h1 class="entry-title"> <?php _e('Series', 'nacelle'); ?> </h1>

						</div>

						<div class="cell small-6 text-right sorting">

							<a data-toggle="searchSeriesOffCanvas"> <?php _e('Sort & Filter', 'nacelle'); ?> </a>

						</div>

					</div>

				</header>

				<div class="catalog-cards macro-cat-cards grid-x small-up-2 medium-up-4 large-up-6 align-top mt-medium-3" id="results">

					<?php
					if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>

							<?php if (get_field('square_image', $post->ID)) : ?>


								<div class="cell medium-2 mb-4 mb-medium-5 mb-medium-4 mb-large-5 mb-xlarge-3">

									<a href="<?php the_permalink(); ?>">

										<div class="callout" data-callout-hover-reveal>

											<div class="callout-body">

												<?php

												$image = get_field('square_image');

												if (!empty($image)) : ?>

													<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

												<?php endif; ?>

											</div>

											<div class="callout-footer">

												<p>

													<?php $summary = get_field('synopsis', $post->ID);
													echo $summary; ?>

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

							<a class="button" data-toggle="searchSeriesOffCanvas"><?php _e('Try another search!', 'nacelle'); ?></a>

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

			<div class="grid-x grid-margin-y align-center-middle oc-container pt-4 px-2">

				<div class="cell align-self-middle filter-sidebar">

					<h4 class="ml-2"><?php _e('Search Series', 'nacelle'); ?></h4>

					<?php echo do_shortcode('[searchandfilter slug="series-search"]'); ?>

				</div>
			</div>

		</div>

	</div>

</div>

<?php get_footer();
