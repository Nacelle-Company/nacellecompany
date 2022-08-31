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
		$next_arrow = '<svg class="icon" width="37" height="19" xmlns="http://www.w3.org/2000/svg"><path d="M25.928 6.049H.991C.444 6.049 0 6.512 0 7.084v4.832c0 .572.444 1.035.991 1.035h24.937v3.974c0 1.845 2.135 2.769 3.384 1.464l7.107-7.425a2.137 2.137 0 0 0 0-2.928L29.312.61c-1.249-1.305-3.384-.38-3.384 1.464v3.974Z" fill="#D39A00" fill-rule="evenodd"/></svg>';
		if ( is_singular( get_post_type() ) ) {

			if ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) {
				the_post_navigation(
					array(
						'prev_text' => '<div class="post-navigation-sub"><span class="arrow-left"><svg width="37" height="19" class="icon" xmlns="http://www.w3.org/2000/svg"><path d="M37 9.25a2.31 2.31 0 0 1-2.312 2.312H11.572v5.202a1.738 1.738 0 0 1-2.916 1.271L.554 10.522a1.734 1.734 0 0 1 0-2.543l8.1-7.515A1.738 1.738 0 0 1 10.53.144c.63.275 1.042.904 1.042 1.525v5.268h23.116A2.31 2.31 0 0 1 37 9.25Z" fill="#000" fill-rule="nonzero"/></svg></span></div><p>%title</p>',
						// phpcs:disable
						'next_text' => '<div class="post-navigation-sub next--arrow"><span class="arrow-right"><svg width="37" height="19" class="icon" xmlns="http://www.w3.org/2000/svg"><path d="m36.441 10.521-8.1 7.515a1.738 1.738 0 0 1-1.875.318c-.633-.275-1.042-.9-1.042-1.524l.005-5.268H2.312C1.035 11.562 0 10.528 0 9.184s1.035-2.247 2.312-2.247H25.43V1.734A1.734 1.734 0 0 1 28.346.463l8.1 7.515a1.73 1.73 0 0 1-.004 2.543h-.001Z" fill="#000" fill-rule="nonzero"/></svg></span></div><p>%title</p>',
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
