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

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
	if ( ! wp_rig()->is_amp() ) {
		?>
		<script>document.documentElement.classList.remove( 'no-js' );</script>
		<?php
	}
	if ( get_theme_mod( 'desktop_nav_center' ) ) {
		$desktop_nav_layout = ' site-header_center';
	} else {
		$desktop_nav_layout = '';
	}
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wp-body-open">
	<?php
	/**
	 * TODO: remove the "<div class="wp-body-open">" container
	 */
	wp_body_open();
	?>
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-rig' ); ?></a>
	<div id="filterOverlay" class="filter overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header id="masthead" class="site-header<?php echo esc_attr( $desktop_nav_layout ); ?>">
		<?php get_template_part( 'template-parts/header/custom_header' ); ?>

		<?php get_template_part( 'template-parts/header/navigation_secondary' ); ?>

		<?php get_template_part( 'template-parts/header/branding' ); ?>

		<?php get_template_part( 'template-parts/header/navigation_primary' ); ?>

		<?php get_template_part( 'template-parts/header/navigation_mobile' ); ?>

	</header><!-- #masthead -->
	<div id="offcanvasFilter" class="offcanvas-filter">
		<a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
		<?php echo do_shortcode( '[searchandfilter slug="distribution-album-catalog-sidebar"]' ); ?>
	</div>
