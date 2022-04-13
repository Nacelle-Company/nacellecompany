<?php
/**
 * WP_Rig\WP_Rig\Tax_Posts\Tax_Posts class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Tax_Posts;

global $query;
global $post; // Required.

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying taxonomy posts.
 *
 * Exposes template tags:
 * * `wp_rig()->the_comments( array $args = array() )`
 *
 * @link https://wordpress.org/plugins/amp/
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'tax_posts';
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
			'display_tax_posts' => array( $this, 'display_tax_posts' ),
		);
	}
	/**
	 * Display Tax Terms
	 */
	public function display_tax_posts() {
		?>
		<div class="grid-item grid grid__half">
			<div class="grid-item__img">
				<?php echo wp_kses( '<a href="' . get_permalink() . '">', 'post' ); ?>
					<?php the_post_thumbnail(); ?>
				<?php echo '</a>'; ?>
			</div>
			<div class="grid-item__content">
					<?php echo wp_kses( '<a href="' . get_permalink() . '">', 'post' ); ?>
				<p class="lead"><?php the_title(); ?></p>
					<?php echo '</a>'; ?>
				<p>
					<?php
					$trim_length  = 15;  // ? desired length of text to display
					$value_more   = '. . .'; // ? what to add at the end of the trimmed text
					$custom_field = 'intro';
					$value        = get_field( 'intro' );
					if ( $value ) {
						echo wp_kses( wp_trim_words( $value, $trim_length, $value_more ), 'post' );
					}
					?>
				</p>
			</div>
			<a class="go-corner" href="<?php echo wp_kses( get_permalink(), 'post' ); ?>">
				<div class="go-arrow">
					→
				</div>
			</a>
		</div>
		<?php
	}
}
