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
$sf_press_query = $searchandfilter->get( 47395 )->current_query();
$press_icon     = load_inline_svg( 'icon-press.svg' );
$filter_data    = '';
$post_name      = 'Press';
$obj_slug    	= $queried_obj->post_type;
$the_post_type  = get_post_type_object( get_post_type( $queried_obj ) );
$post_type_name = $the_post_type->labels->singular_name;

if( $sf_press_query->is_filtered() ) :
	$array_data   = $sf_press_query->get_array();
	$typeOfSearch = $array_data['_sf_sort_order']['active_terms'][0]['value'];
	$filter_data  =  $typeOfSearch;
	if(get_search_query()) :
		$search_query = get_search_query();
		$search_data  = ' "' . $search_query . '"';
	endif;

elseif(get_search_query()) :
	$search_query = get_search_query();
	$search_data  = ' "' . $search_query . '"';

elseif ( is_post_type_archive() ) :
	$post_name = $queried_obj->name;

elseif (is_single()) :
	$post_name = 'Press';

endif;
?>

<header class="page-header">
	<h1 class="page-title">
		<?php echo $press_icon . esc_html($post_name); ?>
	</h1>
	<div class="page-title_meta">
		<a href="<?php echo wp_kses( get_post_type_archive_link( $obj_slug ), 'post' ); ?>">
			<?php echo load_inline_svg('icon-carat-left.svg'); ?>
			<?php echo esc_html( $post_type_name ); ?> Archive
		</a>
		<?php if($sf_press_query->is_filtered() || get_search_query()) : ?>
		<sub>
			<?php if($sf_press_query->is_filtered() ) : ?>
				<span class="page-title_meta-title">Filter – </span>
				<?php echo $filter_data; ?>
			<?php endif; ?>
			<?php if($sf_press_query->is_filtered() && get_search_query()) : ?>
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
