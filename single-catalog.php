<?php

/**
 * The template for displaying all category posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<!-- START featured header -->

<?php while (have_posts()) : the_post(); ?>

	<?php

	// vars
	$synopsis = get_field('synopsis');
	$talents = get_field('talent');
	$talent = get_field('talent');
	$directors = get_field('directors');
	$producers = get_field('producers');
	$writers = get_field('writers');
	$runtime = get_field('runtime');
	$date = get_field('release_date', false, false);
	$genres = get_the_terms($post->ID, 'genre');
	// $videoEmbeddPlease = get_field('video_embedd');
	$videoEmbedd = get_field('video_embedd');
	$ticketsButtonTitle = get_field('tickets_button_title');
	$titleColor = get_field('title_color');
	$squareImage = get_field('square_image');


	?>

	<header class="catalog featured-hero grid-container fluid">

		<div class="grid-x catalog grid-padding-y">

			<div class="cell">

				<div class="grid-container px-0 px-medium-3">

					<div class="grid-x align-middle">

						<div class="cell medium-12 grid-offset-5">

							<?php
							if (is_single()) {
								the_title('<h1 class="entry-title">', '</h1>');
							} else {
								the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
							}
							?>

						</div>

					</div>

					<div class="grid-x align-middle">

						<div class="cell medium-8 grid-offset-5">

							<div class="play grid-x align-start">

								<!-- synopsis -->
								<div class="cell medium-8">

									<?php the_content(); ?>

								</div>


								<!-- modal button -->
								<?php if (!empty($videoEmbedd)) : ?>

									<div class="cell medium-4">

										<button class="bounce hollow button success" data-open="videoModal1">

											<i class="far fa-play-circle"></i>Watch Trailer

										</button>

									</div>

								<?php endif; ?>
								<!-- END modal button -->

								<?php if (!empty($ticketsButtonTitle)) : ?>

									<!-- include tickets modal -->
									<?php get_template_part('template-parts/tickets-modal', 'none'); ?>

								<?php endif; ?>

							</div>

						</div>

					</div>

				</div> <!-- END grid-container -->

			</div> <!-- END cell -->

		</div> <!-- END catalog -->

	</header>

	<main class="top-meta grid-x">

		<article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-7 small-order-2');
												?>>
			<?php get_template_part('template-parts/catalog/catalog-hero', ''); ?>

			<?php if (get_field('show_metadata')) : ?>

				<?php get_template_part('template-parts/catalog/catalog-more-info', ''); ?>

			<?php endif; ?>

		</article>

		<?php get_template_part('template-parts/catalog/catalog-aside', ''); ?>

	</main>

	<div class="grid-container">

		<main class="top-meta grid-x grid-padding-y">

			<article id="post-<?php the_ID(); ?>" <?php //post_class('cell medium-7 small-order-2'); 
													?>>

				<!-- catalog content sections -->

				<?php get_template_part('template-parts/catalog/catalog-main-info', ''); ?>

				<?php get_template_part('template-parts/catalog/catalog-link-image-LG', ''); ?>

			</article>

		</main>

	</div> <!-- closing div for featured-image.php topmost "grid-container" -->

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

	<!-- EMBEDD modal -->
	<?php if (!empty($videoEmbedd)) : ?>

		<div class="reveal single-cat" id="videoModal1" data-reveal data-reset-on-close="true">

			<div class='embed-container'>

				<?php

				// get iframe HTML
				$iframe = get_field('video_embedd');


				// use preg_match to find iframe src
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];


				// add extra params to iframe src
				$params = array(
					'controls'    => 0,
					'hd'        => 1,
					'autoplay'	=> 1,
					'autohide'    => 1
				);

				$new_src = add_query_arg($params, $src);

				$iframe = str_replace($src, $new_src, $iframe);


				$attributes = 'frameborder="0"';

				$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


				echo $iframe;

				?>

			</div>

			<!-- close modal X -->
			<button class="close-button" data-close aria-label="Close reveal" type="button">

				<span aria-hidden="true">&times;</span>

			</button>

		</div>

	<?php endif ?>
	<!-- Watch Trailer MODAL END-->



	<!-- mobile post navigation -->
	<div class="cell small-12 no-desktop">
		<div class="grid-x small-up-2 pagination">

			<?php get_template_part('template-parts/catalog-pagination'); ?>

		</div>
	</div>
	<!-- end mobile post navigation -->
	<script>
		jQuery(function() {
			jQuery("#video-header-hero").YTPlayer();
			jQuery("#modal-hero-video").YTPlayer();
		});
	</script>

<?php endwhile; ?>
<!-- end while (have_posts) -->

<div class="edit-post">
	<pre><?php edit_post_link(__('(Edit this post)', 'nacelle'), '<span class="edit-link">', '</span>'); ?></pre>
</div>
<?php get_footer();
