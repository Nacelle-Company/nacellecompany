<?php

function cptui_register_my_taxes()
{

  /**
   * Taxonomy: Main Talent.
   */

  $labels = [
    "name" => __("Main Talent", "custom-post-type-ui"),
    "singular_name" => __("Main Talents", "custom-post-type-ui"),
    "menu_name" => __("Main Talent", "custom-post-type-ui"),
    "all_items" => __("All Main Talent", "custom-post-type-ui"),
    "edit_item" => __("Edit Main Talents", "custom-post-type-ui"),
    "view_item" => __("View Main Talents", "custom-post-type-ui"),
    "update_item" => __("Update Main Talents name", "custom-post-type-ui"),
    "add_new_item" => __("Add new Main Talents", "custom-post-type-ui"),
    "new_item_name" => __("New Main Talents name", "custom-post-type-ui"),
    "parent_item" => __("Parent Main Talents", "custom-post-type-ui"),
    "parent_item_colon" => __("Parent Main Talents:", "custom-post-type-ui"),
    "search_items" => __("Search Main Talent", "custom-post-type-ui"),
    "popular_items" => __("Popular Main Talent", "custom-post-type-ui"),
    "separate_items_with_commas" => __("Separate Main Talent with commas", "custom-post-type-ui"),
    "add_or_remove_items" => __("Add or remove Main Talent", "custom-post-type-ui"),
    "choose_from_most_used" => __("Choose from the most used Main Talent", "custom-post-type-ui"),
    "not_found" => __("No Main Talent found", "custom-post-type-ui"),
    "no_terms" => __("No Main Talent", "custom-post-type-ui"),
    "items_list_navigation" => __("Main Talent list navigation", "custom-post-type-ui"),
    "items_list" => __("Main Talent list", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Main Talent", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'main-talent', 'with_front' => true,],
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_base" => "main_talent",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
  ];
  register_taxonomy("main_talent", ["catalog"], $args);

  /**
   * Taxonomy: Genre.
   */

  $labels = [
    "name" => __("Genre", "custom-post-type-ui"),
    "singular_name" => __("Genres", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Genre", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'genre', 'with_front' => true,],
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_base" => "genre",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
  ];
  register_taxonomy("genre", ["catalog"], $args);

  /**
   * Taxonomy: Producers.
   */

  $labels = [
    "name" => __("Producers", "custom-post-type-ui"),
    "singular_name" => __("Producer", "custom-post-type-ui"),
    "menu_name" => __("Producers", "custom-post-type-ui"),
    "all_items" => __("All Producers", "custom-post-type-ui"),
    "edit_item" => __("Edit Producer", "custom-post-type-ui"),
    "view_item" => __("View Producer", "custom-post-type-ui"),
    "update_item" => __("Update Producer name", "custom-post-type-ui"),
    "add_new_item" => __("Add new Producer", "custom-post-type-ui"),
    "new_item_name" => __("New Producer name", "custom-post-type-ui"),
    "parent_item" => __("Parent Producer", "custom-post-type-ui"),
    "parent_item_colon" => __("Parent Producer:", "custom-post-type-ui"),
    "search_items" => __("Search Producers", "custom-post-type-ui"),
    "popular_items" => __("Popular Producers", "custom-post-type-ui"),
    "separate_items_with_commas" => __("Separate Producers with commas", "custom-post-type-ui"),
    "add_or_remove_items" => __("Add or remove Producers", "custom-post-type-ui"),
    "choose_from_most_used" => __("Choose from the most used Producers", "custom-post-type-ui"),
    "not_found" => __("No Producers found", "custom-post-type-ui"),
    "no_terms" => __("No Producers", "custom-post-type-ui"),
    "items_list_navigation" => __("Producers list navigation", "custom-post-type-ui"),
    "items_list" => __("Producers list", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Producers", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'producers', 'with_front' => true,],
    "show_admin_column" => true,
    "show_in_rest" => false,
    "rest_base" => "producers",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy("producers", ["catalog"], $args);

  /**
   * Taxonomy: Media Category.
   */

  $labels = [
    "name" => __("Media Category", "custom-post-type-ui"),
    "singular_name" => __("Media Category", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Media Category", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => false,
    "show_in_menu" => false,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "rewrite" => false,
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "media_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy("media_category", ["catalog"], $args);

  /**
   * Taxonomy: Directors.
   */

  $labels = [
    "name" => __("Directors", "custom-post-type-ui"),
    "singular_name" => __("Director", "custom-post-type-ui"),
    "menu_name" => __("Directors", "custom-post-type-ui"),
    "all_items" => __("All Directors", "custom-post-type-ui"),
    "edit_item" => __("Edit Director", "custom-post-type-ui"),
    "view_item" => __("View Director", "custom-post-type-ui"),
    "update_item" => __("Update Director name", "custom-post-type-ui"),
    "add_new_item" => __("Add new Director", "custom-post-type-ui"),
    "new_item_name" => __("New Director name", "custom-post-type-ui"),
    "parent_item" => __("Parent Director", "custom-post-type-ui"),
    "parent_item_colon" => __("Parent Director:", "custom-post-type-ui"),
    "search_items" => __("Search Directors", "custom-post-type-ui"),
    "popular_items" => __("Popular Directors", "custom-post-type-ui"),
    "separate_items_with_commas" => __("Separate Directors with commas", "custom-post-type-ui"),
    "add_or_remove_items" => __("Add or remove Directors", "custom-post-type-ui"),
    "choose_from_most_used" => __("Choose from the most used Directors", "custom-post-type-ui"),
    "not_found" => __("No Directors found", "custom-post-type-ui"),
    "no_terms" => __("No Directors", "custom-post-type-ui"),
    "items_list_navigation" => __("Directors list navigation", "custom-post-type-ui"),
    "items_list" => __("Directors list", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Directors", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'directors', 'with_front' => true,],
    "show_admin_column" => true,
    "show_in_rest" => false,
    "rest_base" => "directors",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy("directors", ["catalog"], $args);

  /**
   * Taxonomy: Writers.
   */

  $labels = [
    "name" => __("Writers", "custom-post-type-ui"),
    "singular_name" => __("Writer", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("Writers", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => ['slug' => 'writers', 'with_front' => true,],
    "show_admin_column" => true,
    "show_in_rest" => false,
    "rest_base" => "writers",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy("writers", ["catalog"], $args);

  /**
   * Taxonomy: CD Categories.
   */

  $labels = [
    "name" => __("CD Categories", "custom-post-type-ui"),
    "singular_name" => __("CD Category", "custom-post-type-ui"),
  ];

  $args = [
    "label" => __("CD Categories", "custom-post-type-ui"),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "rewrite" => ['slug' => 'cd_category', 'with_front' => true,],
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "cd_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy("cd_category", ["catalog"], $args);
}
add_action('init', 'cptui_register_my_taxes');
