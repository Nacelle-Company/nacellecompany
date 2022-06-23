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
    playOnlyIfVisible:true
";

if ( ! empty( $hero_video ) ) :
    ?>
    <div class="entry-header__video-cover">
        <div id="video_cover_img_wrap" class="video-cover__img-wrap">
            <div class="icon-play__wrapper" id="icon_play_wrap" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPPlay()">
                <div class="video-play-btn__mobile" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPFullscreen()">
                    <?php get_template_part( 'template-parts/svg/icon-play-hollow' ); ?>
                </div>
                <div class="video-play-btn__desktop" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPFullscreen()">
                    <?php get_template_part( 'template-parts/svg/icon-play-hollow' ); ?>
                </div>
                <h3 class="icon-play__title">Watch Trailer</h3>
            </div>
            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'attachment-medium_large size-medium_large wp-post-image no-lazy video-cover__img', 'id' => 'video_cover_img' ) ); ?>
        </div>
        <div class="entry-header__video"></div>
    </div>
    <!-- THE player -->
    <div id="hero_video_<?php echo esc_html( $queried_id ); ?>" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',<?php echo esc_html( $hero_video_settings ); ?>}"></div>
    <!-- <div class="hero-video__controls" id="video_controls">
    </div> -->
<?php endif; ?>
