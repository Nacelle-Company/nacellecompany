<?php
/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-hero-video' );


$hero_video = get_field( 'video_embedd' );
if ( $hero_video ) {
	$hero_video = get_field( 'video_embedd' );
}
if ( ! empty( $hero_video ) ) : ?>
	<div class="entry-video">
		<div class="hero-video__wrapper">
			<div class="hero-video__cover" onclick="jQuery('#hero_video').YTPUnmute()"></div>
			<div id="hero_video" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',containment:'self', mute:true, mobileFallbackImage:'', useOnMobile: false,optimizedDisplay:false,abundance: .1,showYTLogo:false,playOnlyIfVisible:true,startAt:<?php the_field( 'start_video_at' ); ?> }"></div>
			<div class="hero-video__controls">
				<button class="clear button small is-active icon" title="Pause" data-toggle="coverOn" onclick="jQuery('#hero_video').YTPMute()" aria-controls="coverOn">
					<svg class="icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-labelledby="iconPause">
					<title id="iconPause">pause</title>
					<path d="M6.43 20H2.14A2.14 2.14 0 010 17.86V2.14C0 .96.96 0 2.14 0h4.29C7.6 0 8.57.96 8.57 2.14v15.72c0 1.18-.96 2.14-2.14 2.14zM20 17.86V2.14C20 .96 19.04 0 17.86 0h-4.29c-1.18 0-2.14.96-2.14 2.14v15.72c0 1.18.96 2.14 2.14 2.14h4.29c1.18 0 2.14-.96 2.14-2.14z" fill-rule="nonzero"></path>
					</svg>
				</button>
				<button data-toggle="coverOn" class="button clear is-active icon" title="Watch Video" onclick="jQuery('#hero_video').YTPUnmute()">
					<?php get_template_part( 'template-parts/svg/icon-play', '' ); ?>
					<strong>Watch</strong>
				</button>
			</div>
		</div>
	</div>
<?php endif; ?>
