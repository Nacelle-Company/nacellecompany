<?php
/**
 * WP_Rig\WP_Rig\Flickity\Flickity class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Flickity;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Post;
use function add_action;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;

/**
 * Class for flickity slider.
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
		return 'flickity';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_flickity_script' ) );
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
			'display_flickity' => array( $this, 'display_flickity' ),
		);
	}

	/**
	 * Enqueues the related posts script file.
	 */
	public function action_enqueue_flickity_script() {

		// If the AMP plugin is active, return early.
		if ( wp_rig()->is_amp() ) {
			return;
		}

		// Enqueue the navigation script.
		if ( is_front_page() ) {
			// ? flickity main file
			wp_enqueue_script(
				'wp-rig-flickity',
				get_theme_file_uri( '/assets/js/flickity.min.js' ),
				array(),
				wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/flickity.min.js' ) ),
				false
			);
			wp_script_add_data( 'wp-rig-flickity', 'defer', true );
		}
	}

	/**
	 * Display flickity.
	 *
	 * @param mixed $slides Display flickity slider.
	 */
	public function display_flickity( $slides ) {
		/*
		*  http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
		*/
		$slider_speed = get_field( 'slider_speed' );
		?>

		<div class="main-carousel" data-flickity='{ "wrapAround": true, "lazyLoad": false, "setGallerySize": false, "pageDots": false, "autoPlay":<?php echo esc_html( $slider_speed ); ?>000 }'>
		<?php
		$slider_posts = $slides;
		if ( $slides ) :
			foreach ( $slider_posts as $slide ) :
				$the_title     = get_the_title( $slide->ID );
				$the_permalink = get_the_permalink( $slide->ID );
				// $the_synopsis  = get_field( 'synopsis', $slide->ID );

				$the_content = apply_filters( 'the_content', get_the_content( '', '', $slide ) );
				// $the_content = apply_filters( 'the_content', get_the_content( get_the_content( '', '', $slide ) ) );
				// Build the synopsis.
				if ( $the_content ) {
					$the_synopsis = $the_content;
					$the_synopsis = wp_strip_all_tags( $the_synopsis );
				} else {
					$the_synopsis = get_post_meta( $slide->ID, 'synopsis', true );
				}
				// $the_synopsis  = wp_strip_all_tags( $the_synopsis );
				$the_synopsis  = substr( $the_synopsis, 0, 200 );

				// ? images
				$the_slider_img     = get_field( 'home_image', $slide );
				$the_horizontal_img = get_field( 'horizontal_image', $slide );
				$size               = 'full';
				if ( ! empty( $the_slider_img ) ) {
					$image = $the_slider_img['id'];
				} else {
					$image = $the_horizontal_img['id'];
				}
				$the_square_img = get_field( 'square_image', $slide );
				if ( ! empty( $the_square_img ) ) {
					$square_image = wp_get_attachment_image( $the_square_img['id'], 'thumbnail', false, array( 'class' => 'grid-item__img' ) );
				}
				?>
				<div class="carousel-cell">
					<figure>
						<figcaption class="caption">
							<div class="flickity-image">
								<a href="<?php echo esc_html( $the_permalink ); ?>">
									<?php echo $square_image; ?>
								</a>
							</div>
							<div class="flickity-synopsis">
								<h3>
									<?php echo esc_html( $the_title ); ?>
								</h3>
								<?php if ( ! empty( $the_synopsis ) ) : ?>
									<div class="synopsis-container">
										<?php echo $the_synopsis; ?>
									</div>
								<?php else : ?>
									<br>
								<?php endif; ?>
							</div>
						</figcaption>
						<?php
						echo wp_get_attachment_image(
							$image,
							$size,
							false,
							array(
								'data-flickity-lazyload' => wp_get_attachment_image_url( $image, $size ),
								'data-flickity-lazyload-srcset' => wp_get_attachment_image_srcset( $image, $size ),
							)
						);
						?>
					</figure>
				</div>

				<?php
			endforeach;
		endif;
		?>
		</div>
		<?php
	} // ? END display_flickity()
}
