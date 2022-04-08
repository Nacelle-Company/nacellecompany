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
$itunes_video = get_post_meta( get_the_ID(), 'itunes_video', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

	<!-- NEW LAYOUT -->
		<?php
		if ( ! empty( $video_embedd ) ) {
			get_template_part( 'template-parts/catalog/parts/catalog_header', get_post_type() );
		}
		?>
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
				if ( function_exists( 'rank_math_the_breadcrumbs' ) || get_field( 'theatres_popup' ) ) {
					if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
						rank_math_the_breadcrumbs();}
				}
				// ? social icons
				get_template_part( 'temlate-parts/content/entry-social', get_post_type() );
				?>
			</div>
		</div>
		<div class="entry-image">
			<a href="<?php echo esc_html( $itunes_video ); ?>" target="_blank" rel="noreferrer" class="apple-link">
			<?php the_post_thumbnail( 'medium-large' ); ?>
			</a>
		</div>
		<div class="entry-main">
			<!-- #TODO: add screenreader text to everything: <h2 class="screen-reader-text">Post navigation</h2> -->
			<?php get_template_part( 'template-parts/catalog/parts/catalog_accordion', get_post_type() ); ?>
			<?php get_template_part( 'template-parts/catalog/parts/catalog_crew', get_post_type() ); ?>
		</div>
		<?php get_template_part( 'template-parts/catalog/parts/catalog_buttons' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<footer class="post-footer">
	<?php
	$ids = get_field( 'related_catalog_items', $post->ID, false );
	// Pagination.
	wp_rig()->print_styles( 'wp-rig-pagination' );
	wp_rig()->display_pagination();
	// Related posts.
	if ( $ids ) {
		wp_rig()->print_styles( 'wp-rig-related_posts' );
		wp_rig()->display_related_posts( $ids );
	}
	?>
</footer>
