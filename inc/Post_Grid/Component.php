<?php
/**
 * WP_Rig\WP_Rig\Post_Grid\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Post_Grid;

global $query;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying selected post grid.
 */
class Component implements Component_Interface, Templating_Component_Interface {
	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'post_grid';
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
			'display_post_grid' => array( $this, 'display_post_grid' ),
		);
	}
	/**
	 * Display Post Grid
	 *
	 * @param var $query Pull post data.
	 */
	public function display_post_grid( $query ) {
		// var_dump( $query );
		// OLD CODE.
			$args = array(
				'numberposts' => 6,
				'post_type'   => $query,
				'orderby'     => 'date',
				'order'       => 'DESC',
			);

			$the_posts = get_posts( $args );
			if ( $the_posts ) :
				foreach ( $the_posts as $the_post ) :
					$the_title     = get_the_title( $the_post->ID );
					$time          = get_the_time( 'F j, Y', $the_post->ID );
					$time_short    = get_the_time( 'o-m-j', $the_post->ID );
					$image         = get_field( 'wide_image', $the_post->ID );
					$the_permalink = get_permalink( $the_post->ID );
					// ? get the images
					if ( get_field( 'wide_image', $the_post->ID, false ) ) {
						$image_array = get_field( 'wide_image', $the_post->ID, false );
					}
					$size = 'medium'; // ? (thumbnail, medium, large, full or custom size)
					?>
				<div class="grid-item grid grid__half">
					<div class="grid-item__img">
						<?php echo wp_kses( '<a href="' . get_permalink( $the_post->ID ) . '">', 'post' ); ?>
						<?php
						echo get_the_post_thumbnail(
							$the_post->ID,
							'medium',
							array(
								'title' => $the_title,
								'alt'   => $the_title,
							)
						);
						?>
							<?php echo '</a>'; ?>
					</div>
					<div class="grid-item__content">
						<time datetime="<?php echo esc_html( $time_short ); ?>">
							<?php
							echo esc_html( $time );
							?>
						</time>
							<?php echo wp_kses( '<a href="' . $the_permalink . '">', 'post' ); ?>
						<p class="lead"><?php echo esc_html( $the_title ); ?></p>
							<?php echo '</a>'; ?>
						<p>
							<?php
							$trim_length = 15;  // Desired length of text to display.
							$value_more  = '. . .'; // ? what to add at the end of the trimmed text
							$value       = get_field( 'intro', $the_post->ID );
							$value       = wp_trim_words( $value, $trim_length, $value_more );
							if ( $value ) {
								echo wp_kses( $value, 'post' );
							}
							?>
						</p>
					</div>
					<a class="go-corner" href="<?php echo wp_kses( $the_permalink, 'post' ); ?>">
						<div class="go-arrow">
							→
						</div>
					</a>
				</div>
					<?php
				endforeach;
				wp_reset_postdata();
		endif;
	}
}
