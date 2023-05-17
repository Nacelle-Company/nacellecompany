<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$blog_name = get_bloginfo( 'name' );
$current_site = '';

switch ($blog_name) {
	case $blog_name === 'Nacelle Company':
		$current_site = ' nacelle';
		break;
	case $blog_name === 'Comedy Dynamics':
		$current_site = '';
		break;
	case $blog_name === 'Dev Nacelle':
		$current_site = ' dev nacelle';
		break;
	case $blog_name === 'Dev Comedy Dynamics':
		$current_site = ' dev';
		break;
}

/**
* if to add prelaod for a script in header:
* <link rel="preload" as="style" href="<?php echo esc_html( $blog_name ); ?>/wp-content/plugins/search-filter-pro/public/assets/css/search-filter.min.css">
*/
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	if ( ! wp_rig()->is_amp() ) :
		?>
		<script>document.documentElement.classList.remove( 'no-js' );</script>
	<?php endif; ?>
	<?php
	wp_head();
	if ( is_single() && is_post_type( 'catalog' ) ) :
		$post_thumb = get_the_post_thumbnail_url();
		?>
		<link rel="preload" as="image" href="<?php echo esc_attr( $post_thumb ); ?>">
		<?php
	endif;
	?>
	<link rel="preload" as="image" href="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>">
</head>

<body <?php body_class(); ?>>
	<?php
	wp_body_open();
	$has_video_class = '';
	if ( get_post_meta( get_the_ID(), 'video_embedd', true ) ) {
		$has_video_class = ' site-header__hero-video';
	}
	if ( is_single() && 'catalog' === get_post_type_object( get_post_type() )->has_archive ) {
		$front_page_class = ' catalog-header';
	} elseif ( is_front_page() ) {
		$front_page_class = ' front-page';
	} else {
		$front_page_class = '';
	}

	?>
<div id="page" class="site<?php echo esc_html($current_site); ?>">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-rig' ); ?></a>
	<header id="masthead" class="site-header<?php echo esc_attr( $front_page_class ); ?><?php echo esc_attr( $has_video_class ); ?>">
		<div class="main-navigation__wrap">
			<?php
				get_template_part( 'template-parts/nav/branding' );
				get_template_part( 'template-parts/nav/navigation_primary' );
				get_template_part( 'template-parts/nav/navigation_secondary' );
			?>
		</div>
		<?php
		get_template_part( 'template-parts/nav/navigation_mobile' );
		?>
		<div class="search-icon mobile-menu__search">
			<?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=2]' ); ?>
		</div>
	</header>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
