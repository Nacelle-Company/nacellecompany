<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( is_post_type_archive() ) {
	wp_rig()->print_styles( 'wp-rig-post-grid' ); // ? post grid CSS
	$article_class = 'entry grid-item archive-grid__item';
} elseif ( is_single() ) {
	$article_class = 'entry grid single-grid__item';
} else {
	$article_class = 'entry';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $article_class ); ?>>
	<?php if ( is_post_type_archive() ) : ?>
			<?php
			get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
			get_template_part( 'template-parts/content/entry_title', get_post_type() );
			if ( ! is_post_type_archive( 'news' ) ) {
				get_template_part( 'template-parts/content/entry_summary', get_post_type() );
			}
			get_template_part( 'template-parts/content/entry_footer', get_post_type() );
			get_template_part( 'template-parts/content/entry_go-corner', get_post_type() );
			?>
	<?php else : ?>
		<?php
		// if ( ! is_front_page() ) { // ? if NOT the front page
		// get_template_part( 'template-parts/content/entry_header', get_post_type() );
		// }
		if ( is_search() ) { // ? if a search results page
			get_template_part( 'template-parts/content/entry_summary', get_post_type() );
		} else { // ? if not a search results page
			get_template_part( 'template-parts/content/entry_content', get_post_type() );
		}
		?>

	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php

// ? add related posts
if ( is_single() ) {
	get_template_part( 'template-parts/content/entry_related' );
}

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
}
