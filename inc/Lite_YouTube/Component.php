<?php
/**
 * WP_Rig\WP_Rig\Lite_YouTube\Lite_YouTube class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Lite_YouTube;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Post;
use function add_action;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;

/**
 * Class for lite_youtube slider.
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
        return 'lite_youtube';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function initialize() {
        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_lite_youtube_script' ) );
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
            'display_lite_youtube' => array( $this, 'display_lite_youtube' ),
        );
    }

    /**
     * Enqueues the lite_youtube script file.
     */
    public function action_enqueue_lite_youtube_script() {

        // Enqueue the lite_youtube script.
		wp_enqueue_script(
			'wp-rig-lite-youtube',
			get_theme_file_uri( '/assets/js/lite-youtube.min.js' ),
			array(),
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/lite-youtube.min.js' ) ),
			true
		);
    }

    /**
     * Display lite_youtube.
     *
     * @param mixed $slides Display lite_youtube slider.
     */
    public function display_lite_youtube() {}
}
