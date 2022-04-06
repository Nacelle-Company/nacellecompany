<?php
/**
 * Template part for social sharing icons.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-social-share' );

$html     = '';
$url_full = get_permalink( $post->ID );
$url      = esc_url( $url_full );

// if ( get_option( 'social-share-facebook' ) === 1 ) {
// }

// if ( get_option( 'social-share-twitter' ) === 1 ) {
// }
?>
<div class="social-share">

	<h3 class='share-on'><span class="has-theme-secondary-color">###</span><br>Share</h3>
	<div class="grid grid__half">
		<div class='facebook px-1'>
			<a href="http://www.facebook.com/sharer.php?u=<?php echo wp_kses( $url, 'post' ); ?>" rel="noopener" target="_blank">
				<span class="dashicons dashicons-facebook"></span>
			</a>
		</div>
		<div class="twitter">
			<a href="https://twitter.com/intent/tweet?url=https:<?php echo wp_kses( $url_full, 'post' ); ?>" data-size="large" target="_blank" rel="noopener">
			<span class="dashicons dashicons-twitter"></span>
			</a>
		</div>
	</div>
</div>
