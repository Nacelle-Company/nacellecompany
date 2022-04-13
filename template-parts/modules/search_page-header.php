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
	$sf_current_query   = $searchandfilter->get( 46515 )->current_query();
	$single_icon_inline = '';
	/**
	 * Get labels for Multiple Fields by Field Name
	 *
	 * @param Type $var Description
	 * @link https://searchandfilter.com/documentation/accessing-search-data/#get-labelsfor-multiple-fields-by-field-name
	 */
	$args = array(
		'str'               => '%2$s',
		'delim'             => array( ', ', ' - ' ),
		'field_delim'       => ', ',
		'show_all_if_empty' => false,
	);
	// ? if search
	if ( have_posts() && strlen( trim( get_search_query() ) ) !== 0 ) {
		$archive_title = 'Search results: "' . $sf_current_query->get_search_term() . '"';
	} elseif ( $sf_current_query->is_filtered() > 0 ) {
		$archive_title = 'Filter by: "' . $sf_current_query->get_fields_html(
			array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ),
			$args
		) . '"';
	} elseif ( is_archive() ) {
		$current_post_type = get_post_type( $post->ID, false );
		$archive_title     = get_the_archive_title();

		// Set the searchandfilter plugin's shortcode per post type.
		if ( 'catalog' === $current_post_type ) {
			$searchandfilter_menu = '[searchandfilter slug="offcanvas-catalog-search"]';
		} elseif ( 'news' === $current_post_type ) {
			$searchandfilter_menu = '[searchandfilter slug="offcanvas-news-search"]';
		} elseif ( 'press_release' === $current_post_type ) {
			$searchandfilter_menu = '[searchandfilter slug="offcanvas-press-release-search"]';
		}
		$the_query = get_queried_object();
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
	} elseif ( is_single() ) {
		$the_post           = get_queried_object();
		$archive_title      = get_post_type_object( get_post_type( $the_post ) );
		$archive_title      = $archive_title->labels->singular_name;
		$single_icon_inline = ' grid';
		if ( 'News' === $archive_title ) {
			$tax_icon = 'welcome-widgets-menus';
		} else {
			$tax_icon      = 'megaphone';
			$archive_title = rtrim( $archive_title, 's' );
		}
	} else {
		$archive_title = 'Search results: "' . $sf_current_query->get_search_term() . '"';
	}
	?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header page-header_sortandfilter">
		<div class="title-wrap<?php echo esc_html( $single_icon_inline ); ?>">
			<?php
			if ( is_tax() || is_single() ) :
				?>
				<h5 class="has-theme-secondary-color">
					<span class="dashicons dashicons-<?php echo esc_html( $tax_icon ); ?>"></span>
					<?php
					if ( is_tax() ) {
						echo esc_html( $tax_name );
					}
					?>
				</h5>
			<?php endif; ?>
			<h1 class="title">
				<?php
				echo wp_kses( $archive_title, 'post' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</h1>
		</div>
		<?php
			/**
			 * Offcanvas.
			 *
			 * @link https://www.w3schools.com/howto/howto_js_off-canvas.asp
			 */
		?>
			<span id="offcanvasToggle" class="offcanvas-toggle" onclick="openOffcanvas()" style="cursor:pointer" title="Offcanvas sort & filter menu">
				&#9776;
				<span class="offcanvas-toggle_title">
					<?php echo esc_html__( 'Sort & Filter', 'wp-rig' ); ?>
				</span>
			</span>
			<div id="offcanvasMenu" class="offcanvas-menu">
				<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
				<h3 class="offcanvas-title">Sort & Filter</h3>
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
