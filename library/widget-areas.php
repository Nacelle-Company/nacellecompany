<?php
/**
 * Register widget areas
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

if (! function_exists('Nacelle_sidebar_widgets')) :
    function Nacelle_sidebar_widgets()
    {
        register_sidebar(
            array(
                'id'            => 'sidebar-widgets',
                'name'          => __('Sidebar widgets', 'nacelle'),
                'description'   => __('Drag widgets to this sidebar container.', 'nacelle'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            )
        );

        register_sidebar(
            array(
                'id'            => 'l-footer-widgets',
                'name'          => __('Left Footer widgets', 'nacelle'),
                'description'   => __('Drag widgets to this footer container', 'nacelle'),
                'before_widget' => '<section id="%1$s" class="widget %2$s logo">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'id'            => 'c-footer-widgets',
                'name'          => __('Center Footer widgets', 'nacelle'),
                'description'   => __('Drag widgets to this footer container', 'nacelle'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'id'            => 'r-footer-widgets',
                'name'          => __('Right Footer widgets', 'nacelle'),
                'description'   => __('Drag widgets to this footer container', 'nacelle'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3>',
                'after_title'   => '</h3>',
            )
        );
    }

    add_action('widgets_init', 'Nacelle_sidebar_widgets');
endif;
