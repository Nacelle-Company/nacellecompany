<?php
/**
 * Template part for displaying a post grid item.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-post-grid' );
get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
wp_rig()->using_archive_excerpts()
?>
<div class="archive-main post-grid">
	<h2 class="entry-title">Latest Independent Comedy News</h2>
	<?php wp_rig()->display_post_grid(); ?>
</div>
