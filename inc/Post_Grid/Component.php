<?php
/**
 * WP_Rig\WP_Rig\Post_Grid\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Post_Grid;

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
	 * @param Variable $the_posts Pull post data.
	 */
	public function display_post_grid() {

		$image   = '';
		$args    = array(
			'numberposts' => 6, // ? -1 is for all
			'post_type'   => 'news', // ? or 'post', 'page'
			'orderby'     => 'date', // ? or 'date', 'rand'
			'order'       => 'DESC', // ? or 'DESC'
		);
		$myposts = get_posts( $args );
		if ( $myposts ) :
			foreach ( $myposts as $mypost ) :
				$the_title  = get_the_title( $mypost->ID );
				$time       = get_the_time( 'F j, Y', $mypost->ID );
				$time_short = get_the_time( 'o-m-j', $mypost->ID );
				$image      = get_field( 'wide_image', $mypost->ID );

				// ? get the images
				if ( get_field( 'wide_image', $mypost->ID, false ) ) {
					$image_array = get_field( 'wide_image', $mypost->ID, false );
				}
				$size = 'medium'; // ? (thumbnail, medium, large, full or custom size)
				?>
				<div class="grid-item grid grid__half">
					<div class="grid-item__img">
						<?php echo '<a href="' . get_permalink( $mypost->ID ) . '">'; ?>
						<?php
						$image = get_the_post_thumbnail(
							$mypost->ID,
							'medium',
							array(
								'title' => $the_title,
								'alt'   => $the_title,
							)
						);
						echo $image;
						?>
						<?php echo '</a>'; ?>
					</div>
					<div class="grid-item__content">
						<time datetime="<?php echo $time_short; ?>">
							<?php
							echo $time;
							?>
						</time>
						<?php echo '<a href="' . get_permalink( $mypost->ID ) . '">'; ?>
						<p class="lead"><?php echo $the_title; ?></p>
						<?php echo '</a>'; ?>
						<p>
							<?php
							$trim_length  = 15;  // ? desired length of text to display
							$value_more   = '. . .'; // ? what to add at the end of the trimmed text
							$custom_field = 'intro';
							$value        = get_field( 'intro', $mypost->ID );
							if ( $value ) {
								echo wp_trim_words( $value, $trim_length, $value_more );
							}
							?>
						</p>
					</div>
					<a class="go-corner" href="<?php echo get_permalink( $mypost->ID ); ?>">
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
