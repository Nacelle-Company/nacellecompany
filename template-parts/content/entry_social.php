<?php
/**
 * Template part for displaying a posts social share icons
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$html     = '';
$url_full = get_permalink( $post->ID );
$url      = esc_url( $url_full );

$fb_icon = '
			<svg class="icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" aria-labelledby="facebookShareIcon" role="img">
					<title id="facebookShareIcon">Share on<?php echo get_bloginfo(); ?> Facebook</title>
					<path d="M25 1.38v22.24c0 .76-.62 1.37-1.38 1.37h-6.37v-9.67h3.25l.48-3.77h-3.74V9.14c0-1.1.3-1.84 1.87-1.84h2V3.92c-.35-.04-1.53-.15-2.91-.15-2.88 0-4.86 1.76-4.86 5v2.78h-3.26v3.77h3.26V25H1.38C.62 25 0 24.38 0 23.62V1.38C0 .62.62 0 1.38 0h22.24C24.38 0 25 .62 25 1.38z" fill-rule="nonzero" />
			</svg>';
$tw_icon = '
			<svg class="icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" aria-labelledby="iconShareTwitter">
					<title id="iconShareTwitter">Share on <?php echo get_bloginfo(); ?>Twitter</title>
					<path d="M22.32 0H2.68A2.68 2.68 0 000 2.68v19.64C0 23.8 1.2 25 2.68 25h19.64C23.8 25 25 23.8 25 22.32V2.68C25 1.2 23.8 0 22.32 0zM19.6 8.86l.01.48c0 4.83-3.68 10.4-10.4 10.4-2.09 0-4.01-.6-5.63-1.63A7.34 7.34 0 009 16.59a3.67 3.67 0 01-3.43-2.54c.55.1 1.12.07 1.66-.07A3.66 3.66 0 014.3 10.4v-.04c.5.28 1.07.44 1.65.46a3.65 3.65 0 01-1.13-4.9 10.4 10.4 0 007.54 3.83A3.67 3.67 0 0118.6 6.4a7.17 7.17 0 002.33-.88 3.65 3.65 0 01-1.61 2.01 7.28 7.28 0 002.1-.57 7.7 7.7 0 01-1.83 1.9z" fill-rule="nonzero" />
			</svg>
			';
if ( get_option( 'social-share-facebook' ) === 1 ) {
	$html = $html . "<div class='facebook px-1'><a href='http://www.facebook.com/sharer.php?u=" . $url . "' rel='noopener' target='_blank'>" . $fb_icon . '</a></div>';
}

if ( get_option( 'social-share-twitter' ) === 1 ) {
	$html = $html . '<div class="twitter"><a href="https://twitter.com/intent/tweet?url=https:' . $url_full . '" data-size="large" target="_blank" rel="noopener">' . $tw_icon . '</a></div>';
}
echo esc_html( $html );
