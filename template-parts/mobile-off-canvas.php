<?php
/**
 * Template part for off canvas menu
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-left" id="<?php Nacelle_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
	<?php Nacelle_mobile_nav(); ?>
		  <?php echo do_shortcode('[searchandfilter fields="search" search_placeholder="Search"]'); ?>
</nav>

<div class=" <?php if (is_page('home')) {
    echo "grid-y medium-grid-frame";
} ?> off-canvas-content" data-off-canvas-content>
