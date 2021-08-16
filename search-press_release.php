

<?php
/**
 * The template for displaying archive pages
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

<?php get_template_part( 'template-parts/featured-image' ); ?>

<main class="main-container">

	<div class="main-grid">

		<div class="main-content">

			<?php
        // https://developer.wordpress.org/reference/functions/query_posts/

        $current_year = date('Y');

        $current_month = date('M');

        $posts = query_posts($query_string . "&post_status=future,publish&posts_per_page=60&order=DESC");

        if (have_posts()) : ?>

			<?php //Start the Loop ?>
			<?php while (have_posts()) : the_post(); ?>

				<?php
				// variables
				$link = get_field('link_to_article');

				?>

				<article id="post-<?php the_ID(); ?>" class="cell pt-3">
					<span class="search-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'nacelle' ), '<span>' . get_search_query() . '</span>' ); ?></span>

					<div class="grid-x feed-container">

					<?php // If a featured image is set, insert into layout and use Interchange
					// to select the optimal image size per named media query. ?>
					<?php if (has_post_thumbnail($post->ID)) : ?>

						<div class="cell medium-12 archive-title">

							<div class="grid-x">

								<?php // microphone ?>
								<div class="cell small-2 medium-3">

									<?php if ($link): ?>
										<a href="<?php echo $link; ?>" target="_blank">
											<?php the_post_thumbnail('fp-small', array('class' => 'alignleft')); ?>
										</a>
									<?php endif; ?>

								</div>

								<?php // title ?>
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

							<?php // date and read more ?>
							<footer class="grid-x">

								<?php // admin edit link ?>
								<div class="cell small-2 medium-3">

									<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
									<?php $tag = get_the_tags(); if ($tag) {
                                                ?>
										<p><?php the_tags(); ?></p>
									<?php
                                            } ?>

								</div>

								<?php // date and read more ?>
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

						<?php else : ?>

						<?php //  ?>
						<?php //  ?>
						<?php // old title ?>
						<?php //  ?>
						<?php //  ?>

						<div class="cell medium-12 archive-title">

							<div class="grid-x">

									<?php // microphone ?>
									<div class="cell small-2 medium-1">
										<img src="<?php bloginfo('template_directory'); ?>/dist/assets/images/nacelle-mic.png" />
									</div>

									<?php // article title ?>
									<div class="cell small-10 medium-11">
										<?php // oldschool title
                          if (is_single()) {
                              the_title('<h3 class="entry-title">', '</h3>');
                          } else {
                              the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
                          }
                      ?>
									</div>

							</div>

							<footer class="grid-x">

								<?php // admin edit link ?>
								<div class="cell small-2 medium-1">

									<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
									<?php $tag = get_the_tags(); if ($tag) {
                          ?>
										<p><?php the_tags(); ?></p>
									<?php
                      } ?>

								</div>

								<?php // date and read more ?>
								<div class="cell small-10 medium-11">

									<div class="grid-x small-up-2">

										<div class="cell">
											<p><?php the_time('m.j.y'); ?></p>
										</div>
										<div class="cell text-right">
											<a class="clear button success medium" href="<?php echo get_permalink(); ?>">Read More. . .</a>
										</div>

									</div>

								</div>

							</footer>

						</div>

						<?php endif;?>

					</div>
				</article>

			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; // End have_posts() check.?>

		</div>
		<?php wp_reset_query(); ?>
		<?php get_sidebar(); ?>

	</div>
</main>

<?php get_footer();
