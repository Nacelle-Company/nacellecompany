<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $queried_id;
$queried_id = get_queried_object_id();
$hero_video = get_field( 'video_embedd' );
wp_rig()->print_styles( 'wp-rig-footer-widgets', 'wp-rig-widgets' );

?>

<footer id="colophon" class="site-footer">
	<?php if ( ! empty( $hero_video ) ) : ?>
		<script type="text/javascript">
			const video = '#hero_video_<?php echo esc_html( $queried_id ); ?>';
			// let videoCoverWrap = document.getElementById('video_cover_img_wrap');
			let videoCoverImg = document.getElementById('video_cover_img');
			let videoPlayWrap = document.getElementById('video_play_wrap');
			let videoWrapper = document.getElementById('entry_header_video');
			let iconPlay = document.getElementById('icon_play');
			let videoPlayBtns = document.getElementById('video_play_btns');
			const delayOneSec = 1000;
			const delayHalfSec = 500;

			// activate YTP Player only once
			var activateVideo = function () {
				jQuery(video).YTPlayer();
			};
			videoWrapper.addEventListener("click", activateVideo, {once: true});
			iconPlay.addEventListener("click", activateVideo, {once: true});

			// initialize ytp player, hide feat img cover, hide play icon & play icon container
			videoWrapper.addEventListener("click", function( event ) {
				videoPlayWrap.classList.toggle("active");
				if ( !videoPlayWrap.classList.contains("active") ) {
					videoPlayBtns.style.backgroundColor = 'rgba(0,0,0,.7)';
					videoPlayBtns.style.zIndex = 9;
				}

				setTimeout(function() {
					jQuery(video).on("YTPStart",function(e){
						jQuery(video).YTPUnmute().YTPSetVolume(50);
					});
				}, delayOneSec);
			});


			// YTPlayer hero video jquery call
			jQuery(function() {
				jQuery("#hero_video__desktop_<?php echo esc_html( $queried_id ); ?>").YTPlayer();
			});
		</script>
	<?php endif; ?>
	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
</footer>
</div>
	<?php
	wp_footer();
	?>
</body>
</html>
