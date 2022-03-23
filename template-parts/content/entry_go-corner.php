<?php
/**
 * Template part post grid hover corner
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<a class="go-corner" href="<?php echo esc_html( get_permalink( get_the_ID() ) ); ?>">
	<div class="go-arrow">
		→
	</div>
</a>
