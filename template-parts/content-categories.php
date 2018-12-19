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

//get_header();?>

	<!-- <main class="main-content-full-width grid-x grid-padding-y"> -->
		<div class="cell medium-12">
			<header class="grid-container archive">
				<div class="grid-x align-center-middle">
					<div class="cell medium-6">
						<h1 class="entry-title"><?php single_cat_title();?></h1>
					</div>
					<div class="cell medium-6 text-right sorting">
						<a data-toggle="searchOffCanvas">Sort & Filter</a>
					</div>
				</div>
			</header>
			<div class="grid-x grid-margin-y grid-padding-y small-up-2 medium-up-4 large-up-6">
				<?php if (have_posts()) : ?>

					<?php /* Start the Loop */ ?>
					<?php while (have_posts()) : the_post();?>

						<?php
                        $image = get_field('square_image');
                        if ($image) : ?>

							<div class="media-container cell medium-2 medium-collapse-y">
								<a href="<?php the_permalink(); ?>">
									<div class="callout callout-hover-reveal" data-callout-hover-reveal>
									    <div class="callout-body">
										<?php
                                        $size = 'medium'; // (thumbnail, medium, large, full or custom size)

                                        if ($image) {
                                            echo wp_get_attachment_image($image, $size);
                                        }
                                        ?>
									    </div>
									    <div class="callout-footer">
											<p>
												<?php $summary = get_field('synopsis'); echo mb_substr($summary, 0, 100); ?>...
											</p>
									    </div>
									</div>
								</a>
							</div>

						<?php endif; ?>


					<?php endwhile;?>

				<?php else : ?>

						<?php get_template_part('template-parts/content', 'none'); ?>

				<?php endif; // End have_posts() check.?>
			</div>


		<?php /* Display navigation to next/previous pages when applicable */ ?>
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

	<!-- </main> -->


<?php //get_footer();
