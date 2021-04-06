<?php

/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (have_rows('layouts')) : $i = ''; ?>
		<?php while (have_rows('layouts')) : the_row(); ?>
			<?php $i++; ?>
			<?php // LAYOUT - image and text 
			?>
			<?php if (get_row_layout() == 'img_txt') : ?>

				<section class="sect sect-img_txt" style="<?php if (get_sub_field('bk_color')) : ?>background-color:<?php the_sub_field('bk_color'); ?>;<?php endif; ?><?php if (get_sub_field('border')) : ?>border-bottom:10px solid <?php the_sub_field('border'); ?>;<?php endif; ?>">
					<div class="grid-x sect-wrap <?php if (get_sub_field('fill_img')) : ?> fill-img<?php else : ?> grid-margin-y grid-padding-y<?php endif; ?> align-middle align-spaced">
						<?php // THE content 
						?>
						<div class="cell<?php if (get_sub_field('fill_img')) : ?> medium-4 py-4 py-medium-0<?php else : ?> medium-5<?php endif; ?><?php if (get_sub_field('flip')) : ?> medium-order-2<?php endif; ?>">
							<?php the_sub_field('txt'); ?>
							<?php // content button 
							?>
							<?php if (get_sub_field('btn')) : ?>
								<a class="button" href="<?php the_sub_field('btn_url'); ?>" title="<?php the_sub_field('btn'); ?>" style="<?php if (get_sub_field('btn_color')) : ?> background-color:<?php the_sub_field('btn_color'); ?><?php endif; ?>"><?php the_sub_field('btn'); ?></a>
							<?php endif; ?>
						</div>
						<div class="cell<?php if (get_sub_field('fill_img')) : ?> medium-6<?php else : ?> medium-5<?php endif; ?>">
							<?php // THE image 
							?>
							<a data-open="imgModal-<?php echo $i; ?>">
								<figure>
									<?php
									$image = get_sub_field('img');
									if (!empty($image)) : ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo $image['caption']; ?>" />
									<?php endif; ?>
								</figure>
							</a>
							<?php // image modal 
							?>
							<div class="small reveal" id="imgModal-<?php echo $i; ?>" data-reveal>
								<button class="close-button" data-close aria-label="Close reveal" type="button">
									<span aria-hidden="true">&times;</span>
								</button>
								<figure class="reveal-content">
									<?php
									$image = get_sub_field('img');
									if (!empty($image)) : ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo $image['caption']; ?>" />
									<?php endif; ?>
								</figure>
							</div>
							<?php // image bottom link 
							?>
							<?php if (get_sub_field('img_link')) : ?>
								<a href="<?php the_sub_field('img_link_url'); ?>" title="<?php the_sub_field('img_link'); ?>">
									<figcaption class="text-center"><?php the_sub_field('img_link'); ?> »</figcaption>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</section>

				<?php // LAYOUT - text and quote 
				?>
			<?php elseif (get_row_layout() == 'txt_quote') : ?>

				<section class="sect sect-txt_quote" style="<?php if (get_sub_field('bk_color')) : ?>background-color:<?php the_sub_field('bk_color'); ?><?php endif; ?>;<?php if (get_sub_field('bk_img')) : ?>background-image:url(<?php the_sub_field('bk_img'); ?><?php endif; ?>);<?php if (get_sub_field('bk_pos')) : ?>background-position:<?php the_sub_field('bk_pos'); ?><?php endif; ?>">
					<div class="grid-x sect-wrap grid-padding-y align-middle align-spaced">
						<?php // THE content 
						?>
						<div class="cell medium-5">
							<?php the_sub_field('txt'); ?>
							<?php // button 
							?>
							<?php if (get_sub_field('btn')) : ?>
								<a class="button expanded" href="<?php the_sub_field('btn_url'); ?>" title="<?php the_sub_field('btn'); ?>"><?php the_sub_field('btn'); ?></a>
							<?php endif; ?>
						</div>
						<?php // THE quote 
						?>
						<div class="cell medium-5">
							<?php the_sub_field('quote'); ?>
						</div>
					</div>
				</section>

				<?php // LAYOUT - banner 
				?>
			<?php elseif (get_row_layout() == 'banner') : ?>

				<section class="sect sect-banner" style="<?php if (get_sub_field('bk_color')) : ?>background-color:<?php the_sub_field('bk_color'); ?><?php endif; ?>;<?php if (get_sub_field('bk_img')) : ?>background-image:url(<?php the_sub_field('bk_img'); ?><?php endif; ?>)">
					<div class="grid-x sect-wrap grid-margin-y grid-padding-y align-center-middle">
						<?php // THE content 
						?>
						<div class="cell <?php the_sub_field('width'); ?>">
							<div class="overlay" style="opacity:.<?php the_sub_field('bk_img_ov'); ?>"></div>
							<?php the_sub_field('txt'); ?>
							<?php // button 
							?>
							<?php if (get_sub_field('btn')) : ?>
								<a class="button" href="<?php the_sub_field('btn_url'); ?>" title="<?php the_sub_field('btn'); ?>"><?php the_sub_field('btn'); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</section>

			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>

</article>