<?php
/**
 * WP_Rig\WP_Rig\Related_Posts\Related_Posts class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Related_Posts;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying related posts.
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
		return 'related_posts';
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
			'display_related_posts' => array( $this, 'display_related_posts' ),
		);
	}
	/**
	 * Display related posts.
	 *
	 * @param var $ids The selected related posts.
	 */
	public function display_related_posts( $ids ) {
		if ( $ids ) :
			setup_postdata( $ids );
			$catalog_query = new \WP_Query(
				array(
					'post_type'      => 'catalog',
					'post__in'       => $ids,
				)
			);
			$press_query    = new \WP_Query(
				array(
					'post_type'      => 'press',
					'post__in'       => $ids,
				)
			);
			// ? get each post type's # of posts
			$catalog_post_count = $catalog_query->post_count;
			$press_post_count    = $press_query->post_count;
			$post_count_all     = 0;
				// ? if post type has posts add one to $post_count_all variable
			if ( $catalog_post_count > 0 ) {
				$post_count_all++;
			}
			if ( $press_post_count > 0 ) {
				$post_count_all++;
			}
				// ? if only one post type on medium-up screens make layout 3 columns
			if ( 1 === $post_count_all ) {
				$columns  = 'medium-4';
				$margin_x = ' grid-margin-x';
			} elseif ( 2 === $post_count_all ) {
				$columns  = 'medium-6';
				$margin_x = ' related-cpt-wrapper';
			} else { // ? otherwise do full width
				$columns  = 'medium-12';
				$margin_x = '';
			}
			global $post;
			?>

			<!-- Wrapper and header -->
			<div class="post-footer__related grid">
				<header class="title">
					<h5><?php echo the_title(); ?></h5>
					<h2 class="sub h1">RELATED</h2>
				</header>
				<?php
				if ( $press_query->have_posts() ) :
					$count = 0;
					?>
					<div class="related-posts__wrap">
						<?php
						while ( $press_query->have_posts() ) :
							$press_query->the_post();
							$count++;
							$the_title     = get_the_title();
							$permalink     = get_permalink();
							$the_post_type = get_post_type_object( get_post_type() );
							$the_post_type = strtoupper( $the_post_type->labels->singular_name );
							?>
							<?php if ( 1 === $count ) : ?>
								<h5 class="h2 related-posts__title">
									<?php echo esc_html( $the_post_type ); ?>
								</h5>
								<?php
							endif; // ? CARDS
							?>
							<a href="<?php echo wp_kses( $permalink, 'post' ); ?>" class="related-posts__card grid <?php echo wp_kses( $columns, 'post' ); ?>">
								<p class="related_posts__post-title"><?php echo wp_kses( $the_title, 'post' ); ?></p>
								<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'related-posts__image' ) ); ?>
							</a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php
				if ( $catalog_query->have_posts() ) :
					$count = 0;
					?>
					<div class="related-posts__wrap">
						<?php
						while ( $catalog_query->have_posts() ) :
							$catalog_query->the_post();
							$count++;
							$the_title     = get_the_title();
							$permalink     = get_permalink();
							$the_post_type = get_post_type_object( get_post_type() );
							$the_post_type = strtoupper( $the_post_type->labels->singular_name );
							?>
							<?php if ( 1 === $count ) : ?>
								<h5 class="h2 related-posts__title">
									<?php echo esc_html( $the_post_type ); ?>
								</h5>
								<?php
							endif; // ? CARDS
							?>
							<a href="<?php echo wp_kses( $permalink, 'post' ); ?>" class="related-posts__card grid">
								<p class="related_posts__post-title"><?php echo wp_kses( $the_title, 'post' ); ?></p>
								<?php echo get_the_post_thumbnail( $post, 'thumbnail', array( 'class' => 'related-posts__image' ) ); ?>
							</a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php
				// Main talent list.
				if ( ! is_singular( 'catalog' ) ) {
					?>
					<div class="related-posts__wrap">
						<h5 class="h2 related-posts__title">
							<?php echo esc_html( 'FEATURED TALENT' ); ?>
						</h5>
						<?php
						foreach ( $ids as $post ) {
							$the_terms = get_field( 'talent' );
							if ( $the_terms ) {
								foreach ( $the_terms as $the_term ) :
									?>
									<a href="<?php echo esc_url( get_term_link( $the_term ) ); ?>">
										<?php echo esc_html( $the_term->name ) . ', '; ?>
									</a>
									<?php
								endforeach;
							}
						}
						?>
					</div>
				<?php } ?>
			</div>
					<?php
		endif;
		wp_reset_postdata();
	}
}
