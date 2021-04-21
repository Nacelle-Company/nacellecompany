<?php

/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php if (have_rows('repeater')) : ?>

			<div class="grid-x small-up-1 medium-up-2 large-up-4 grid-padding-x grid-padding-y align-center mb-large-4 pb-large-3">

				<?php while (have_rows('repeater')) : the_row();

					// vars
					$image = get_sub_field('image');
					$name = get_sub_field('name');
					$position = get_sub_field('position');

					?>

					<div class="cell text-center teammember">

						<div class="cell team-info">
							<?php if ($name) : ?>
								<p class="name"><?php echo $name; ?></p>
							<?php endif; ?>

							<?php if ($position) : ?>
								<p class="position"><?php echo $position; ?></p>
							<?php endif; ?>
						</div>

						<img class="thumbnail member" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<img class="thumbnail team-hover-icon" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/nacelle-svg-logo-mark.svg" alt="<?php echo $image['alt'] ?>" />



					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>



		<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
	</div>
</article>