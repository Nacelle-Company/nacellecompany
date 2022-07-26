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
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<style>
.main-navigation a,a{text-decoration:none}@font-face{font-family:Montserrat;font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F}@font-face{font-family:Montserrat;font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:Montserrat;font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB}@font-face{font-family:Montserrat;font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Montserrat;font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:Montserrat;font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F}@font-face{font-family:Montserrat;font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:Montserrat;font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB}@font-face{font-family:Montserrat;font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Montserrat;font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}@font-face{font-family:Montserrat;font-style:normal;font-weight:900;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0460-052F,U+1C80-1C88,U+20B4,U+2DE0-2DFF,U+A640-A69F,U+FE2E-FE2F}@font-face{font-family:Montserrat;font-style:normal;font-weight:900;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0301,U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:Montserrat;font-style:normal;font-weight:900;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0102-0103,U+0110-0111,U+0128-0129,U+0168-0169,U+01A0-01A1,U+01AF-01B0,U+1EA0-1EF9,U+20AB}@font-face{font-family:Montserrat;font-style:normal;font-weight:900;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2) format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Montserrat;font-style:normal;font-weight:900;font-display:swap;src:url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}:root{--global-font-family:"Montserrat",sans-serif;--highlight-font-family:"Montserrat",sans-serif;--global-font-size:15;--global-font-line-height:1.4;--global-font-line-height-sm:0.5;--font-size-xsmall:calc(5/var(--global-font-size)*2rem);--font-size-small:calc(10/var(--global-font-size)*1rem);--font-size-regular:calc(var(--global-font-size)/16*1rem);--font-size-large:calc(36/var(--global-font-size)*1rem);--font-size-larger:calc(48/var(--global-font-size)*1rem)}.icon [fill],.menu svg.icon{fill:var(--color-theme-secondary)}html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}h1,.h1{font-size:2em;margin:.67em 0}a{background-color:transparent;color:var(--color-link)}b,strong{font-weight:bolder}sub{line-height:2;font-size:10px;position:relative;vertical-align:baseline}img{border-style:none;max-width:100%;height:auto}body,button,input,optgroup,select,textarea{color:var(--global-font-color);font-family:Montserrat,sans-serif;font-family:var(--global-font-family);font-size:.9375rem;font-size:var(--font-size-regular);line-height:1.4;line-height:var(--global-font-line-height)}h1,h2,h3,h4,h5,h6{font-family:Montserrat,sans-serif;font-family:var(--highlight-font-family);letter-spacing:1px;font-stretch:condensed;clear:both;color:var(--color-theme-primary)}cite,dfn,em,i{font-style:italic}a:visited{color:var(--color-link-visited)}a.button:visited{color:var(--global-color-grey-light)}a.button:visited .icon{fill:var(--global-color-grey-light)}a:not(.button):active,a:not(.button):focus,a:not(.button):hover{color:var(--color-link-active)}a:not(.button):focus{outline:dotted thin}#primary[tabindex="-1"]:focus,a:not(.button):active,a:not(.button):hover{outline:0}.link-absolute{position:absolute;width:100%;height:100%}.site-header{z-index:9;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:reverse;-ms-flex-direction:row-reverse;flex-direction:row-reverse;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:var(--nav-bk-color)}.site-branding{padding:1em 0;-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%}@media screen and (min-width: 48em){.site-branding{padding:1em 0;-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 32%}}.custom-logo{-o-object-fit:contain;object-fit:contain;width:100%}.nav--toggle-small{text-align:center}.nav--toggle-small .mobile-menu-container{position:absolute;background:var(--global-color-dark);width:100vw;-webkit-transform:translateY(-85vh);transform:translateY(-85vh);text-align:left;opacity:0;z-index:1;-webkit-transition:opacity .3s ease-in,-webkit-transform .6s ease-in;transition:opacity .3s ease-in,transform .6s ease-in,-webkit-transform .6s ease-in}.entry-content,.nav--toggle-small .mobile-menu-container>ul{padding:0 1em}.nav--toggle-small.nav--toggled-on .mobile-menu-container{z-index:9;opacity:1;-webkit-transform:translateY(10px);transform:translateY(10px);-webkit-transition:opacity .6s ease-out,-webkit-transform .3s ease-out;transition:transform .3s ease-out,opacity .6s ease-out,-webkit-transform .3s ease-out}.nav--toggle-small.nav--toggled-on .menu-toggle.icon svg.close,.nav--toggle-sub li.menu-item--toggled-on>ul,.nav--toggle-sub li:hover>ul,.nav--toggle-sub li:not(.menu-item--has-toggle):focus>ul{display:block}.infinite-scroll .pagination,.infinite-scroll .posts-navigation,.infinite-scroll.neverending .site-footer,.nav--toggle-small svg.close,.nav--toggle-small.nav--toggled-on svg.open-menu,.primary-menu-container,.primary-nav,.secondary-menu-container{display:none}.nav--toggle-small .menu-toggle{margin:0 auto;padding:.5em;font-stretch:condensed;font-size:80%;text-transform:uppercase;border:none;border-radius:0;background:0 0}@media screen and (min-width:60em){.site-header{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.site-branding{-webkit-box-flex:initial;-ms-flex:initial;flex:initial;padding:1em}.nav--toggle-small .menu-toggle,.nav--toggle-small .mobile-menu-container{display:none}}.nav--toggle-sub ul ul{display:none;position:absolute;background:var(--global-color-dark);z-index:100;min-width:-webkit-max-content;min-width:-moz-max-content;min-width:max-content}.nav--toggle-sub .dropdown,.nav--toggle-sub .dropdown-toggle{display:block;background:0 0;position:absolute;right:10px;top:25px;width:.7em;height:.7em;font-size:inherit;line-height:inherit;margin:0;padding:0;border:none;border-radius:0;-webkit-transform:translateY(-50%);transform:translateY(-50%);overflow:visible}@media screen and (min-width:48em){.nav--toggle-sub .dropdown,.nav--toggle-sub .dropdown-toggle{top:50%}}.nav--toggle-sub .dropdown-symbol{display:block;background:0 0;position:absolute;right:20%;top:35%;width:60%;height:60%;border:solid var(--border-color-dark);border-width:0 2px 2px 0;-webkit-transform:translateY(-50%) rotate(45deg);transform:translateY(-50%) rotate(45deg)}.nav--toggle-sub .dropdown-toggle:hover,.nav--toggle-sub .menu-item--has-toggle:hover .dropdown-toggle{pointer-events:none}.nav--toggle-sub li.menu-item--has-toggle,.nav--toggle-sub li.menu-item-has-children{position:relative;padding-right:1.6em}.nav--toggle-sub li:not(.menu-item--has-toggle):focus-within>ul{display:block}.main-navigation{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%}.main-navigation a{display:block;color:var(--global-font-color);padding:1em 0}@media screen and (max-width:37.5em){.nav--toggle-sub ul ul{position:relative;max-width:90%;padding-left:2em}.main-navigation a{width:90%;padding:1em 0}}@media screen and (min-width:48em){.main-navigation a{width:100%;padding:.5em 1em .5em 0}}@media screen and (min-width:37.5em){.main-navigation .menu{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.main-navigation ul.menu li{margin:0 0 0 .5em}}.main-navigation ul{display:block;list-style:none;margin:0;padding:0}.main-navigation a:focus,.main-navigation a:hover{text-decoration:underline}.main-navigation .current-menu-ancestor>a,.main-navigation .current-menu-item>a{font-weight:700}@media screen and (min-width:60em){.main-navigation{-webkit-box-flex:inherit;-ms-flex:inherit;flex:inherit}.primary-menu-container,.primary-nav,.secondary-menu-container{display:-webkit-box;display:-ms-flexbox;display:flex}}.menu svg.icon{fill:var(--color-theme-primary)}.button,[type=button]{-webkit-box-shadow:var(--color-theme-secondary) 0 1px 5px,var(--color-theme-secondary) 0 1px 2px;box-shadow:var(--color-theme-secondary) 0 1px 5px,var(--color-theme-secondary) 0 1px 2px;border-radius:6px;padding:10px 1em;background-color:transparent}.button:hover,[type=button]:hover{-webkit-box-shadow:var(--color-theme-secondary) 0 0 1px,var(--color-theme-secondary) 0 1px 2px;box-shadow:var(--color-theme-secondary) 0 0 1px,var(--color-theme-secondary) 0 1px 2px}.screen-reader-text{clip:rect(1px,1px,1px,1px);position:absolute!important;height:1px;width:1px;overflow:hidden;word-wrap:normal!important}.screen-reader-text:focus{background-color:#f1f1f1;border-radius:3px;-webkit-box-shadow:0 0 2px 2px rgba(0,0,0,.6);box-shadow:0 0 2px 2px rgba(0,0,0,.6);clip:auto!important;color:#21759b;display:block;font-size:.875rem;font-weight:700;height:auto;left:5px;line-height:normal;padding:15px 23px 14px;text-decoration:none;top:5px;width:auto;z-index:100000}.infinity-end.neverending .site-footer{display:block}  </style>

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
