<?php
/**
 * Template part for displaying a single catalog post's main content.
 * everything below the catalog header.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$video_embedd     = get_post_meta( get_the_ID(), 'video_embedd', true );
$itunes_video     = get_post_meta( get_the_ID(), 'itunes_video', true );
$itunes_audio_url = get_post_meta( get_the_ID(), 'itunes_audio_url', true );
$imdbv            = get_post_meta( get_the_ID(), 'imdb_video', true );
$review_shortcode = get_post_meta( get_the_ID(), 'review_shortcode', true );
$video_class      = '';
$itunes_url       = '';
$title			  = the_title('','',false);
if ( ! empty( $video_embedd ) ) :
	$video_class = ' video';
endif;

if ( $itunes_video ) :
	$itunes_url = $itunes_video;
elseif ( $itunes_audio_url ) :
	$itunes_url = $itunes_audio_url;
endif;
?>

<article id="post-<?php the_ID(); ?>" class="entry catalog<?php echo esc_html( $video_class ); ?>">
		<?php if ( $video_embedd ) : ?>
			<?php get_template_part( 'template-parts/content/entry_catalog_header', get_post_type() ); ?>
			<div class="catalog-video">
		<?php endif; ?>
		<div class="entry-header<?php echo esc_html( $video_class ); ?>">
			<div class="breadcrumbs">
				<?php
				// Breadcrumbs.
				if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
							echo load_inline_svg( 'icon-bookmark.svg' );
					rank_math_the_breadcrumbs();
				}
				?>
			</div>
			<?php get_template_part( 'template-parts/content/entry_title', get_post_type() ); ?>
			<?php get_template_part( 'template-parts/content/entry_content', get_post_type() ); ?>
			<?php if ( $imdbv ) : ?>
				<a href="<?php echo wp_kses( $imdbv, 'post' ); ?>" class="button imdb-button button-transparent" title="Watch <?php the_title_attribute(); ?> on <?php echo wp_kses( $imdbv, 'post' ); ?>" target="_blank">
					<strong><?php esc_html_e( 'View on IMDB', 'wp-rig' ); ?></strong>
					<?php echo load_inline_svg( 'icon-external-link.svg' ); ?>
				</a>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/modules/social-share' ); ?>

		</div>
		<div class="entry-image<?php echo esc_html( $video_class ); ?>">
			<?php if ( $itunes_url ) : ?>
				<a href="<?php echo esc_html( $itunes_url ); ?>" target="_blank" rel="noreferrer" class="apple-link">
					<?php
					the_post_thumbnail(
						'medium_large',
						array(
							'class'         => 'attachment-medium_large size-medium_large wp-post-image no-lazy',
							'fetchpriority' => 'high',
							'loading'       => 'auto',
							'title'			=> $title,
						)
					);
					?>
				</a>
				<?php
				if ( ! empty( $review_shortcode ) ) :
					?>
					<a href="<?php echo wp_kses( $imdbv, 'post' ); ?>" target="_blank">
						<?php echo do_shortcode( $review_shortcode ); ?>
					</a>
				<?php endif; ?>
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
				<?php
				if ( ! empty( $review_shortcode ) ) :
					?>
					<a href="<?php echo wp_kses( $imdbv, 'post' ); ?>" target="_blank">
						<?php echo do_shortcode( $review_shortcode ); ?>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="entry-main<?php echo esc_html( $video_class ); ?>">
			<?php get_template_part( 'template-parts/content/entry_catalog_crew', get_post_type() ); ?>
		</div>
		<div class="entry-buttons<?php echo esc_html( $video_class ); ?>">
			<?php get_template_part( 'template-parts/content/entry_catalog_buttons' ); ?>
		</div>
		<?php if ( $video_embedd ) : ?>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/catalog/parts/entry_catalog_additional_content' ); ?>
</article>

<footer class="post-footer post-footer__catalog">
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
