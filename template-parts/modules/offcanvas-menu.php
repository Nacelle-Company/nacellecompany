<?php
/**
 * Template part for offcanvas menu.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-offcanvas' );

global $searchandfilter;
$sf_current_query = $searchandfilter->get( 46681 )->current_query();
?>

<span id="offcanvasToggle" class="offcanvas-toggle" onclick="openOffcanvas()" style="cursor:pointer" title="Offcanvas sort & filter menu">
	&#9776;
	<span class="offcanvas-toggle_title">
		<?php
		echo esc_html__( 'Sort & Filter', 'wp-rig' );
		if ( $sf_current_query->is_filtered() ) :
			?>
		<a href="#" class="search-filter-reset" data-search-form-id="46681" data-sf-submit-form="always">Reset</a>
			<?php
		endif;
		?>
	</span>
</span>
<div id="offcanvasMenu" class="offcanvas-menu">
	<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
	<h3 class="offcanvas-title">Sort & Filter</h3>
	<?php echo do_shortcode( '[searchandfilter slug="comedy-filters"]' ); ?>
</div>
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
