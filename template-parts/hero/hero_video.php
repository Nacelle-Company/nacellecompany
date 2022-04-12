<?php
/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig_nacelle
 */

namespace WP_Rig\WP_Rig;

global $the_post_id;
$the_post_id = get_queried_object_id();

$hero_video = get_field( 'video_embedd' );
if ( $hero_video ) {
	$hero_video = get_field( 'video_embedd' );
}
$blog_url = get_bloginfo( 'url' );
if ( ! empty( $hero_video ) ) :
	?>
	<div class="entry-video entry-video__mobile" onclick="jQuery('#hero_video').YTPPlay().YTPFullscreen().YTPToggleMask().YTPToggleVolume()">
		<div class="hero-video__wrapper">
			<div id="hero_video_<?php echo esc_html( $the_post_id ); ?>" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',showYTLogo: false,containment:'.entry-header__video',ratio:'auto', mute:true, mobileFallbackImage:'', useOnMobile: true,optimizedDisplay:true,abundance:0.01,anchor: 'top,top',playOnlyIfVisible:true,mask:'<?php echo $blog_url; ?>/wp-content/themes/wp-rig-nacelle/assets/images/ytplayer-mask.png'}"></div>
			<?php get_template_part( 'template-parts/modules/icon_volume-toggle' ); ?>
		</div>
	</div>
	<div class="entry-video entry-video__desktop" onclick="jQuery('#hero_video__desktop').YTPToggleVolume().YTPToggleMask()">
		<div class="hero-video__wrapper">
			<div id="hero_video__desktop_<?php echo esc_html( $the_post_id ); ?>" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',"showControls": false,showYTLogo: false,containment:'.entry-header__video',ratio:'auto', mute:true, mobileFallbackImage:'', useOnMobile: true,optimizedDisplay:true,abundance:0.4,anchor: 'top,top',playOnlyIfVisible:true,mask:'<?php echo $blog_url; ?>/wp-content/themes/wp-rig-nacelle/assets/images/ytplayer-mask.png'}"></div>
			<?php get_template_part( 'template-parts/modules/icon_volume-toggle' ); ?>
		</div>
	</div>
<?php endif; ?>
