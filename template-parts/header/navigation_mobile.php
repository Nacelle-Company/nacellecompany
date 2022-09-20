<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_mobile_nav_menu_active() ) {
	return;
}
?>

<nav id="<?php echo apply_filters( 'wp_rig_site_navigation_id', 'site-navigation' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>" class="<?php echo apply_filters( 'wp_rig_site__mobile_navigation_classes', 'main-navigation nav--toggle-sub nav--toggle-small' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>" aria-label="<?php esc_attr_e( 'Main menu', 'wp-rig' ); ?>"
	<?php
	add_filter( 'filter_nav_menu_dropdown_symbol', 'walker_mobile_nav_menu_start_el', 11, 4 );

	if ( wp_rig()->is_amp() ) {
		?>
		[class]=" siteNavigationMenu.expanded ? 'main-navigation nav--toggle-sub nav--toggle-small nav--toggled-on' : 'main-navigation nav--toggle-sub nav--toggle-small' "
		<?php
	}
	?>
>
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		<amp-state id="siteNavigationMenu">
			<script type="application/json">
				{
					"expanded": false
				}
			</script>
		</amp-state>
		<?php
	}
	?>

	<?php
		$menu_toggle_button = '<button class="menu-toggle" aria-label="' . esc_html__( 'Open menu', 'wp-rig' ) . '" aria-controls="primary-menu" aria-expanded="false">
						' . esc_html__( 'Menu', 'wp-rig' ) . '
						</button>';
		$menu_toggle_button = apply_filters( 'wp_rig_menu_toggle_button', $menu_toggle_button );
	?>

	<?php echo $menu_toggle_button; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>

	<div class="mobile-menu-container">
		<?php wp_rig()->display_mobile_nav_menu( array( 'menu_id' => 'mobile-menu' ) ); ?>&#9776;
	</div>
</nav>
