<?php
/**
 * Template part for the catalog/comedy production catalog page.
 *
 * @package production category
 */

// ? series one
$production_series_post_one  = get_field( 'production_series_post_one', 'option' );
$img_series_one              = get_field( 'horizontal_image', $production_series_post_one );
$img_series_one_alt          = $img_series_one['alt'];

// ? series two
$production_series_post_two  = get_field( 'production_series_post_two', 'option' );
$img_series_two              = get_field( 'horizontal_image', $production_series_post_two );
$img_series_two_alt          = $img_series_two['alt'];

// ? special one
$production_special_post_one = get_field( 'production_special_post_one', 'option' );
$img_special_one             = get_field( 'horizontal_image', $production_special_post_one );
$img_special_one_alt         = $img_special_one['alt'];

// ? special two
$production_special_post_two = get_field( 'production_special_post_two', 'option' );
$img_special_two             = get_field( 'horizontal_image', $production_special_post_two );
$img_special_two_alt          = $img_special_two['alt'];
?>
<div class="category-wrapper">
<?php
if ( ! empty( $img_series_one ) ) {
	?>
	<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/series/">
	<?php get_template_part( 'template-parts/svg/icon-disk' ); ?>
		<img src="<?php echo esc_url( $img_series_one['url'] ); ?>" alt="<?php echo esc_attr( $img_series_one_alt ); ?>" />
	</a>
	<?php
}

if ( ! empty( $img_series_two ) ) {
	?>
	<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/series/">
		<img src="<?php echo esc_url( $img_series_two['url'] ); ?>" alt="<?php echo esc_attr( $img_series_two_alt ); ?>" />
	</a>
	<?php
}
?>
</div >
<div class="category-wrapper">
<?php
if ( ! empty( $img_special_one ) ) {
	?>
	<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/special/">
		<img src="<?php echo esc_url( $img_special_one['url'] ); ?>" alt="<?php echo esc_attr( $img_special_one_alt ); ?>" />
	</a>
	<?php
}

if ( ! empty( $img_special_two ) ) {
	?>
	<a href="<?php echo esc_html( get_home_url() ); ?>/category/production/special/">
		<img src="<?php echo esc_url( $img_special_two['url'] ); ?>" alt="<?php echo esc_attr( $img_special_two_alt ); ?>" />
	</a>
		<?php
}
?>
</div >
