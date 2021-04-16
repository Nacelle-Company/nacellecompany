<?php

/**
 * The template for displaying all category posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<?php // START featured header 
?>

<?php while (have_posts()) : the_post(); ?>

	<?php

	// vars

	$synopsis = get_field('synopsis');

	$videoEmbedd = get_field('video_embedd');
	$ticketsButtonTitle = get_field('tickets_button_title');
	$titleColor = get_field('title_color');
	$squareImage = get_field('square_image');
	?>

	<?php get_template_part('template-parts/catalog/catalog-header', ''); ?>

	<main class="main-content grid-x grid-padding-x medium-padding-collapse" <?php //post_class(''); ?> id="post-<?php the_ID(); ?>">

		<?php
		// HERO VIDEO present
		if (get_field('video_embedd')) : ?>
			<div class="cell medium-5 medium-order-2">
				<?php
				// show catalog aside
				get_template_part('template-parts/catalog/catalog-aside'); ?>
			</div>
			<div class="cell medium-7 medium-order-1">

				<?php
				// show hero video
				get_template_part('template-parts/catalog/catalog-hero'); ?>

				<!-- // show more info dropdown -->
				<?php
				// if (get_field('show_more_info')) {
				get_template_part('template-parts/catalog/catalog-more-info', '');
				// };
				?>

				<?php
				// show crew info
				// if (get_field('show_crew')) {
				get_template_part('template-parts/catalog/catalog-crew', '');
				// };
				?>

				<?php // close the div with hero and more info 
				?>
			</div>

			<div class="cell medium-order-3">
				<?php
				// show large links FULL WIDTH
				get_template_part('template-parts/catalog/catalog-large-links'); ?>
			</div>
		<?php else : // no HERO VIDEO present 
		?>
			<div class="no-hero-video cell medium-7">
				<?php
				// show more info dropdown
				// if (get_field('show_more_info')) {
				get_template_part('template-parts/catalog/catalog-more-info');
				// };
				// show crew info
				// if (get_field('show_crew')) {
				get_template_part('template-parts/catalog/catalog-crew');
				// };
				// large links
				get_template_part('template-parts/catalog/catalog-large-links');
				// close the div with hero and more info
				?>
			</div>
			<div class="cell medium-5">
				<?php // show catalog aside
				get_template_part('template-parts/catalog/catalog-aside'); ?>
			</div>
		<?php endif; ?>

		<?php
		$featured_posts = get_field('related_news_or_press');
		if ($featured_posts) : ?>
			<div class="grid-x px-large-4">
				<div class="cell medium-12">
					<h4>Related News & Press</h4>

					<?php foreach ($featured_posts as $post) :

						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); ?>
						<p>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</p>
						<?php
						$talents = get_field('talent');
						if ($talents) {
							echo '<h4>Featured Talent</h4>';

							$talentstr = array();
							foreach ($talents as $talent) {
								$talentstr[] = $talent->name;
								$talentSlug[] = '<a class="alt" href="' . $siteURL . '/main-talent/' . $talent->slug . '">' . $talent->name . '</a>';
							}
							echo implode(", ", $talentSlug);
						}
						?>
					<?php endforeach; ?>
					<?php
					// Reset the global post object so that the rest of the page works correctly.
					wp_reset_postdata(); ?>
				</div>
			</div>
		<?php endif; ?>

	</main>

	<?php if (have_rows('embedded_content')) : ?>

		<?php while (have_rows('embedded_content')) : the_row();

			// vars
			$embed = get_sub_field('embed');
			$text = get_sub_field('embedded_text');
			$side = get_sub_field('embedded_side');

		?>
			<div class="grid-container">
				<div class="grid-x align-center-middle grid-margin-x">
					<div class="cell medium-8">
						<?php if ($embed) : ?>
							<?php echo $embed; ?>
						<?php endif; ?>
					</div>
					<div class="cell medium-4">
						<?php echo $text; ?>
					</div>
				</div>
			</div>


			<div class="grid-x">

				<?php if (have_rows('embedded_content')) : ?>

					<?php while (have_rows('embedded_content')) : the_row();

						// vars
						$embedd = get_sub_field('embedded_link');
						$embeddText = get_sub_field('embedded_text');
						$embeddSide = get_sub_field('embedded_side');

					?>
						<?php if (get_sub_field('embedded_side')) : ?>

							<?php $sourceOrder = 'medium-order-2';
							$textRight = 'text-right'; ?>

						<?php endif; ?>

						<div class="cell medium-6 <?php echo $sourceOrder; ?>">
							<div class="embed-container">

								<?php if ($embedd) : ?>
									<?php echo $embedd; ?>
								<?php endif; ?>

							</div>
						</div>

						<div class="cell medium-6 align-center <?php echo $textRight; ?>">

							<?php if ($embeddText) : ?>
								<?php echo $embeddText; ?>
							<?php endif; ?>

						</div>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>



		<?php endwhile; ?>

	<?php endif; ?>

	<?php // mobile post navigation 
	?>
	<div class="cell small-12 no-desktop">
		<div class="grid-x small-up-2 pagination">

			<?php get_template_part('template-parts/catalog-pagination'); ?>

		</div>
	</div>
	<?php // end mobile post navigation 
	?>
	<!-- <script>
		jQuery(function() {
			jQuery("#video-header-hero").YTPlayer();
			jQuery("#modal-hero-video").YTPlayer();
			jQuery("#modal-video").YTPlayer();
		});
	</script> -->

<?php endwhile; ?>
<?php // end while (have_posts) 
?>

<div class="edit-post">
	<pre><?php edit_post_link(__('(Edit this post)', 'nacelle'), '<span class="edit-link">', '</span>'); ?></pre>
</div>
<?php get_footer();
