<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_secondary_nav_menu_active() ) {
	return;
}
?>

<nav id="<?php echo apply_filters( 'wp_rig_site_navigation_id', 'site-navigation' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>" class="<?php echo apply_filters( 'wp_rig_site_navigation_classes', 'main-navigation' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>" aria-label="<?php esc_attr_e( 'Main menu', 'wp-rig' ); ?>"
	<?php
	// remove_filter( 'filter_nav_menu_dropdown_symbol', 'walker_nav_menu_start_el', 11, 4 );
	?>
>


	<div class="secondary-menu-container">
		<?php wp_rig()->display_secondary_nav_menu( array( 'menu_id' => 'secondary-menu' ) ); ?>
	</div>
</nav><!-- #site-navigation_secondary -->
