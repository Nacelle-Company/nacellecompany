<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<aside class="sidebar mt-3">
		<h3>Contact Us</h3>

		<span><i class="fas fa-user-circle"></i>  <?php the_field('media_contact'); ?></span>

		<br>

		<span><i class="fas fa-phone"></i>  <a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a></span>

		<br>

		<span><i class="fas fa-at"></i>  <a href="mailto:<?php the_field('email'); ?>?Subject=Hello%20Comedy%20Dynamics%20Press" target="_top"><?php the_field('email'); ?></span>

		<?php dynamic_sidebar('sidebar-widgets'); ?>

</aside>
