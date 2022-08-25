<?php
/**
 * Template part for displaying a post's footer
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;
global $sf_current_query;
?>
<footer class="entry-footer">
	<?php
	// if( $sf_current_query->is_filtered() || get_search_query()  ) {
	// 	get_template_part( 'template-parts/content/entry_meta', get_post_type() );
	// 	get_template_part( 'template-parts/content/entry_actions', get_post_type() );
	// } else {
		get_template_part( 'template-parts/content/entry_taxonomies', get_post_type() );
		get_template_part( 'template-parts/content/entry_meta', get_post_type() );
		get_template_part( 'template-parts/content/entry_actions', get_post_type() );
	// }
	?>
</footer>
