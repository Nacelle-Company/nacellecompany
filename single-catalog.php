<?php

/**
 * The template for displaying all category posts
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

get_header(); ?>
<?php get_template_part('template-parts/featured-image'); ?>

<div class="grid-container">
	<main class="top-meta grid-x grid-margin-x grid-padding-y">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/content-catalog', ''); ?>
		<?php endwhile; ?>
	</main>
</div> <!-- closing div for featured-image.php topmost "grid-container" -->


<div class="grid-container">
	<div class="grid-x grid-padding-y grid-margin-y grid-margin-x align-middle">
			<?php if (have_rows('embedded_content')): ?>

				<?php while (have_rows('embedded_content')): the_row();

                    // vars
                    $embedd = get_sub_field('embedded_link');
                    $embeddText = get_sub_field('embedded_text');
                    $embeddSide = get_sub_field('embedded_side');

                    ?>
					<?php if (get_sub_field('embedded_side')): ?>

						<?php 	$sourceOrder = 'medium-order-2';
                                $textRight = 'text-right'; ?>

					<?php endif; ?>

							<div class="cell medium-6 <?php echo $sourceOrder; ?>">
								<div class="embed-container">

								<?php if ($embedd): ?>
									<?php echo $embedd; ?>
								<?php endif; ?>

								</div>
							</div>

							<div class="cell medium-6 align-center <?php echo $textRight; ?>">

								<?php if ($embeddText): ?>
									<?php echo $embeddText; ?>
								<?php endif; ?>

							</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
	</div>



	<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>

<?php get_footer(); ?>
