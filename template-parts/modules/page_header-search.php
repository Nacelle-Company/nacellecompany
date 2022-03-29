<?php
/**
 * Template part for displaying the page header with offcanvas search.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-offcanvas' );

global $searchandfilter;
$sf_current_query = $searchandfilter->get( 45354 )->current_query();
$sf_current_query->get_search_term();

if ( have_posts() && strlen( trim( get_search_query() ) ) !== 0 ) {
	$archive_title = 'Search results: "' . $sf_current_query->get_search_term() . '"';
} else {
	$archive_title = single_term_title( '', false );
}
?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header archive">
		<h1 class="title">
			<?php
			// Might need this: post_type_archive_title(); ?
			echo wp_kses( $archive_title, 'post' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</h1>
		<?php

			/**
			 * Offcanvas.
			 *
			 * @link https://www.w3schools.com/howto/howto_js_off-canvas.asp
			 */
		?>
			<span id="offcanvasToggle" class="offcanvas-toggle" onclick="openOffcanvas()" style="cursor:pointer">
				&#9776;
				<span class="offcanvas-toggle_title">
					<?php echo esc_html__( 'Sort & Filter', 'wp-rig' ); ?>
				</span>
			</span>

			<div id="offcanvasMenu" class="offcanvas-menu">
				<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
				<?php echo do_shortcode( '[searchandfilter slug="distribution-album-catalog-sidebar"]' ); ?>
			</div>
			<!-- offcanvas -->
			<script>
				/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
				function openOffcanvas() {
				document.getElementById("offcanvasMenu").style.width = "250px";
				document.getElementById("offcanvasToggle").style.marginRight = "250px";
				document.getElementById('offcanvasOverlay').style.visibility = "visible";
				}

				/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
				function closeNav() {
					document.getElementById("offcanvasMenu").style.width = "0";
					document.getElementById("offcanvasToggle").style.marginRight = "0";
					document.getElementById('offcanvasOverlay').style.visibility = "hidden";
				}
			</script>
	</header><!-- .page-header -->
