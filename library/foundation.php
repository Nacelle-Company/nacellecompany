<?php

/**
 * Foundation PHP template
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

// Pagination.
if (!function_exists('Nacelle_pagination')) :
    function Nacelle_pagination()
    {
        global $wp_query;

        $big = 999999999; // This needs to be an unlikely integer

        // For more options and info view the docs for paginate_links()
        // http://codex.wordpress.org/Function_Reference/paginate_links
        $paginate_links = paginate_links(
            array(
                'base'      => str_replace($big, '%#%', html_entity_decode(get_pagenum_link($big))),
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'mid_size'  => 5,
                'prev_next' => true,
                'prev_text' => __('&laquo;', 'nacelle'),
                'next_text' => __('&raquo;', 'nacelle'),
                'type'      => 'list',
            )
        );

        $paginate_links = str_replace("<ul class='page-numbers'>", "<ul class='pagination text-center' role='navigation' aria-label='Pagination'>", $paginate_links);
        $paginate_links = str_replace('<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links);
        $paginate_links = str_replace('</span>', '</a>', $paginate_links);
        $paginate_links = str_replace("<li><span class='page-numbers current'>", "<li class='current'>", $paginate_links);
        $paginate_links = str_replace("<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links);
        $paginate_links = preg_replace('/\s*page-numbers/', '', $paginate_links);

        // Display the pagination if more than one page is found.
        if ($paginate_links) {
            echo $paginate_links;
        }
    }
endif;

// Custom Comments Pagination.
if (!function_exists('Nacelle_get_the_comments_pagination')) :
    function Nacelle_get_the_comments_pagination($args = array())
    {
        $navigation = '';
        $args = wp_parse_args($args, array(
            'prev_text'                => __('&laquo;', 'nacelle'),
            'next_text'                => __('&raquo;', 'nacelle'),
            'size'                    => 'default',
            'show_disabled'            => true,
        ));
        $args['type'] = 'array';
        $args['echo'] = false;
        $links = paginate_comments_links($args);
        if ($links) {
            $link_count = count($links);
            $pagination_class = 'pagination';
            if ('large' == $args['size']) {
                $pagination_class .= ' pagination-lg';
            } elseif ('small' == $args['size']) {
                $pagination_class .= ' pagination-sm';
            }
            $current = get_query_var('cpage') ? intval(get_query_var('cpage')) : 1;
            $total = get_comment_pages_count();
            $navigation .= '<ul class="' . $pagination_class . '">';
            if ($args['show_disabled'] && 1 === $current) {
                $navigation .= '<li class="page-item disabled">' . $args['prev_text'] . '</li>';
            }
            foreach ($links as $index => $link) {
                if (0 == $index && 0 === strpos($link, '<a class="prev')) {
                    $navigation .= '<li class="page-item">' . str_replace('prev page-numbers', 'page-link', $link) . '</li>';
                } elseif ($link_count - 1 == $index && 0 === strpos($link, '<a class="next')) {
                    $navigation .= '<li class="page-item">' . str_replace('next page-numbers', 'page-link', $link) . '</li>';
                } else {
                    $link = preg_replace("/(class|href)='(.*)'/U", '$1="$2"', $link);
                    if (0 === strpos($link, '<span class="page-numbers current')) {
                        $navigation .= '<li class="page-item active">' . str_replace(array('<span class="page-numbers current">', '</span>'), array('<a class="page-link" href="#">', '</a>'), $link) . '</li>';
                    } elseif (0 === strpos($link, '<span class="page-numbers dots')) {
                        $navigation .= '<li class="page-item disabled">' . str_replace(array('<span class="page-numbers dots">', '</span>'), array('<a class="page-link" href="#">', '</a>'), $link) . '</li>';
                    } else {
                        $navigation .= '<li class="page-item">' . str_replace('class="page-numbers', 'class="page-link', $link) . '</li>';
                    }
                }
            }
            if ($args['show_disabled'] && $current == $total) {
                $navigation .= '<li class="page-item disabled">' . $args['next_text'] . '</li>';
            }
            $navigation .= '</ul>';
            $navigation = _navigation_markup($navigation, 'comments-pagination');
        }
        return $navigation;
    }
endif;

// Custom Comments Pagination.
if (!function_exists('Nacelle_the_comments_pagination')) :
    function Nacelle_the_comments_pagination($args = array())
    {
        echo Nacelle_get_the_comments_pagination($args);
    }
endif;


/**
 * A fallback when no navigation is selected by default.
 */

if (!function_exists('Nacelle_menu_fallback')) :
    function Nacelle_menu_fallback()
    {
        echo '<div class="alert-box secondary">';
        /* translators: %1$s: link to menus, %2$s: link to customize. */
        printf(
            __('Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'nacelle'),
            /* translators: %s: menu url */
            sprintf(
                __('<a href="%s">Menus</a>', 'nacelle'),
                get_admin_url(get_current_blog_id(), 'nav-menus.php')
            ),
            /* translators: %s: customize url */
            sprintf(
                __('<a href="%s">Customize</a>', 'nacelle'),
                get_admin_url(get_current_blog_id(), 'customize.php')
            )
        );
        echo '</div>';
    }
endif;

// Add Foundation 'is-active' class for the current menu item.
if (!function_exists('Nacelle_active_nav_class')) :
    function Nacelle_active_nav_class($classes, $item)
    {
        if ($item->current == 1 || $item->current_item_ancestor == true) {
            $classes[] = 'is-active';
        }
        return $classes;
    }
    add_filter('nav_menu_css_class', 'Nacelle_active_nav_class', 10, 2);
endif;

/**
 * Use the is-active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch.
 */
if (!function_exists('Nacelle_active_list_pages_class')) :
    function Nacelle_active_list_pages_class($input)
    {
        $pattern = '/current_page_item/';
        $replace = 'current_page_item is-active';

        $output = preg_replace($pattern, $replace, $input);

        return $output;
    }
    add_filter('wp_list_pages', 'Nacelle_active_list_pages_class', 10, 2);
endif;



/**
 * Get mobile menu ID
 */

if (!function_exists('Nacelle_mobile_menu_id')) :
    function Nacelle_mobile_menu_id()
    {
        if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') {
            echo 'off-canvas-menu';
        } else {
            echo 'mobile-menu';
        }
    }
endif;


/**
 * Get custom colors
 */

if (!function_exists('Nacelle_custom_colors')) :
    function Nacelle_custom_colors()
    {
        ob_start();
        $text_color = get_theme_mod('text_color', '');
        $background_color = get_theme_mod('background_color', '');
        $primary_color = get_theme_mod('primary_color', '');
        $secondary_color = get_theme_mod('secondary_color', '');
        $nav_bg_color = get_theme_mod('nav_bg_color', '');
        $nav_alt_color = get_theme_mod('nav_alt_color', '');
        $home_nav_bg_color = get_theme_mod('home_nav_bg_color', '');
        $secondary_background_color = get_theme_mod('secondary_background_color', '');
        if (!empty($background_color)) {
// background color
?>
            body,
            .featured-page .feat-content,
            .reveal {
                background-color: #<?php echo $background_color; ?>;
            }
            .primary-title .entry-title,
            .details-container details .on-sale,
            .details-container details[open] .info p,
            .wp-block-button .success.wp-block-button__link,
            .button.hollow.success,
            .button.success:hover {
                color: #<?php echo $background_color; ?>;
            }

<?php
        }
        if (!empty($text_color)) {
// text color
?>
            body, h1, .h1, 
            .instagram-title h3,
            .catalog .entry-title,
            .contactModal p,
            .mobile-app-toggle .button:hover {
                color:  <?php echo $text_color; ?>;
            }

<?php
        }
        if (!empty($primary_color)) {
// primary color
?>
            a, .primary-color,
            .accordion-content .title,
            .button.hollow,
            .footer-grid p,
            .mobile-app-toggle .button,
            .entry-content .social a.nav-link {
                color: <?php echo $primary_color; ?>;
            }
            .home .top-bar ul .menu-item a,
            .top-meta .title,
            .button.clear.success,
            .primary-title .entry-title {
                color: <?php echo $primary_color; ?>;
            }
            .primary,
            .accordion-content,
            input[type=submit],
            body.page-template-featured-page,
            .button.success:hover,
            .archive .featured-hero {
                background-color: <?php echo $primary_color; ?>;
            }
            .to-top,
            .instagram-tab,
            .callout-footer,
            .mobile-app-toggle .button.is-active:hover,
            .details-container .info,
            .details-container details[open] .info {
                background-color: <?php echo $primary_color; ?>;
            }
            .button.hollow,
            .instagram-tab,
            .off-canvas-content,
            .mobile-app-toggle .button.is-active,
            .press_release .intro,
            .press_release .press,
            .page-template-featured-page .off-canvas-content {
                border-color: <?php echo $primary_color; ?>;
            }
            .details-container p,
            .primary-title {
                border-color: <?php echo $primary_color; ?>;
            }
            .fas,
            svg.footer-logo .color,
            svg.icon {
                fill: <?php echo $primary_color; ?>;
            }
            .mobile-app-toggle .button .icon {
                stroke: <?php echo $primary_color; ?>;
            }
            h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
                color: <?php echo $primary_color; ?>;
            }
<?php
        }
        if (!empty($secondary_color)) {
// secondary color
?>
            .secondary-color,
            .button.hollow:hover,
            .home .top-bar ul .menu-item a:hover,
            .dropdown.menu .is-active > a,
            .button.clear.success,
            .press_release .intro h4,
            .details-container summary,
            .details-container .info a,
            .close-button {
                color: <?php echo $secondary_color; ?>;
            }
            .button.hollow:hover,
            .reveal header,
            .details-container details[open] .info,
            .featured-page .feat-content .dk-border,
            .button.hollow.success {
                border-color: <?php echo $secondary_color; ?>;
            }
            .accordion-line,
            .button.success, 
            .wp-block-button .success.wp-block-button__link {
                background-color: <?php echo $secondary_color; ?>;
            }
            .orbit-controls .orbit-previous:hover .icon, 
            .orbit-controls .orbit-next:hover .icon {
                fill: <?php echo $secondary_color; ?>;
            }
<?php
        }
        if (!empty($secondary_background_color)) {
        
?>
            .gallery {
                background-color: <?php echo $secondary_background_color; ?>;
            }
<?php   
    }
if (!empty($nav_bg_color)) {
        // nav background color
?>
        body:not(.page-template-front-carousel) .site-navigation.top-bar,
        .site-title-bar,
        .top-bar, 
        .top-bar ul  {
            background: <?php echo $nav_bg_color; ?>;
        }
<?php
    }
?>
<?php   if ($home_nav_bg_color) {
        // home nav background color
?>
        body.page-template-front .site-navigation.top-bar,
        body.page-template-front-carousel .site-navigation.top-bar,
        .home nav.site-navigation.top-bar.desktop-menu {
            background: <?php echo $home_nav_bg_color; ?>;
        }
<?php
    }
?>
<?php   if (!empty($nav_alt_color)) {
        // home nav text color
?>
        .page-template-front .top-bar ul .menu-item a,
        .page-template-front-carousel .top-bar ul .menu-item a {
            color: <?php echo $nav_alt_color; ?>;
        }
<?php
    }
    if (!empty($background_color)) {
?>
        .news-gallery h3,
        .news-gallery p,
        .callout-footer * {
            color: #<?php echo $background_color; ?>
        }
<?php
    }
        // END cleanup
        $css = ob_get_clean();
        return $css;
    }
endif;


/**
 * Get title bar responsive toggle attribute
 */

if (!function_exists('Nacelle_title_bar_responsive_toggle')) :
    function Nacelle_title_bar_responsive_toggle()
    {
        if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') {
            echo 'data-responsive-toggle="mobile-menu"';
        }
    }
endif;

/**
 * Custom markup for Wordpress gallery
 */
if (!function_exists('Nacelle_gallery')) :
    function Nacelle_gallery($attr)
    {
        $post = get_post();
        static $instance = 0;
        $instance++;

        if (!empty($attr['ids'])) {
            // 'ids' is explicitly ordered, unless you specify otherwise.
            if (empty($attr['orderby'])) {
                $attr['orderby'] = 'post__in';
            }
            $attr['include'] = $attr['ids'];
        }

        // Allow plugins/themes to override the default gallery template.
        $output = apply_filters('post_gallery', '', $attr, $instance);
        if ($output != '') {
            return $output;
        }

        // Let's make sure it looks like a valid orderby statement
        if (isset($attr['orderby'])) {
            $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
            if (!$attr['orderby']) {
                unset($attr['orderby']);
            }
        }

        $atts = shortcode_atts(array(
            'order'         => 'ASC',
            'orderby'       => 'menu_order ID',
            'id'            => $post ? $post->ID : 0,
            'itemtag'       => 'figure',
            'icontag'       => 'div',
            'captiontag'    => 'figcaption',
            'columns-small' => 2, // set default columns for small screen
            'columns-medium' => 4, // set default columns for medium screen
            'columns'       => 3, // set default columns for large screen (3 = wordpress default)
            'size'          => 'thumbnail',
            'include'       => '',
            'exclude'       => ''
        ), $attr, 'gallery');

        $id = intval($atts['id']);

        if (!empty($atts['include'])) {
            $_attachments = get_posts(array('include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby']));

            $attachments = array();
            foreach ($_attachments as $key => $val) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        } elseif (!empty($atts['exclude'])) {
            $attachments = get_children(array('post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby']));
        } else {
            $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby']));
        }

        if (empty($attachments)) {
            return '';
        }

        if (is_feed()) {
            $output = "\n";
            foreach ($attachments as $att_id => $attachment) {
                $output .= wp_get_attachment_link($att_id, $atts['size'], true) . "\n";
            }
            return $output;
        }

        $item_tag = tag_escape($atts['itemtag']);
        $caption_tag = tag_escape($atts['captiontag']);
        $icon_tag = tag_escape($atts['icontag']);
        $valid_tags = wp_kses_allowed_html('post');

        if (!isset($valid_tags[$item_tag])) {
            $item_tag = 'figure';
        }
        if (!isset($valid_tags[$caption_tag])) {
            $caption_tag = 'figcaption';
        }
        if (!isset($valid_tags[$icon_tag])) {
            $icon_tag = 'div';
        }

        $columns = intval($atts['columns']);
        $columns_small = intval($atts['columns-small']);
        $columns_medium = intval($atts['columns-medium']);
        $selector = "gallery-{$instance}";
        $size_class = sanitize_html_class($atts['size']);

        // Edit this line to modify the default number of grid columns for the small and medium sizes. The large size is passed in the WordPress gallery settings.
        $output = "<div id='$selector' class='fp-gallery galleryid-{$id} gallery-size-{$size_class} grid-x grid-margin-x small-up-{$columns_small} medium-up-{$columns_medium} large-up-{$columns}'>";

        foreach ($attachments as $id => $attachment) {

            // Check if destination is file, nothing or attachment page.
            if (isset($attr['link']) && $attr['link'] == 'file') {
                $link = wp_get_attachment_link($id, $size_class, false, false, false, array('class' => '', 'id' => "imageid-$id"));

                // Edit this line to implement your html params in <a> tag with use a custom lightbox plugin.
                $link = str_replace('<a href', '<a class="thumbnail fp-gallery-lightbox" data-gall="fp-gallery-' . $post->ID . '" data-title="' . wptexturize($attachment->post_excerpt) . '" title="' . wptexturize($attachment->post_excerpt) . '" href', $link);
            } elseif (isset($attr['link']) && $attr['link'] == 'none') {
                $link = wp_get_attachment_image($id, $size_class, false, array('class' => "thumbnail attachment-$size_class size-$size_class", 'id' => "imageid-$id"));
            } else {
                $link = wp_get_attachment_link($id, $size_class, true, false, false, array('class' => '', 'id' => "imageid-$id"));
                $link = str_replace('<a href', '<a class="thumbnail" title="' . wptexturize($attachment->post_excerpt) . '" href', $link);
            }

            $image_meta  = wp_get_attachment_metadata($id);
            $orientation = '';
            if (isset($image_meta['height'], $image_meta['width'])) {
                $orientation = ($image_meta['height'] > $image_meta['width']) ? 'portrait' : 'landscape';
            }
            $output .= "<{$item_tag} class='fp-gallery-item cell'>";
            $output .= "
		        <{$icon_tag} class='fp-gallery-icon {$orientation}'>
		            $link
		        </{$icon_tag}>";

            // Uncomment if you wish to display captions inline on gallery.
            /*
            if ( $caption_tag && trim($attachment->post_excerpt) ) {
                $output .= "
                    <{$caption_tag} class='wp-caption-text gallery-caption'>
                    " . wptexturize($attachment->post_excerpt) . "
                    </{$caption_tag}>";
            }
            */

            $output .= "</{$item_tag}>";
        }
        $output .= "</div>\n";

        return $output;
    }
    add_shortcode('gallery', 'Nacelle_gallery');
endif;
