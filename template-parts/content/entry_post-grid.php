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
	<h2 class="text-center">Latest Independent Comedy News</h2>

<div class="archive-main post-grid">
	<!-- <div class="grid post-grid post-grid__half" id="press"> -->
		<?php wp_rig()->display_post_grid(); ?>
	<!-- </div> -->
</div>
