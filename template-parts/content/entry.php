<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( is_post_type_archive() ) {

	wp_rig()->print_styles( 'wp-rig-post-grid' ); // ? post grid CSS

	$article_class = 'entry post-grid';
} else {
	$article_class = 'entry';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $article_class ); ?>>

	<?php if ( is_post_type_archive() ) : ?>

		<div class="grid-item post-grid__wrapper">
			<?php

			get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
			get_template_part( 'template-parts/content/entry_title', get_post_type() );
			get_template_part( 'template-parts/content/entry_summary', get_post_type() );
			get_template_part( 'template-parts/content/entry_footer', get_post_type() );
			get_template_part( 'template-parts/content/entry_go-corner', get_post_type() );

			?>

		</div>

	<?php else : ?>

		<?php
		if ( ! is_front_page() ) { // ? if NOT the front page
			get_template_part( 'template-parts/content/entry_header', get_post_type() );
		}

		if ( is_search() ) { // ? if a search results page
			get_template_part( 'template-parts/content/entry_summary', get_post_type() );

		} else { // ? if not a search results page
			get_template_part( 'template-parts/content/entry_content', get_post_type() );
		}

		get_template_part( 'template-parts/content/entry_footer', get_post_type() );
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

	// Show comments only when the post type supports it and when comments are open or at least one comment exists.
	if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}
}
