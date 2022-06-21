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

?>

<footer id="colophon" class="site-footer">
	<?php if ( ! is_front_page() ) : ?>
		<script type="text/javascript">
			const video = '#hero_video_<?php echo esc_html( $queried_id ); ?>';
			let videoCoverWrap = document.getElementById('video_cover_img_wrap');
			let videoCoverImg = document.getElementById('video_cover_img');
			let videoPlayIcon = document.getElementById('icon_play_wrap');
			const delayOneSec = 1000;
			const delayTwoSec = 2000;

			// initialize ytp player, hide feat img cover, hide play icon & play icon container
			videoPlayIcon.addEventListener("click", function( event ) {
				jQuery(video).YTPlayer();
				videoCoverWrap.classList.add("fade-out-three-sec");
				videoCoverImg.classList.add("fade-out-two-sec");
				setTimeout(function() {
					videoCoverWrap.style.opacity = 0;
				}, delayTwoSec);
				setTimeout(function() {
					jQuery(video).on("YTPStart",function(e){
						jQuery(video).YTPUnmute().YTPSetVolume(100);
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
