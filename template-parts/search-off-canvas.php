<?php
/**
 * Template part for off canvas menu
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<div class="off-canvas-wrapper">
	<div class="off-canvas position-right" id="searchOffCanvas" data-off-canvas>
		<div class="off-canvas-content" data-off-canvas-content>
			<button class="close-button" aria-label="Close menu" type="button" data-close>
			  <span aria-hidden="true">&times;</span>
			</button>
			<div class="grid-x grid-margin-y align-center-middle" style="height: 90vh;">
				<div class="cell align-self-middle">
					<?php echo do_shortcode('[searchandfilter fields="search,category,media_category,main_talent,producers,directors,writers,genre" types=",select,checkbox,select,select,select,select,checkbox" submit_label="Filter"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
