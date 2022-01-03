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
 * @package Nacelle
 * @since Nacelle 1.0.0
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
/** Social sharing settings option */
require_once('library/social-share.php');
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
/** Custom Post Types UI Code */
require_once('library/custom-post-types.php');
/** Custom Post UI Taxonomies Code */
require_once('library/custom-post-taxonomies.php');
/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );
/**
 * Create ACF options page
 *
 * @since 1.0.0
 */
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
        'page_title' => 'Catalog Options',
        'menu_title' => 'Catalog Options',
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
add_action('pre_get_posts', 'Nacelle_show_all_work');
function Nacelle_show_all_work($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_post_type_archive('press_archive')) {
            $query->set('posts_per_page', -1);
        }
    }
}
// https://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/
function Nacelle_add_custom_types($query)
{
    if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
        $query->set('post_type', array(
            'post', 'nav_menu_item', 'catalog'
        ));
        return $query;
    }
}
add_filter('pre_get_posts', 'Nacelle_add_custom_types');
add_filter('posts_orderby', 'Nacelle_cpt_order');
function Nacelle_cpt_order($orderby)
{
    global $wpdb;
    // Check if the query is for an archive
    if (is_archive() && get_query_var("post_type") == "catalog") {
        // Query was for archive, then set order
        return "$wpdb->posts.post_title DESC";
    }
    return $orderby;
}
// custom user role
add_role(
    'custom_editor',
    __('CD Editor'),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'edit_theme_options'    => true,
        'edit_pages' => true,
        'publish_pages' => true,
        'publish_posts' => true,
        'delete_published_posts' => true,
        'edit_dashboard' => true,
        'edit_others_pages' => true,
        'edit_others_posts' => true,
        'edit_pages' => true,
        'edit_posts' => true,
        'edit_private_pages' => true,
        'edit_private_posts' => true,
        'edit_published_pages' => true,
        'edit_published_posts' => true,
        'edit_theme_options' => true,
        'delete_others_pages' => true,
        'delete_others_posts' => true,
        'delete_pages' => true,
        'delete_posts' => true,
        'delete_private_pages' => true,
        'delete_private_posts' => true,
        'delete_published_pages' => true
    )
);
// advanced custom fields
add_action('admin_head', 'cd_custom_css');
function cd_custom_css()
{
    echo '<style>
    .short-title {
      // height:14rem !important;
    }
  </style>';
}
/**
 * YouTube oEmbeds w/ query string parameters
 * https://brettmhoffman.com/code/add-query-string-parameters-to-youtube-oembeds-in-wp/
 */
add_filter('embed_oembed_html', 'embed_youtube_parameters');
add_filter('video_embed_html', 'embed_youtube_parameters'); // Jetpack
function embed_youtube_parameters($code)
{
    if (strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false) {
        $return = preg_replace('@embed/([^"&]*)@', 'embed/$1&modestbranding=1&autohide=1&rel=0', $code);
    }
    return '<div class="embed-container">' . $return . '</div>';
}
// echo custom colors from customizer, https://www.cssigniter.com/how-to-create-a-custom-color-scheme-for-your-wordpress-theme-using-the-customizer/
function nacelle_enqueue_styles()
{
    wp_enqueue_style('nacelle-styles', get_stylesheet_uri()); // This is where you enqueue your theme's main stylesheet
    $custom_css = Nacelle_custom_colors();
    wp_add_inline_style('nacelle-styles', $custom_css);
}
add_action('wp_enqueue_scripts', 'nacelle_enqueue_styles');
// fix the custom post type pagination error
// https://toolset.com/forums/topic/custom-post-type-pagination-404-error/
function Nacelle_fix_custom_posts_per_page($query_string)
{
    if (is_admin() || !is_array($query_string))
        return $query_string;
    $post_types_to_fix = array(
        array(
            'post_type' => 'catalog',
            'posts_per_page' => 24
        ),
    );
    foreach ($post_types_to_fix as $fix) {
        if (
            array_key_exists('post_type', $query_string)
            && $query_string['post_type'] == $fix['post_type']
        ) {
            $query_string['posts_per_page'] = $fix['posts_per_page'];
            return $query_string;
        }
    }
    return $query_string;
}
add_filter('request', 'Nacelle_fix_custom_posts_per_page');
// END fix the custom post type pagination error
// custom logo https://since1979.dev/wordpress-add-custom-logo-support-to-your-theme/
add_action('pre_get_posts', 'Nacelle_change_category_order');
/**
 * Customize category Query using pre_get_posts.
 * 
 * @link     FAT Media https://gist.github.com/robneu/6402258
 * @copyright  Copyright (c) 2013, FAT Media, LLC
 * @license    GPL-2.0+
 * @todo       Change prefix to theme or plugin prefix.
 *
 */
function Nacelle_change_category_order($query)
{
    if ($query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
// Display all image sizes other than the default, thumbnail, medium and large
// https://wpbeaches.com/remove-unused-image-media-sizes-wordpress-theme/
// remove sidebar debug on wp top bar
// https://wordpress.org/support/topic/remove-sidebar-debug/
function remove_admin_links($wp_admin_bar)
{
    // remove Sidebar Debug link (Custom Sidebars plugin)
    $wp_admin_bar->remove_node('cs-explain');
}
add_action('admin_bar_menu', 'remove_admin_links', 9999);


// duplicate pages
// https://www.hostinger.com/tutorials/how-to-duplicate-wordpress-page-or-post

/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft()
{
    global $wpdb;
    if (!(isset($_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('No post to duplicate has been supplied!');
    }

    /*
   * Nonce verification
   */
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
        return;

    /*
   * get the original post id
   */
    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    /*
   * and all the original post data then
   */
    $post = get_post($post_id);

    /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    /*
   * if post data exists, create the post duplicate
   */
    if (isset($post) && $post != null) {

        /*
     * new post data array
     */
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
            'menu_order'     => $post->menu_order
        );

        /*
     * insert the post by wp_insert_post() function
     */
        $new_post_id = wp_insert_post($args);

        /*
     * get all current post terms ad set them to the new post draft
     */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        /*
     * duplicate all post meta just in two SQL queries
     */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if ($meta_key == '_wp_old_slug') continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }


        /*
     * finally, redirect to the edit post screen for the new draft
     */
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');

/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link($actions, $post)
{
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

// duplicate pages END

// Add custom classes to anchor in wp_nav_menu
// https://wordpress.stackexchange.com/a/241072
add_filter('nav_menu_link_attributes', 'nacellecompany_menu_add_class', 10, 3);

function nacellecompany_menu_add_class($atts, $item, $args)
{
    $class = 'button'; // or something based on $item
    $atts['role'] = $class;
    return $atts;
}



/**
 * Preload attachment image, defaults to post thumbnail
 * https://dev.to/jacksonlewis/how-to-preload-images-in-wordpress-48di
 */
function preload_post_thumbnail()
{
    global $post;
    /** Prevent preloading for specific content types or post types */
    if (!is_singular()) {
        return;
    }
    /** Adjust image size based on post type or other factor. */
    $image_size = 'full';

    if (is_singular('product')) {
        $image_size = 'woocommerce_single';
    } else if (is_singular('post')) {
        $image_size = 'large';
    }
    $image_size = apply_filters('preload_post_thumbnail_image_size', $image_size, $post);
    /** Get post thumbnail if an attachment ID isn't specified. */
    $thumbnail_id = apply_filters('preload_post_thumbnail_id', get_post_thumbnail_id($post->ID), $post);

    /** Get the image */
    $image = wp_get_attachment_image_src($thumbnail_id, $image_size);
    $src = '';
    $additional_attr_array = array();
    $additional_attr = '';

    if ($image) {
        list($src, $width, $height) = $image;

        /**
         * The following code which generates the srcset is plucked straight
         * out of wp_get_attachment_image() for consistency as it's important
         * that the output matches otherwise the preloading could become ineffective.
         */
        $image_meta = wp_get_attachment_metadata($thumbnail_id);

        if (is_array($image_meta)) {
            $size_array = array(absint($width), absint($height));
            $srcset     = wp_calculate_image_srcset($size_array, $src, $image_meta, $thumbnail_id);
            $sizes      = wp_calculate_image_sizes($size_array, $src, $image_meta, $thumbnail_id);

            if ($srcset && ($sizes || !empty($attr['sizes']))) {
                $additional_attr_array['imagesrcset'] = $srcset;

                if (empty($attr['sizes'])) {
                    $additional_attr_array['imagesizes'] = $sizes;
                }
            }
        }

        foreach ($additional_attr_array as $name => $value) {
            $additional_attr .= "$name=" . '"' . $value . '" ';
        }
    } else {
        /** Early exit if no image is found. */
        return;
    }

    /** Output the link HTML tag */
    printf('<link rel="preload" as="image" href="%s" %s/>', esc_url($src), $additional_attr);
}
add_action('wp_head', 'preload_post_thumbnail');


// i can has custom hook
// function custom_hook()
// {
//     echo 'This!!!!';
//     do_action('Nacelle_social_share_content');
//     echo 'That!!';
// }

# Finding handle for your plugins 
// function display_script_handles()
// {
//     global $wp_scripts;
//     if (current_user_can('manage_options')) { # Only load when user is admin
//         echo '<strong>You can find this code in functions.php under "Finding handle for your plugins".  <a href="https://orbitingweb.com/blog/preventing-plugins-from-loading-js-css-on-all-pages/" target="_blank">Page with code</a></strong><br/><br/>';
//         foreach ($wp_scripts->queue as $handle) :
//             $obj = $wp_scripts->registered[$handle];
//             echo $filename = $obj->src;
//             echo ' : <b>Handle for this script is:</b> <span style="color:green"> ' . $handle . '</span><br/><br/>';
//         endforeach;
//     }
// }
// add_action('wp_print_scripts', 'display_script_handles');

// remove width & height attributes from images
//
function remove_img_attr($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

add_filter('post_thumbnail_html', 'remove_img_attr');