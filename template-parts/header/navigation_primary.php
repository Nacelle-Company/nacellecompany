<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_primary_nav_menu_active() ) {
	return;
}
?>

<nav id="<?php echo apply_filters( 'wp_rig_site_navigation_id', 'site-navigation' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>" class="<?php echo apply_filters( 'wp_rig_site_navigation_classes', 'main-navigation nav--toggle-sub nav--toggle-small' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>" aria-label="<?php esc_attr_e( 'Main menu', 'wp-rig' ); ?>">

	<div class="primary-menu-container">
		<?php wp_rig()->display_primary_nav_menu( array( 'menu_id' => 'primary-menu' ) ); ?>
		<!-- <div class="searchandfilter__wrap"> -->
			<?php // echo do_shortcode( '[searchandfilter slug="search-form-only"]' ); ?>
		<!-- </div> -->
	</div>
</nav><!-- #site-navigation_primary -->
