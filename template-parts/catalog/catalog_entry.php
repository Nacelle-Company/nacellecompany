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
	$post_class = 'entry catalog type-catalog video';
else :
	$post_class = 'entry catalog type-catalog';
endif;
$itunes_video     = get_post_meta( get_the_ID(), 'itunes_video', true );
$itunes_audio_url = get_post_meta( get_the_ID(), 'itunes_audio_url', true );
if ( ! empty( $itunes_video ) ) :
	$itunes_url = $itunes_video;
elseif ( ! empty( $itunes_audio_url ) ) :
	$itunes_url = $itunes_audio_url;
else :
	$itunes_url = '';
endif;
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo esc_html( $post_class ); ?>">
		<?php if ( ! empty( $video_embedd ) ) : ?>
			<?php get_template_part( 'template-parts/catalog/parts/catalog_header', get_post_type() ); ?>
			<div class="catalog-wrap">
		<?php endif; ?>
		<div class="entry-header__container">
			<div class="entry-title__wrapper">
				<?php
				/**
				 * Title and content
				 */
				get_template_part( 'template-parts/content/entry_title', get_post_type() );
				get_template_part( 'template-parts/content/entry_content', get_post_type() );
				?>
			</div>
			<div class="entry-header__breadcrumbs">
				<?php
				// ? breadcrumbs
				if ( function_exists( 'rank_math_the_breadcrumbs' ) || get_post_meta( get_the_ID(), 'theatres_popup', false ) ) {
					if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
						rank_math_the_breadcrumbs();}
				}
				// ? social icons
				get_template_part( 'temlate-parts/content/entry-social', get_post_type() );
				?>
			</div>
		</div>
		<div class="entry-image">
			<?php if ( ! empty( $itunes_url ) ) : ?>
			<a href="<?php echo esc_html( $itunes_url ); ?>" target="_blank" rel="noreferrer" class="apple-link">
				<?php
				the_post_thumbnail(
					'medium_large',
					array(
						'class'         => 'attachment-medium_large size-medium_large wp-post-image no-lazy',
						'fetchpriority' => 'high',
					)
				);
				?>
			</a>
			<?php else : ?>
				<?php
				the_post_thumbnail(
					'medium_large',
					array(
						'class'         => 'attachment-medium_large size-medium_large wp-post-image no-lazy',
						'fetchpriority' => 'high',
					)
				);
				?>
			<?php endif; ?>
		</div>
		<div class="entry-main">
			<?php
			// TODO: add screenreader text to everything: < h2 class = 'screen-reader-text' > Post navigation.
			get_template_part( 'template-parts/catalog/parts/catalog_crew', get_post_type() );
			?>
		</div>
		<div class="entry-buttons">
			<?php get_template_part( 'template-parts/catalog/parts/catalog_buttons' ); ?>
		</div>
		<?php if ( ! empty( $video_embedd ) ) : ?>
			</div>
		<?php endif; ?>
</article>

<footer class="post-footer">
	<?php
	$ids = get_field( 'related_catalog_items', $post->ID, false );
	// Pagination.
	wp_rig()->print_styles( 'wp-rig-pagination-post' );
	wp_rig()->display_pagination();
	// Related posts.
	if ( $ids ) {
		wp_rig()->print_styles( 'wp-rig-related_posts' );
		wp_rig()->display_related_posts( $ids );
	}
	?>
</footer>
