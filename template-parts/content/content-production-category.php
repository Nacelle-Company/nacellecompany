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
			<div class="grid-x align-center-middle pt-2 category-intro">
				<div class="cell small-6 medium-2">
					<h1 class="entry-title h3">
						<?php single_cat_title(); ?>
					</h1>
				</div>
				<div class="cell small-6 medium-2 medium-order-3 text-right sorting">
					<a data-toggle="searchOffCanvas">Sort & Filter</a>
				</div>
				<div class="cell medium-8 pb-2">
					<?php
					if (is_category('special-production')) {
						echo the_field('production_special_content', 'option');
					} elseif (is_category('series-production')) {
						echo the_field('production_series_content', 'option');
					}
					?>
				</div>
			</div>
		</header>
		<div class="catalog-cards macro-cat-cards grid-x medium-up-4 large-up-5 mt-medium-3">

			<?php
			// sort posts by title
			// https://www.shilling.id.au/2011/11/30/how-to-change-the-order-of-posts-in-the-wordpress-loop/
			$args = array_merge($wp_query->query, array('orderby' => 'title', 'order' => 'ASC'));

			query_posts($args);

			if (have_posts($args)) : ?>

				<?php while (have_posts()) : the_post(); ?>

					<?php
					$image = get_field('horizontal_image');
					if (!is_array($image)) {
						$image = acf_get_attachment($image);
					}
					$alt = $image['alt'];
					if ($image) :
					?>
						<div class="cell medium-2">

							<a href="<?php the_permalink(); ?>" aria-label="Visit">

								<div class="callout" data-callout-hover-reveal>

									<div class="callout-body">

										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>

									<div class="callout-footer">
										<div class="callout-content">
											<p><?php
													$trim_length = 20;  //desired length of text to display
													$value_more = ' . . .'; // what to add at the end of the trimmed text
													$custom_field = 'synopsis';
													$value = get_post_meta($post->ID, $custom_field, true);
													if ($value) {
														echo wp_trim_words($value, $trim_length, $value_more);
													}
													?></p>
										</div>

									</div>

								</div>

							</a>

						</div>
					<?php endif; ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; ?>

		</div>

	</div>

</div>