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

// ACF options page
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
	echo '<pre style="color:#fff">';
	print_r( $post );
	echo '</pre>';
}

/**
* Allow wp_query.
*
* @param [type] $type Post type.
* @return boolean
*/
function is_post_type( $type ) {
	global $wp_query;
	if ( get_post_type( $wp_query->post->ID ) === $type ) {
		return true;
	}
	return false;
}

/**
*
* TODO: Move category acf fields to parent categories: https://www.advancedcustomfields.com/resources/custom-location-rules/.
**/
function wp_rig_nacelle_duplicate_post_as_draft() {
	global $wpdb;
	if ( ! ( isset( $_GET['post'] ) || isset( $_POST['post'] ) || ( isset( $_REQUEST['action'] ) && 'wp_rig_nacelle_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die( 'No post to duplicate has been supplied!' );
	}

	/*
	* Nonce verification
	*/
	if ( ! isset( $_GET['duplicate_nonce'] ) || ! wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	$post_id = ( isset( $_GET['post'] ) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );

	$post = get_post( $post_id );

	$current_user    = wp_get_current_user();
	$new_post_author = $current_user->ID;

	if ( isset( $post ) && $post != null ) {

		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order,
		);

		/*
		* insert the post by wp_insert_post() function
		*/
		$new_post_id = wp_insert_post( $args );

		/*
		* get all current post terms ad set them to the new post draft
		*/
		$taxonomies = get_object_taxonomies( $post->post_type ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ( $taxonomies as $taxonomy ) {
			$post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
			wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
		}

		/*
		* duplicate all post meta just in two SQL queries
		*/
		$post_meta_infos = $wpdb->get_results( "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id" );
		if ( count( $post_meta_infos ) != 0 ) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ( $post_meta_infos as $meta_info ) {
				$meta_key = $meta_info->meta_key;
				if ( $meta_key == '_wp_old_slug' ) {
					continue;
				}
				$meta_value      = addslashes( $meta_info->meta_value );
				$sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query .= implode( ' UNION ALL ', $sql_query_sel );
			$wpdb->query( $sql_query );
		}

		/*
		* finally, redirect to the edit post screen for the new draft
		*/
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die( 'Post creation failed, could not find original post: ' . $post_id );
	}
}
add_action( 'admin_action_wp_rig_nacelle_duplicate_post_as_draft', 'wp_rig_nacelle_duplicate_post_as_draft' );

/*
* Add the duplicate link to action list for post_row_actions
*/
function wp_rig_nacelle_duplicate_post_link( $actions, $post ) {
	if ( current_user_can( 'edit_posts' ) ) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url( 'admin.php?action=wp_rig_nacelle_duplicate_post_as_draft&post=' . $post->ID, basename( __FILE__ ), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
add_filter( 'page_row_actions', 'wp_rig_nacelle_duplicate_post_link', 10, 2 );

/*
* Set default post order.
*/
function wp_rig_nacelle_change_sort_order( $query ) {
	if ( is_category() ) :
		// If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
		// Set the order ASC or DESC
		$query->set( 'order', 'ASC' );
		// Set the orderby
		$query->set( 'orderby', 'title' );
	endif;
}
add_action( 'pre_get_posts', 'wp_rig_nacelle_change_sort_order' );

/*
* Add logo attributes
*/
function wp_rig_add_logo_att( $html ) {
	$html = str_replace( 'class="custom-logo"', 'class="custom-logo" fetchpriority="high"', $html );
	$html = str_replace( 'sizes="(min-width: 960px) 75vw, 100vw"', 'sizes="(min-width: 960px) 200px, 50vw" ', $html );
	return $html;
}
add_filter( 'get_custom_logo', 'wp_rig_add_logo_att' );

/*
* Siteground Optimizer: exclude styles from being combined
*/
function wp_rig_sgo_css_combine_exclude( $exclude_list ) {
	// Add the style handle to exclude list.
	$exclude_list[] = 'wp-rig-archive';
	$exclude_list[] = 'wp-rig-archive_press';
	$exclude_list[] = 'wp-rig-catalog-categories';
	$exclude_list[] = 'wp-rig-entry_catalog_buttons';
	$exclude_list[] = 'wp-rig-category';
	$exclude_list[] = 'wp-rig-content_posts';
	$exclude_list[] = 'wp-rig-entry-content';
	$exclude_list[] = 'wp-rig-hero-video';
	$exclude_list[] = 'wp-rig-offcanvas';
	$exclude_list[] = 'wp-rig-page-home-cd';
	$exclude_list[] = 'wp-rig-page-products';
	$exclude_list[] = 'wp-rig-page-team';
	$exclude_list[] = 'wp-rig-page';
	$exclude_list[] = 'wp-rig-pagination-archive';
	$exclude_list[] = 'wp-rig-pagination-post';
	$exclude_list[] = 'wp-rig-related_posts';
	$exclude_list[] = 'wp-rig-single-catalog';
	$exclude_list[] = 'wp-rig-social-share';
	$exclude_list[] = 'wp-rig-wonder_banner';
	$exclude_list[] = 'wp-rig-wonder_txt-img';
	$exclude_list[] = 'wp-rig-wonder_txt-quote';
	$exclude_list[] = 'wp-rig-wonder';
	$exclude_list[] = 'wp-rig-entry_catalog_additional_content';

	return $exclude_list;
}
add_filter( 'sgo_css_combine_exclude', 'wp_rig_sgo_css_combine_exclude' );

/**
* Modify the main query
*
* @param [type] $query Combine press_release & news post types.
* @return void
*/
function wp_rig_custom_archive_query( $query ){
	if( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	$cpts = array( 'press_release', 'news' );
	if ( is_post_type_archive( $cpts ) ) {
		$query->set( 'post_type', $cpts );
		return;
	}
}
add_action( 'pre_get_posts', 'wp_rig_custom_archive_query' );

/**
* Add the template redirect
*
* @param [type] $template Redirect.
* @return void
*/
function wp_rig_custom_archive_template( $template ) {
	$cpts = array( 'press_release', 'news' );
	if ( is_post_type_archive( $cpts ) ) {
		$new_template = locate_template( array( 'custom_archive-template.php' ) );
		if( ! empty( $new_template ) )
		return $new_template;
	}
	return $template;
}
add_filter( 'template_include', 'wp_rig_custom_archive_template' );

/**
 * Allow webp image uploads
 *
 * @link https://preventdirectaccess.com/how-to-upload-webp-image-in-wordpress/#:~:text=How%20To%20Upload%20WebP%20Image,them%20anywhere%20in%20your%20content
 *
 */
function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';
	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );

/**
 * Enable preview / thumbnail for webp image files.
 *
 */
function webp_is_displayable($result, $path) {
	if ($result === false) {
		$displayable_image_types = array( IMAGETYPE_WEBP );
		$info = @getimagesize( $path );
		if (empty($info)) {
			$result = false;
		} elseif (!in_array($info[2], $displayable_image_types)) {
			$result = false;
		} else {
			$result = true;
		}
	}
	return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

/**
* Load an inline SVG.
*
* @param string $filename The filename of the SVG you want to load.
*
* @return string The content of the SVG you want to load.
*/
function load_inline_svg( $filename ) {

    // Add the path to your SVG directory inside your theme.
    $svg_path = '/assets/images/';

    // Check the SVG file exists
    if ( file_exists( get_stylesheet_directory() . $svg_path . $filename ) ) {

        // Load and return the contents of the file
        return file_get_contents( get_stylesheet_directory_uri() . $svg_path . $filename );
    }

    // Return a blank string if we can't find the file.
    return '';
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/*
* Remove CSS files from loading on the frontend
*/
function wp_rig_remove_wp_css() {
	$hero_video = get_field( 'video_embedd' );
	// Default removals
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'YTPlayer_css' ); // YTPlayer styles are included in the theme (/assets/css/_yt-player.css)
	wp_dequeue_style( 'wpdreams-ajaxsearchpro-instances' );
	wp_deregister_style('classic-theme-styles');
	wp_dequeue_style('classic-theme-styles');
	// Conditional removals.
	if( is_front_page() ) { 									// Front page.
		// echo 'What is it? IS FRONT PAGE<br>';
		wp_deregister_style('search-filter-plugin-styles');
		wp_dequeue_style('search-filter-plugin-styles');
		wp_dequeue_script('wp-rig-lite-youtube');
	} elseif(is_page()) {
		// echo 'What is it? IS PAGE<br>';
		wp_dequeue_script('YTPlayer');
		wp_dequeue_script('wp-rig-lite-youtube');
		wp_dequeue_style('search-filter-plugin-styles');
	} elseif( is_archive() ) { 										// Single archive page.
		// echo 'What is it? IS ARCHIVE<br>';
		wp_deregister_script( 'wp-rig-lite-youtube' );
		wp_dequeue_script( 'wp-rig-lite-youtube' );
		wp_deregister_script( 'YTPlayer' );
		wp_dequeue_script( 'YTPlayer' );
	} elseif(is_single() && !empty($hero_video )) {					// Single and hero video.
		wp_dequeue_style('search-filter-plugin-styles');
		wp_dequeue_script( 'wp-rig-lite-youtube' );
	} elseif( is_single() ) {									// Single without hero video.
		// echo 'What is it? SINGLE<br>';
		wp_dequeue_style('search-filter-plugin-styles');
		wp_dequeue_script( 'wp-rig-lite-youtube' );
		wp_dequeue_script( 'YTPlayer' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_rig_remove_wp_css', 100 );

/**
  * GETTING YOUR STYLE HANDLES
  * @param https://wpshout.com/defer-parsing-javascript-wordpress/
*/

// add_action( 'wp_print_styles', 'wsds_detect_enqueued_styles' );
// function wsds_detect_enqueued_styles() {
// 	global $wp_styles;
// 	echo 'STYLES: ';
// 	foreach( $wp_styles->queue as $handle ) :
// 		echo $handle . ' | ';
// 	endforeach;
// 	echo '<br>';
// }

/**
  * GETTING YOUR SCRIPT HANDLES
  * YOU CAN DO THE SAME: in query monitor/scripts(or styles)/Handle column
  * @param https://wpshout.com/defer-parsing-javascript-wordpress/
*/
add_action( 'wp_print_scripts', 'wsds_detect_enqueued_scripts' );
function wsds_detect_enqueued_scripts() {
	global $wp_scripts;
	echo 'SCRIPTS: ';
	foreach( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}

/**
 * Number of queries
 *
 * echo get_num_queries();
 */
// echo get_num_queries();
