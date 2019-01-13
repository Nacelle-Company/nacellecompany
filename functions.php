<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * Comedy Dynamics functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

/** Various clean up functions */
require_once('library/cleanup.php');

/** Required for Foundation to work properly */
require_once('library/foundation.php');

/** Format comments */
require_once('library/class-foundationpress-comments.php');

/** Register all navigation menus */
require_once('library/navigation.php');

/** Add menu walkers for top-bar and off-canvas */
require_once('library/class-foundationpress-top-bar-walker.php');
require_once('library/class-foundationpress-mobile-walker.php');

/** Create widget areas in sidebar and footer */
require_once('library/widget-areas.php');

/** Return entry meta information for posts */
require_once('library/entry-meta.php');

/** Enqueue scripts */
require_once('library/enqueue-scripts.php');

/** Add theme support */
require_once('library/theme-support.php');

/** Add Nav Options to Customer */
require_once('library/custom-nav.php');

/** Change WP's sticky post class */
require_once('library/sticky-posts.php');

/** Configure responsive image sizes */
require_once('library/responsive-images.php');

/** Gutenberg editor support */
require_once('library/gutenberg.php');

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );


/**
 * Create Custom Image Sizes for Responsive
 * Based on Foundations breakpoints for SM, MD, LG
**/
function Comedy_Dynamics_add_image_sizes()
{
    /* Soft proportional crops */
    add_image_size('large-hero', 1400);
    add_image_size('medium-hero', 1024);
    add_image_size('mobile-hero', 640);
}
add_action('init', 'Comedy_Dynamics_add_image_sizes');






// acf options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/**
 * Create ACF setting page under Catalog CPT
 *
 * @since 1.0.0
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Catalog Items',
        'menu_title' => 'Catalog Items Options',
        'parent_slug' => 'edit.php?post_type=catalog'
    ));
}

/**
 * Create ACF setting page under Press Release CPT
 *
 * @since 1.0.0
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Press Release',
        'menu_title' => 'Press Release Options',
        'parent_slug' => 'edit.php?post_type=press_release'
    ));
}


/**
 * Create ACF setting page under News CPT
 *
 * @since 1.0.0
 */
 if (function_exists('acf_add_options_page')) {
     acf_add_options_sub_page(array(
         'page_title'     => 'News',
         'menu_title'    => 'News Options',
         'parent_slug'    => 'edit.php?post_type=news',
     ));
 }


/**
 * Show all Portfolio CPT items on archive
 * https://spigotdesign.com/wordpress-show-all-posts-on-a-custom-post-type-archive-page/
 */

add_action('pre_get_posts', 'Comedy_Dynamics_show_all_work');

function Comedy_Dynamics_show_all_work($query)
{
    if (! is_admin() && $query->is_main_query()) {
        if (is_post_type_archive('press_archive')) {
            $query->set('posts_per_page', -1);
        }
    }
}

// https://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/
function Comedy_Dynamics_add_custom_types($query)
{
    if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
        $query->set('post_type', array(
     'post', 'nav_menu_item', 'catalog'
        ));
        return $query;
    }
}
add_filter('pre_get_posts', 'Comedy_Dynamics_add_custom_types');



add_filter('posts_orderby', 'Comedy_Dynamics_cpt_order');
function Comedy_Dynamics_cpt_order($orderby)
{
    global $wpdb;

    // Check if the query is for an archive
    if (is_archive() && get_query_var("post_type") == "catalog") {
        // Query was for archive, then set order
        return "$wpdb->posts.post_title DESC";
    }

    return $orderby;
}


add_action('wp_footer', function () {
    $taxonomies = get_taxonomies(array( '_builtin' => false ));
    print '<pre>' . print_r($taxonomies, 1) . '</pre>';
});
