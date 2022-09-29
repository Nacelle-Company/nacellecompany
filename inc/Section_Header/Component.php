<?php
/**
 * WP_Rig\WP_Rig\Section_Header\Section_Header class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Section_Header;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for the section header.
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
		return 'section_header';
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
			'display_section_header' => array( $this, 'display_section_header' ),
		);
	}

	/**
	 * Display section-header.
	 *
	 * @param mixed $slides Display the section header.
	 */
	public function display_section_header( $title, $link ) {
		?>
		<header class="section-header">
			<h3 class="sub h6">Independent comedy </h3>
			<h2 class="section-title h1">
				<?php echo esc_html( $title ); ?>
			</h2>
			<span class="section-header__line">
				<hr>
				<a href="<?php echo esc_html( $link ); ?>">View More</a>
			</span>
		</header>
		<?php
	} // END section_header().
}
