<?php
/**
 * Template part for the catalog/comedy distribution catalog page.
 *
 * @package distribution category
 */

// ? albums
$distribution_album_post = get_field( 'distribution_album_post', 'option' );
$img_album               = get_field( 'square_image', $distribution_album_post );
$img_album_alt           = $img_album['alt'];

// ? films
$distribution_film_post = get_field( 'distribution_film_post', 'option' );
$img_film               = get_field( 'square_image', $distribution_film_post );
$img_film_alt           = $img_film['alt'];

// ? series
$distribution_series_post = get_field( 'distribution_series_post', 'option' );
$img_series               = get_field( 'square_image', $distribution_series_post );
$img_series_alt           = $img_series['alt'];

// ? specials
$distribution_special_post = get_field( 'distribution_special_post', 'option' );
$img_special               = get_field( 'square_image', $distribution_special_post );
$img_special_alt           = $img_special['alt'];
?>

<div class="category-container grid">

<?php
if ( ! empty( $img_album ) ) :
	?>
	<div class="category-wrapper grid">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/album/" class="link-absolute" title="<?php esc_html_e( 'Albums', 'wp-rig' ); ?>"></a>
		<div class="icon-title">
			<?php get_template_part( 'template-parts/svg/icon-disk' ); ?>
			<h2 class="title"><?php esc_html_e( 'Albums', 'wp-rig' ); ?></h2>
		</div>
		<img src="<?php echo esc_url( $img_album['url'] ); ?>" alt="<?php echo esc_attr( $img_album_alt ); ?>" />
	</div>
	<?php
endif;

if ( ! empty( $img_film ) ) :
	?>
	<div class="category-wrapper grid">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/film/" class="link-absolute" title="<?php esc_html_e( 'Films', 'wp-rig' ); ?>"></a>
		<div class="icon-title">
			<?php get_template_part( 'template-parts/svg/icon-film' ); ?>
			<h2 class="title"><?php esc_html_e( 'Films', 'wp-rig' ); ?></h2>
		</div>
		<img src="<?php echo esc_url( $img_film['url'] ); ?>" alt="<?php echo esc_attr( $img_film_alt ); ?>" />
	</div>
	<?php
endif;

if ( ! empty( $img_series ) ) :
	?>
	<div class="category-wrapper grid">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/series/" class="link-absolute" title="<?php esc_html_e( 'Series', 'wp-rig' ); ?>"></a>
		<div class="icon-title">
			<?php get_template_part( 'template-parts/svg/icon-video' ); ?>
			<h2 class="title"><?php esc_html_e( 'Series', 'wp-rig' ); ?></h2>
		</div>
		<img src="<?php echo esc_url( $img_series['url'] ); ?>" alt="<?php echo esc_attr( $img_series_alt ); ?>" />
	</div>
	<?php
endif;

if ( ! empty( $img_special ) ) :
	?>
	<div class="category-wrapper grid">
		<a href="<?php echo esc_html( get_home_url() ); ?>/category/distribution/special/" class="link-absolute" title="<?php esc_html_e( 'Specials', 'wp-rig' ); ?>"></a>
		<div class="icon-title">
			<?php get_template_part( 'template-parts/svg/icon-mic' ); ?>
			<h2 class="title"><?php esc_html_e( 'Specials', 'wp-rig' ); ?></h2>
		</div>
		<img src="<?php echo esc_url( $img_special['url'] ); ?>" alt="<?php echo esc_attr( $img_special_alt ); ?>" />
	</div>
	<?php
endif;
?>

</div>
