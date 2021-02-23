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

<div class="grid-x align-center">

	<div class="cell">
		<?php // cell for the content 
		?>

		<header class="grid-container archive pb-2 pb-medium-0">

			<div class="grid-x align-center-middle">

				<div class="cell small-6">

					<h1 class="entry-title">

						<?php single_cat_title(); ?> <span class="hide">Production</span>

					</h1>

				</div>

				<div class="cell small-6 text-right sorting">

					<a data-toggle="searchOffCanvas">Sort & Filter</a>

				</div>

			</div>

		</header>

		<?php // start the cards 
		?>
		<div class="grid-x medium-up-4 large-up-5">

			<?php if (have_posts($args)) : ?>

				<?php // Start the Loop 
				?>
				<?php while (have_posts()) : the_post(); ?>

					<?php
					$image = get_field('square_image');
					$alt = $image['alt'];
					if (!empty($image)) :
					?>

						<?php // img container 
						?>
						<div class="media-container cell animation-element mb-2 mb-medium-2 mb-large-4">

							<?php // if catalog item has a "Custom Page Redirect" link. . . 
							?>
							<?php $link = get_field('custom_page_redirect');

							if ($link) :
								$link_url = $link['url'];
							?>

								<?php // link to the "Custom Page Redirect" page 
								?>
								<a href="<?php echo esc_url($link_url); ?>">

								<?php else : ?>

									<?php // if no "Custom Page Redirect" get the original post link 
									?>
									<a href="<?php the_permalink(); ?>">

									<?php endif; ?>

									<div class="callout callout-hover-reveal" data-callout-hover-reveal>

										<div class="callout-body">

											<?php
											$img_size_sm = 'fp-small';
											$alt = $image['alt'];
											$hero_sm = $image['sizes'][$img_size_sm];
											?>
											<img class="my-hero superman" data-interchange="[<?php echo $hero_sm; ?>, default], [<?php echo $hero_sm; ?>, small]" alt="<?php echo $alt; ?>" alt="<?php echo $alt; ?>" />
										</div>

										<div class="callout-footer">
											<?php
											$excerpt = get_field('synopsis');

											$excerpt = substr($excerpt, 0, 130);
											$result = substr($excerpt, 0, strrpos($excerpt, ' '));
											echo '<p>' . $result . '. . .</p>';
											?>
											<?php // display the synopsis 
											?>

										</div> <?php // END the footer 
												?>

									</div> <?php // END the callout 
											?>

									</a> <?php // END the link, whether its a "Custom Page Redirect" or the post link 
											?>

						</div>
						<?php // END img container 
						?>

					<?php endif; ?>
					<?php // END if catalog item has a "Custom Page Redirect" link. . . 
					?>

				<?php endwhile; ?>
				<?php // END the loop 
				?>

			<?php else : ?>

				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; // End have_posts() check.
			?>

		</div> <?php // END the cards 
				?>

	</div> <?php // END of cell for the content 
			?>

</div>