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

		<h3>
			<?php _e('Contact Us', 'nacelle'); ?>
		</h3>

		<main>
			<div itemscope itemtype="https://schema.org/Person">

				<section class="menu simple pb-2">
					<?php get_template_part('template-parts/svg/icon-at'); ?>
					<div class="pl-1">
						<span itemprop="jobTitle">
							<?php _e('PR & Marketing: ', 'nacelle'); ?>
						</span>
						<span itemprop="name">
							<?php the_field('media_contact'); ?>
						</span>
					</div>
				</section>

				<section class="menu simple pb-2">
					<?php get_template_part('template-parts/svg/icon-phone'); ?>
					<div class="pl-1" itemscope itemtype="http://schema.org/LocalBusiness">
						<h1 class="invisible" itemprop="name"><?php bloginfo('name'); ?></h1>
						<p class="invisible">Phone:</p>
						<span itemprop="telephone">
							<a href="tel:<?php the_field('phone'); ?>">
								<?php the_field('phone'); ?>
							</a>
						</span>
					</div>
				</section>

				<section class="menu simple pb-2">
					<?php get_template_part('template-parts/svg/icon-user'); ?>
					<div class="pl-1">
						<a href="mailto:<?php the_field('email'); ?>?Subject=Hello%20Comedy%20Dynamics%20Press" target="_top" itemprop="email">
							<?php the_field('email'); ?>
						</a>
					</div>
				</section>

			</div>

		</main>

	<?php endif; ?>

	<?php dynamic_sidebar('sidebar-widgets'); ?>

</aside>