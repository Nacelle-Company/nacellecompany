<?php

/**
 * The template for displaying all category posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
	<?php
	// vars
	$synopsis = get_post_meta(get_the_ID(), 'synopsis', true);
	$videoEmbedd = get_post_meta(get_the_ID(), 'video_embedd', true);
	$ticketsButtonTitle = get_post_meta(get_the_ID(), 'tickets_button_title', true);
	$squareImage = get_post_meta(get_the_ID(), 'square_image', true);
	?>
	<?php get_template_part('template-parts/catalog/catalog-header', ''); ?>
	<main class="main-content grid-x grid-padding-x medium-padding-collapse" id="post-<?php the_ID(); ?>">
		<?php
		if (!empty($videoEmbedd)) : ?>
			<div class="mobile-video-container" id="mobile_video_container"></div>
			<div class="cell medium-12 large-7 medium-order-1 flex-container flex-dir-column hero-info-crew-wrap">
				<?php get_template_part('template-parts/catalog/catalog-hero');
				get_template_part('template-parts/catalog/catalog-more-info', '');
				get_template_part('template-parts/catalog/catalog-crew'); ?>
			</div>
			<div class="catalog-aside-wrapper cell medium-5 medium-order-2">
				<?php get_template_part('template-parts/catalog/catalog-aside'); ?>
			</div>
			<div class="cell medium-order-3">
				<?php get_template_part('template-parts/catalog/catalog-large-links'); ?>
			</div>
			<div class="grid-x grid-container medium-order-4">
				<?php get_template_part('template-parts/catalog/single-catalog-related'); ?>
			</div>
		<?php else : ?>
			<div class="no-hero-video cell medium-7">
				<?php get_template_part('template-parts/catalog/catalog-more-info');
				get_template_part('template-parts/catalog/catalog-crew');
				get_template_part('template-parts/catalog/catalog-large-links'); ?>
			</div>
			<div class="cell medium-5">
				<?php get_template_part('template-parts/catalog/catalog-aside'); ?>
			</div>
		<?php endif; ?>
	</main>
	<?php if (have_rows('embedded_content')) : ?>
		<?php while (have_rows('embedded_content')) : the_row();
			// vars
			$embed = get_sub_field('embed');
			$text = get_sub_field('embedded_text');
			$side = get_sub_field('embedded_side');
		?>
			<div class="grid-container">
				<div class="grid-x align-center-middle grid-margin-x">
					<div class="cell medium-8">
						<?php if ($embed) : ?>
							<?php echo $embed; ?>
						<?php endif; ?>
					</div>
					<div class="cell medium-4">
						<?php echo $text; ?>
					</div>
				</div>
			</div>
			<div class="grid-x">
				<?php if (have_rows('embedded_content')) : ?>
					<?php while (have_rows('embedded_content')) : the_row();
						// vars
						$embedd = get_sub_field('embedded_link');
						$embeddText = get_sub_field('embedded_text');
						$embeddSide = get_sub_field('embedded_side');
					?>
						<?php if (get_sub_field('embedded_side')) : ?>
							<?php $sourceOrder = 'medium-order-2';
							$textRight = 'text-right'; ?>
						<?php endif; ?>
						<div class="cell medium-6 <?php echo $sourceOrder; ?>">
							<div class="embed-container">
								<?php if ($embedd) : ?>
									<?php echo $embedd; ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="cell medium-6 align-center <?php echo $textRight; ?>">
							<?php if ($embeddText) : ?>
								<?php echo $embeddText; ?>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php // mobile post navigation 
	?>
	<div class="cell small-12 no-desktop">
		<div class="grid-x small-up-2 pagination">
			<?php get_template_part('template-parts/catalog-pagination'); ?>
		</div>
	</div>
<?php endwhile; ?>
<div class="edit-post">
	<pre><?php edit_post_link(__('(Edit this post)', 'nacelle'), '<span class="edit-link">', '</span>'); ?></pre>
</div>
<?php get_footer();
