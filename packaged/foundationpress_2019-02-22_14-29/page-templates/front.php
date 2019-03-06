<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('comedy_dynamics_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<main class="main grid-x grid-padding-x">

		<?php $count = 0; ?>

		<?php $post_objects = get_field('home_circle_post');

        if ($post_objects): ?>

		<?php foreach ($post_objects as $post_object): $count++; ?>

			<!-- if is the first home image add a class -->
			<?php if ($count == 1): ?>

				<!-- first home images class -->
				<div class="first-home-images no-mobile cell">

					<!-- . . . and print the home-image -->
					<div class="home-image">

						<a href="<?php echo get_permalink($post_object->ID); ?>">

							<!-- get the image element -->
							<?php
                            $img_size_lg = 'fp-large';
                            $img_size_md = 'fp-medium';
                            $img_size_sm = 'fp-small';
                            $image = get_field('home_image', $post_object->ID);
                            $hero_image_alt = $image['alt']; /* Get image object alt */
                            /* Get custom sizes of our image sub_field */
                            $hero_lg = $image['sizes'][ $img_size_lg ];
                            $hero_md = $image['sizes'][ $img_size_md ];
                            $hero_sm = $image['sizes'][ $img_size_sm ];
                            ?>
							<!-- Hook up Interchange as an img src -->
							<img class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
							<noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

						</a>

					</div>

			<!-- if is the third image add the orbit carousel and a new class -->
			<?php elseif ($count == 3): ?>

				<!-- orbit carousel -->
				<?php get_template_part('template-parts/orbit-carousel'); ?>

				<!-- . . . new class -->
				<div class="last-home-images no-mobile cell">

					<!-- continue showing the home_image posts -->
					<div class="home-image">

						<a href="<?php echo get_permalink($post_object->ID); ?>">

							<!-- get the image element -->
							<?php
                            $img_size_lg = 'fp-large';
                            $img_size_md = 'fp-medium';
                            $img_size_sm = 'fp-small';
                            $image = get_field('home_image', $post_object->ID);
                            $hero_image_alt = $image['alt']; /* Get image object alt */
                            /* Get custom sizes of our image sub_field */
                            $hero_lg = $image['sizes'][ $img_size_lg ];
                            $hero_md = $image['sizes'][ $img_size_md ];
                            $hero_sm = $image['sizes'][ $img_size_sm ];
                            ?>
							<!-- Hook up Interchange as an img src -->
							<img class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
							<noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

						</a>

					</div>

				<!-- otherwise print the home-image -->
				<?php else: ?>

					<!-- continue showing the home_image posts -->
					<div class="home-image">

						<a href="<?php echo get_permalink($post_object->ID); ?>">

							<!-- get the image element -->
							<?php
                            $img_size_lg = 'fp-large';
                            $img_size_md = 'fp-medium';
                            $img_size_sm = 'fp-small';
                            $image = get_field('home_image', $post_object->ID);
                            $hero_image_alt = $image['alt']; /* Get image object alt */
                            /* Get custom sizes of our image sub_field */
                            $hero_lg = $image['sizes'][ $img_size_lg ];
                            $hero_md = $image['sizes'][ $img_size_md ];
                            $hero_sm = $image['sizes'][ $img_size_sm ];
                            ?>
							<!-- Hook up Interchange as an img src -->
							<img class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
							<noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

						</a>

					</div>

				</div>

			<?php endif; ?>

		<?php endforeach; ?>

	</div> <!-- closing last-home-images -->

	<?php endif; ?>

</main>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
