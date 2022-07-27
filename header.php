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

$host = wp_unslash( $_SERVER['SERVER_NAME'] );

if ( 'www.nacellecompany.com' === $host ) :
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
elseif ( 'www.comedydynamics.com' === $host ) :
	$sf_current_query = $searchandfilter->get( 46681 )->current_query();
elseif ( 'localhost' === $host ) :
	// $sf_current_query = $searchandfilter->get( 46681 )->current_query();
endif;
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<style>

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2) format('woff2');
			unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 700;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 700;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 700;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 700;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 700;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2) format('woff2');
			unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 900;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 900;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 900;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 900;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2) format('woff2');
			unicode-range: U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF
		}

		@font-face {
			font-family: Montserrat;
			font-style: normal;
			font-weight: 900;
			font-display: swap;
			src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2) format('woff2');
			unicode-range: U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD
		}
	</style>
	<?php
	if ( ! wp_rig()->is_amp() ) {
		?>
		<script>document.documentElement.classList.remove( 'no-js' );</script>
		<?php
	}
	?>
	<?php
	wp_head();
	if ( is_single() && is_post_type( 'catalog' ) ) :
		$post_thumb = get_the_post_thumbnail_url();
		?>
	<link rel="preload" as="image" href="<?php echo esc_attr( $post_thumb ); ?>">
	<?php endif; ?>
	<link rel="preload" as="image" href="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>">
	<?php
	// if ( get_theme_mod( 'desktop_nav_wide' ) ) :
	?>

		<?php
		// endif;
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
		<div class="main-navigation__wrap">
			<?php
				get_template_part( 'template-parts/header/branding' );
				get_template_part( 'template-parts/header/navigation_primary' );
			?>
		</div>
		<?php
		get_template_part( 'template-parts/header/navigation_secondary' );
		get_template_part( 'template-parts/header/navigation_mobile' );
		?>
		<div class="mobile-menu__search">
			<?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=2]' ); ?>
		</div>
	</header>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
