<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! have_posts() ) {
	get_template_part( 'template-parts/modules/search_page-header' );
} elseif ( is_home() && ! is_front_page() ) {
	$sf_current_query = $searchandfilter->get( 46515 )->current_query();
	get_template_part( 'template-parts/modules/search_page-header' );
} elseif ( is_archive() ) {
	$current_post_type = get_post_type( $post->ID, false );
	$the_post_type     = get_post_type_object( get_post_type() );
	if ( 'catalog' === $current_post_type ) {
		get_template_part( 'template-parts/modules/search_page-header' );
	} else {
		?>
		<div class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
		<?php
	}
} elseif ( is_page() ) {
	?>
	<header class="page-header page-header__page">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_single() ) {

	get_template_part( 'template-parts/modules/search_page-header' );
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
}
