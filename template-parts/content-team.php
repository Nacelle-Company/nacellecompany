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

	<?php get_template_part('template-parts/logo-bg-header'); ?>

	<div class="entry-content">


		<?php if( have_rows('repeater') ): ?>

			<div class="grid-x small-up-2 medium-up-3 large-up-4 grid-padding-x align-center">

			<?php while( have_rows('repeater') ): the_row();

				// vars
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$position = get_sub_field('position');

				?>

				<div class="cell text-center teammember">

					<img class="thumbnail member" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
					<img class="thumbnail team-hover-icon" src="http://localhost/nacelle/nacelle/wp-content/uploads/2019/06/nacelle-company-logo-mark-large.png" alt="<?php echo $image['alt'] ?>" />

					<div class="cell team-info">
						<?php if( $name ): ?>
							<p><?php echo $name; ?></p>
						<?php endif; ?>

						<?php if( $position ): ?>
							<p class="position"><?php echo $position; ?></p>
						<?php endif; ?>
					</div>

				</div>

			<?php endwhile; ?>

			</div>

		<?php endif; ?>



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
