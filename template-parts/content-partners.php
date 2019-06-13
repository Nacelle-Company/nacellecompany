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
	<header>
	<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<?php //Nacelle_entry_meta(); ?>
	</header>
	<div class="entry-content">
		<div class="grid-x grid-padding-x">

			<!-- logos -->
			<div class="cell medium-6">

				<?php if( have_rows('logo_repeater') ): ?>

					<div class="grid-x small-up-2 medium-up-3 large-up-4 align-center pt-medium-4 grid-padding-x">

					<?php while( have_rows('logo_repeater') ): the_row();

						// vars
						$image = get_sub_field('logo');
						$link = get_sub_field('logo_link');

						// $link_url = $link['url'];

						?>

						<div class="cell text-center">

							<?php if( $link ): ?>
								<a href="<?php echo $link['url']; ?>">
							<?php endif; ?>

								<img class="thumbnail" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

							<?php if( $link ): ?>
								</a>
							<?php endif; ?>

						</div>

					<?php endwhile; ?>

					</div>

				<?php endif; ?>

			</div>

			<!-- left content -->
			<div class="cell medium-6">

				<h2 class="fadeIn"><?php the_field('left_icon'); ?><?php the_field('left_title'); ?></h2>
				<?php the_field('left_content'); ?>

			</div>

		</div>


		<div class="grid-x grid-padding-x grid-padding-y">

			<div class="cell medium-6">

				<h2 class="fadeIn"><?php the_field('right_icon'); ?><?php the_field('right_title'); ?></h2>
				<?php the_field('right_content'); ?>

				<?php if( have_rows('logo_repeater02') ): ?>

					<div class="grid-x small-up-2 medium-up-3 large-up-4 align-center pt-medium-4 grid-padding-x">

					<?php while( have_rows('logo_repeater02') ): the_row();

						// vars
						$image02 = get_sub_field('logo02');
						$link02 = get_sub_field('logo_link02');

						// $link_url = $link['url'];

						?>

						<div class="cell text-center">

							<?php if( $link02 ): ?>
								<a href="<?php echo $link02['url']; ?>">
							<?php endif; ?>

								<img class="thumbnail" src="<?php echo $image02['url']; ?>" alt="<?php echo $image02['alt'] ?>" />

							<?php if( $link02 ): ?>
								</a>
							<?php endif; ?>

						</div>

					<?php endwhile; ?>

					</div>

				<?php endif; ?>

			</div>

			<!-- right image -->
			<div class="cell medium-6">

				<?php

				$image = get_field('right_image');

				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				<?php endif; ?>

			</div>

		</div>
		<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
	</div>
	<footer>
		<?php
            wp_link_pages(
                array(
                    'before' => '<nav id="page-nav"><p>' . __('Pages:', 'nacelle'),
                    'after'  => '</p></nav>',
                )
            );
        ?>
		<?php $tag = get_the_tags(); if ($tag) {
            ?><p><?php the_tags(); ?></p><?php
        } ?>
	</footer>
</article>
