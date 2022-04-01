<?php
/**
 * Template part for displaying a single catalog post's main content.
 * everything below the catalog header.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$video_embedd = get_post_meta( get_the_ID(), 'video_embedd', true );
if ( ! empty( $video_embedd ) ) :
	$post_class = 'entry';
else :
	$post_class = 'entry no-video';
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
	<?php get_template_part( 'template-parts/catalog/parts/catalog_header', get_post_type() ); ?>
		<?php if ( ! empty( $video_embedd ) ) : ?>
			<?php get_template_part( 'template-parts/hero/hero_video', get_post_type() ); ?>
		<?php endif; ?>
	<div class="entry-image"><?php the_post_thumbnail( 'large' ); ?></div>
	<div class="entry-main">
		<!-- #TODO: add screenreader text to everything: <h2 class="screen-reader-text">Post navigation</h2> -->
		<?php get_template_part( 'template-parts/catalog/parts/catalog_more-info', get_post_type() ); ?>
		<?php get_template_part( 'template-parts/catalog/parts/catalog_crew', get_post_type() ); ?>
	</div>
	<?php get_template_part( 'template-parts/catalog/parts/catalog_buttons' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
get_template_part( 'template-parts/catalog/parts/catalog_related' );
/**
 * Catalog pagination
 */
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
