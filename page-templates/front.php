<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php do_action('comedy_dynamics_before_content'); ?>

<?php while (have_posts('')) : the_post();?>
<style>
/* footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	height: 150px;
}
.home-feat {
	    height: 32vh;
		background-size: contain;
		background-repeat: no-repeat;
		margin: 1em 0;
}
@media print, screen and (min-width: 52.5em) {
	.home-feat:nth-child(1) {
		background-position: right;
	}
}
@media print, screen and (min-width: 52.5em) {
	.home-feat:nth-child(5) {
		background-position: center;
	}
} */

</style>

<?php //vars


?>
	<main class="grid-container">
	  <div class="grid-x small-up-1 medium-up-2">

			  <?php
              $post_objects = get_field('home_feat_posts');

                if ($post_objects): ?>

				    <?php foreach ($post_objects as $post_object): ?>
						<div class="cell">
							<a href="<?php echo get_permalink($post_object->ID); ?>">
				            <img src="<?php the_field('home_image', $post_object->ID); ?>">
							</a>
						</div>

				    <?php endforeach; ?>

				<?php endif; ?>

				<?php // http://rachievee.com/responsive-images-in-wordpress/?>

		</div>
	</main>

<?php endwhile; ?> <!-- END LOOP -->

<?php get_footer();
