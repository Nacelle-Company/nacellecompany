<?php
/**
 * Register widget areas
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

if (! function_exists('comedy_dynamics_sidebar_widgets')) :
    function comedy_dynamics_sidebar_widgets()
    {
        register_sidebar(
            array(
                'id'            => 'sidebar-widgets',
                'name'          => __('Sidebar widgets', 'comedy-dynamics'),
                'description'   => __('Drag widgets to this sidebar container.', 'comedy-dynamics'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6>',
                'after_title'   => '</h6>',
            )
        );

        register_sidebar(
            array(
                'id'            => 'l-footer-widgets',
                'name'          => __('Left Footer widgets', 'comedy-dynamics'),
                'description'   => __('Drag widgets to this footer container', 'comedy-dynamics'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6>',
                'after_title'   => '</h6>',
            )
        );
        register_sidebar(
            array(
                'id'            => 'c-footer-widgets',
                'name'          => __('Center Footer widgets', 'comedy-dynamics'),
                'description'   => __('Drag widgets to this footer container', 'comedy-dynamics'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6>',
                'after_title'   => '</h6>',
            )
        );
        register_sidebar(
            array(
                'id'            => 'r-footer-widgets',
                'name'          => __('Right Footer widgets', 'comedy-dynamics'),
                'description'   => __('Drag widgets to this footer container', 'comedy-dynamics'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6>',
                'after_title'   => '</h6>',
            )
        );
    }

    add_action('widgets_init', 'comedy_dynamics_sidebar_widgets');
endif;
