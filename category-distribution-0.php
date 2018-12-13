<?php
/**
 * The template for displaying category pages
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

get_header(); ?>

		<main class="main-content-full-width grid-x grid-padding-y">
			<div class="cell medium-12 ">
				<div class="grid-x small-up-2 medium-up-4">
					<?php

                    $post_object = get_field('dist_feat_posts');

                    if ($post_object):

                        // override $post
                        $post = $post_object;
                        setup_postdata($post);

                        ?>
						<div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<span>Post Object Custom Field: <?php the_field('square_image'); ?></span>
						</div>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
					<?php endif; ?>

					<?php  if (is_category('distribution')) :?>





						<?php while (have_posts('')) : the_post();?>

							<main class="grid-container">
								<div class="grid-x">


									<?php $post_objects = get_field('dist_feat_posts');

                                      if ($post_objects): ?>

										  <?php foreach ($post_objects as $post_object):
                                              ?>

											  <div class="cell medium-6">

												  <a href="<?php echo get_permalink($post_object->ID); ?>">
													  <img src="<?php the_field('square_image', $post_object->ID); ?>">

												  </a>

											  </div>

										  <?php endforeach; ?>

									  <?php endif; ?>

									  <!-- http://rachievee.com/responsive-images-in-wordpress/ -->
								</div>

							</main>

						<?php endwhile; ?> <!-- END LOOP -->


					<?php endif ?>
				</div>
			</div>
			<div class="cell medium-12">
				<div class="grid-x">
					<div class="cell medium-6">
						<?php the_field('embedded_content'); ?>
					</div>
					<div class="cell medium-6">
						<h3>Link</h3>
					</div>
				</div>
			</div>


			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php
            if (function_exists('foundationpress_pagination')) :
                foundationpress_pagination();
            elseif (is_paged()) :
            ?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
					<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
				</nav>
			<?php endif; ?>

		</main>

<?php get_footer();
