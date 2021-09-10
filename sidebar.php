<?php

/**
 * The sidebar containing the main widget area
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<aside class="sidebar">
	<?php if (is_post_type_archive('press_release') || is_singular('press_release')) : ?>
		<h2 class="h3">
			<?php _e('Contact Us', 'nacelle'); ?>
		</h2>
		<main>
			<div itemscope itemtype="https://schema.org/Person">
				<section class="menu simple pb-2">
					<?php get_template_part('template-parts/svg/icon-at'); ?>
					<div class="pl-1">
						<span itemprop="jobTitle">
							<?php _e('PR & Marketing: ', 'nacelle'); ?>
						</span>
						<span itemprop="name">
							<?php echo get_post_meta(get_the_ID(), 'media_contact', true); ?>
						</span>
					</div>
				</section>
				<section class="menu simple pb-2">
					<?php get_template_part('template-parts/svg/icon-phone'); ?>
					<div class="pl-1">
						<p class="invisible">Phone:</p>
						<span>
							<a href="tel:<?php echo get_post_meta(get_the_ID(), 'phone', true); ?>">
								<?php echo get_post_meta(get_the_ID(), 'phone', true); ?>
							</a>
						</span>
					</div>
				</section>
				<section class="menu simple pb-2">
					<?php get_template_part('template-parts/svg/icon-user'); ?>
					<h5 class="pl-1">
						<a href="mailto:<?php echo get_post_meta(get_the_ID(), 'email', true);  ?>?Subject=Hello%20Comedy%20Dynamics%20Press" target="_top" itemprop="email">
							<?php echo get_post_meta(get_the_ID(), 'email', true);  ?>
						</a>
					</h5>
				</section>
			</div>
		</main>
	<?php endif; ?>
	<?php dynamic_sidebar('sidebar-widgets'); ?>
</aside>