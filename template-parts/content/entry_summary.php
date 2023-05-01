<?php
/**
 * Template part for displaying a post's summary
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $synopsis;
global $searchandfilter;
global $sf_current_query;

$synopsis = get_field( 'synopsis', $post->ID );
$content_wp = get_the_content();
$content_ex = get_the_excerpt();
$content_acf = get_post_meta( $post->ID, 'synopsis', true );
$synopsis    = '';
$trim_length = 30; // ? Trimming the synopsis. desired length of text to display.
$value_more  = ' . . . '; // ? What to add at the end of the trimmed text.
// Assign content if avaliable, otherwise use the synopsis acf.
if ( $content_acf ) {
	$content_acf = wp_trim_words( $content_acf, $trim_length, $value_more ); // Final synopsis.
	$synopsis    = $content_acf;
} elseif ( $content_ex ) {
	$content_ex = wp_trim_words( $content_ex, $trim_length, $value_more ); // Final synopsis.
	$synopsis   = $content_ex;
} elseif ( $content_wp ) {
	$content_wp = wp_trim_words( $content_wp, $trim_length, $value_more ); // Final synopsis.
	$synopsis   = $content_wp;
}
?>

<div class="entry-summary">
	<?php
	if ( $sf_current_query ) {
		echo wp_kses( $synopsis, 'post' );
	} elseif ( get_the_excerpt() ) {
		the_excerpt();
	} elseif ( get_field( 'synopsis', $post->ID ) ) {
		echo wp_kses( $synopsis, 'post' );
	} else {
		the_content();
	}
	?>
</div>
