<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<aside class="sidebar mt-3">
	<?php dynamic_sidebar('sidebar-widgets'); ?>
	<?php if (!empty(the_field('contact_info'))) : ?>
    <h3>Contact</h3>
    <?php the_field('contact_info'); ?>
	<?php endif; ?>

</aside>
