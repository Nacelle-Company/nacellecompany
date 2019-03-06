<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<aside class="sidebar mt-3">
	<?php if (is_post_type_archive('press_release') || is_singular('press_release')): ?>

		<h3>
			<?php _e('Contact Us', 'comedy-dynamics'); ?>
		</h3>
		<span>
			<i class="fas fa-user-circle"></i>
			<?php _e('PR & Marketing: ', 'comedy-dynamics'); ?>
			<?php the_field('media_contact'); ?>
		</span>

		<br>

		<span>
			<i class="fas fa-phone"></i>
			<a href="tel:<?php the_field('phone'); ?>">
				<?php the_field('phone'); ?>
			</a>
		</span>

		<br>

		<span>
			<i class="fas fa-at"></i>
			<a href="mailto:<?php the_field('email'); ?>?Subject=Hello%20Comedy%20Dynamics%20Press" target="_top">
				<?php the_field('email'); ?>
			</a>
		</span>

	<?php endif; ?>

	<?php dynamic_sidebar('sidebar-widgets'); ?>

</aside>
