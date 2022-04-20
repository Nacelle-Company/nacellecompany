<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;

add_filter( // Remove "Category:" from "Category: category_name" in archive title.
	'get_the_archive_title',
	function ( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_tax() ) { // For custom post types.
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		}
		return $title;
	}
);

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title" style="text-align: center;">
			<?php esc_html_e( 'This is not the page you are looking for. . .', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php



} elseif ( is_archive() || is_singular() && ! is_page() ) {
	get_template_part( 'template-parts/modules/search_page-header' );



} elseif ( is_page() && ! is_front_page() ) {        // All pages that are not the front page.
	?>
	<header class="page-header page-header__page">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php



} else {
	get_template_part( 'template-parts/modules/search_page-header' );
}
