<?php
/*
Template Name: Front Grid
*/
get_header(); ?>

<?php do_action('Nacelle_before_content'); ?>

<?php while (have_posts('')) : the_post(); ?>

	<div class="absolute-container">

		<div class="grid-x">

			<?php // variables
			$post_objects = get_field('home_feat_posts');
			$numberRepeat = 0;
			$rangeNumber = get_field('range');

			if ($post_objects) : ?>

				<?php foreach ($post_objects as $post_object) : ?>

					<div class="cell small-3 medium-2 img-container">

						<?php

						$img_size_lg = 'fp-large';
						$img_size_md = 'fp-medium';
						$img_size_sm = 'fp-small';

						$image = get_field('home_image', $post_object->ID);

						$hero_image_alt = $image['alt']; /* Get image object alt */

						/* Get custom sizes of our image sub_field */
						$hero_lg = $image['sizes'][$img_size_lg];
						$hero_md = $image['sizes'][$img_size_md];
						$hero_sm = $image['sizes'][$img_size_sm];

						?>

						<!-- Hook up Interchange as an img src -->
						<img class="my-hero superman" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
						<noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

					</div>

					<?php $numberRepeat++; ?>

					<?php if ($rangeNumber < $numberRepeat) {
						break;
					} ?>

					<?php foreach ($post_objects as $post_object) : ?>

						<div class="cell small-3 medium-2 img-container">

							<?php

							$img_size_lg = 'fp-large';
							$img_size_md = 'fp-medium';
							$img_size_sm = 'fp-small';

							$image = get_field('home_image', $post_object->ID);

							$hero_image_alt = $image['alt']; /* Get image object alt */

							/* Get custom sizes of our image sub_field */
							$hero_lg = $image['sizes'][$img_size_lg];
							$hero_md = $image['sizes'][$img_size_md];
							$hero_sm = $image['sizes'][$img_size_sm];

							?>

							<!-- Hook up Interchange as an img src -->
							<img class="my-hero superman" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
							<noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

						</div>

					<?php endforeach; ?>

				<?php endforeach; ?>

			<?php endif; ?>

		</div>

	</div>

	<!-- overlay -->
	<div class="home-overlay top" style="opacity: .<?php the_field('background_overlay_color') ?>;"></div>

	<!-- main grid -->
	<main class="grid-x align-center front-grid">
		
		<div class="home-overlay bottom" style="opacity: .<?php the_field('bottom_background_overlay_color') ?>;"></div>

		<div class="cell z-5 top-content">

			<div class="grid-x grid-padding-x align-center home-content">

				<div class="cell medium-12 large-8 align-self-middle">

					<?php the_content(); ?>

				</div>

				<div class="cell medium-8 scroll-arrow" data-smooth-scroll>

					<a href="#more" class="align-center">
						<svg width="82" height="32" xmlns="http://www.w3.org/2000/svg">
							<g stroke="#FFF" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="bevel">
								<path d="M1.167 1.79l39.666 28.42M80.833 1.79L41.167 30.21" />
							</g>
						</svg>
					</a>

				</div>

			</div>

		</div>

		<div class="cell bottom-content z-5">

			<div class="grid-x more align-center align-middle grid-padding-y grid-padding-x" id="more">

				<div class="cell medium-12 large-6 text-center">

					<?php

					// check if the flexible content field has rows of data
					if (have_rows('flexible_content')) :

						// loop through the rows of data
						while (have_rows('flexible_content')) : the_row();

							// check current row layout
							if (get_row_layout() == 'button') :

								// check if the nested repeater field has rows of data
								if (have_rows('repeater')) :

									// loop through the rows of data
									while (have_rows('repeater')) : the_row();

										$buttonTitle = get_sub_field('button_title');
										$buttonIcon = get_sub_field('button_icon');
										$buttonUrl = get_sub_field('button_url'); ?>

										<a href="<?php echo $buttonUrl['url']; ?>" class="button large primary"><i class="fas <?php echo $buttonIcon; ?>"></i><?php echo $buttonTitle; ?></a>

					<?php endwhile;

								endif;

							elseif (get_row_layout() == 'content') :

								echo the_sub_field('wysiwyg');

							endif;

						endwhile;

					else :

					// no layouts found

					endif;

					?>

				</div>

			</div>

		</div>


	</main>

<?php endwhile; ?>
<!-- END LOOP -->

<?php get_footer(); ?>