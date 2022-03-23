<?php
/**
 * Template part for displaying a post's summary
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( is_post_type_archive() ) {
	$archive_class = ' archive-posts';
}

?>

<div class="entry-summary<?php echo esc_html( $archive_class ); ?>">
	<?php the_excerpt(); ?>
</div><!-- .entry-summary -->
