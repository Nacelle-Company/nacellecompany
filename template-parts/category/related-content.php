<?php
/**
 * Template part for displaying category related content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-related_content' );

$distribution = get_field( 'distribution', 'option' );
if ( $distribution ) :
	?>
	<div class="grid related-content">
		<div class="embed-container">
			<iframe src="<?php echo wp_kses( $distribution['left_dist_content'], 'post' ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="embed-container_info">
			<?php echo $distribution['right_dist_content']; ?>
		</div>
	</div>
<?php endif; ?>
