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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="grid-container full">
		<?php if (has_post_thumbnail()) : ?>
			<header class="grid-x press">

				<div class="media-object stack-for-small">
					<div class="media-object-section">
						<?php the_post_thumbnail('medium'); ?>
					</div>
					<div class="media-object-section">
						<h1>
							<?php the_field('title'); ?>
						</h1>
					</div>
				</div>

			</header>
			<div class="grid-x intro">
				<div class="cell">
					<h4>
						<?php the_field('intro'); ?>
					</h4>
				</div>
			</div>
			<div class="grid-x content">
				<div class="cell">
					<?php
                        echo '<div class="cell">';
                        echo "<strong>";
                        $location = the_field('location');
                        echo "</strong>";
                        echo  $location . the_time(' ' . 'm.j.y' . ' ' . '–');
                        echo '</div>';
                        the_content('grid-x');
                        echo '<p class="text-center">###</p>';
                    ?>
				</div>
			</div>

		<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
	</section>

	<div class="entry-content">

		<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>
	</div>
	<footer>
		<?php
            wp_link_pages(
                array(
                    'before' => '<nav id="page-nav"><p>' . __('Pages:', 'comedy-dynamics'),
                    'after'  => '</p></nav>',
                )
            );
        ?>
		<?php $tag = get_the_tags(); if ($tag) {
            ?><p><?php the_tags(); ?></p><?php
        } ?>
	</footer>
</article>
