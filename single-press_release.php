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
<div class="main-container">
	<div class="main-grid">
		<main class="main-content thin">
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
										<?php the_field('title'); ?>
									</h1>
								</div>

							</div>
							<footer class="cell">
								<?php
								echo '<div class="cell">';
								echo '<strong><p class="text-right">';
								$location = the_field('location');
								echo "</strong>";
								echo  $location . the_time(' ' . 'm.j.y');
								echo '</p></div>';
								?>
							</footer>
						</header>
						<div class="grid-x intro pb-2">
							<div class="cell">
									<?php if (get_field('intro')) {
											the_field('intro');
										} ?>
							</div>
						</div>
						<div class="grid-x content">
							<div class="cell">
								<?php the_content(); ?>
								<?php 
								if (get_field('show_boilerplate')) {
									$boilerplate = get_field('boilerplate', 'option');
									if (get_field('boilerplate', 'option')) {
										echo $boilerplate;
									}
								}
								?>
								<?php echo '<p class="text-center">###</p>'; ?>
								<?php // PDF download ?>
								<footer>
									<h4 class="text-center">
										<?php if (get_field('stills_download')) : ?>
											<a href="<?php the_field('stills_download'); ?>" download>Stills, </a>
										<?php endif; ?>
										<?php if (get_field('pdf_download')) : ?>
											<a href="<?php the_field('pdf_download'); ?>" download>Press Release</a>
										<?php endif; ?>
									</h4>
								</footer>
								<?php // PDF download ?>
							</div>
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
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
