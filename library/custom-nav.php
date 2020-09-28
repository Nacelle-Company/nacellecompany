<?php

/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

if (!function_exists('wpt_register_theme_customizer')) :
	function wpt_register_theme_customizer($wp_customize)
	{
		// Create background color
		$wp_customize->add_setting(
			'background_color',
			array(
				'default'   => '#000',
				'transport' => 'refresh',
			)
		);

		// Add color picker for background_color
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'background_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Background color', 'nacelle'),
				)
			)
		);

		// Create text color
		$wp_customize->add_setting(
			'text_color',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 
				'text_color', 
				array(
					'section' => 'colors',
					'label'   => esc_html__('Text color', 'nacelle'),
				)
			)
		);

		// Create primary color
		$wp_customize->add_setting(
			'primary_color',
			array(
				'default'   => '#4591E5',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'primary_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Primary color', 'nacelle'),
				)
			)
		);

		// Create secondary color
		$wp_customize->add_setting(
			'secondary_color',
			array(
				'default'   => '#74adec',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'secondary_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Secondary color', 'nacelle'),
				)
			)
		);

		// Create custom panels
		$wp_customize->add_panel(
			'mobile_menu_settings',
			array(
				'priority'       => 1000,
				'theme_supports' => '',
				'title'          => __('Mobile Menu Settings', 'nacelle'),
				'description'    => __('Controls the mobile menu', 'nacelle'),
			)
		);

		// Create custom field for mobile navigation layout
		$wp_customize->add_section(
			'mobile_menu_layout',
			array(
				'title'    => __('Mobile navigation layout', 'nacelle'),
				'panel'    => 'mobile_menu_settings',
				'priority' => 1000,
			)
		);

		// Set default navigation layout
		$wp_customize->add_setting(
			'wpt_mobile_menu_layout',
			array(
				'default' => __('topbar', 'nacelle'),
			)
		);

		// Add options for navigation layout
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mobile_menu_layout',
				array(
					'type'     => 'radio',
					'section'  => 'mobile_menu_layout',
					'settings' => 'wpt_mobile_menu_layout',
					'choices'  => array(
						'topbar'    => 'Topbar',
						'offcanvas' => 'Offcanvas',
					),
				)
			)
		);
	}

	add_action('customize_register', 'wpt_register_theme_customizer');

	// Add class to body to help w/ CSS
	add_filter('body_class', 'mobile_nav_class');
	function mobile_nav_class($classes)
	{
		if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') :
			$classes[] = 'topbar';
		elseif (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') :
			$classes[] = 'offcanvas';
		endif;
		return $classes;
	}
endif;


