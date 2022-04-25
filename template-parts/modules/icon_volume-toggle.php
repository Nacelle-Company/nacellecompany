<?php
/**
 * Template part for displaying the volume toggle icons.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $queried_id;

?>
<div class="hero-video__controls">
<input class="helper-trigger" type="checkbox" id="volumeToggle" name="volumeToggle" onclick="jQuery('#hero_video_<?php echo esc_html( $queried_id ); ?>').YTPToggleVolume().YTPToggleMask()"/>
	<div class="col-md-8 helper-show">
		<label class="btn btn-link" for="volumeToggle"></label>
		<label class="btn btn-primary" for="volumeToggle">
		</label>
	</div>
	<label class="btn btn-default helper-hide" for="volumeToggle">
	<?php get_template_part( 'template-parts/svg/icon-play-hollow' ); ?>
	</label>
</div>
<?php
