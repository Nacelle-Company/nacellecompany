<?php
/**
 * Template part for displaying the footer widgetized area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_footer_widgets_active() ) {
	return;
}

wp_rig()->print_styles( 'wp-rig-footer-widgets', 'wp-rig-widgets' );

?>
<aside id="footer-widgets" class="footer-widgets-area widget-area">
	<?php wp_rig()->display_footer_widgets(); ?>
</aside>
