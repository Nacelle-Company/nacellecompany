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
					'description'		=> 'CD color: #ffbc00',
				)
			)
		);

		// Create secondary color
		$wp_customize->add_setting(
			'secondary_color',
			array(
				'default'   => '#74adec',
				'transport' => 'refresh'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'secondary_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Secondary color', 'nacelle'),
					'description'		=> 'CD color: #7fd2e6',
				)
			)
		);

		// Create background color
		$wp_customize->add_setting(
			'bk_color',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		// Add color picker for background_color
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bk_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Background color', 'nacelle'),
					'description'		=> 'CD color: #2c2c2c',
				)
			)
		);

		// Create secondary background color
		$wp_customize->add_setting(
			'secondary_bk_color',
			array(
				'default'   => '#000000',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'secondary_bk_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Secondary background color', 'nacelle'),
					'description'		=> 'CD color: #000',
				)
			)
		);

		// Create text color
		$wp_customize->add_setting(
			'txt_color',
			array(
				'default'   => '#1d1d1d',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 
				'txt_color', 
				array(
					'section' => 'colors',
					'label'   => esc_html__('Text color', 'nacelle'),
					'description'		=> 'CD color: #fff',
				)
			)
		);

		// Create secondary text color
		$wp_customize->add_setting(
			'secondary_txt_color',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'secondary_txt_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Secondary text color', 'nacelle'),
					'description'		=> 'CD color: #000',
				)
			)
		);

		// Create nav bg color color
		$wp_customize->add_setting(
			'nav_bk_color',
			array(
				'default'   => '#4591e5',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'nav_bk_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Navigation background color', 'nacelle'),
					'description'		=> 'CD color: #202020',
				)
			)
		);

		// Create secondary nav bg color
		$wp_customize->add_setting(
			'nav_bk_secondary_color',
			array(
				'default'   => '',
				'transport' => 'refresh'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'nav_bk_secondary_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Nav secondary background color', 'nacelle'),
					'description'		=> 'CD color: none, Nacelle color: none',
				)
			)
		);

		// Create navigation text color
		$wp_customize->add_setting(
			'nav_txt_color',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'nav_txt_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Nav text color', 'nacelle'),
					'description'		=> 'CD color: #ffbc00'
				)
			)
		);

		// Create navigation text secondary color
		$wp_customize->add_setting(
			'nav_txt_secondary_color',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'nav_txt_secondary_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('Nav text secondary color', 'nacelle'),
					'description'		=> 'CD color: #ffbc00'
				)
			)
		);

		// Create navigation text secondary color
		$wp_customize->add_setting(
			'white_color',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'white_color',
				array(
					'section' => 'colors',
					'label'   => esc_html__('White color', 'nacelle'),
					'description'		=> 'CD color: #fff'
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

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'your_setting_id',
				array(
					'label'          => __('Dark or light theme version?', 'theme_name'),
					'section'        => 'your_section_id',
					'settings'       => 'your_setting_id',
					'type'           => 'radio',
					'choices'        => array(
						'dark'   => __('Dark'),
						'light'  => __('Light')
					)
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


