<?php
/**
 * WP Rig functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_rig
 */

define( 'WP_RIG_MINIMUM_WP_VERSION', '4.7' );
define( 'WP_RIG_MINIMUM_PHP_VERSION', '7.0' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], WP_RIG_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), WP_RIG_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Setup autoloader (via Composer or custom).
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require get_template_directory() . '/vendor/autoload.php';
} else {
	/**
	 * Custom autoloader function for theme classes.
	 *
	 * @access private
	 *
	 * @param string $class_name Class name to load.
	 * @return bool True if the class was loaded, false otherwise.
	 */
	function _wp_rig_autoload( $class_name ) {
		$namespace = 'WP_Rig\WP_Rig';

		if ( strpos( $class_name, $namespace . '\\' ) !== 0 ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/inc';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
	spl_autoload_register( '_wp_rig_autoload' );
}

// Load the `wp_rig()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'WP_Rig\WP_Rig\wp_rig' );


// ? ACF options page
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page();
}

/**
 * Show Custom Post Types in Category Archive Page
 * By default WordPress custom post types do not appear in a category or tag archive page
 *
 * @param posts custom post types
 * @return $query
 * @link https://wpbeaches.com/show-custom-post-types-category-archive-page/, https://www.smashingmagazine.com/2014/08/customizing-wordpress-archives-categories-terms-taxonomies/#adding-custom-post-types-to-category-or-tag-archives
 */

add_filter( 'pre_get_posts', '_wp_rig_cpt_category_archives' );
/**
 * CPT Archives
 *
 * @param variable $query Description.
 **/
function _wp_rig_cpt_category_archives( $query ) {
	if ( $query->is_category() && $query->is_main_query() ) {
		$query->set(
			'post_type',
			array(
				'post',
				'catalog',
			)
		);
	}
	return $query;
}

/**
 * Prints the post object.
 *
 * TODO: delete this on production
 *
 * @param Type $post The post object or whichever variable.
 **/
function printVar( $post ) {
	echo '<pre style="color:#000">';
	print_r( $post );
	echo '</pre>';
}
/**
 * Allow wp_query.
 **/
function is_post_type( $type ) {
	global $wp_query;
	if ( get_post_type( $wp_query->post->ID ) === $type ) {
		return true;
	}
	return false;
}

// TODO: Move category acf fields to parent categories: https://www.advancedcustomfields.com/resources/custom-location-rules/.
