<?php
/**
 * Template production category page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

// ? series one
$production_series_post_one = get_field( 'production_series_post_one', 'option' );
$img_series_one             = get_field( 'horizontal_image', $production_series_post_one );
$img_series_one_alt         = $img_series_one['alt'];

// ? series two
$production_series_post_two = get_field( 'production_series_post_two', 'option' );
$img_series_two             = get_field( 'horizontal_image', $production_series_post_two );
$img_series_two_alt         = $img_series_two['alt'];

// ? special one
$production_special_post_one = get_field( 'production_special_post_one', 'option' );
$img_special_one             = get_field( 'horizontal_image', $production_special_post_one );
$img_special_one_alt         = $img_special_one['alt'];

// ? special two
$production_special_post_two = get_field( 'production_special_post_two', 'option' );
$img_special_two             = get_field( 'horizontal_image', $production_special_post_two );
$img_special_two_alt         = $img_special_two['alt'];

?>
<div class="category-container grid prod">
	<div class="category-wrapper grid">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/series/" class="link-absolute" title="<?php esc_html_e( 'Series', 'wp-rig' ); ?>"></a>
		<div class="icon-title">
			<?php get_template_part( 'template-parts/svg/icon-video' ); ?>
			<h2 class="title"><?php esc_html_e( 'Series', 'wp-rig' ); ?></h2>
		</div>
		<?php
		if ( ! empty( $img_series_one ) ) :
			?>
			<img src="<?php echo esc_url( $img_series_one['url'] ); ?>" alt="<?php echo esc_attr( $img_series_one_alt ); ?>" />
			<?php
		endif;
		if ( ! empty( $img_series_two ) ) :
			?>
		<img src="<?php echo esc_url( $img_series_two['url'] ); ?>" alt="<?php echo esc_attr( $img_series_two_alt ); ?>" />
		<?php endif; ?>
	</div>

	<div class="category-wrapper grid">

	<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/special/" class="link-absolute" title="<?php esc_html_e( 'Specials', 'wp-rig' ); ?>"></a>
			<div class="icon-title">
				<?php get_template_part( 'template-parts/svg/icon-mic' ); ?>
				<h2 class="title"><?php esc_html_e( 'Specials', 'wp-rig' ); ?></h2>
			</div>
			<?php
			if ( ! empty( $img_special_one ) ) :
				?>
			<img src="<?php echo esc_url( $img_special_one['url'] ); ?>" alt="<?php echo esc_attr( $img_special_one_alt ); ?>" />
				<?php
				endif;
			if ( ! empty( $img_special_two ) ) :
				?>
			<img src="<?php echo esc_url( $img_special_two['url'] ); ?>" alt="<?php echo esc_attr( $img_special_two_alt ); ?>" />
			<?php endif; ?>
	</div>
</div>
