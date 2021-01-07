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

<div class="cell medium-12">
	<?php //cell for the content 
	?>

	<header class="grid-container archive pb-2 pb-medium-0">

		<div class="grid-x align-center-middle">

			<div class="cell small-6">

				<h1 class="entry-title">

					<?php single_cat_title(); ?>

				</h1>

			</div>

			<div class="cell small-6 text-right sorting">

				<a data-toggle="searchOffCanvas">Sort & Filter</a>

			</div>

		</div>

	</header>

	<?php //start the cards 
	?>
	<div class="catalog-cards grid-x small-up-2 medium-up-4 large-up-6 align-top">

		<?php
		// sort posts by title
		// https://www.shilling.id.au/2011/11/30/how-to-change-the-order-of-posts-in-the-wordpress-loop/
		$args = array_merge($wp_query->query, array('orderby' => 'title', 'order' => 'ASC'));

		query_posts($args);

		if (have_posts($args)) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php
				$image = get_field('square_image');
				$alt = $image['alt'];
				if ($image) :
				?>

					<div class="media-container animation-element cell medium-2 ">

						<a href="<?php the_permalink(); ?>" aria-label="Visit <?php echo $alt; ?>">

							<div class="callout callout-hover-reveal" data-callout-hover-reveal>

								<div class="callout-body">

									<?php
									$img_size_sm = 'fp-small';
									$alt = $image['alt'];
									$hero_sm = $image['sizes'][$img_size_sm];
									?>
									<img class="my-hero superman" data-interchange="[<?php echo $hero_sm; ?>, default], [<?php echo $hero_sm; ?>, small]" alt="<?php echo $alt; ?>" alt="<?php echo $alt; ?>" />
								</div>

								<div class="callout-footer">

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

						</a>

					</div>

				<?php endif; ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; ?>

	</div>

</div>