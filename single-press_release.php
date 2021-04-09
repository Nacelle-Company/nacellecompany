<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

get_header(); ?>

<?php //get_template_part('template-parts/featured-image');
?>
<main class="main-container">
	<div class="main-grid">
		<div class="main-content thin">
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="grid-container full">
						<header class="grid-x press">

							<div class="media-object stack-for-small">

								<div class="media-object-section">

									<?php if (has_post_thumbnail()) : ?>

										<?php the_post_thumbnail('medium', array('align' => 'left')); ?>

									<?php endif; ?>
								</div>
								<div class="media-object-section">
									<h1>
										<?php the_title(); ?>
									</h1>
								</div>

							</div>
							<footer class="cell">
								<?php
								$location = get_post_meta(get_the_ID(), 'location', true);
								$time = get_the_time('m.j.y');
								echo '<p class="text-right"><strong>';
								echo $location . ' ';
								echo "</strong>";
								echo $time;
								echo '</p>';
								?>
							</footer>
						</header>
						<div class="grid-x intro pb-2">
							<div class="cell">
								<?php
								$intro = get_post_meta(get_the_ID(), 'intro', true);
								if (!empty($intro)) {
									echo $intro;
								}
								?>
							</div>
						</div>
						<div class="grid-x content">
							<div class="cell">
								<?php the_content(); ?>
								<?php
								if (get_post_meta(get_the_ID(), 'show_boilerplate', true)) {
									$boilerplate = get_option('options_boilerplate');;
									if (!empty($boilerplate)) {
										echo $boilerplate;
									}
								}
								?>
								<?php echo '<p class="text-center">###</p>'; ?>
								<?php // PDF download 
								?>
								<footer>
									<h4 class="text-center">
										<?php
										$stills_download = get_post_meta(get_the_ID(), 'stills_download', true);
										$stills_url = wp_get_attachment_url($stills_download);
										if (!empty($stills_download)) {
											echo '<a href="' . $stills_url . '" download>Stills, </a>';
										}
										?>
										<?php
										$pdf_download = get_post_meta(get_the_ID(), 'stills_download', true);
										$pdf_url = wp_get_attachment_url($pdf_download);
										if (!empty($pdf_download)) {
											echo '<a href="' . $pdf_url . '" download>Press Release</a>';
										}
										?>
									</h4>
								</footer>
								<?php // PDF download 
								?>
							</div>
						</div>
						<div>

							<?php
							$featured_posts = get_post_meta(get_the_ID(), 'talent_name', true);
							if ($featured_posts) : ?>
								<h4>Featured Comedy</h4>
								<?php foreach ($featured_posts as $post) :

									// Setup this post for WP functions (variable must be named $post).
									setup_postdata($post); ?>
									<p>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</p>
								<?php endforeach; ?>
								<?php
								// Reset the global post object so that the rest of the page works correctly.
								wp_reset_postdata(); ?>
							<?php endif; ?>

							<?php
							$featured_posts = get_post_meta(get_the_ID(), 'talent_name', true);
							if ($featured_posts) : ?>
								<h4>Featured Talent</h4>
								<?php foreach ($featured_posts as $post) :
									// Setup this post for WP functions (variable must be named $post).
									setup_postdata($post); ?>
									<?php
									$terms = get_field('talent');
									if ($terms) : ?>
										<?php foreach ($terms as $term) : ?>
											<?php
											$talentSlug = esc_html($term->slug);
											$blogURL = get_bloginfo('url');
											$talentURL = $blogURL . '/main-talent/' . $talentSlug;
											?>
											<a href="<?php echo $talentURL; ?>"><?php echo esc_html($term->name) . ','; ?></a>
										<?php endforeach; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php
								// Reset the global post object so that the rest of the page works correctly.
								wp_reset_postdata(); ?>
							<?php endif; ?>

						</div>
					</section>

				</article>

				<?php the_post_navigation(array(
					'mid_size' => 2,
					'prev_text' => __('<i class="fas fa-long-arrow-alt-left"></i> Prev', 'textdomain'),
					'next_text' => __('Next <i class="fas fa-long-arrow-alt-right"></i>', 'textdomain'),
				)); ?>

				<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>

			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();
