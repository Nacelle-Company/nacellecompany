<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('comedy_dynamics_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<main class="grid-y">

		<div class="cell medium-auto medium-cell-block-container home-container">

			<div class="grid-x pt-2 pb-2">

				<?php $post_objects = get_field('home_feat_posts');

                if ($post_objects): ?>

					<?php foreach ($post_objects as $post_object): ?>

						<a class="cell medium-6 large-offset-1 large-5 img-container" href="<?php echo get_permalink($post_object->ID); ?>">

							<?php

                            $image = get_field('home_image', $post_object->ID);

                            $size = 'fp-xlarge'; // (thumbnail, medium, large, full or custom size)

                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }

                            ?>
						</a>

					<?php endforeach; ?>

				<?php endif; ?>

			</div>

		</div>

	</main>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
