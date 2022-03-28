<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$video_embedd = get_post_meta( get_the_ID(), 'video_embedd', true );
if ( is_page( 'about' ) ) {
	$width_class = ' medium-6 aligncenter';
}
?>

<div class="entry-content entry-content
<?php
if ( is_page( 'about' ) ) {
	echo esc_html( $width_class ); }
?>
">
	<?php
	if ( ! is_singular( get_post_type() ) && wp_rig()->using_archive_excerpts() ) {
		the_excerpt();
	} else {
		if ( is_singular( 'catalog' ) && ! empty( $video_embedd ) ) {
			$synopsis_more = ' . . <a class="" href="#open-modal">. . . more.</a>'; // ? what to add at the end of the trimmed text
			if ( get_the_content() ) {
				$synopsis = apply_filters( 'the_content', get_the_content() );
				$synopsis = wp_strip_all_tags( $synopsis );
			} else {
				$synopsis = get_post_meta( $post->ID, 'synopsis', true );
			}
			$synopsis = wp_trim_words( $synopsis, 35, $synopsis_more );
			echo esc_attr( $synopsis );
		} elseif ( is_singular( 'catalog' ) ) {
			if ( get_the_content() ) {
				$synopsis = apply_filters( 'the_content', get_the_content() );
				$synopsis = wp_strip_all_tags( $synopsis );
			} else {
				$synopsis = get_post_meta( $post->ID, 'synopsis', true );
			}
			echo esc_attr( $synopsis );
		} else {
				the_content(
					sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
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
	}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-rig' ),
				'after'  => '</div>',
			)
		);

		?>
</div><!-- .entry-content -->
