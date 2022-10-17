<?php
/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig_nacelle
 */

namespace WP_Rig\WP_Rig;

// global $queried_id;
$queried_id = get_queried_object_id();
$hero_video = get_field( 'video_embedd' );
if ( $hero_video ) {
	$hero_video = get_field( 'video_embedd' );
}
$blog_url = get_bloginfo( 'url' );
$post_thumbnail = get_the_post_thumbnail_url(get_the_ID(),'full');
$hero_video_settings = "
	videoURL: '$hero_video',
	showYTLogo: false,
	containment:'.entry-header__video',
	mute:true,
	ratio:'auto',
	useOnMobile: true,
	optimizedDisplay:true,
	abundance:0.01,
	anchor: 'center,center',
	playOnlyIfVisible:true,
	stopMovieOnBlur:true
";
if ( ! empty( $hero_video ) ) :
	?>
	<div class="entry-header__video-cover">
		<div id="video_cover_img_wrap" class="video-cover__img-wrap">
			<div class="video-play__wrap" id="video_play_wrap">
				<div class="video-play__btns" id="video_play_btns">
					<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-play.svg' ); ?>
					<h3 class="icon-play__title">Watch Trailer</h3>
					<div class="video-volume-btn" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPToggleVolume()">
						<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-volume.svg' ); ?>
					</div>
				</div>

				<div class="entry-header__video" id="entry_header_video" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPToggleVolume()"></div>
			</div>
			<?php the_post_thumbnail(
				'medium_large',
				array(
					'class' => 'attachment-medium_large size-medium_large wp-post-image no-lazy video-cover__img',
					'id' => 'video_cover_img',
					'fetchpriority' => 'high',
					'loading'       => 'auto',
					)
				); ?>
		</div>
	</div>
	<!-- THE player -->
	<div id="hero_video_<?php echo esc_html( $queried_id ); ?>" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',<?php echo esc_html( $hero_video_settings ); ?>}"></div>
	<!-- <div class="hero-video__controls" id="video_controls">
	</div> -->
<?php endif; ?>
