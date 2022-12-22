<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;

// check for plugin using plugin name
if(in_array('search-filter-pro/search-filter-pro.php', apply_filters('active_plugins', get_option('active_plugins')))){
	$sf_catalog_query = $searchandfilter->get( 46579 )->current_query();
	$sf_press_query   = $searchandfilter->get( 47395 )->current_query();

	if($sf_catalog_query->is_filtered()) {
		$sf_catalog_filtered = true;
	} elseif($sf_press_query->is_filtered()) {
		$sf_press_filtered = true;
	}
} else {
	$sf_press_filtered = false;
	$sf_catalog_filtered = false;
}

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! have_posts() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Nothing Found', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! is_front_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_search() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">

			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Search Results for: %s', 'wp-rig' ),
				'<span>' . get_search_query() . '</span>'
			);
			?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_archive() ) {
	get_template_part( 'template-parts/header/page-header' );
} elseif(is_single()) {
	get_template_part( 'template-parts/header/page-header_press' );
} elseif ( is_page() ) {
	?>
	<header class="page-header <?php echo esc_html( get_post_meta( get_the_ID(), 'hide_title', true ) ); ?>">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header>
	<?php
}
