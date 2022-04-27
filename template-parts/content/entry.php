<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;
global $sf_current_query;

$sf_current_query = $searchandfilter->get( 46681 )->current_query();

if ( is_post_type_archive() || $sf_current_query->is_filtered() || is_search() ) {
	wp_rig()->print_styles( 'wp-rig-post-grid' ); // ? post grid CSS
	$article_class = 'entry grid-item archive-grid__item';
} elseif ( is_single() ) {
	wp_rig()->print_styles( 'wp-rig-content_posts' );
	$article_class = 'entry single-post';
} else {
	$article_class = 'entry';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $article_class ); ?>>

	<?php
	if ( is_post_type_archive() || $sf_current_query->is_filtered() || is_search() ) {
		get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
		get_template_part( 'template-parts/content/entry_title', get_post_type() );
		get_template_part( 'template-parts/content/entry_summary', get_post_type() );
		get_template_part( 'template-parts/content/entry_footer', get_post_type() );
		get_template_part( 'template-parts/content/entry_go-corner', get_post_type() );

	} else { // ? if not a search results page

		get_template_part( 'template-parts/content/entry_content', get_post_type() );

	}
	?>
</article>

<?php
if ( is_singular( get_post_type() ) ) {
	// Pagination.
	wp_rig()->print_styles( 'wp-rig-pagination' );
	wp_rig()->display_pagination();
}
