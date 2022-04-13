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
		global $the_post_id;
		if ( get_field( 'group_slides' ) ) {
			$group_cells           = '"groupCells": true, "groupCells": 2,';
			$slider_custom_classes = ' group-cells';
		} else {
			$group_cells           = '';
			$slider_custom_classes = '';
		}

		?>

		<div class="main-carousel<?php echo esc_html( $slider_custom_classes ); ?>" data-flickity='{<?php echo esc_html( $group_cells ); ?>"wrapAround": true,"lazyLoad": false, "setGallerySize": false, "pageDots": false}'>
			<?php
			$slider_posts = $slides;
			if ( $slides ) :
				foreach ( $slider_posts as $slide ) :

					/**
					 * Initial variables.
					 */
					$the_post_id   = $slide->ID;
					$blog_url      = get_bloginfo( 'url' );
					$the_title     = get_the_title( $slide );
					$the_permalink = get_the_permalink( $slide );

					/**
					 * Slide text content.
					 */
					$the_content = apply_filters( 'the_content', get_the_content( '', '', $slide ) );
					// Build the synopsis.
					if ( $the_content ) {
						$the_synopsis = $the_content;
					} else {
						$the_synopsis = get_post_meta( $slide->ID, 'synopsis', true );
					}
					// Trunkate the synopsis.
					$the_synopsis = wp_strip_all_tags( $the_synopsis );
					$the_synopsis = wp_trim_words( $the_synopsis, 35 );

					/**
					 * Slide images.
					 */
					$size               = 'full';
					$the_slider_img     = get_field( 'home_image', $slide );
					$the_horizontal_img = get_field( 'horizontal_image', $slide );
					// Get the background images.
					if ( $the_slider_img ) {
						$image = $the_slider_img['id'];
					} else {
						$image = $the_horizontal_img['id'];
					}
					// Small thumb for slide content area.
					$square_img = get_field( 'square_image', $slide );
					$square_siz = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
					if ( $square_img ) {
						$square_img = wp_get_attachment_image( $square_img, $square_siz, false, array( 'class' => 'no-lazy grid-item__img' ) );
					}

					/**
					 * Hero video.
					 */
					$hero_video_show = get_field( 'video_on_homepage_slider', $slide );
					// Get the video. As long as the catalog post's t/f switch is on.
					if ( true === $hero_video_show ) {
						$hero_video          = get_field( 'video_embedd', $slide );
						$hero_video_fallback = wp_get_attachment_image_url( $image, $size );
					}
					?>

					<div class="carousel-cell <?php echo esc_html( $the_post_id ); ?>">
						<figure>
							<figcaption class="caption">
								<div class="flickity-image">
									<a href="<?php echo esc_html( $the_permalink ); ?>">
										<?php echo wp_kses( $square_img, 'post' ); ?>
									</a>
								</div>
								<div class="flickity-synopsis">
									<h3 class="flickity-title">
										<?php echo esc_html( $the_title ); ?>
									</h3>
									<?php if ( ! empty( $the_synopsis ) ) : ?>
										<div class="synopsis-container">
											<?php echo esc_html( $the_synopsis ); ?>
										</div>
									<?php else : ?>
										<br>
									<?php endif; ?>
								</div>
							</figcaption>
							<?php
							if ( true === $hero_video_show ) {
								wp_rig()->print_styles( 'wp-rig-hero-video' );
								?>
								<div id="hero_video_<?php echo esc_html( $the_post_id ); ?>"
								class="player"
									data-property="{
										videoURL: '<?php echo esc_html( $hero_video ); ?>',
										mute: true,
										containment:'self',
										showYTLogo: false,
										abundance: 0.3,
										playOnlyIfVisible:true,
										mobileFallbackImage: '<?php echo wp_kses( $hero_video_fallback, 'post' ); ?>',
										mask:'<?php echo wp_kses( $blog_url, 'post' ); ?>/wp-content/themes/wp-rig-nacelle/assets/images/ytplayer-mask.png'}">
									<?php get_template_part( 'template-parts/modules/icon_volume-toggle' ); ?>
								</div>
								<?php
							} else {
								echo wp_get_attachment_image(
									$image,
									'full',
									false,
									array(
										// 'data-flickity-lazyload' => wp_get_attachment_image_url( $image, $size ),
										// 'data-flickity-lazyload-srcset' => wp_get_attachment_image_srcset( $image, $size ),
										'class'   => 'no-lazy attachment-full',
										'loading' => 'eager',
									)
								);
							}
							?>
						</figure>
						<script>
							jQuery(function() {
								jQuery("#hero_video_<?php echo esc_html( $the_post_id ); ?>").YTPlayer();
								var heroVideo = document.querySelector("#hero_video_<?php echo esc_html( $the_post_id ); ?>");
								var flickityBtn = document.querySelectorAll(".flickity-button");
								// console.log(flickityBtn);
								jQuery(flickityBtn).on( 'click', '.button', function() {
									jQuery(heroVideo).YTPToggleVolume().YTPToggleMask();
								});
							});
						</script>
					</div>
					<?php
				endforeach;
			endif;
			?>
		</div>
		<?php
	} // END display_flickity().
}
