<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$video_embedd  = get_post_meta( get_the_ID(), 'video_embedd', true );
$the_post_type = get_post_type();
// Build the synopsis.
if ( get_the_content() ) {
	$synopsis = apply_filters( 'the_content', get_the_content() );
} else {
	$synopsis = get_post_meta( $post->ID, 'synopsis', true );
}
$content_width = ' ' . get_post_meta( get_the_ID(), 'content_width', true );

wp_rig()->print_styles( 'wp-rig-entry-content' );
?>

<div class="entry-content<?php echo esc_html( $content_width ); ?>">
	<?php
	if ( ! is_singular( $the_post_type ) && wp_rig()->using_archive_excerpts() ) {
		the_excerpt();
	} elseif ( is_singular( 'catalog' ) ) {
		echo wp_kses( $synopsis, 'post' );
	} else {
		wp_rig()->print_styles( 'wp-rig-lite-youtube' );
		wp_rig()->print_scripts( 'wp-rig-lite-youtube' );
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-rig' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
	}
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-rig' ),
			'after'  => '</div>',
		)
	);
	?>
</div>
