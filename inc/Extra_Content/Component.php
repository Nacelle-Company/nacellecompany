<?php
/**
 * WP_Rig\WP_Rig\Extra_Content\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Extra_Content;

global $query;
use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying extra content.
 */
class Component implements Component_Interface, Templating_Component_Interface {
	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'extra_content';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return array(
			'display_extra_content' => array( $this, 'display_extra_content' ),
		);
	}
	/**
	 * Display Extra Content
	 *
	 * @param var $query Pull post data.
	 */
	public function display_extra_content() {
		$term = get_queried_object();
		$term = $term->slug;
		$count = 0;
		$blog_url = get_bloginfo( 'url' );
		?>

		<?php if ( have_rows( "extra_content_$term", 'option' ) ) : ?>
			<div class="extra_content__container">
			<?php
			while ( have_rows( "extra_content_$term", 'option' ) ) :
				the_row();
				if ( get_row_layout() === 'embed_with_text' ) {
					$swap = '';
					if ( get_sub_field( 'embed_swap' ) ) {
						$swap = ' swap';
					}
					if ( get_sub_field( 'embed_info_bottom' ) ) {
						$embed_info_bottom = ' embed-info__bottom';
					}
					?>
					<div class="extra_content grid" id="embedVideoContainment_<?php echo esc_html( $count ); ?>"  onclick="jQuery('#embedVideo_<?php echo esc_html( $count ); ?>').YTPToggleVolume().YTPToggleMask()">
						<div class="embed__wrap<?php echo esc_html( $swap ); ?>">
						<?php if ( get_sub_field( 'embed' ) ) { ?>
							<div id="embedVideo_<?php echo esc_html( $count ); ?>" class="player" data-property="{videoURL:'http://youtu.be/<?php the_sub_field( 'embed' ); ?>',mask:'<?php echo wp_kses( $blog_url, 'post' ); ?>/wp-content/themes/wp-rig/assets/images/ytplayer-mask.png', playOnlyIfVisible:true, anchor:'top,center',containment:'#embedVideoContainment_<?php echo esc_html( $count ); ?>',autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, showControls:false}"></div>
							<?php } ?>
						</div>
						<script>
							jQuery(function(){
								jQuery("#embedVideo_<?php echo esc_html( $count ); ?>").YTPlayer();
							});
						</script>
						<div class="embed-info__wrap<?php echo esc_html( $embed_info_bottom ); ?>">
							<?php the_sub_field( 'embed_text' ); ?>
						</div>
					</div>
					<?php
				} elseif ( get_row_layout() == 'content_and_content' ) {
					?>
					<div class="extra_content grid">
						<div class="wrap">
							<?php echo wp_kses( the_sub_field( 'left_content' ), 'post' ); ?>
						</div>
						<div class="wrap">
							<?php echo wp_kses( the_sub_field( 'right_content' ), 'post' ); ?>
						</div>
					</div>
					<?php
				}
				?>
				<?php $count++; ?>
			<?php endwhile; ?>
			</div>
			<?php
		endif;
	}
}
