<?php
/**
 * WP_Rig\WP_Rig\Tax_Terms\Tax_Terms class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Tax_Terms;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying taxonomy terms.
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
		return 'tax_terms';
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
			'display_tax_terms' => array( $this, 'display_tax_terms' ),
		);
	}
	/**
	 * Display Tax Terms
	 *
	 * @param mixed $taxonomy
	 * A little text.
	 */
	public function display_tax_terms( $taxonomy ) {
		$terms_list = array();
		$terms      = get_the_terms( get_the_ID(), $taxonomy );
		if ( $terms && ! is_wp_error( $terms ) ) :
			$taxonomy_name = get_taxonomy( $taxonomy );
			$taxonomy_name = $taxonomy_name->name;
			$taxonomy_name = str_replace( '_', ' ', $taxonomy_name );
			$taxonomy_name = ucwords( $taxonomy_name );
			echo '<dt><h4>' . esc_html( $taxonomy_name ) . '</h4></dt>';
			foreach ( $terms as $term ) {

				$terms_list[] = sprintf(
					'<a href="%1$s">%2$s</a>',
					esc_url( get_term_link( $term->slug, $taxonomy ) ),
					esc_html( $term->name )
				);
				$out[]        = "\n</ul>\n";
			}

			$terms_list = '<dd>' . join( ', ', $terms_list ) . '</dd>';

		endif;
		if ( $terms_list ) {
			echo $terms_list;
		}
	}
}
