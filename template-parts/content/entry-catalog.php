<?php
/**
 * Template part for displaying a catalog item.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<!-- #entry-catalog.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<?php
	wp_rig()->print_styles( 'wp-rig-card-catalog' );
	get_template_part( 'template-parts/modules/card', get_post_type() );
	?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular( get_post_type() ) ) {
	// Show post navigation only when the post type is 'post' or has an archive.
	if ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) {
		the_post_navigation(
			array(
				'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous:', 'wp-rig' ) . '</span></div>%title',
				'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next:', 'wp-rig' ) . '</span></div>%title',
			)
		);
	}

	// Show comments only when the post type supports it and when comments are open or at least one comment exists.
	if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}
}
