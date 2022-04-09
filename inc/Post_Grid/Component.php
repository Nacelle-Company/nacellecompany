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
					// ? get the images.
					if ( get_the_post_thumbnail( $the_post->ID ) ) {
						$has_post_thumbnail = ' has-post-thumbnail';
					} else {
						$has_post_thumbnail = '';
					}
					?>
				<div class="grid-item archive-grid__item<?php echo esc_html( $has_post_thumbnail ); ?>">
					<a href="<?php echo wp_kses( get_permalink( $the_post->ID ), 'post' ); ?>" class="link-absolute" title="<?php echo esc_html( $the_title ); ?>"><span class="screen-reader-text"><?php echo esc_html( $the_title ); ?></span></a>
					<div class="entry-header">
						<h2 class="entry-title">
							<?php echo esc_html( $the_title ); ?>
						</h2>
					</div>
					<div class="entry-thumbnail">
						<?php
						echo get_the_post_thumbnail(
							$the_post->ID,
							'medium-large',
							array(
								'title' => $the_title,
								'alt'   => $the_title,
							)
						);
						?>
					</div>
					<div class="entry-footer">
						<time datetime="<?php echo esc_html( $time_short ); ?>">
							<?php
							echo esc_html( $time );
							?>
						</time>
					</div>
					<div class="go-corner">
						<div class="go-arrow">
							→
						</div>
					</div>
				</div>
					<?php
				endforeach;
				wp_reset_postdata();
		endif;
	}
}
