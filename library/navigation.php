<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

register_nav_menus(
    array(
        'top-bar-r'  => esc_html__('Right Top Bar', 'comedy-dynamics'),
        'mobile-nav' => esc_html__('Mobile', 'comedy-dynamics'),
        'footer'  => esc_html__('Footer', 'comedy-dynamics'),
    )
);

/**
 * Support Custom Logo
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
function Nacelle_custom_logo_setup()
{
    $defaults = array(
        'height'      => 90,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'Nacelle_custom_logo_setup');

/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (! function_exists('Nacelle_top_bar_r')) {
    function Nacelle_top_bar_r()
    {
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'dropdown menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
                'theme_location' => 'top-bar-r',
                'depth'          => 3,
                'fallback_cb'    => false,
                'walker'         => new Nacelle_Top_Bar_Walker(),
            )
        );
    }
}


/**
 * Desktop navigation - left top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (! function_exists('Nacelle_footer')) {
    function Nacelle_top_bar_l()
    {
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'footer',
                'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
                'theme_location' => 'footer',
                'depth'          => 3,
                'fallback_cb'    => false,
                'walker'         => new Nacelle_Top_Bar_Walker(),
            )
        );
    }
}


/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if (! function_exists('Nacelle_mobile_nav')) {
    function Nacelle_mobile_nav()
    {
        wp_nav_menu(
            array(
                'container'      => false,                         // Remove nav container
                'menu'           => __('mobile-nav', 'comedy-dynamics'),
                'menu_class'     => 'vertical menu',
                'theme_location' => 'mobile-nav',
                'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
                'fallback_cb'    => false,
                'walker'         => new Nacelle_Mobile_Walker(),
            )
        );
    }
}


/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if (! function_exists('Nacelle_add_menuclass')) {
    function Nacelle_add_menuclass($ulclass)
    {
        $find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
        $replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

        return preg_replace($find, $replace, $ulclass, 1);
    }
    add_filter('wp_nav_menu', 'Nacelle_add_menuclass');
}
