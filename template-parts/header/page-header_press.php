<?php
/**
 * Template part for displaying the page header for the
 * press archive
 * press single pages
 * press filter & search pages
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;
$queried_obj    = get_queried_object();
$obj_title      = $queried_obj->label;
$obj_slug       = strtolower($obj_title);
$press_icon     = load_inline_svg( 'icon-press.svg' );
$sf_filter_data = '';
$blog_url       = get_bloginfo( 'url' );

// check for plugin using plugin name
if(in_array('search-filter-pro/search-filter-pro.php', apply_filters('active_plugins', get_option('active_plugins')))){
	$sf_press_query = $searchandfilter->get( 47395 )->current_query();
	if($sf_press_query->is_filtered()) {
		$sf_filtered = true;
	} else {
		$sf_filtered = false;
	}
} else {
	$sf_filtered = false;
}

if( $sf_filtered || get_search_query() ) :

	if( $sf_filtered ) :
		$array_data   = $sf_press_query->get_array();
		$typeOfSearch = $array_data['_sf_sort_order']['active_terms'][0]['value'];
		$sf_filter_data  =  $typeOfSearch;
	endif;

	if( get_search_query() ) :
		$search_query = get_search_query();
		$search_data  = ' "' . $search_query . '"';
	endif;

else :

	if(is_archive()) :
		$obj_title = $queried_obj->label;
		$obj_slug  = $queried_obj->name;
	else :
		$obj_title = ucfirst($queried_obj->post_type);
		$obj_slug  = $queried_obj->post_type;
	endif;

endif;

?>

<header class="page-header">
	<h2 class="page-title page-title__press">
		<?php echo $press_icon . esc_html($obj_title); ?>
	</h2>
	<div class="page-title_meta">
		<?php if(is_single()) : ?>
			<a href="<?php echo esc_html( $blog_url . '/' . $obj_slug ); ?>">
				<?php echo load_inline_svg('icon-carat-left.svg'); ?>
				<?php echo esc_html( $obj_title ); ?> Archive
			</a>
		<?php endif; ?>
		<?php if($sf_filtered === true || get_search_query()) : ?>
		<sub>
			<?php if( $sf_filtered ) : ?>
				<span class="page-title_meta-title">Filter – </span>
				<?php echo $sf_filter_data; ?>
			<?php endif; ?>
			<?php if( $sf_filtered && get_search_query() ) : ?>
				<span>|</span>
			<?php endif; ?>
			<?php if( get_search_query() ) : ?>
				<span class="page-title_meta-title">Search – </span>
				<?php echo $search_data; ?>
			<?php endif; ?>
		</sub>
		<?php endif; ?>
	</div>
</header>
