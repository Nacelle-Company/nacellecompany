<?php
/*
Template Name: Front Grid
*/
get_header(); ?>

<?php do_action('comedy_dynamics_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<main class="grid-x">

				<?php $post_objects = get_field('home_feat_posts');

                if ($post_objects): ?>

					<?php foreach ($post_objects as $post_object): ?>

						<div class="cell medium-6 img-container">

						<a href="<?php echo get_permalink($post_object->ID); ?>">

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
							<img class="my-hero superman" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
							<noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>


						</a>

					</div>

					<?php endforeach; ?>

				<?php endif; ?>

	</main>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
