<?php
/**
 * Template production category page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$production_series_post_one  = get_field( 'production_series_post_one', 'option' );
$img_series_one              = get_field( 'horizontal_image', $production_series_post_one );
$production_series_post_two  = get_field( 'production_series_post_two', 'option' );
$img_series_two              = get_field( 'horizontal_image', $production_series_post_two );
$production_special_post_one = get_field( 'production_special_post_one', 'option' );
$img_special_one             = get_field( 'horizontal_image', $production_special_post_one );
$production_special_post_two = get_field( 'production_special_post_two', 'option' );
$img_special_two             = get_field( 'horizontal_image', $production_special_post_two );
$size                        = 'medium_large';
?>
<div class="category-container grid prod">
	<div class="category-wrapper grid">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/series/" class="link-absolute" title="<?php esc_html_e( 'Series', 'wp-rig' ); ?>"></a>
		<div class="icon-title">
			<?php get_template_part( 'template-parts/svg/icon-series' ); ?>
			<h2 class="title"><?php esc_html_e( 'Series', 'wp-rig' ); ?></h2>
		</div>
		<?php
		if ( $img_series_one ) {
			echo wp_get_attachment_image( $img_series_one, $size );
		}
		if ( $img_series_two ) {
			echo wp_get_attachment_image( $img_series_two, $size );
		}
		?>
	</div>

	<div class="category-wrapper grid">

	<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/special/" class="link-absolute" title="<?php esc_html_e( 'Specials', 'wp-rig' ); ?>"></a>
			<div class="icon-title">
				<?php get_template_part( 'template-parts/svg/icon-mic' ); ?>
				<h2 class="title"><?php esc_html_e( 'Specials', 'wp-rig' ); ?></h2>
			</div>
			<?php
			if ( $img_special_one ) {
				echo wp_get_attachment_image( $img_special_one, $size );
			}
			if ( $img_special_two ) {
				echo wp_get_attachment_image( $img_special_two, $size );
			}
			?>
	</div>
</div>
