<?php
/**
 * The template for displaying the media taxonomy archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<div class="cell medium-12"> <!-- cell for the content -->

	<header class="grid-container archive">

		<div class="grid-x align-center-middle">

			<div class="cell small-6">

				<h1 class="entry-title"><?php single_cat_title();?></h1>

			</div>

			<div class="cell small-6 text-right sorting">

				<a data-toggle="searchOffCanvas">Sort & Filter</a>

			</div>

		</div>

	</header>

	<!-- start the cards -->
	<div class="grid-x small-up-2 medium-up-4 large-up-6 align-center-middle">

		<?php
        // sort posts by title
        // https://www.shilling.id.au/2011/11/30/how-to-change-the-order-of-posts-in-the-wordpress-loop/
        $args = array_merge($wp_query->query, array( 'orderby' => 'title','order' => 'ASC' ));

        query_posts($args);

        if (have_posts($args)) : ?>

			<!-- Start the Loop -->
			<?php while (have_posts()) : the_post();?>

				<!-- if the catalog item has a square image uploaded. . . -->
				<?php
                $image = get_field('square_image');

                if ($image) :
                    ?>

					<!-- img container -->
					<div class="media-container cell medium-2 mb-4 mb-medium-5 mb-medium-4 mb-large-5 mb-xlarge-3">

						<!-- if catalog item has a "Custom Page Redirect" link. . . -->
						<?php
                        $link = get_field('custom_page_redirect');

                        if ($link):

                            $link_url = $link['url'];
                            ?>

							<!-- link to the "Custom Page Redirect" page -->
							<a href="<?php echo esc_url($link_url); ?>">

							<?php else: ?>

								<!-- if no "Custom Page Redirect" get the original post link -->
								<a href="<?php the_permalink(); ?>">

								<?php endif; ?>

								<div class="callout callout-hover-reveal" data-callout-hover-reveal>

									<div class="callout-body">

										<?php
                                        $size = 'medium'; // (thumbnail, medium, large, full or custom size)

                                        // display the img
                                        if ($image) {
                                            echo wp_get_attachment_image($image, $size);
                                        } ?>

									</div>

									<!-- img hover footer -->
									<div class="callout-footer">

										<!-- display the synopsis -->
										<p><?php $synopsis = get_field('synopsis'); echo $synopsis; ?></p>

									</div> <!-- END the footer -->

								</div> <!-- END the callout -->

							</a> <!-- END the link, whether its a "Custom Page Redirect" or the post link -->

						</div> <!-- END img container -->

					<?php endif; ?> <!-- END if catalog item has a "Custom Page Redirect" link. . . -->

				<?php endwhile;?> <!-- END the loop -->

		<?php else : ?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; // End have_posts() check.?>

	</div> 	<!-- END the cards -->

	<!-- Display navigation to next/previous pages when applicable -->
	<?php
    if (function_exists('comedy_dynamics_pagination')) :

        comedy_dynamics_pagination();

    elseif (is_paged()) :
    ?>
		<nav id="post-nav">

			<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'comedy-dynamics')); ?></div>

			<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'comedy-dynamics')); ?></div>

		</nav>

	<?php endif; ?>

</div> <!-- END of cell for the content -->
