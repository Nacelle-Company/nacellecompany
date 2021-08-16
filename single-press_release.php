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
		<div class="main-content">
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content grid-container full">
						<header class="grid-x press pb-2 mb-2">
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
								echo '<p class="text-right mb-0"><strong>';
								echo $location . ' ';
								echo "</strong>";
								echo $time;
								echo '</p>';
								?>
							</footer>
						</header>
						<div class="grid-x intro pb-2 mb-2">
							<div class="cell mb-0">
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
								<div class="callout secondary large">
									<p>
										<?php
										if (get_post_meta(get_the_ID(), 'show_boilerplate', true)) {
											$boilerplate = get_option('options_boilerplate');;
											if (!empty($boilerplate)) {
												echo $boilerplate;
											}
										}
										?>
									</p>
								</div>
								<?php echo '<p class="text-center">###</p>'; ?>
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
						<hr>
					</div>
					<footer class="pagination">
						<?php get_template_part('template-parts/catalog/catalog-pagination'); ?>
						<div class="cell flex-container align-center-middle align-spaced text-center">
							<div class="mr-1">
								<svg class="icon" width="7" height="11" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.01.972v8.652c0 .599-.725.899-1.148.475L.535 5.773a.673.673 0 010-.95L4.862.495A.672.672 0 016.01.972z" fill-rule="nonzero" />
								</svg>
							</div>
							<a href="<?php echo get_post_type_archive_link('press_release'); ?>">Return to Press Feed</a>
						</div>
					</footer>
				</article>
				<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();
