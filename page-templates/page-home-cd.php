<?php
/**
 * Template Name: Home CD
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-page-home-cd' );

?>
	<main id="primary" class="site-main">
		<?php get_template_part( 'template-parts/content/entry_title', get_post_type() ); ?>
		<?php
		while ( have_posts() ) :
			the_post();
			wp_rig()->display_flickity( 'catalog', get_field( 'home_feat_posts' ), 'top' );
			?>
			<article class="type-page">
				<?php
				// Post slider.
				if ( have_rows( 'post_slider' ) ) :

					while ( have_rows( 'post_slider' ) ) :
						the_row();

						$the_title     = get_sub_field( 'title' );
						$selected      = get_sub_field( 'choose_or_recent' );
						$the_post_type = get_sub_field( 'post_type' );
						$slider_id     = 'posts ' . get_sub_field( 'post_type' );

						$the_posts = 'recent_posts';
						if ( 'press' === $the_post_type && true === $selected ) {
							$the_posts = get_sub_field( 'press' );
						} elseif ( 'catalog' === $the_post_type && true === $selected ) {
							$the_posts = get_sub_field( 'catalog' );
						} else {
							$the_posts = 'recent_posts';
						}
						wp_rig()->display_section_header( $the_title, $the_post_type );
						wp_rig()->display_flickity( $the_post_type, $the_posts, $slider_id );
					endwhile;
				endif;
				?>
				<?php
				if ( get_field( 'featured_trailer_one' ) ) :
					wp_rig()->display_section_header( 'featured trailers', 'catalog' );
				endif;
				// Featured trailers.
				if ( get_field( 'featured_trailer_one' ) ) :
					?>
					<div class="featured-trailers">
						<?php
						$featured_post = get_field( 'featured_trailer_one' );
						$hero_video    = get_field( 'video_embedd', $featured_post );

						if ( $featured_post ) :
							$trailer_title      = $featured_post->post_title;
							$the_permalink      = get_the_permalink( $featured_post );
							$the_horizontal_img = get_field( 'horizontal_image', $featured_post );
							$source             = get_field( 'source', $featured_post ) . ' |';
							$time               = get_the_time( 'F j, Y', $featured_post );
							$time_att           = get_the_time( 'Y-m-d', $featured_post );
							$image              = $the_horizontal_img;
							?>
							<div class="trailer">
								<figure>
									<a href="#open-modal-one" class="open-modal" onclick="jQuery('#feat_modal_vid_one').YTPPlay()">
										<?php
										if ( $the_horizontal_img ) :
											echo wp_get_attachment_image(
												$image,
												'medium_large',
												false,
												array(
													'src' => wp_get_attachment_image_url( $image, 'medium_large' ),
													'srcset' => wp_get_attachment_image_srcset( $image, 'medium_large' ),
													'class' => 'attachment-full',
													'loading' => 'lazy',
												)
											);
										else :
											?>
											<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/comedy-dynamics-default.webp" class="wp-post-image" alt="<?php echo esc_html( $the_title ); ?>" loading="lazy" />
											<?php
										endif;
										?>
										<?php get_template_part( 'template-parts/svg/icon-play' ); ?>
									</a>
									<figcaption class="caption caption__press">
										<p>
											<a href="<?php echo esc_html( $the_permalink ); ?>" title="<?php echo esc_html( $trailer_title ); ?>">
												<?php echo esc_html( $trailer_title ); ?>
											</a>
										</p>
									</figcaption>
								</figure>
							</div>
							<!-- modal one -->
							<div id="open-modal-one" class="modal-window modal-window_large">
								<div class="modal-content">
									<a href="#!" title="Close" class="modal-close" onclick="jQuery('#feat_modal_vid_one').YTPPause()"><?php echo file_get_contents( get_theme_file_path() . '/assets/images/icon-close.svg' ); ?></a>
									<figure>
										<?php if ( $hero_video ) : ?>
										<div id="feat_modal_vid_one" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',containment:'self', abundance: 0, autoPlay:false, showYTLogo:true, mute:false, startAt:0, opacity:1}"></div>
										<?php else : ?>
											<?php the_field( 'modal_url_one' ); ?>
										<?php endif; ?>
									</figure>
								</div>
							</div>
						<?php endif; ?>
						<?php
						// FEAT VIDEO TWO.
						$featured_post = get_field( 'featured_trailer_two' );
						$modal_url_two = get_post_meta( get_the_ID(), 'modal_url_two', true );
						$hero_video    = get_field( 'video_embedd', $featured_post );

						if ( $featured_post ) :
							$trailer_title      = $featured_post->post_title;
							$the_permalink      = get_the_permalink( $featured_post );
							$the_horizontal_img = get_field( 'horizontal_image', $featured_post );
							$source             = get_field( 'source', $featured_post ) . ' |';
							$time               = get_the_time( 'F j, Y', $featured_post );
							$time_att           = get_the_time( 'Y-m-d', $featured_post );
							$image              = $the_horizontal_img;
							?>
							<div class="trailer">
								<figure>
									<a href="#open-modal-two" class="open-modal" onclick="jQuery('#feat_modal_vid_two').YTPPlay()">
										<?php
										if ( $the_horizontal_img ) :
											echo wp_get_attachment_image(
												$image,
												'medium_large',
												false,
												array(
													'src' => wp_get_attachment_image_url( $image, 'medium_large' ),
													'srcset' => wp_get_attachment_image_srcset( $image, 'medium_large' ),
													'class' => 'attachment-full',
													'loading' => 'lazy',
												)
											);
										else :
											?>
											<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/comedy-dynamics-default.webp" class="wp-post-image" alt="<?php echo esc_html( $the_title ); ?>" loading="lazy" />
											<?php
										endif;
										?>
										<?php get_template_part( 'template-parts/svg/icon-play' ); ?>
									</a>
									<figcaption class="caption caption__press">
										<p>
											<a href="<?php echo esc_html( $the_permalink ); ?>" title="<?php echo esc_html( $trailer_title ); ?>">
												<?php echo esc_html( $trailer_title ); ?>
											</a>
										</p>
									</figcaption>
								</figure>
							</div>
							<!-- modal two -->
							<div id="open-modal-two" class="modal-window modal-window_large">
								<div class="modal-content">
									<a href="#!" title="Close" class="modal-close" onclick="jQuery('#feat_modal_vid_two').YTPPause()"><?php echo file_get_contents( get_theme_file_path() . '/assets/images/icon-close.svg' ); ?></a>
									<figure>
										<?php if ( $hero_video ) : ?>
										<div id="feat_modal_vid_two" class="player" data-property="{videoURL:'<?php echo esc_html( $hero_video ); ?>',containment:'self', abundance: 0, autoPlay:false, showYTLogo:true, mute:false, startAt:0, opacity:1}"></div>
										<?php else : ?>
											<?php the_field( 'modal_url_two' ); ?>
										<?php endif; ?>
									</figure>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<?php
				endif;
				// Catalog grid.
				if ( get_field( 'specials' ) ) :
					wp_rig()->display_section_header( 'Catalog', 'catalog' );
					?>
					<div class="featured-trailers featured-trailers__catalog">
						<div class="trailer">
							<figure>
								<a class="link-absolute" href="/category/distribution/special/" title="Specials"></a>
								<?php
								$specials_img = get_field( 'specials' );
								if ( ! empty( $specials_img ) ) :
									?>
									<img src="<?php echo esc_url( $specials_img['url'] ); ?>" alt="<?php echo esc_attr( $specials_img['alt'] ); ?>" loading="lazy" />
								<?php endif; ?>
								<figcaption class="caption caption__press">
									<h2 class="flickity-title">
										<a href="/category/distribution/special/" title="Specials">Specials</a>
									</h2>
								</figcaption>
							</figure>
						</div>
						<div class="trailer">
							<figure>
								<a class="link-absolute" href="/category/distribution/film/" title="Films"></a>
								<?php
								$films_img = get_field( 'films' );
								if ( ! empty( $films_img ) ) :
									?>
									<img src="<?php echo esc_url( $films_img['url'] ); ?>" alt="<?php echo esc_attr( $films_img['alt'] ); ?>" loading="lazy" />
								<?php endif; ?>
								<figcaption class="caption caption__press">
									<h2 class="flickity-title">
										<a href="/category/distribution/film/" title="Films">Films</a>
									</h2>
								</figcaption>
							</figure>
						</div>
						<div class="trailer">
							<figure>
								<a class="link-absolute" href="/category/distribution/series/" title="Series"></a>
								<?php
								$series_img = get_field( 'series' );
								if ( ! empty( $series_img ) ) :
									?>
									<img src="<?php echo esc_url( $series_img['url'] ); ?>" alt="<?php echo esc_attr( $series_img['alt'] ); ?>" loading="lazy" />
								<?php endif; ?>
								<figcaption class="caption caption__press">
									<h2 class="flickity-title">
										<a href="/category/distribution/series/" title="Series">Series</a>
									</h2>
								</figcaption>
							</figure>
						</div>
						<div class="trailer">
							<figure>
								<a class="link-absolute" href="/category/distribution/album/" title="Albums"></a>
								<?php
								$albums_img = get_field( 'albums' );
								if ( ! empty( $specials_img ) ) :
									?>
									<img src="<?php echo esc_url( $albums_img['url'] ); ?>" alt="<?php echo esc_attr( $albums_img['alt'] ); ?>" loading="lazy" />
								<?php endif; ?>
								<figcaption class="caption caption__press">
									<h2 class="flickity-title">
										<a href="/category/distribution/album/" title="Albums">Albums</a>
									</h2>
								</figcaption>
							</figure>
						</div>
					</div>
				<?php endif; ?>
			</article>
			<?php
			if ( get_field( 'display_post_grid' ) ) :
				?>
				<div class="archive-main type-page post-grid">
					<h2 class="entry-title">Latest Independent Comedy News</h2>
				<?php wp_rig()->display_post_grid( 'press' ); ?>
				</div>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/content/entry', get_post_type() ); ?>
		<?php endwhile; ?>
	</main>
<?php
get_footer();
