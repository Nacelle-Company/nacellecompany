<?php 

// press post type
function cptui_register_my_cpts_press() {

	/**
	 * Post Type: Press.
	 */

	$labels = [
		"name" => __( "Press", "custom-post-type-ui" ),
		"singular_name" => __( "Press", "custom-post-type-ui" ),
		"add_new" => __( "Add New Press Post", "custom-post-type-ui" ),
		"add_new_item" => __( "Add New Press Post", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Press Post", "custom-post-type-ui" ),
		"new_item" => __( "New Press Post", "custom-post-type-ui" ),
		"view_item" => __( "View Press Post", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Press", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "press", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-megaphone",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"taxonomies" => [ "category", "post_tag" ],
	];

	register_post_type( "press", $args );
}

add_action( 'init', 'cptui_register_my_cpts_press' );

