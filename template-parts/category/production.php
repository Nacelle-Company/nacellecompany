<?php
/**
 * Template production category page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$production_series_post_one  = get_field( 'production_series_post_one', 'option' );
$img_series_one              = get_field( 'horizontal_image', $production_series_post_one );
$production_special_post_one = get_field( 'production_special_post_one', 'option' );
$img_special_one             = get_field( 'horizontal_image', $production_special_post_one );
$size                        = 'medium_large';
?>
<div class="parent-cat__container prod">
	<div class="category-wrapper">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/series/" class="link-absolute" title="<?php esc_html_e( 'Series', 'wp-rig' ); ?>"></a>
		<div class="title-wrap title-wrap__icon">
			<?php echo file_get_contents( get_template_directory() . '/assets/images/src/icon-series.svg' ); ?>
			<h2 class="title"><?php esc_html_e( 'Series', 'wp-rig' ); ?></h2>
		</div>
		<?php
		if ( $img_series_one ) {
			echo wp_get_attachment_image( $img_series_one, $size );
		}
		?>
	</div>

	<div class="category-wrapper">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/special/" class="link-absolute" title="<?php esc_html_e( 'Specials', 'wp-rig' ); ?>"></a>
		<div class="title-wrap title-wrap__icon">
			<?php get_template_part( 'template-parts/svg/icon-specials' ); ?>
			<h2 class="title"><?php esc_html_e( 'Specials', 'wp-rig' ); ?></h2>
		</div>
		<?php
		if ( $img_special_one ) {
			echo wp_get_attachment_image( $img_special_one, $size );
		}
		?>
	</div>
	<?php
	// Extra content.
	wp_rig()->display_extra_content();
	?>
</div>
