<?php

/**
 * The template for displaying all category posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<?php // START featured header ?>

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

	<main <?php post_class('main-content grid-x '); ?> id="post-<?php the_ID(); ?>">

			<?php
			// HERO VIDEO present
			if (get_field('video_embedd')) {

				echo '<div class="cell medium-7">';

				// show hero video
				get_template_part('template-parts/catalog/catalog-hero');

				// show more info dropdown
				if (get_field('show_more_info')) {
					get_template_part('template-parts/catalog/catalog-more-info', '');
				};

				// show crew info
				// if (get_field('show_crew')) {
					get_template_part('template-parts/catalog/catalog-crew', '');
				// };

				// close the div with hero and more info
				echo '</div><div class="cell medium-5">';

				// show catalog aside
				get_template_part('template-parts/catalog/catalog-aside');

				echo '</div><div class="cell">';

				// show large links FULL WIDTH
				get_template_part('template-parts/catalog/catalog-large-links');

				echo '</div>';

			} else {
				// no HERO VIDEO present
				echo '<div class="no-hero-video cell medium-7">';

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
				echo '</div><div class="cell medium-5">';

				// show catalog aside
				get_template_part('template-parts/catalog/catalog-aside');

				echo '</div>';

		}; ?>

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

	<?php // mobile post navigation ?>
	<div class="cell small-12 no-desktop">
		<div class="grid-x small-up-2 pagination">

			<?php get_template_part('template-parts/catalog-pagination'); ?>

		</div>
	</div>
	<?php // end mobile post navigation ?>
	<?php
	//  <script>
	// 	jQuery(function() {
	// 		jQuery("#video-header-hero").YTPlayer();
	// 		jQuery("#modal-hero-video").YTPlayer();
	// 		jQuery("#modal-video").YTPlayer();
	// 	});
	// </script> 
	?>

<?php endwhile; ?>
<?php // end while (have_posts) ?>

<div class="edit-post">
	<pre><?php edit_post_link(__('(Edit this post)', 'nacelle'), '<span class="edit-link">', '</span>'); ?></pre>
</div>
<?php get_footer();
