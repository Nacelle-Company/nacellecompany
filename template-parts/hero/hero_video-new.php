<?php
/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$hero_video = get_field( 'video_embedd' );
if ( $hero_video ) {
	$hero_video = get_field( 'video_embedd' );
}
if ( ! empty( $hero_video ) ) : ?>
	<div class="entry-video entry-video__mobile" onclick="jQuery('#hero_video').YTPFullscreen().YTPToggleMask()">
		<div class="hero-video__wrapper">
			<div id="hero_video" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',showControls: false,showYTLogo: false,containment:'.entry-header__video-new',ratio:'auto', mute:true, mobileFallbackImage:'', useOnMobile: true,optimizedDisplay:true,abundance:0.01,anchor: 'top,top',playOnlyIfVisible:true,mask:'/wp-content/themes/wprig-nacelle-dev/assets/images/src/ytplayer-mask.png'}"></div>
			<?php get_template_part( 'template-parts/modules/icon_volume-toggle-new' ); ?>
		</div>
	</div>
	<div class="entry-video entry-video__desktop" onclick="jQuery('#hero_video__desktop').YTPToggleVolume().YTPToggleMask()">
		<div class="hero-video__wrapper">
			<div id="hero_video__desktop" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',showControls: false,showYTLogo: false,containment:'.entry-header__video-new',ratio:'auto', mute:true, mobileFallbackImage:'', useOnMobile: true,optimizedDisplay:true,abundance:0.4,anchor: 'top,top',playOnlyIfVisible:true,mask:'/wp-content/themes/wprig-nacelle-dev/assets/images/src/ytplayer-mask.png'}"></div>
			<?php get_template_part( 'template-parts/modules/icon_volume-toggle-new' ); ?>
		</div>
	</div>
<?php endif; ?>
