<?php
/**
 * Template part for displaying the offscreen filter menu.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-offcanvas' );

	global $searchandfilter;
	$sf_current_query = $searchandfilter->get( 46515 )->current_query();

	/**
	 * Get labels for Multiple Fields by Field Name
	 *
	 * @param Type $var Description
	 * @link https://searchandfilter.com/documentation/accessing-search-data/#get-labelsfor-multiple-fields-by-field-name
	 */
	$args = array(
		'str'                   => '%2$s',
		'delim'                 => array( ', ', ' - ' ),
		'field_delim'               => ', ',
		'show_all_if_empty'         => false,
	);
	// ? if search
	if ( have_posts() && strlen( trim( get_search_query() ) ) !== 0 ) {
		$archive_title = 'Search results: "' . $sf_current_query->get_search_term() . '"';
	} elseif ( $sf_current_query->is_filtered() > 0 ) {
		$archive_title = 'Filter by: "' . $sf_current_query->get_fields_html(
			array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ),
			$args
		) . '"';
	} else {
		$archive_title = single_term_title( '', false );
	}
	?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header page-header_catalog">
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
				<?php echo do_shortcode( '[searchandfilter slug="search-catalog"]' ); ?>
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
