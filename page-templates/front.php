<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('comedy_dynamics_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<main class="cell medium-auto">

		<div class="grid-x align-center-middle home-container">

			<?php
            // echo '<pre>';
            //     print_r(get_field('home_feat_posts'));
            // echo '</pre>';
            // die;
             ?>

			<?php $post_objects = get_field('home_feat_posts');

              if ($post_objects): ?>

				  <?php foreach ($post_objects as $post_object): ?>

				  	<div class="cell home-img medium-5">

						<a href="<?php echo get_permalink($post_object->ID); ?>">

						<?php

                        $image = get_field('home_image', $post_object->ID);
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)

                        if ($image) {
                            echo wp_get_attachment_image($image, $size);
                        }

                        ?>
						
						</a>
				  	</div>

				  <?php endforeach; ?>

			  <?php endif; ?>

			  <!-- http://rachievee.com/responsive-images-in-wordpress/ -->

		  </div>

	</main>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
