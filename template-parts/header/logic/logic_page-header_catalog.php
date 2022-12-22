<?php
/**
 * Template part for catalog header logic
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $queried_obj;
global $searchandfilter;
global $request_uri;
global $sf_filter_on;
global $offcanvas;
global $sf_catalog_query;
global $sorting_on;
global $sorting_by;

$category_icon = load_inline_svg( 'icon-catalog.svg' );

wp_rig()->print_styles( 'wp-rig-offcanvas' );

// THE IF STATEMENT TO SAVE IT ALL
if ( is_404() ) :
	$page_title = 'Oops! That page can&rsquo;t be found.';
elseif( $sf_filter_on === true || get_search_query() ) : // Get the filter terms & the sorting selection
	$filter_query = '';

	// SEARCH & FILTER
	if($sf_catalog_query->is_filtered()) :
		// Search & filter: args
		$args = array(
			"str" 				=> '%1$s: %2$s',
			"delim" 			=> array(", ", " - "),
			"field_delim"		=> ' / ',
			"show_all_if_empty"	=> false
		);
		$name_only_args = array(
			"str" 				=> '%2$s',
			"delim" 			=> array(", ", " - "),
			"field_delim"		=> ' / ',
			"show_all_if_empty"	=> false
		);
		// Search & Filter: Get category icon term/category
		$filter_cat_args = array( // only the category name
			"str" 					=> '%2$s',
			"show_all_if_empty"		=> false
		);
		$filter_cat = $sf_catalog_query->get_fields_html(
			array('_sft_category'),
			$filter_cat_args
		);

		// TITLE ICON: category slug
		if(!empty($filter_cat) && !empty($category_slug)) {
			$category_slug = strtolower($filter_cat); // to lowercase
			if ( $category_slug === 'series' || $category_slug === 'podcast') :
				$category_slug = $category_slug; // keep the slug
			elseif (!$category_slug) :
				$category_slug = 'search'; // no category slug set, so set it to "search"
			else :
				$category_slug = substr($category_slug, 0, -1); // remove the ending "s"
			endif;
			// $category_icon =  load_inline_svg( '/assets/images/icon-' . $category_slug . '.svg' );
		}

		// Filter Category
		$filter_category = $sf_catalog_query->get_fields_html(array( '_sft_category' ), $name_only_args );

		if ( $filter_category ) :
			$category_name = $filter_category;
			$filter_query = $sf_catalog_query->get_fields_html( array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ), $args );
			$category_icon = load_inline_svg( 'icon-' . strtolower( $filter_category ) . '.svg' );
		else :
			$filter_query = $sf_catalog_query->get_fields_html( array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ), $args );
			// if we reset the form the /catalog page loads, this takes care of that.
			$category_icon = load_inline_svg( 'icon-catalog.svg' );
			$category_name = 'Catalog';
		endif;
	endif;

	// SEARCH QUERY
	if(get_search_query()) :
		$category_name = 'Search results';
		$category_icon = load_inline_svg( 'icon-search.svg' );
		$search_query  = get_search_query();
	endif;

elseif ( is_category() || is_page('products') ) :

	if ( is_category('series-production') ) :
		$category_name = $queried_obj->name;
		$category_slug = 'series';
	elseif (is_category('special-production') || is_category('production') ) :
		$category_name = $queried_obj->name;
		$category_slug = 'special';
	elseif (is_page('products')) :
		$category_slug = 'film';
		$category_name = 'Products';
	elseif (is_category()) :
		$category_slug = $queried_obj->slug;
		$category_name = $queried_obj->name;
	else :
		$category_icon = load_inline_svg( 'icon-catalog.svg' );
	endif;
	$category_icon = load_inline_svg( 'icon-' . $category_slug . '.svg' );
else :
	$category_name = 'Catalog';
endif;
