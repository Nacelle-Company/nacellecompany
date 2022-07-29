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
	 * Enqueues the flickity script file.
	 */
	public function action_enqueue_flickity_script() {

		// If the AMP plugin is active, return early.
		if ( wp_rig()->is_amp() ) {
			return;
		}

		// Enqueue the flickity script.
		if ( is_front_page() ) {
			// Flickity main file.
			wp_enqueue_script(
				'wp-rig-flickity',
				get_theme_file_uri( '/assets/js/flickity.min.js' ),
				array(),
				wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/flickity.min.js' ) ),
				true
			);
			wp_script_add_data( 'wp-rig-flickity', 'defer', true );
		}
	}

	/**
	 * Display flickity.
	 *
	 * @param mixed $slides Display flickity slider.
	 */
	public function display_flickity( $the_post_type, $the_posts, $slider_id  ) {
		if ( 'press' === $the_post_type ) :
			$group = true;
			$btn   = false;
			$meta  = true;
			$title = true;
		elseif ( 'catalog' === $the_post_type && 'recent_posts' === $the_posts ) :
			$group = true;
			$btn   = true;
			$meta  = false;
			$title = false;
		else :
			$group = false;
			$btn   = true;
			$meta  = false;
			$title = true;
		endif;

		if ( 'recent_posts' === $the_posts ) :
			$args = array(
				'numberposts' => 6,
				'post_type'   => $the_post_type,
				'orderby'     => 'date',
				'order'       => 'DESC',
			);
			$slides = get_posts( $args );
		else :
			$slides = $the_posts;
		endif;

		if ( $group ) {
			$group = '100%';
		} else {
			$group = 'false';
		}
		?>

		<div class="main-carousel main-carousel__<?php echo esc_html( $slider_id ); ?>" data-flickity='{"groupCells":"<?php echo esc_html( $group ); ?>", "wrapAround": true, "lazyLoad": false, "setGallerySize": true, "adaptiveHeight": false, "pageDots": false, "selectedAttraction": 0.01, "friction": 0.15}'>
			<?php
			if ( $slides ) :
				foreach ( $slides as $slide ) :
					if ( $title ) {
						$the_title = get_the_title( $slide );
						$the_title = wp_trim_words( $the_title, 9 );
					}
					$the_permalink      = get_the_permalink( $slide );
					$the_slider_img     = get_field( 'home_image', $slide );
					$the_horizontal_img = get_field( 'horizontal_image', $slide );
					if ( $meta ) :
						$source   = get_field( 'source', $slide ) . ' |';
						$time     = get_the_time( 'F j, Y', $slide );
						$time_att = get_the_time( 'Y-m-d', $slide );
					endif;
					?>

					<div class="carousel-cell <?php echo esc_html( $slide->ID ); ?>" tabindex='-1'>
						<figure>
							<a class="link-absolute" href="<?php echo esc_html( $the_permalink ); ?>" title="<?php echo esc_html( $the_title ); ?>"></a>
							<?php
							if ( $the_slider_img ) :
								$image = $the_slider_img;
								echo wp_get_attachment_image(
									$image,
									'large',
									false,
									array(
										'src'     => wp_get_attachment_image_url( $image, 'large' ),
										'srcset'  => wp_get_attachment_image_srcset( $image, 'large' ),
										'class'   => 'no-lazy attachment-full',
										'loading' => 'eager',
									)
								);
							elseif ( $the_horizontal_img ) :
								$image = $the_horizontal_img;
								echo wp_get_attachment_image(
									$image,
									'large',
									false,
									array(
										'src'     => wp_get_attachment_image_url( $image, 'large' ),
										'srcset'  => wp_get_attachment_image_srcset( $image, 'large' ),
										'class'   => 'no-lazy attachment-full',
										'loading' => 'eager',
									)
								);
							elseif ( get_the_post_thumbnail( $slide ) ) :
								echo get_the_post_thumbnail( $slide, 'medium' );
							else :
								?>
								<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/comedy-dynamics-default.jpg" class="wp-post-image" alt="<?php echo esc_html( $the_title ); ?>" />
								<?php
							endif;
							?>
							<figcaption class="caption caption__<?php echo esc_html( $the_post_type ); ?>">
								<?php if ( $meta ) : ?>
									<p>
										<a href="<?php echo esc_html( $the_permalink ); ?>" title="<?php echo esc_html( $the_title ); ?>">
											<?php echo esc_html( $the_title ); ?>
										</a>
									</p>
									<sub class="post-source">
										<?php echo esc_html( $source ); ?>
										<time class="post-date" datetime="<?php echo esc_html( $time_att ); ?>">
											<?php echo esc_html( $time ); ?>
										</time>
									</sub>
								<?php elseif ( $title ) : ?>
									<h2 class="flickity-title">
										<?php echo esc_html( $the_title ); ?>
									</h2>
								<?php endif; ?>

								<?php if ( $btn ) : ?>
									<a class="button" href="<?php echo esc_html( $the_permalink ); ?>" title="Discover more <?php echo esc_html( $the_title ); ?>">Discover More</a>
								<?php endif; ?>
							</figcaption>
						</figure>
					</div>
					<?php
				endforeach;
			endif;
			?>
		</div>
		<?php
	} // END display_flickity().
}
