<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;
global $sf_current_query;
$sf_filtered = false;
// check for plugin using plugin name
if(in_array('search-filter-pro/search-filter-pro.php', apply_filters('active_plugins', get_option('active_plugins')))){
	$sf_current_query = $searchandfilter->get( 46579 )->current_query();
	if($sf_current_query->is_filtered()) {
		$sf_filtered = true;
	}
}

if ( is_search() ) {
	$article_class = 'entry grid-item archive-grid__item';
} elseif ( is_post_type_archive() || $sf_filtered === true ) {
	$article_class = 'entry grid-item archive-grid__item';
} elseif ( is_single() ) {
	wp_rig()->print_styles( 'wp-rig-content_posts' );
	$article_class = 'entry single-post';
} else {
	wp_rig()->print_styles( 'wp-rig-entry-content' );
	$article_class = 'entry';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $article_class ); ?>>
	<?php
	if ( is_post_type_archive() || $sf_filtered === true || get_search_query()  ) :
		get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
		get_template_part( 'template-parts/content/entry_title', get_post_type() );
		get_template_part( 'template-parts/content/entry_summary', get_post_type() );
		get_template_part( 'template-parts/content/entry_footer', get_post_type() );
		get_template_part( 'template-parts/content/entry_go-corner', get_post_type() );
	else :
		get_template_part( 'template-parts/content/entry_content', get_post_type() );
	endif;
	?>
</article>

