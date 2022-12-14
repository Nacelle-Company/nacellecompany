<?php
/**
 * Template part for displaying the page header on the
 * catalog archive &
 * catalog filter & search pages
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;

wp_rig()->print_styles( 'wp-rig-offcanvas' );

$queried_obj      = get_queried_object();
$sf_catalog_query = $searchandfilter->get( 46579 )->current_query();
$category_icon    = file_get_contents( get_template_directory() . '/assets/images/icon-catalog.svg' );
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$sorting = false;

// THE IF STATEMENT TO SAVE IT ALL
if ( is_404() ) :
	$page_title = 'Oops! That page can&rsquo;t be found.';
elseif( $sf_catalog_query->is_filtered() || get_search_query() ) : // Get the filter terms & the sorting selection
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
			$category_icon =  file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_slug . '.svg' );
		}

		// Search & filter: SORTING
		if (strpos($url,'sort_order')) {
			$sorting = true;
			$array_data = $sf_catalog_query->get_array();
			$sorting_by = $array_data['_sf_sort_order']['active_terms'][0]['value'];
		}

		// Filter Category
		$filter_category = $sf_catalog_query->get_fields_html(array( '_sft_category' ), $name_only_args );
		if ( $filter_category ) :
			$category_name = $filter_category;
			$filter_query = $sf_catalog_query->get_fields_html( array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ), $args );
		else :
			$filter_query = $sf_catalog_query->get_fields_html( array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ), $args );
			// if we reset the form the /catalog page loads, this takes care of that.
			$category_icon = file_get_contents( get_template_directory() . '/assets/images/icon-catalog.svg' );
			$category_name = 'Catalog';
		endif;
	endif;

	// SEARCH QUERY
	if(get_search_query()) :
		$category_name = 'Search results';
		$category_slug = 'search';
		$category_icon = file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_slug . '.svg' );
		$search_query  = get_search_query();
	endif;

elseif ( is_category() || is_page('products') ) :
	$category_name = $queried_obj->name;
	$category_slug = $queried_obj->slug;
	if ( is_category('series-production') ) :
		$category_slug = 'series';
	elseif (is_category('special-production') || is_category('production') ) :
		$category_slug = 'special';
	elseif (is_page('products')) :
		$category_slug = 'film';
		$category_name = 'Products';
	endif;
	$category_icon = file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_slug . '.svg' );
else :
	$category_name = 'Catalog';
endif;
?>

<header class="page-header page-header__filters">
	<div class="page-title__wrap">
		<h1 class="page-title">
			<?php echo $category_icon . esc_html( $category_name ); ?>
		</h1>
		<?php if($sf_catalog_query->is_filtered() || get_search_query()) : ?>
			<div class="page-title_meta">
				<?php if( get_search_query() ) : // SEARCH QUERY ?>
					<sub>
						<span class="page-title_meta-title">Search Term - </span>
						<em>"<?php echo $search_query; ?>"</em>
					</sub>&nbsp;
				<?php endif; ?>
				<?php if( $filter_query !== '') : // FILTERS ?>
					<sub>
						<span class="page-title_meta-title">Filterd by - </span><?php echo $filter_query; ?>
					</sub>&nbsp;
				<?php endif; ?>
				<?php if( $sorting === true ) : ?>
					<sub>
						<span class="page-title_meta-title">Sorted by – </span>
						<?php echo $sorting_by; ?>
					</sub>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if( ! is_page('products')) : // if not the products page, show the filter hamburger icon ?>
			<div class="page-title__offcanvas">
				<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
			</div>
		<?php endif; ?>
	</div>

</header>

<?php
// $filter_category = $sf_catalog_query->get_fields_html(
// 							array( '_sft_category' ),
// 							$name_only_args
// 						);
// 	if ( $filter_category ) {
// 		echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );
// 		echo $filter_category;
// 	} else {
// 		echo file_get_contents( get_template_directory() . '/assets/images/icon-series.svg' );
// 		echo 'Catalog';
// 	}


/*
	echo '<span style="color:var(--color-theme-primary);">Filter – </span>' . $sf_catalog_query->get_fields_html(
	array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ),
		$args
	);
*/
/*
	echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );
	if ($category_name) {
		echo $category_name . ' ' . ucfirst($category_name);
	} elseif ($queried_obj) {
		echo ucfirst($queried_obj->name);
	} else {
		echo 'Comedy Catalog';
	}
*/
/*
	if ( str_contains( $category_name, 'catalog' ) ) {
		$category_name = 'series';
	} elseif ( str_contains( $category_name, 'press' ) ) {
		$category_name = 'press';
	} elseif ( str_contains( $queried_obj->slug, 'series' ) ) {
		$category_name = 'series';
	} elseif ( str_contains( $queried_obj->slug, 'special' ) || str_contains( $queried_obj->slug, 'production' ) ) {
		$category_name = 'special';
	} elseif ( str_contains( $queried_obj->slug, 'album' ) || str_contains( $queried_obj->slug, 'distribution' ) ) {
		$category_name = 'album';
	} elseif ( str_contains( $queried_obj->slug, 'film' ) ) {
		$category_name = 'film';
	} elseif ($sf_catalog_query->get_fields_html(array( '_sft_category' ), $args)) {
		$sf_catalog_title = $sf_catalog_query->get_fields_html(array( '_sft_category' ), $name_only_args);

		if ( ! str_contains( $sf_catalog_title, 'Series' ) ) {
			$category_name = substr(strtolower($sf_catalog_title), 0, -1);

		} else {
			$category_name = strtolower($sf_catalog_title);

		}

		$icon_filter = file_get_contents( get_template_directory() . '/assets/images/icon-filter.svg' );

	} else {
		$category_name = 'series';

	}
*/
?>
