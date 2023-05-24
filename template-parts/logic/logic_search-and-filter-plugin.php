<?php
/**
 * Template part for search & filter plugin logic
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if(get_queried_object()) {
	$queried_obj = get_queried_object();
	$obj_slug    = $queried_obj->slug;
}
$request_uri = $_SERVER['REQUEST_URI'];
$server_name = $_SERVER['SERVER_NAME'];

// check if plugin is active using plugin name
if(in_array('search-filter-pro/search-filter-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) :
	// check server name & set sf filter id
	if(str_contains($server_name, 'nacellecompany')) :
		$sf_catalog_query = $searchandfilter->get( 363 )->current_query();
	else :
		// comedy dynamics or localhost site
		$sf_catalog_query = $searchandfilter->get( 47835 )->current_query();
	endif;

	$offcanvas        = true;
	if($sf_catalog_query->is_filtered()) {
		$sf_filter_on = true;
	} else {
		$sf_filter_on = false;
	}

	// Search & filter: SORTING
	if (strpos($request_uri,'sort_order')) {
		$sorting_on = true;
		$array_data = $sf_catalog_query->get_array();
		$sorting_by = $array_data['_sf_sort_order']['active_terms'][0]['value'];
	}
endif;
