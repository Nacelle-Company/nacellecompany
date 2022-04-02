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
			<!-- <div class="hero-video__cover" onclick="jQuery('#hero_video').YTPUnmute()"></div> -->
			<div id="hero_video" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',showControls: false,containment:'self', mute:true, mobileFallbackImage:'', useOnMobile: false,optimizedDisplay:false,abundance: .1,showYTLogo:false,playOnlyIfVisible:true,startAt:<?php the_field( 'start_video_at' ); ?>,mask:'/wp-content/themes/wprig-nacelle-dev/assets/images/src/ytplayer-mask.png'}"></div>
			<div class="hero-video__controls">
				<?php get_template_part( 'template-parts/modules/icon_volume-toggle' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
