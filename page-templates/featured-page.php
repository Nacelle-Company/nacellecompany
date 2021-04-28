<?php
/*
Template Name: Featured Page
*/
get_header(); ?>
<main class="main-container grid-container full featured-page">
	<div class="main-grid">
		<div class=" grid-x">
			<?php while (have_posts()) : the_post(); ?>
				<div class="cell large-6 feat-img">
					<img class=" feat-pg" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]" />
				</div>
				<div class="cell auto feat-content">
					<div class="grid-x main align-center">
						<div class="cell small-3 large-4 dk-border">
							<div class="grid-x align-center grid-padding-y icons-container">
								<a class="bounce button hollow success" href="<?php echo get_post_meta(get_the_ID(), 'feat_trailer_embed', true); ?>" target="_blank">
									<?php _e('Watch Trailer', 'nacelle'); ?>
								</a>
								<?php
								$imdb = get_post_meta(get_the_ID(), 'imdb', true); 
								$instagram = get_post_meta(get_the_ID(), 'instagram', true); 
								$twitter = get_post_meta(get_the_ID(), 'twitter', true); 
								$facebook = get_post_meta(get_the_ID(), 'facebook', true); 
								?>
								<div class="cell">
									<div class="grid-x">
										<?php if ($imdb) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $imdb; ?>" target="_blank">
													<?php get_template_part('template-parts/svg/icon-imdb'); ?>
												<?php endif; ?>
												<?php if ($imdb) : ?>
												</a>
											</div>
										<?php endif; ?>
										<?php if ($instagram) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $instagram; ?>" target="_blank">
													<?php get_template_part('template-parts/svg/icon-instagram'); ?>
												<?php endif; ?>
												<?php if ($instagram) : ?>
												</a>
											</div>
										<?php endif; ?>
										<?php if ($twitter) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $twitter; ?>" target="_blank">
													<?php get_template_part('template-parts/svg/icon-twitter'); ?> <?php endif; ?>
												<?php if ($twitter) : ?>
												</a>
											</div>
										<?php endif; ?>
										<?php if ($facebook) : ?>
											<div class="cell medium-6 text-center">
												<a class="text-center" href="<?php echo $facebook; ?>" target="_blank">
													<?php get_template_part('template-parts/svg/icon-facebook'); ?> <?php endif; ?>
												<?php if ($facebook) : ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php // include tickets modal ?>
								<?php get_template_part('template-parts/blocks/tickets-modal', 'none'); ?>
							</div>
						</div>
						<div class="cell auto feat-info">
							<?php the_content(); ?>
						</div>
					</div>
					<footer class="feat-pg grid-x align-bottom">
						<div class="cell small-12 medium-8">
							<?php echo get_post_meta(get_the_ID(), 'footer', true);  ?>
						</div>
						<div class="cell small-12 medium-4">
							<?php if (function_exists('the_custom_logo')) {
								the_custom_logo();
							} ?> </div>
					</footer>
					<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</main>
<?php // VIDEO MODAL ?>
<?php
$featTrailerEmbed = get_field('feat_trailer_embed');
if (!empty($featTrailerEmbed)) : ?>
	<div class="reveal" id="videoModal1" data-reveal>
		<?php // <div class="embed-container"> ?>
		<?php // <iframe width="560" height="315" src="<?php echo $featTrailerEmbed ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> ?>
		<?php // </div> ?>
		<button class="close-button" data-close aria-label="Close reveal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>
<?php // end video modal ?>

<?php get_footer();
