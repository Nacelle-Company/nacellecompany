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
	// ? The catalog-search form id= 46515.
	// ? The search-form-only form id= 32392.
	global $searchandfilter;
	$sf_current_query = $searchandfilter->get( 33926 )->current_query();
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
} elseif ( is_archive() || is_single() ) {
	$current_post_type = get_post_type( $post->ID, false );
	$the_post_type     = get_post_type_object( get_post_type() );
	if ( 'catalog' === $current_post_type ) {
			get_template_part( 'template-parts/modules/page_header-search' );
	} else {
		if ( $the_post_type ) {
			$post_type_title = '<header class="page-header archive"><h1 class="page-title archive-title">' . $the_post_type->labels->singular_name . '</h1></header>';
			echo wp_kses( $post_type_title, 'post' );
		}
	}
}
