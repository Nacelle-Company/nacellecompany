<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('comedy_dynamics_before_content'); ?>

<?php while (have_posts('')) : the_post();?>

	<main class="grid-container">
		<div class="grid-x small-up-1 medium-up-2">

			<?php $post_objects = get_field('home_feat_posts');

              if ($post_objects): ?>

				  <?php foreach ($post_objects as $post_object): ?>

					  <div class="cell home-img-container">

						  <a href="<?php echo get_permalink($post_object->ID); ?>">
							  <img src="<?php the_field('home_image', $post_object->ID); ?>">

						  </a>

					  </div>

				  <?php endforeach; ?>

			  <?php endif; ?>

			  <!-- http://rachievee.com/responsive-images-in-wordpress/ -->
		</div>

	</main>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer(); ?>
