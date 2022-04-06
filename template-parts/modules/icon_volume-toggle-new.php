<?php
/**
 * Template part for displaying the volume toggle icons.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<div class="hero-video__controls hero-video__controls-new">
<input class="helper-trigger" type="checkbox" id="volumeToggle" name="volumeToggle"/>
	<div class="col-md-8 helper-show">
		<label class="btn btn-link" for="volumeToggle"></label>
		<label onclick="jQuery('#hero_video__desktop').YTPToggleVolume().YTPToggleMask()" class="btn btn-primary" for="volumeToggle">
			<!-- <svg class="icon icon-off" width="30" height="24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="iconVolumeOff">
				<title id="iconVolumeOff">Volume Off</title>
				<path d="M15.908.172a1.693 1.693 0 0 0-1.819.277L6.961 6.782H2.535C1.135 6.782 0 7.917 0 9.269v5.023c0 1.4 1.135 2.488 2.535 2.488h4.428l7.125 6.333a1.691 1.691 0 0 0 1.819.277c.607-.272.994-.875.994-1.54V1.71c-.047-.665-.385-1.267-.993-1.54Zm11.235 11.633 2.484-2.484a1.267 1.267 0 1 0-1.793-1.793l-2.482 2.534-2.53-2.488a1.267 1.267 0 1 0-1.792 1.793l2.484 2.484-2.484 2.484a1.267 1.267 0 1 0 1.792 1.792l2.53-2.484 2.484 2.484a1.267 1.267 0 1 0 1.793-1.793l-2.486-2.53Z" fill="#7fd2e6" fill-rule="nonzero"/>
			</svg> -->
		</label>
	</div>
	<label onclick="jQuery('#hero_video__desktop').YTPToggleVolume().YTPToggleMask()" class="btn btn-default helper-hide" for="volumeToggle">
	<?php get_template_part( 'template-parts/svg/icon-play-hollow' ); ?>
		<!-- <svg class="icon icon-on" width="30" height="22" xmlns="http://www.w3.org/2000/svg" aria-labelledby="iconVolumeOn">
			<title id="iconVolumeOn">Volume On</title>
			<path d="M19.34 7.22a1.126 1.126 0 0 0-1.423 1.74c.528.434.833 1.062.833 1.686a2.23 2.23 0 0 1-.835 1.726 1.122 1.122 0 0 0-.158 1.582 1.126 1.126 0 0 0 1.582.16C20.395 13.29 21 12.028 21 10.645s-.605-2.564-1.66-3.427Zm2.837-3.46a1.129 1.129 0 0 0-1.584.156 1.123 1.123 0 0 0 .157 1.582 6.608 6.608 0 0 1 2.5 5.148c0 1.96-.911 3.848-2.499 5.189a1.123 1.123 0 0 0 .713 1.993c.252 0 .504-.084.714-.255a8.815 8.815 0 0 0 3.322-6.927c0-2.714-1.21-5.161-3.323-6.886ZM25.05.254a1.13 1.13 0 0 0-1.583.156 1.123 1.123 0 0 0 .156 1.582c2.622 2.148 4.127 5.316 4.127 8.654a11.26 11.26 0 0 1-4.128 8.695 1.123 1.123 0 0 0-.157 1.582c.22.312.544.453.872.453.252 0 .504-.084.714-.255A13.465 13.465 0 0 0 30 10.646c0-4.097-1.805-7.817-4.95-10.392ZM14.119.328a1.504 1.504 0 0 0-1.614.248L6.178 6.193H2.25A2.25 2.25 0 0 0 0 8.44v4.496a2.25 2.25 0 0 0 2.25 2.248h3.93l6.323 5.616a1.508 1.508 0 0 0 1.614.245c.54-.242.883-.777.883-1.363V1.693c0-.589-.342-1.124-.881-1.365Z" fill="#7fd2e6" fill-rule="nonzero"/>
		</svg> -->
	</label>
</div>
<?php
