<?php

/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-left" id="<?php Nacelle_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
	<?php Nacelle_mobile_nav(); ?>
	<div class='search-container' tabindex='1'>

		<?php echo do_shortcode('[searchandfilter slug="search-form-only" fields="search" search_placeholder="Search. . ."]');
		?>

	</div>
</nav>


<div class="off-canvas-content" data-off-canvas-content>