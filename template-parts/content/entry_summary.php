<?php
/**
 * Template part for displaying a post's summary
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $synopsis;
$synopsis = get_field( 'synopsis', $post->ID );
?>

<div class="entry-summary">
	<?php
	if ( get_the_excerpt() ) {
		the_excerpt();
	} else {
		echo wp_kses( $synopsis, 'post' );
	}
	?>
</div><!-- .entry-summary -->
