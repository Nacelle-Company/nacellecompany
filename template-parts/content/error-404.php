<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<section class="error">
	<?php get_template_part( 'template-parts/content/page_header' ); ?>

	<div class="page-content" style="display: flex; flex-direction:column;">
		<p style="text-align: center;">
			<?php esc_html_e( 'The page you are looking for may have been moved, had its name changed or we’re working on it.', 'wp-rig' ); ?>
		</p>
		<h2 style="text-align: center;">
			<?php echo sprintf( esc_html__( 'Maybe try one of these? %1$s', 'wp-rig' ), convert_smilies( ':)' ) ); ?>
		</h2>
		<a href="<?php bloginfo( 'url' ); ?>" class="button large">
			<?php get_template_part( 'template-parts/svg/icon', 'home' ); ?>
			<span><?php _e( 'Home', 'nacelle' ); ?></span>
		</a>

		<!-- main catalog button and icon  -->
		<a href="
		<?php
		bloginfo( 'url' );
							echo $catalogPath;
		?>
							" class="button large flex-container">
			<?php get_template_part( 'template-parts/svg/icon', 'disk-lg', array( 'fill' => $fillColor ) ); ?>
			<span><?php _e( 'Catalog', 'nacelle' ); ?></span>
		</a>

		<?php if ( ! empty( $hasNewsPosts ) ) : ?>
			<a href="<?php bloginfo( 'url' ); ?>/in-the-news" class="button large">
				<?php get_template_part( 'template-parts/svg/icon', 'newspaper', array( 'fill' => $fillColor ) ); ?>
				<span><?php _e( 'News', 'nacelle' ); ?></span>
			</a>
		<?php endif; ?>

		<?php if ( ! empty( $hasPressPosts ) ) : ?>
			<a href="<?php bloginfo( 'url' ); ?>/press" class="button large">
				<?php get_template_part( 'template-parts/svg/icon', 'press', array( 'fill' => $fillColor ) ); ?>
				<span><?php _e( 'Press', 'nacelle' ); ?></span>
			</a>
		<?php endif; ?>

		<?php if ( ! empty( $hasPRPosts ) ) : ?>
			<a href="<?php bloginfo( 'url' ); ?>/press-release" class="button large">
				<?php get_template_part( 'template-parts/svg/icon', 'pressrelease', array( 'fill' => $fillColor ) ); ?>
				<span><?php _e( 'Releases', 'nacelle' ); ?></span>
			</a>
		<?php endif; ?>
		<div class="widget widget_categories">
			<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'wp-rig' ); ?></h2>
			<ul>
			<?php
			wp_list_categories(
				array(
					'orderby'    => 'count',
					'order'      => 'DESC',
					'show_count' => 1,
					'title_li'   => '',
					'number'     => 10,
				)
			);
			?>
			</ul>
		</div><!-- .widget -->
	</div><!-- .page-content -->
</section><!-- .error -->
