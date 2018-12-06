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

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<div class="cell medium-12">
				<div class="grid-x">

					<?php if (is_category('distributions')) : ?>

							<?php $post_object = get_field('distribution_post_01'); // POST ONE
                            if ($post_object):
                                // override $post
                                $post = $post_object;
                                $alt_text = get_post_meta($thumbnail->ID, '_wp_attachment_image_alt', true);
                                setup_postdata($post);
                                ?>
								<div class="cell medium-3">
									<a href="<?php the_permalink(); ?>">
										<!-- Hook up Interchange as an img src -->
										<div class="callout callout-hover-reveal" data-callout-hover-reveal>
											<div class="callout-body">
												<img class="cell medium-6 category-feat" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]">
												<noscript><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt_text; ?>" /></noscript>
											</div>
											<div class="callout-footer">
												<p><?php the_field('synopsis'); ?></p>
											</div>
										</div>
									</a>
								</div>

							<?php wp_reset_postdata(); // reset the query?>
							<?php endif; ?>

							<?php $post_object = get_field('distribution_post_02'); // POST TWO
                            if ($post_object):
                                // override $post
                                $post = $post_object;
                                setup_postdata($post);
                                echo '<pre>';
                                    print_r(get_field('distribution_post_02'));
                                echo '</pre>';
                                die;
                                ?>
								<div class="cell medium-3">
									<a href="<?php the_permalink(); ?>">
										<!-- Hook up Interchange as an img src -->
										<div class="callout callout-hover-reveal" data-callout-hover-reveal>
											<div class="callout-body">
												<img class="cell medium-6 category-feat" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]">
												<noscript><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>
											</div>
											<div class="callout-footer">
												<p><?php the_field('synopsis'); ?></p>
											</div>
										</div>
									</a>
								</div>
							<?php wp_reset_postdata(); // reset the query?>
							<?php endif; ?>

						<?php endif; ?> <!-- END category is distributions -->
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

	</div>
</div>

<?php get_footer();
