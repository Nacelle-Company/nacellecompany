<?php
/**
 * Template distribution category page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$distribution_album_post   = get_field( 'distribution_album_post', 'option' );
$img_album                 = get_field( 'square_image', $distribution_album_post );
$distribution_film_post     = get_field( 'distribution_film_post', 'option' );
$img_film                   = get_field( 'square_image', $distribution_film_post );
$distribution_series_post  = get_field( 'distribution_series_post', 'option' );
$img_series                = get_field( 'square_image', $distribution_series_post );
$distribution_special_post = get_field( 'distribution_special_post', 'option' );
$img_special               = get_field( 'square_image', $distribution_special_post );
$size                      = 'medium_large';
?>

<div class="parent-cat__container grid">
	<?php
	if ( ! empty( $img_album ) ) :
		?>
		<div class="category-wrapper grid">
			<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/album/" class="link-absolute" title="<?php esc_html_e( 'Albums', 'wp-rig' ); ?>"></a>
			<div class="title-wrap title-wrap__icon">
				<?php get_template_part( 'template-parts/svg/icon-albums' ); ?>
				<h2 class="title"><?php esc_html_e( 'Albums', 'wp-rig' ); ?></h2>
			</div>
			<?php
			if ( $img_album ) {
				echo wp_get_attachment_image( $img_album, $size );
			}
			?>
		</div>
		<?php
	endif;

	if ( ! empty( $img_film ) ) :
		?>
		<div class="category-wrapper grid">
			<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/film/" class="link-absolute" title="<?php esc_html_e( 'Films', 'wp-rig' ); ?>"></a>
			<div class="title-wrap title-wrap__icon">
				<?php get_template_part( 'template-parts/svg/icon-films' ); ?>
				<h2 class="title"><?php esc_html_e( 'Films', 'wp-rig' ); ?></h2>
			</div>
			<?php
			if ( $img_film ) {
				echo wp_get_attachment_image( $img_film, $size );
			}
			?>
			</div>
		<?php
	endif;

	if ( ! empty( $img_series ) ) :
		?>
		<div class="category-wrapper grid">
			<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/series/" class="link-absolute" title="<?php esc_html_e( 'Series', 'wp-rig' ); ?>"></a>
			<div class="title-wrap title-wrap__icon">
				<?php get_template_part( 'template-parts/svg/icon-series' ); ?>
				<h2 class="title"><?php esc_html_e( 'Series', 'wp-rig' ); ?></h2>
			</div>
			<?php
			if ( $img_series ) {
				echo wp_get_attachment_image( $img_series, $size );
			}
			?>
		</div>
		<?php
	endif;

	if ( ! empty( $img_special ) ) :
		?>
		<div class="category-wrapper grid">
			<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/special/" class="link-absolute" title="<?php esc_html_e( 'Specials', 'wp-rig' ); ?>"></a>
			<div class="title-wrap title-wrap__icon">
				<?php get_template_part( 'template-parts/svg/icon-specials' ); ?>
				<h2 class="title"><?php esc_html_e( 'Specials', 'wp-rig' ); ?></h2>
			</div>
			<?php
			if ( $img_special ) {
				echo wp_get_attachment_image( $img_special, $size );
			}
			?>
		</div>
		<?php
	endif;
	// Extra content.
	wp_rig()->display_extra_content();
	?>
</div>
