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

	<?php
	// variables
	$link = get_field('link_to_article');

	?>

	<div class="entry-content">

		<div class="grid-x">
			<div class="cell small-2 medium-3">
				<?php if ($link): ?>
					<a href="<?php echo $link; ?>" target="_blank">
						<?php the_post_thumbnail('fp-small', array('class' => 'alignleft')); ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="cell small-10 medium-9 press-title">
				<div class="press-title-container">
					<h2>
						<?php if ($link): ?>
							<a href="<?php echo $link; ?>" target="_blank">
						<?php else : ?>
							<a href="<?php echo get_permalink(); ?>">
						<?php endif; ?>
							<?php
								$theTitle = wp_strip_all_tags(get_field('title'));
								echo $theTitle; ?>
						</a>
					</h2>
					<h4>
						<?php if ($link): ?>
							<a href="<?php echo $link; ?>" target="_blank">
						<?php else : ?>
							<a href="<?php echo get_permalink(); ?>">
						<?php endif; ?>
						<?php
							$callout = wp_strip_all_tags(get_field('intro'));
							echo $callout; ?>
						</a>
					</h4>
				</div>
			</div>
		</div>

		<!-- date and read more -->
		<footer class="grid-x">

			<!-- admin edit link -->
			<div class="cell small-2 medium-3">

				<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
				<?php $tag = get_the_tags(); if ($tag) {
							?>
					<p><?php the_tags(); ?></p>
				<?php
						} ?>

			</div>

			<!-- date and read more -->
			<div class="cell small-10 medium-9">

				<div class="grid-x small-up-2">

					<div class="cell">
						<p><?php the_time('m.j.y'); ?></p>
					</div>
					<div class="cell text-right">
						<?php if ($link): ?>
							<a href="<?php echo $link; ?>" class="clear button success medium" target="_blank">
						<?php else : ?>
							<a class="clear button success medium" href="<?php echo get_permalink(); ?>">
						<?php endif; ?>
							<?php _e('Read More. . .', 'Nacelle'); ?>

						<?php echo '</a>'; ?>

						</a>
					</div>

				</div>

			</div>

		</footer>

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
