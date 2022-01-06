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
								<div class="media-object-section flex-container flex-dir-column align-justify">
									<h1>
										<?php the_title(); ?>
									</h1>
									<footer class="cell">
										<?php
										$location = get_post_meta(get_the_ID(), 'location', true);
										$time = get_the_time('m.j.y');
										echo '<p><strong>';
										echo $location . ' ';
										echo "</strong>";
										echo $time;
										echo '</p>';
										?>
									</footer>
								</div>
							</div>
						</header>
						<div class="grid-x intro pb-2 mb-2">
							<h3 class="cell mb-0 secondary-color">
								<?php
								$intro = get_post_meta(get_the_ID(), 'intro', true);
								if (!empty($intro)) {
									echo $intro;
								}
								?>
							</h3>
						</div>
						<div class="grid-x content">
							<div class="cell">
								<?php the_content(); ?>
								<footer>
									<div class="text-center">
										<span>###</span>
										<div class='share-on'>Share on: </div>
									</div>
									<div class="flex-container social-share align-center align-middle">
										<?php get_template_part('template-parts/blocks/social-share'); ?>
									</div>
									<hr>
									<?php
									$featured_posts = get_post_meta(get_the_ID(), 'talent_name', true);
									$stills_download = get_field('stills_download');
									$pdf_download = get_field('pdf_download');
									if (!empty($stills_download) || !empty($pdf_download) || !empty($featured_posts)) : ?>
										<header class="grid-x mb-2">
											<h4>RELATED INFO</h4>
										</header>
										<div class="grid-x grid-padding-x mb-2">
											<?php if (!empty($stills_download) || !empty($pdf_download)) : ?>
												<div class="cell medium-4">
													<h6>DOWNLOADS</h6>
													<?php if (!empty($stills_download)) : ?>
														<a href="<?php echo the_field('stills_download'); ?>" download>– Stills</a>
													<?php endif; ?>
													<?php if (!empty($pdf_download)) : ?>
														<br>
														<a href="<?php echo the_field('pdf_download'); ?>" download>– Press Release</a>
													<?php endif; ?>
												</div>
											<?php endif; ?>
											<?php if ($featured_posts) : ?>
												<div class="cell medium-4">
													<h6 class="secondary-color">COMEDY</h6>
													<?php foreach ($featured_posts as $post) :
														setup_postdata($post);
														$terms = get_field('talent');
													?>
														<p>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</p>
													<?php endforeach; ?>
												</div>
												<div class="cell medium-4">
													<h6 class="secondary-color">TALENT</h6>
													<?php foreach ($terms as $term) : ?>
														<?php
														$talentSlug = esc_html($term->slug);
														$blogURL = get_bloginfo('url');
														$talentURL = $blogURL . '/main-talent/' . $talentSlug;
														?>
														<a href="<?php echo $talentURL; ?>"><?php echo esc_html($term->name) . ','; ?></a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
											<?php wp_reset_postdata(); ?>
										</div>
									<?php endif; ?>
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
								</footer>
							</div>
						</div>
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
