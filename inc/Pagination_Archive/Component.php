<?php
/**
 * WP_Rig\WP_Rig\Pagination_Archive\Pagination_Archive class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Pagination_Archive;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying archive pagination.
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
		return 'pagination_archive';
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
			'display_pagination_archive' => array( $this, 'display_pagination_archive' ),
		);
	}
	/**
	 * Display Tax Terms
	 *
	 * @param obj_slug $obj_slug Get category slug.
	 */
	public function display_pagination_archive( $obj_slug ) {
		global $wp_query;
		$big = 9999999; // Need an unlikely integer.
		?>
		<nav class="navigation pagination" aria-label="Page navigation">
			<h2 class="screen-reader-text"><?php echo esc_html( $obj_slug ); ?> category navigation</h2>
			<?php
			echo wp_kses(
				paginate_links(
					array(
						'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'  => '?paged=%#%',
						'current' => max( 1, get_query_var( 'paged' ) ),
						'total'   => $wp_query->max_num_pages,
					)
				),
				'post'
			);
			?>
		</nav>
		<?php
	}
}
