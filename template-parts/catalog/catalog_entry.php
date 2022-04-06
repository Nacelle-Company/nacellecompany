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

<footer class="post-footer">
	<?php
	$ids = get_field( 'related_catalog_items', false, false );
	wp_rig()->print_styles( 'wp-rig-related_posts' );
	wp_rig()->display_related_posts( $ids );
	// Pagination.
	wp_rig()->print_styles( 'wp-rig-pagination' );
	wp_rig()->display_pagination();
	?>
</footer>
