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

// add_filter('pre_get_posts', 'query_post_type');
// function query_post_type($query)
// {
//     if (is_category()) {
//         $post_type = get_query_var('post_type');
//         if ($post_type) {
//             $post_type = $post_type;
//         } else {
//             $post_type = array('nav_menu_item', 'post', 'catalog');
//         } // don't forget nav_menu_item to allow menus to work!
//         $query->set('post_type', $post_type);
//         return $query;
//     }
// }

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

// function cptui_register_my_cpts_catalog()
// {
//
//     /**
//      * Post Type: Catalog Items.
//      */
//
//     $labels = array(
//         "name" => __("Catalog Items", "custom-post-type-ui"),
//         "singular_name" => __("Catalog", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Catalog Items", "custom-post-type-ui"),
//         "labels" => $labels,
//         "description" => "",
//         "public" => true,
//         "publicly_queryable" => true,
//         "show_ui" => true,
//         "delete_with_user" => false,
//         "show_in_rest" => true,
//         "rest_base" => "",
//         "rest_controller_class" => "WP_REST_Posts_Controller",
//         "has_archive" => true,
//         "show_in_menu" => true,
//         "show_in_nav_menus" => true,
//         "exclude_from_search" => false,
//         "capability_type" => "post",
//         "map_meta_cap" => true,
//         "hierarchical" => true,
//         "rewrite" => array( "slug" => "catalog", "with_front" => false ),
//         "query_var" => true,
//         "menu_position" => 5,
//         "supports" => array( "title", "thumbnail" ),
//         "taxonomies" => array( "category", "post_tag" ),
//     );
//
//     register_post_type("catalog", $args);
// }
//
// add_action('init', 'cptui_register_my_cpts_catalog');
//
//
// function cptui_register_my_taxes()
// {
//
//     /**
//      * Taxonomy: Main Talent.
//      */
//
//     $labels = array(
//         "name" => __("Main Talent", "custom-post-type-ui"),
//         "singular_name" => __("Main Talents", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Main Talent", "custom-post-type-ui"),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => false,
//         "show_ui" => false,
//         "show_in_menu" => false,
//         "show_in_nav_menus" => false,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'category', 'with_front' => true, ),
//         "show_admin_column" => false,
//         "show_in_rest" => false,
//         "rest_base" => "main_talent",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => false,
//         );
//     register_taxonomy("main_talent", array( "catalog" ), $args);
//
//     /**
//      * Taxonomy: Genre.
//      */
//
//     $labels = array(
//         "name" => __("Genre", "custom-post-type-ui"),
//         "singular_name" => __("Genres", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Genre", "custom-post-type-ui"),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => false,
//         "show_ui" => false,
//         "show_in_menu" => false,
//         "show_in_nav_menus" => false,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'genre', 'with_front' => true, ),
//         "show_admin_column" => true,
//         "show_in_rest" => false,
//         "rest_base" => "genre",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => true,
//         );
//     register_taxonomy("genre", array( "catalog" ), $args);
//
//     /**
//      * Taxonomy: Producers.
//      */
//
//     $labels = array(
//         "name" => __("Producers", "custom-post-type-ui"),
//         "singular_name" => __("Producer", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Producers", "custom-post-type-ui"),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => false,
//         "show_ui" => false,
//         "show_in_menu" => false,
//         "show_in_nav_menus" => false,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'producers', 'with_front' => true, ),
//         "show_admin_column" => false,
//         "show_in_rest" => false,
//         "rest_base" => "producers",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => false,
//         );
//     register_taxonomy("producers", array( "catalog" ), $args);
//
//     /**
//      * Taxonomy: Directors.
//      */
//
//     $labels = array(
//         "name" => __("Directors", "custom-post-type-ui"),
//         "singular_name" => __("Director", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Directors", "custom-post-type-ui"),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => false,
//         "show_ui" => false,
//         "show_in_menu" => false,
//         "show_in_nav_menus" => false,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'directors', 'with_front' => true, ),
//         "show_admin_column" => false,
//         "show_in_rest" => false,
//         "rest_base" => "directors",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => false,
//         );
//     register_taxonomy("directors", array( "catalog" ), $args);
//
//     /**
//      * Taxonomy: Writers.
//      */
//
//     $labels = array(
//         "name" => __("Writers", "custom-post-type-ui"),
//         "singular_name" => __("Writer", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Writers", "custom-post-type-ui"),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => false,
//         "show_ui" => false,
//         "show_in_menu" => false,
//         "show_in_nav_menus" => false,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'writers', 'with_front' => true, ),
//         "show_admin_column" => false,
//         "show_in_rest" => false,
//         "rest_base" => "writers",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => false,
//         );
//     register_taxonomy("writers", array( "catalog" ), $args);
//
//     /**
//      * Taxonomy: Media Category.
//      */
//
//     $labels = array(
//         "name" => __("Media Category", "custom-post-type-ui"),
//         "singular_name" => __("Media Category", "custom-post-type-ui"),
//     );
//
//     $args = array(
//         "label" => __("Media Category", "custom-post-type-ui"),
//         "labels" => $labels,
//         "public" => true,
//         "publicly_queryable" => true,
//         "hierarchical" => true,
//         "show_ui" => true,
//         "show_in_menu" => true,
//         "show_in_nav_menus" => true,
//         "has_archive" => true,
//         "query_var" => true,
//         "rewrite" => array( 'slug' => 'catalog', 'with_front' => false,  'hierarchical' => true, ),
//         "show_admin_column" => true,
//         "show_in_rest" => false,
//         "rest_base" => "media_category",
//         "rest_controller_class" => "WP_REST_Terms_Controller",
//         "show_in_quick_edit" => true,
//         );
//     register_taxonomy("media_category", array( "catalog" ), $args);
// }
// add_action('init', 'cptui_register_my_taxes');




// function generate_taxonomy_rewrite_rules($wp_rewrite)
// {
//     $rules = array();
//     $post_types = get_post_types(array( 'name' => 'catalog', 'public' => true, '_builtin' => false ), 'objects');
//     $taxonomies = get_taxonomies(array( 'name' => 'media_category', 'public' => true, '_builtin' => false ), 'objects');
//
//     foreach ($post_types as $post_type) {
//         $post_type_name = $post_type->name; // 'developer'
//     $post_type_slug = $post_type->rewrite['slug']; // 'developers'
//
//     foreach ($taxonomies as $taxonomy) {
//         if ($taxonomy->object_type[0] == $post_type_name) {
//             $terms = get_categories(array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ));
//             foreach ($terms as $term) {
//                 $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
//             }
//         }
//     }
//     }
//     $wp_rewrite->rules = $rules + $wp_rewrite->rules;
// }
// add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');
