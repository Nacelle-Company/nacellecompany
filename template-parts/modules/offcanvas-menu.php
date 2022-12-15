<?php
/**
 * Template part for offcanvas menu.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;

// check for plugin using plugin name
if(in_array('search-filter-pro/search-filter-pro.php', apply_filters('active_plugins', get_option('active_plugins')))){
	$sf_current_query = $searchandfilter->get( 46579 )->current_query();
	if($sf_current_query->is_filtered()) {
		$sf_filtered = true;
	} else {
		$sf_filtered = false;
	}
} else {
	$sf_filtered = false;
}

?>

<span id="offcanvasToggle" class="offcanvas-toggle" onclick="openOffcanvas()" style="cursor:pointer" title="Offcanvas sort & filter menu">
	&#9776;
	<h3 class="offcanvas-toggle_title">
		<?php
		echo esc_html__( 'Sort & Filter', 'wp-rig' );
		if ( $sf_filtered === true ) :
			?>
			<!-- <a href="#" class="search-filter-reset" data-search-form-id="46579" data-sf-submit-form="always">Reset</a> -->
			<?php
		endif;
		?>
	</h3>
</span>
<div id="offcanvasMenu" class="offcanvas-menu">
	<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
	<?php wp_rig()->display_offcanvas_sidebar(); ?>
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
