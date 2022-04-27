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

	if ( get_post_meta( get_the_ID(), 'video_embedd', true ) ) {
		$has_video_class = ' has-post-video';
	} else {
		$has_video_class = ' no-post-video';
	}
	if ( is_single() && 'catalog' === get_post_type_object( get_post_type() )->has_archive ) {
		$front_page_class = ' catalog';
	} elseif ( is_front_page() ) {
		$front_page_class = ' front-page';
	} else {
		$front_page_class = '';
	}

	?>
</div>
<div id="page" class="site grid">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-rig' ); ?></a>
	<header id="masthead" class="site-header<?php echo esc_attr( $desktop_nav_layout ); ?><?php echo esc_attr( $front_page_class ); ?><?php echo esc_attr( $has_video_class ); ?>">
		<?php get_template_part( 'template-parts/header/navigation_secondary' ); ?>
		<?php get_template_part( 'template-parts/header/branding' ); ?>
		<?php get_template_part( 'template-parts/header/navigation_primary' ); ?>
		<?php get_template_part( 'template-parts/header/navigation_mobile' ); ?>
	</header>
