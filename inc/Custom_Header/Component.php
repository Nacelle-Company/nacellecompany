<?php
/**
 * WP_Rig\WP_Rig\Custom_Header\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Custom_Header;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function add_theme_support;
use function apply_filters;
use function get_header_textcolor;
use function get_theme_support;
use function display_header_text;
use function esc_attr;

/**
 * Class for adding custom header support.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'custom_header';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_custom_header_support' ) );
	}

	/**
	 * Adds support for the Custom Logo feature.
	 */
	public function action_add_custom_header_support() {
		add_theme_support(
			'custom-header',
			apply_filters(
				'wp_rig_custom_header_args',
				array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'width'              => 1600,
					'height'             => 250,
					'flex-height'        => true,
					'layout-center'      => false,
					'wp-head-callback'   => array( $this, 'wp_head_callback' ),
				)
			)
		);
	}

	/**
	 * Outputs extra styles for the custom header, if necessary.
	 */
	public function wp_head_callback() {
		$header_text_color         = get_header_textcolor();
		$nav_bk_color              = get_theme_mod( 'nav_bk_color' );
		$global_font_color         = get_theme_mod( 'global_font_color' );
		$global_font_color_inverse = get_theme_mod( 'global_font_color_inverse' );
		$global_color_dark         = get_theme_mod( 'global_color_dark' );
		$global_color_grey         = get_theme_mod( 'global_color_grey' );
		$global_color_grey_light   = get_theme_mod( 'global_color_grey_light' );
		$global_color_grey_dark    = get_theme_mod( 'global_color_grey_dark' );
		$border_color_dark         = get_theme_mod( 'border_color_dark' );
		$border_color_light        = get_theme_mod( 'border_color_light' );
		$color_link                = get_theme_mod( 'color_link' );
		$color_link_visited        = get_theme_mod( 'color_link_visited' );
		$color_link_active         = get_theme_mod( 'color_link_active' );
		$color_quote_border        = get_theme_mod( 'color_quote_border' );
		$color_quote_citation      = get_theme_mod( 'color_quote_citation' );
		$color_theme_primary       = get_theme_mod( 'color_theme_primary' );
		$color_theme_secondary     = get_theme_mod( 'color_theme_secondary' );

		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		if ( ! display_header_text() ) {
			echo '<style type="text/css">.site-title, .site-description { position: absolute; clip: rect(1px, 1px, 1px, 1px); }</style>';
			return;
		}

		echo '<style type="text/css" id="custom_colors">
:root{
	--content-width: 50rem;
	--content-width-lg: 60rem;
	--nav-bk-color: ' . esc_attr( $nav_bk_color ) . ';
	--global-font-color: ' . esc_attr( $global_font_color ) . ';
	--global-font-color-inverse: ' . esc_attr( $global_font_color_inverse ) . ';
	--global-color-dark: ' . esc_attr( $global_color_dark ) . ';
	--global-color-grey: ' . esc_attr( $global_color_grey ) . ';
	--global-color-grey-light: ' . esc_attr( $global_color_grey_light ) . ';
	--global-color-grey-dark: ' . esc_attr( $global_color_grey_dark ) . ';
	--border-color-dark: ' . esc_attr( $border_color_dark ) . ';
	--border-color-light: ' . esc_attr( $border_color_light ) . ';
	--color-link: ' . esc_attr( $color_link ) . ';
	--color-link-visited: ' . esc_attr( $color_link_visited ) . ';
	--color-link-active: ' . esc_attr( $color_link_active ) . ';
	--color-quote-border: ' . esc_attr( $color_quote_border ) . ';
	--color-quote-citation: ' . esc_attr( $color_quote_citation ) . ';
	--color-theme-primary: ' . esc_attr( $color_theme_primary ) . ';
	--color-theme-secondary: ' . esc_attr( $color_theme_secondary ) . ';
}
.site-title a, .site-description, .main-navigation a { color: #' . esc_attr( $header_text_color ) . ';} </style>';
	}
}
