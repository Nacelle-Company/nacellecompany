<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>
		<div class="grid-x grid-padding-y feed-container">

			<?php
            // If a featured image is set, insert into layout and use Interchange
            // to select the optimal image size per named media query.
            if (has_post_thumbnail($post->ID)) : ?>

			<div class="cell medium-4">
				<?php echo '<a href="' . get_permalink() . '">'; ?>
					<img data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php the_post_thumbnail_url('featured-large'); ?>, large], [<?php the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
				<?php echo '</a>'; ?>
			</div>

			<div class="cell medium-8 archive-title">

				<div class="grid-x">
					<h4> <!-- newschool title -->
						<?php echo '<a href="' . get_permalink() . '">'; ?>
							<?php
                            $acfTitle = the_field('title');
                            $singleTitle = 	is_single();
                            if (!empty($acfTitle)) {
                                echo $acfTitle;
                            } elseif (!empty($singleTitle)) {
                                echo the_title();
                            }


                            ?>

						<?php echo '</a>'; ?>
					</h4>
				</div>
				<div class="grid-x small-up-2">
					<div class="cell">
						<p><?php the_time('m.j.y'); ?></p>
					</div>
					<div class="cell text-right">
						<a class="clear button success medium" href="<?php echo get_permalink(); ?>">Read More. . .</a>
					</div>
				</div>
			</div>

		<?php else : ?>

			<div class="cell medium-12 archive-title">

				<div class="grid-x">
					<?php // oldschool title
                        if (is_single()) {
                            the_title('<h3 class="entry-title">', '</h3>');
                        } else {
                            the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
                        }
                    ?>
				</div>
				<div class="grid-x small-up-2">
					<div class="cell">
						<p><?php the_time('m.j.y'); ?></p>
					</div>
					<div class="cell text-right">
						<a class="clear button success medium" href="<?php echo get_permalink(); ?>">Read More. . .</a>
					</div>
				</div>
			<footer>
				<div class="entry-content">
					<?php //the_content();?>
					<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>
				</div>
				<?php $tag = get_the_tags(); if ($tag) {
                        ?><p><?php the_tags(); ?></p><?php
                    } ?>
			</footer>
		</div>

		<?php endif;?>

	</div>
</article>
