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
<?php //if (has_post_thumbnail($post->ID)) :
?>
<?php while (have_posts()) : the_post(); ?>

	<?php

	// vars

	$videoEmbedd = get_field('video_embedd');
	$ticketsButtonTitle = get_field('tickets_button_title');
	$callout = get_field('callout');

	// image 
	$imageHorizontal = get_field('image_horizontal');
	$imageHorizontalAlt = $imageHorizontal['alt'];

	// image setup
	$img_size_lg = 'fp-large';
	$img_size_md = 'fp-medium';
	$img_size_sm = 'fp-small';

	/* Get custom sizes of our image sub_field */
	$imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
	$imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
	$imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];

	?>

	<main class="grid-container">
		<header class="grid-container fluid">
			<div class="grid-x catalog">

				<div class="cell">

					<div class="grid-container px-0 px-medium-3">

						<div class="grid-x align-middle">

							<div class="cell medium-12 grid-offset-5 text-center">

								<?php
								if (is_single()) {
									the_title('<h1 class="entry-title">', '</h1>');
								} else {
									the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
								}
								?>

							</div>

						</div>

					</div> <?php // END grid-container 
									?>

				</div> <?php // END cell 
								?>

			</div> <?php // END catalog 
							?>

		</header>
		<div class="top-meta grid-x align-center">

			<div class="cell large-12">

				<div class="grid-x">
					<article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-4 medium-offset-2 small-order-2'); ?>>

						<div class="grid-y grid-padding-y align-middle pt-4">

							<img class="feat-pg horizontal" data-interchange="[<?php echo $imageHorizontalSM; ?>, default], [<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
							<noscript>
								<img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
							</noscript>

							<div class="cell">
								<h2 class="primary text-center"><?php echo $callout; ?></h2>
							</div>

							<div class="cell scroll-arrow" data-smooth-scroll>

								<a href="#purchase-logos">
									<svg width="82" height="32" xmlns="http://www.w3.org/2000/svg">
										<g stroke="#FFF" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="bevel">
											<path d="M1.167 1.79l39.666 28.42M80.833 1.79L41.167 30.21" />
										</g>
									</svg>
								</a>

							</div>

						</div>

					</article>

					<?php get_template_part('template-parts/content/content-catalog-aside', ''); ?>
				</div>

			</div>

			<footer class="cell medium-12 small-order-3 purchase-logos" id="purchase-logos">

				<?php // LOGOS 
				?>
				<div class="grid-y grid-padding-y">

					<div class="cell large-12 logo-outer-container">

						<?php if (have_rows('logo_repeater')) : ?>

							<div class="grid-x align-center">

								<div class="cell medium-12 large-10">

									<div class="grid-x small-up-2 medium-up-3 large-up-4 align-center align-middle pt-medium-3 pb-medium-1 grid-padding-x grid-padding-y">

										<?php while (have_rows('logo_repeater_releases')) : the_row();

											// vars
											$logoOrTitle = get_sub_field('logo_or_title');
											$title = get_sub_field('title');
											$image = get_sub_field('logo');
											$link = get_sub_field('logo_link');

											// $link_url = $link['url'];

										?>

											<div class="cell text-center">

												<?php if ($link) : ?>
													<a href="<?php echo $link['url']; ?>" target="_blank">
													<?php endif; ?>

													<?php if ($logoOrTitle) : ?>

														<img class="thumbnail" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

													<?php else : ?>

														<h3><?php echo $title; ?></h3>

													<?php endif; ?>

													<?php if ($link) : ?>
													</a>
												<?php endif; ?>

											</div>

										<?php endwhile; ?>

									</div>

								</div>

							</div>

						<?php endif; ?>

					</div>

				</div> <?php // END logos 
								?>

			</footer>

			<div class="edit-post">
				<pre><?php edit_post_link(__('(Edit this post)', 'nacelle'), '<span class="edit-link">', '</span>'); ?></pre>
			</div>

		<?php endwhile; ?>
		</div>
		<?php // mobile post navigation 
		?>
		<div class="cell small-12 no-desktop">
			<div class="grid-x small-up-2 pagination">

				<?php get_template_part('template-parts/catalog-pagination'); ?>

			</div>
		</div>
		<?php // end mobile post navigation 
		?>
	</main>
	<?php get_footer();
