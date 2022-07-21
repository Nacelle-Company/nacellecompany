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
	?>
	<?php
	wp_head();
	$post_thumb = get_the_post_thumbnail_url();
	?>
	<link rel="preload" as="image" href="<?php echo esc_attr( $post_thumb ); ?>">
	<?php
	if ( get_theme_mod( 'desktop_nav_wide' ) ) :
		?>
		<style>
			svg.open-menu[fill],
			svg.close[fill] {
				fill: #fff;
			}
			.site-header {
				background-color: var(--color-theme-primary);
			}
			@media screen and (max-width: 37.5em) {
				.site-header {
					justify-content: flex-end;
				}
				.site-branding {
					padding: 30px 0;
					flex: 0 0 50%;
				}
			}
			/* NACELLE */
			@media screen and (min-width: 60em) {
				.site-header {
					justify-content: space-between;
				}
				.site-branding {
					text-align: left;
					padding-left: 1em;
				}
				.main-navigation_wide-menu {
					margin: 0 0 0 auto;
				}
				.search-menu-item {
					width: 50px;
				}
				.mobile-menu-container {
					display: none;
				}
			}
			#ajaxsearchpro2_1 .probox .proinput input.orig,
			#ajaxsearchpro2_2 .probox .proinput input.orig,
			div.asp_m.asp_m_2 .probox .proinput input.orig {
				background-color: #fff !important;
			}
			.sub-menu .menu-item a {
				color: #fff;
			}
			.main-navigation.nav--toggle-small .mobile-menu-container,
			.menu .sub-menu {
				background: var(--color-theme-primary);
			}
			#ajaxsearchpro2_2 .probox .promagnifier .innericon svg,
			div.asp_m.asp_m_2 .probox .promagnifier .innericon svg {
				fill: #fff !important;
				background: var(--color-theme-primary);
			}
			.press.grid-item:hover .entry-summary {
						color: #fff;
					}
			.primary-sidebar.widget-area {
				background-color: #fff;
			}
			a.button:visited {
				color: #000;
			}
			div.asp_m.asp_m_2 .probox .promagnifier {
				background-image: none;
				background-color: var(--nav-bk-color);
			}
		</style>
		<?php
	endif;
	?>
</head>

<body <?php body_class(); ?>>
<div class="wp-body-open">
	<?php
	/**
	 * TODO: remove the "<div class="wp-body-open">" container
	 */
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
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-rig' ); ?></a>
	<header id="masthead" class="site-header<?php echo esc_attr( $front_page_class ); ?><?php echo esc_attr( $has_video_class ); ?>">
		<?php
		if ( ! get_theme_mod( 'desktop_nav_wide' ) ) :
			get_template_part( 'template-parts/header/navigation_secondary' );
		endif;
		?>
		<?php get_template_part( 'template-parts/header/branding' ); ?>
		<?php get_template_part( 'template-parts/header/navigation_primary' ); ?>
		<?php get_template_part( 'template-parts/header/navigation_mobile' ); ?>
	</header>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
