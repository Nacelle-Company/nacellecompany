<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$queried_obj = get_queried_object();
$obj_slug    = $queried_obj->name;
printVar( $obj_slug );

if ( ! wp_rig()->is_primary_sidebar_active() ) {
	return;
}

wp_rig()->print_styles( 'wp-rig-sidebar', 'wp-rig-widgets' );

?>
<aside id="secondary" class="primary-sidebar widget-area">
	<h2 class="screen-reader-text"><?php esc_attr_e( 'Asides', 'wp-rig' ); ?></h2>
	<?php wp_rig()->display_primary_sidebar(); ?>
</aside>
