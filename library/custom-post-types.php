<?php
function cptui_register_my_cpts()
{

	/**
	 * Post Type: Press Release.
	 */

	$labels = [
		"name" => __("Press Release", "custom-post-type-ui"),
		"singular_name" => __("Press Releases", "custom-post-type-ui"),
		"menu_name" => __("Press Releases", "custom-post-type-ui"),
		"all_items" => __("Press Releases", "custom-post-type-ui"),
		"add_new_item" => __("Add New Press Release", "custom-post-type-ui"),
		"edit_item" => __("Edit Press Release", "custom-post-type-ui"),
		"new_item" => __("New Press Release", "custom-post-type-ui"),
		"view_item" => __("View Press Release", "custom-post-type-ui"),
		"view_items" => __("View Press Releases", "custom-post-type-ui"),
		"search_items" => __("Search Press Releases", "custom-post-type-ui"),
		"not_found" => __("No Press Releases found", "custom-post-type-ui"),
		"not_found_in_trash" => __("Press Release not found in trash", "custom-post-type-ui"),
		"parent" => __("Parent Press Release", "custom-post-type-ui"),
		"archives" => __("Press Release archives", "custom-post-type-ui"),
		"insert_into_item" => __("Insert into Press Release", "custom-post-type-ui"),
		"uploaded_to_this_item" => __("Uploaded to this Press Release", "custom-post-type-ui"),
		"filter_items_list" => __("Filter Press Releases list", "custom-post-type-ui"),
		"items_list_navigation" => __("Press Release list navigation", "custom-post-type-ui"),
		"items_list" => __("Press Releases list", "custom-post-type-ui"),
		"attributes" => __("Press Release Attributes", "custom-post-type-ui"),
		"parent_item_colon" => __("Parent Press Release", "custom-post-type-ui"),
	];

	$args = [
		"label" => __("Press Release", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "Comedy Dynamics latest press releases.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => ["slug" => "press-release", "with_front" => false],
		"query_var" => true,
		"menu_position" => 7,
		"menu_icon" => "dashicons-format-chat",
		"supports" => ["title", "editor", "thumbnail", "excerpt"],
	];

	register_post_type("press_release", $args);

	/**
	 * Post Type: Comedies.
	 */

	$labels = [
		"name" => __("Comedies", "custom-post-type-ui"),
		"singular_name" => __("Comedy", "custom-post-type-ui"),
		"menu_name" => __("Comedies", "custom-post-type-ui"),
		"all_items" => __("All Comedies", "custom-post-type-ui"),
		"add_new" => __("Add new", "custom-post-type-ui"),
		"add_new_item" => __("Add new Comedy", "custom-post-type-ui"),
		"edit_item" => __("Edit Comedy", "custom-post-type-ui"),
		"new_item" => __("New Comedy", "custom-post-type-ui"),
		"view_item" => __("View Comedy", "custom-post-type-ui"),
		"view_items" => __("View Comedies", "custom-post-type-ui"),
		"search_items" => __("Search Comedies", "custom-post-type-ui"),
		"not_found" => __("No Comedies found", "custom-post-type-ui"),
		"not_found_in_trash" => __("No Comedies found in trash", "custom-post-type-ui"),
		"parent" => __("Parent Comedy:", "custom-post-type-ui"),
		"featured_image" => __("Featured image for this Comedy", "custom-post-type-ui"),
		"set_featured_image" => __("Set featured image for this Comedy", "custom-post-type-ui"),
		"remove_featured_image" => __("Remove featured image for this Comedy", "custom-post-type-ui"),
		"use_featured_image" => __("Use as featured image for this Comedy", "custom-post-type-ui"),
		"archives" => __("Comedy archives", "custom-post-type-ui"),
		"insert_into_item" => __("Insert into Comedy", "custom-post-type-ui"),
		"uploaded_to_this_item" => __("Upload to this Comedy", "custom-post-type-ui"),
		"filter_items_list" => __("Filter Comedies list", "custom-post-type-ui"),
		"items_list_navigation" => __("Comedies list navigation", "custom-post-type-ui"),
		"items_list" => __("Comedies list", "custom-post-type-ui"),
		"attributes" => __("Comedies attributes", "custom-post-type-ui"),
		"name_admin_bar" => __("Comedy", "custom-post-type-ui"),
		"item_published" => __("Comedy published", "custom-post-type-ui"),
		"item_published_privately" => __("Comedy published privately.", "custom-post-type-ui"),
		"item_reverted_to_draft" => __("Comedy reverted to draft.", "custom-post-type-ui"),
		"item_scheduled" => __("Comedy scheduled", "custom-post-type-ui"),
		"item_updated" => __("Comedy updated.", "custom-post-type-ui"),
		"parent_item_colon" => __("Parent Comedy:", "custom-post-type-ui"),
	];

	$args = [
		"label" => __("Comedies", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "Comedy Dynamics comedy archive.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "catalog",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => ["slug" => "catalog", "with_front" => false],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-album",
		"supports" => ["title", "editor", "thumbnail", "custom-fields", "page-attributes"],
		"taxonomies" => ["category", "main_talent", "genre", "producers", "media_category", "directors", "writers", "cd_category"],
	];

	register_post_type("catalog", $args);

	/**
	 * Post Type: News.
	 */

	$labels = [
		"name" => __("News", "custom-post-type-ui"),
		"singular_name" => __("News", "custom-post-type-ui"),
	];

	$args = [
		"label" => __("News", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "in-the-news", "with_front" => true],
		"query_var" => true,
		"menu_position" => 4,
		"supports" => ["title", "editor", "thumbnail"],
	];

	register_post_type("news", $args);

	/**
	 * Post Type: Press.
	 */

	$labels = [
		"name" => __("Press", "custom-post-type-ui"),
		"singular_name" => __("Press", "custom-post-type-ui"),
		"add_new" => __("Add New Press Post", "custom-post-type-ui"),
		"add_new_item" => __("Add New Press Post", "custom-post-type-ui"),
		"edit_item" => __("Edit Press Post", "custom-post-type-ui"),
		"new_item" => __("New Press Post", "custom-post-type-ui"),
		"view_item" => __("View Press Post", "custom-post-type-ui"),
	];

	$args = [
		"label" => __("Press", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => ["slug" => "press", "with_front" => true],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-megaphone",
		"supports" => ["title", "editor", "thumbnail", "excerpt"],
		"taxonomies" => ["category", "post_tag"],
	];

	register_post_type("press", $args);

}

add_action('init', 'cptui_register_my_cpts');
