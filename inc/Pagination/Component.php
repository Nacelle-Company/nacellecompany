<?php
/**
 * WP_Rig\WP_Rig\Pagination\Pagination class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Pagination;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying pagination.
 *
 * Exposes template tags:
 * * `wp_rig()->the_comments( array $args = array() )`
 *
 * @link https://wordpress.org/plugins/amp/
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'pagination';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return array(
			'display_pagination' => array( $this, 'display_pagination' ),
		);
	}
	/**
	 * Display pagination
	 */
	public function display_pagination() {
		/**
		 * Catalog pagination
		 */
		$next_arrow = file_get_contents( get_template_directory() . '/assets/images/icon-arrow-right.svg' );
		$prev_arrow = file_get_contents( get_template_directory() . '/assets/images/icon-arrow-left.svg' );
		if ( is_singular( get_post_type() ) ) {

			if ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) {
				the_post_navigation(
					array(
						'prev_text' => '<div class="post-navigation-sub"><span class="arrow-left">' . $prev_arrow . '</span></div><p>%title</p>',
						// phpcs:disable
						'next_text' => '<div class="post-navigation-sub next--arrow"><span class="arrow-right">' . $next_arrow . '</span></div><p>%title</p>',
						// phpcs:enable
					)
				);
			}

			// Show comments only when the post type supports it and when comments are open or at least one comment exists.
			if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open() || get_comments_number() ) ) {
				comments_template();
			}
		}
	}
}
