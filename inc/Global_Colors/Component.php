<?php
/**
 * WP_Rig\WP_Rig\Global_Colors\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Global_Colors;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function add_theme_support;
use function apply_filters;

/**
 * Class for adding custom colors support.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'global_colors';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_global_colors_support' ) );
	}

	/**
	 * Adds support for the Custom Colors feature.
	 */
	public function action_add_global_colors_support() {
		add_theme_support(
			'global-colors',
			apply_filters(
				'wp_rig_global_colors_args',
				array(
					'default-color' => '000',
					'default-image' => '',
				)
			)
		);
	}
}
