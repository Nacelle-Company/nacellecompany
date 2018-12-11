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
					<?php  if (is_category('distribution')) :?>

						<?php

                        $posts = get_posts(array(
                            'posts_per_page'	=> 1,
                            'post_type'			=> 'catalog',
                            'meta_key'			=> 'dist_film_sticky_post',
                            'meta_value'		=> 1,
                            'order'				=> ''
                        ));
                        if ($posts): ?>

							<?php foreach ($posts as $post):

                                setup_postdata($post);

                                $square_image = get_field('square_image');

                                if (!empty($square_image)): ?>

								<div class="cell medium-3">
									<div class="cell">
										<a href="/comedydynamics/media/film/"><h2>Film</h2></a>
									</div>

									<a href="/comedydynamics/media/film/">
										<div class="callout">
											<div class="callout-body">
												<img class="cell medium-6 category-feat" src="<?php echo $square_image['url']; ?>">
												<noscript><img src="<?php echo $square_image['url']; ?>" alt="<?php echo $square_image['alt']; ?>" /></noscript>
											</div>
										</div>
									</a>

								</div>
								<?php endif?>

							<?php endforeach; ?>

							<?php wp_reset_postdata();?>

						<?php endif; ?>

<!-- END FILM SECTION -->

						<?php

                        $posts = get_posts(array(
                            'posts_per_page'	=> 1,
                            'post_type'			=> 'catalog',
                            'meta_key'			=> 'dist_album_sticky_post',
                            'meta_value'		=> 1
                        ));
                        if ($posts): ?>

							<?php foreach ($posts as $post):

                                setup_postdata($post);

                                $square_image = get_field('square_image');

                                if (!empty($square_image)): ?>

								<div class="cell medium-3">
									<div class="cell">
										<a href="/comedydynamics/media/album/"><h2>Album</h2></a>
									</div>

									<a href="/comedydynamics/media/album/">
										<div class="callout">
											<div class="callout-body">
												<img class="cell medium-6 category-feat" src="<?php echo $square_image['url']; ?>">
												<noscript><img src="<?php echo $square_image['url']; ?>" alt="<?php echo $square_image['alt']; ?>" /></noscript>
											</div>
										</div>
									</a>

								</div>
								<?php endif?>

							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>

						<!-- END ALBUM SECTION -->
						<!-- STAND UP SECTION -->

						<?php

                        $posts = get_posts(array(
                            'posts_per_page'	=> 1,
                            'post_type'			=> 'catalog',
                            'meta_key'			=> 'dist_stand_up_sticky_post',
                            'meta_value'		=> 1
                        ));
                        if ($posts): ?>

							<?php foreach ($posts as $post):

                                setup_postdata($post);

                                $square_image = get_field('square_image');

                                if (!empty($square_image)): ?>

								<div class="cell medium-3">
									<div class="cell">
										<a href="/comedydynamics/media/special/"><h2>Special</h2></a>
									</div>

									<a href="/comedydynamics/media/special/">
										<div class="callout">
											<div class="callout-body">
												<img class="cell medium-6 category-feat" src="<?php echo $square_image['url']; ?>">
												<noscript><img src="<?php echo $square_image['url']; ?>" alt="<?php echo $square_image['alt']; ?>" /></noscript>
											</div>
										</div>
									</a>

								</div>
								<?php endif?>

							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>
						<!-- end STAND UP SECTION -->
						<!-- SERIES SECTION -->

						<?php

                        $posts = get_posts(array(
                            'posts_per_page'	=> 1,
                            'post_type'			=> 'catalog',
                            'meta_key'			=> 'dist_series_sticky_post',
                            'meta_value'		=> 1
                        ));
                        if ($posts): ?>

							<?php foreach ($posts as $post):

                                setup_postdata($post);

                                $square_image = get_field('square_image');

                                if (!empty($square_image)): ?>

								<div class="cell medium-3">
									<div class="cell">
										<a href="/comedydynamics/media/series/"><h2>Series</h2></a>
									</div>

									<a href="/comedydynamics/media/series/">
										<div class="callout">
											<div class="callout-body">
												<img class="cell medium-6 category-feat" src="<?php echo $square_image['url']; ?>">
												<noscript><img src="<?php echo $square_image['url']; ?>" alt="<?php echo $square_image['alt']; ?>" /></noscript>
											</div>
										</div>
									</a>

								</div>
								<?php endif?>

							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>
						<!-- end SERIES SECTION -->


					<?php endif;?> <!-- END category is distribution -->
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
