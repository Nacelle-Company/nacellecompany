<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

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
} elseif ( is_home() && ! is_front_page() ) {
	global $searchandfilter;
	$sf_current_query = $searchandfilter->get( 45354 )->current_query();
	if ( $sf_current_query ) { // ? If we are on a search results page print the search bar header.
		get_template_part( 'template-parts/modules/page_header-search' );
	} else {
		?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
		<?php
	}
} elseif ( is_archive() ) {
	$current_term = get_queried_object();
	if ( $current_term->parent == 0 ) { // ? If it is a parent category. Good stackoverflow article: https://wordpress.stackexchange.com/a/209468/150803.
		?>
			<header class="page-header archive">
				<?php
				post_type_archive_title();
				single_term_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php
	} else {
		get_template_part( 'template-parts/modules/page_header-search' );
	}
	?>
	<?php
}
