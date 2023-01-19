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
?>
<?php get_template_part( 'template-parts/modules/button-to-top' ); ?>
<footer id="colophon" class="site-footer">
	<?php if ( is_single() && 'catalog' == get_post_type() && !empty( $hero_video ) ) :
		wp_rig()->print_scripts( 'wp-rig-lite-youtube' ); ?>
		<script type="text/javascript" id="hero_video_script">
			const video = '#hero_video_<?php echo esc_html( $queried_id ); ?>';
			let videoCoverImg = document.getElementById('video_cover_img');
			let videoPlayWrap = document.getElementById('video_play_wrap');
			let videoWrapper = document.getElementById('entry_header_video');
			let iconPlay = document.getElementById('video_play_btns');
			let videoPlayBtns = document.getElementById('video_play_btns');
			const delayOneSec = 1000;
			const delayHalfSec = 500;
			var activateVideo = function () {
				jQuery(video).YTPlayer();
			};
			videoWrapper.addEventListener("click", activateVideo, {once: true});
			iconPlay.addEventListener("click", activateVideo, {once: true});
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
			jQuery(function() {
				jQuery("#hero_video__desktop_<?php echo esc_html( $queried_id ); ?>").YTPlayer();
			});
		</script>

	<?php elseif(is_front_page()) : ?>
		<script type="text/javascript" class="home_ytplayer">
			jQuery(function(){
				jQuery("#feat_modal_vid_one").YTPlayer();
			});
			jQuery(function(){
				jQuery("#feat_modal_vid_two").YTPlayer();
			});
		</script>
	<?php else : // mock blank function for YTPlayer's "YTPlayer" function call ?>
		<script type="text/javascript" class="none_ytplayer">
			(function($){$.fn.YTPlayer=function(){return this}})(jQuery)
		</script>
	<?php endif; ?>
	<script type="text/javascript">
		mobileMenu = document.querySelector('.mobile-menu__search');
		magnifier = mobileMenu.querySelector('.promagnifier');
		magnifier.setAttribute('tabindex', 1);
	</script>
	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
</footer>
</div>
	<?php
	wp_footer();
	?>
</body>
</html>
