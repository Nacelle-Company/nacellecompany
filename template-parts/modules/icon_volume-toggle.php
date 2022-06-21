<?php
/**
 * Template part for displaying the volume toggle icons.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$queried_id = get_queried_object_id();

?>
<div class="hero-video__controls" id="hero_video__controls" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPSetVolume(50)">
	<?php get_template_part( 'template-parts/svg/icon-play-hollow' ); ?>
</div>
<?php
