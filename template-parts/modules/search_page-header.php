<?php
/**
 * Template part for displaying the offscreen filter menu.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $query;

wp_rig()->print_styles( 'wp-rig-offcanvas' );

global $searchandfilter;
$current_post_type    = get_post_type( $post->ID, false );
$archive_title        = get_the_archive_title();
$the_query            = get_queried_object();
$the_post_object      = get_post_type_object( get_post_type( $the_query ) );
$archive_single_title = $the_post_object->labels->singular_name;

$search_results    = $archive_single_title . '<span class="search-results__title"><em>&nbsp;- search results for "' . get_search_query() . '"</em></span>';
// $tax_icon = strtolower( $the_query->cat_name );
// echo $tax_icon;

if ( 'catalog' === $current_post_type ) {
	$tax_icon = strtolower( $the_query->cat_name );
	$ajax_offcanvas_search = '[wpdreams_ajaxsearchpro id=1]';



} elseif ( 'news' === $current_post_type ) {
	if ( get_search_query() ) {
		$archive_title = $search_results;
	}
	$ajax_offcanvas_search = '[wpdreams_ajaxsearchpro id=4]'; // News search: #4.
	$tax_icon = 'newspaper';
	if ( is_singular() ) {
		$the_post           = get_queried_object();
		$archive_title      = get_post_type_object( get_post_type( $the_post ) );
		$archive_title      = $archive_title->labels->singular_name;
	}
} elseif ( 'press_release' === $current_post_type ) {
	$archive_title         = $search_results;
	$ajax_offcanvas_search = '[wpdreams_ajaxsearchpro id=3]'; // Press Release search: #3.
	$tax_icon            = 'megaphone';
	if ( is_singular() ) {
		echo 'SINGULAR!';
		$the_post      = get_queried_object();
		$archive_title = get_post_type_object( get_post_type( $the_post ) );
		$archive_title = $archive_title->labels->singular_name;
		$archive_title = rtrim( $archive_title, 's' );
	} elseif ( is_archive() ) {

	} else {
		echo 'gotta be a search page!!!';
	}
} elseif ( is_search() ) {
	echo 'ajax search plugin search results';
	$searchandfilter_menu = '[searchandfilter slug="offcanvas-catalog-search"]';
}




if ( is_tax() ) {
	$tax_name = strtoupper( $the_query->taxonomy );
	$tax_name = str_replace( '_', ' ', $tax_name );
	if ( 'directors' === $the_query->taxonomy ) {
		$tax_icon = 'megaphone';
	} elseif ( 'producers' === $the_query->taxonomy ) {
		$tax_icon = 'video-alt2';
	} elseif ( 'writers' === $the_query->taxonomy ) {
		$tax_icon = 'welcome-write-blog';
	} else {
		$tax_icon = 'admin-users';
	}
}
	/**
	 * Get labels for Multiple Fields by Field Name
	 *
	 * @link https://searchandfilter.com/documentation/accessing-search-data/#get-labelsfor-multiple-fields-by-field-name
	 */
	$args = array(
		'str'               => '%2$s',
		'delim'             => array( ', ', ' - ' ),
		'field_delim'       => ', ',
		'show_all_if_empty' => false,
	);

	?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header page-header_sortandfilter">
		<div class="title-wrap title-wrap__icon">
			<h1 class="title">
				<?php
				get_template_part( 'template-parts/svg/icon', $tax_icon );
				echo wp_kses( $archive_title, 'post' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</h1>
		</div>
		<!-- OFFCANVAS MENU -->
		<span id="offcanvasToggle" class="offcanvas-toggle" onclick="openOffcanvas()" style="cursor:pointer" title="Offcanvas sort & filter menu">
			&#9776;
			<span class="offcanvas-toggle_title">
				<?php echo esc_html__( 'Sort & Filter', 'wp-rig' ); ?>
			</span>
		</span>
		<div id="offcanvasMenu" class="offcanvas-menu">
			<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
			<h3 class="offcanvas-title">Search</h3>
			<?php echo do_shortcode( $ajax_offcanvas_search ); ?>
		</div>
	</header><!-- .page-header -->
	<!-- offcanvas -->
	<script>
		/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
		function openOffcanvas() {
		document.getElementById("offcanvasMenu").style.width = "250px";
		document.getElementById('offcanvasOverlay').style.visibility = "visible";
		}

		/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
		function closeNav() {
			document.getElementById("offcanvasMenu").style.width = "0";
			document.getElementById('offcanvasOverlay').style.visibility = "hidden";
		}
	</script>
