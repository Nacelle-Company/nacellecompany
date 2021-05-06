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
        'top-bar-l'  => esc_html__('Left Top Bar', 'nacelle'),
        'top-bar-r'  => esc_html__('Right Top Bar', 'nacelle'),
        'mobile-nav' => esc_html__('Mobile', 'nacelle'),
        'footer'  => esc_html__('Footer', 'nacelle'),
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
        $showSearch = get_option('options_show_nav_search');
        if ($showSearch) :
            $search = '<div class="search-container" tabindex="1"><svg class="icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-labelledby="iconSearch" role="img"><title id="iconSearch">search <?php echo get_bloginfo(); ?></title><path d="M19.72 17.3l-3.89-3.9a.94.94 0 00-.66-.28h-.64a8.12 8.12 0 10-1.4 1.4v.65c0 .25.1.48.27.66l3.9 3.9c.36.36.95.36 1.32 0l1.1-1.11a.94.94 0 000-1.33zm-11.6-4.18a5 5 0 110-9.99 5 5 0 010 10z" fill-rule="nonzero" /></svg>' . do_shortcode('[searchandfilter slug="search-form-only" fields="search" search_placeholder="Search. . ."]') . '</div>';
        endif;
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'dropdown menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>' . $search,
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

if (!function_exists('Nacelle_top_bar_l')) {

    function Nacelle_top_bar_l()
    {
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'dropdown menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                'theme_location' => 'top-bar-l',
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
        $showSearch = get_option('options_show_nav_search');
        if ($showSearch) :
            $search = do_shortcode('[searchandfilter slug="search-form-only" fields="search"]');
        endif;
        wp_nav_menu(
            array(
                'container'      => false,                         // Remove nav container
                'menu'           => __('mobile-nav', 'nacelle'),
                'menu_class'     => 'vertical menu',
                'theme_location' => 'mobile-nav',
                'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>' . $search,
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
