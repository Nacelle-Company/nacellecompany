<?php
/**
 * Template part for displaying a post's footer
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( is_post_type_archive() ) {
	$archive_class = ' archive-posts';
} else {
	$archive_class = '';
}

?>
<footer class="entry-footer<?php echo esc_html( $archive_class ); ?>">
	<?php get_template_part( 'template-parts/content/entry_meta', get_post_type() ); ?>

	<?php get_template_part( 'template-parts/content/entry_taxonomies', get_post_type() ); ?>

	<?php get_template_part( 'template-parts/content/entry_actions', get_post_type() ); ?>
</footer><!-- .entry-footer -->
