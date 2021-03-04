<?php

/**
 * The template for displaying the media taxonomy archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<div class="grid-x align-center">

	<div class="cell">

		<header class="grid-container archive pb-2 pb-medium-0">

			<div class="grid-x align-center-middle">

				<div class="cell small-6">

					<h1 class="entry-title">

						<?php single_cat_title(); ?> <span class="hide">Production</span>

					</h1>

				</div>

				<div class="cell small-6 text-right sorting">

					<a data-toggle="searchOffCanvas">Sort & Filter</a>

				</div>

			</div>

		</header>

		<div class="grid-x medium-up-4 large-up-5">

			<?php
			// sort posts by title
			// https://www.shilling.id.au/2011/11/30/how-to-change-the-order-of-posts-in-the-wordpress-loop/
			$args = array_merge($wp_query->query, array('orderby' => 'title', 'order' => 'ASC'));

			query_posts($args);

			if (have_posts($args)) : ?>

				<?php while (have_posts()) : the_post(); ?>

					<div class="media-container cell animation-element mb-2 mb-medium-2 mb-large-4">


						<div class="callout callout-hover-reveal" data-callout-hover-reveal>
							<a href="<?php echo get_permalink(); ?>">

								<div class="callout-body">

									<?php
									$image_square = get_field('square_image');
									$image_horizontal = get_field('horizontal_image');
									if ($image_horizontal) {
										$image = get_field('horizontal_image');
									} elseif ($image_square) {
										$image = get_field('square_image');
									}
									if (!is_array($image)) {
										$image = acf_get_attachment($image);
									}
									$img_size_sm = 'fp-small';
									$alt = $image['alt'];
									$hero_sm = $image['sizes'][$img_size_sm];
									?>
									<img class="my-hero superman" data-interchange="[<?php echo $hero_sm; ?>, small]" alt="<?php echo $alt; ?>" alt="<?php echo $alt; ?>" />
								</div>

								<div class="callout-footer">
									<?php
									$excerpt_true = get_field('synopsis');
									if ($excerpt_true) {
										$excerpt = get_field('synopsis');
										echo $excerpt;
									}
									?>

								</div>

							</a>

						</div>

					</div>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; ?>

		</div>

	</div>

</div>