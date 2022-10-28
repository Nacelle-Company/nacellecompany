<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-page' );
?>
<section class="error site-main__content-width">
	<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/bamford-is-sad-you-are-on-404-page.webp" class="img-404" alt="404 image" />
	<?php get_template_part( 'template-parts/content/page_header' ); ?>

	<div class="page-content entry-content content-width">
		<p>
			<?php esc_html_e( 'The page you are looking for may have been moved, had its name changed or we’re working on it.', 'wp-rig' ); ?>
		</p>
		<h2>
			<?php echo sprintf( esc_html__( 'Maybe try one of these? %1$s', 'wp-rig' ), convert_smilies( ':)' ) ); ?>
		</h2>
		<div class="button-wrap">
			<a href="<?php bloginfo( 'url' ); ?>" class="button">
				<span>Home</span>
				<?php get_template_part( 'template-parts/svg/icon', 'home' ); ?>
			</a>

			<a href="<?php bloginfo( 'url' ); ?>/catalog" class="button">
				<span>Catalog</span>
				<?php get_template_part( 'template-parts/svg/icon', 'albums' ); ?>
			</a>
		</div>
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
		</div>
	</div>
</section>
