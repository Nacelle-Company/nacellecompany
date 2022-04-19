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
$sf_current_query    = $searchandfilter->get( 46578 )->current_query();
$searchandfilter_menu = '[searchandfilter slug="main-search"]';
$current_post_type   = get_post_type( $post->ID, false );
$archive_title       = get_the_archive_title();
$the_query           = get_queried_object();
$single_icon_inline  = '';

if ( 'news' === $current_post_type ) {
	$searchandfilter_menu = '[searchandfilter slug="offcanvas-news-search"]';
	$tax_icon = 'newspaper';
	if ( is_singular() ) {
		$the_post           = get_queried_object();
		$archive_title      = get_post_type_object( get_post_type( $the_post ) );
		$archive_title      = $archive_title->labels->singular_name;
	}
} elseif ( 'press_release' === $current_post_type ) {
	$searchandfilter_menu = '[searchandfilter slug="offcanvas-press-release-search"]';
	$tax_icon = 'megaphone';
	if ( is_singular() ) {
		$the_post           = get_queried_object();
		$archive_title      = get_post_type_object( get_post_type( $the_post ) );
		$archive_title      = $archive_title->labels->singular_name;
		$single_icon_inline = ' grid';
		$archive_title = rtrim( $archive_title, 's' );
	}
} else {
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
		<div class="title-wrap">
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
			<?php echo do_shortcode( '[wpdreams_ajaxsearchlite]' ); ?>
			<?php echo do_shortcode( $searchandfilter_menu ); ?>
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
