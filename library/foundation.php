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
            .reveal,
            .page-template-front-grid .home-overlay.bottom {
            background-color: #<?php echo $background_color; ?>;
            }
            .primary-title .entry-title,
            .details-container details .on-sale,
            .details-container details[open] .info p,
            .wp-block-button .success.wp-block-button__link,
            .button.hollow.success,
            .button.success:hover,
            .synopsis.reveal blockquote p,
            .off-canvas-content .searchandfilter input[type=submit]:hover,
            .field-wrap input[type=button]:hover,
            .tabs-products .tabs-title.is-active a,
            .carousel-press figcaption h3 {
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
            .mobile-app-toggle .button:hover,
            .page-template-front-grid .top-bar ul .menu-item a,
            .page-template-front-circles .top-bar ul .menu-item a {
            color: <?php echo $text_color; ?>;
            }

        <?php
        }
        if (!empty($primary_color)) {
            // primary color
        ?>
            a:not(.alt):not(.button),
            .primary-color,
            .accordion-content .title,
            .button.hollow,
            .footer-grid p,
            .mobile-app-toggle .button,
            .entry-content .social a.nav-link,
            .top-bar .menu-item>a {
            color: <?php echo $primary_color; ?>;
            }
            .top-meta .title,
            .button.clear.success,
            .primary-title .entry-title,
            .catalog-crew .title,
            .search-results .entry-title.subheader {
            color: <?php echo $primary_color; ?>;
            }
            .primary,
            .accordion-content,
            input[type=submit],
            body.page-template-featured-page,
            .archive .featured-hero,
            .searchandfilter input[type=submit],
            .button,
            .tabs-products .tabs-title.is-active,
            .orbit-slider .orbit-caption,
            .carousel-press figcaption {
            background-color: <?php echo $primary_color; ?>;
            }
            .to-top,
            .instagram-tab,
            .callout-footer,
            .mobile-app-toggle .button.is-active:hover,
            .details-container .info,
            .details-container details[open] .info,
            .page-template-front-grid .home-overlay.top {
            background-color: <?php echo $primary_color; ?>;
            }
            .button.primary,
            .wp-block-button .primary.wp-block-button__link {
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
            .primary-title,
            .search-results .entry-title.subheader {
            border-color: <?php echo $primary_color; ?>;
            }
            .fas,
            svg.footer-logo .color,
            svg.icon,
            .flickity-button-icon {
            fill: <?php echo $primary_color; ?>;
            }
            .mobile-app-toggle .button .icon {
            stroke: <?php echo $primary_color; ?>;
            }
            h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
            color: <?php echo $primary_color; ?>;
            }
            .tabs-products {
            border-bottom-color: <?php echo $primary_color; ?>;
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
            .press_release .intro,
            .details-container summary,
            .details-container .info a,
            .close-button {
            color: <?php echo $secondary_color; ?>;
            }
            .button.hollow:hover,
            .reveal header,
            .details-container details[open] .info,
            .featured-page .feat-content .dk-border,
            .button.hollow.success,
            .feed-container,
            hr,
            .post-navigation,
            .news .flickity-page-dots .dot {
            border-color: <?php echo $secondary_color; ?>;
            }

            .secondary-bkgnd,
            .accordion-line,
            .button.success:not(.clear),
            .wp-block-button .success.wp-block-button__link,
            .off-canvas-content .searchandfilter input[type=submit],
            .field-wrap input[type=button],
            .button:hover,
            .flickity-page-dots .dot.is-selected {
            background-color: <?php echo $secondary_color; ?>;
            }
            .off-canvas-content .searchandfilter input[type=submit]:hover,
            .field-wrap input[type=button]:hover {
            background-color: <?php echo $secondary_color; ?>;
            filter: saturate(1.5);
            }
            .orbit-controls .orbit-previous:hover .icon,
            .orbit-controls .orbit-next:hover .icon,
            .icon.down-angle {
            fill: <?php echo $secondary_color; ?>;
            }
            .pag-img-wrapper:hover {
            background: transparent;
            outline: 1px solid <?php echo $secondary_color; ?>;
            }
            .menu-icon::after {
            background-color: <?php echo $secondary_color; ?>;
            box-shadow: 0 7px 0 <?php echo $secondary_color; ?>, 0 14px 0 <?php echo $secondary_color; ?>;
            }
            .accordion-title {
            color: <?php echo $secondary_color; ?>;
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
            body:not(.page-template-front-carousel):not(.page-template-front-circles):not(.page-template-front-grid) .site-navigation.top-bar,
            .site-title-bar,
            .top-bar ul,
            .pag-img-wrapper,
            body:not(.page-template-front-carousel) .search-container,
            .off-canvas {
            background: <?php echo $nav_bg_color; ?>;
            }
            footer.footer {
            background: <?php echo $nav_bg_color; ?>;
            }
        <?php
        }
        ?>
        <?php if ($home_nav_bg_color) {
            // home nav background color
        ?>
            body.page-template-front .site-navigation.top-bar,
            body.page-template-front-carousel .site-navigation.top-bar,
            .home nav.site-navigation.top-bar.desktop-menu,
            body.page-template-front-carousel .search-container.desktop {
            background: <?php echo $home_nav_bg_color; ?>;
            }
        <?php
        }
        ?>
        <?php if (!empty($nav_alt_color)) {
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
            .callout-footer a,
            .callout-footer *,
            .button,
            .button:hover {
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

/*
 * include taxonomy links in wysiwyg
 * https://christinacreativedesign.com/blog/add-custom-post-types-and-taxonomy-terms-to-wordpress-link-selection/
 * https://gist.githubusercontent.com/carasmo/133d33a98ee66171df9132ec0f2168c7/raw/ceae38ed031c5031ef2b720b74109f3de9c8ac0e/for-include-or-functions.php
 */
add_filter('wp_link_query', 'Nacelle_add_custom_post_type_archive_link', 10, 2);
/**
 * Add Custom Post Type archive to WordPress search link query
 * Author: https://github.com/mthchz/editor-archive-post-link/blob/master/editor-archive-post-link.php
 */
function Nacelle_add_custom_post_type_archive_link($results, $query)
{

    if ($query['offset'] > 0) : // Add only on the first result page
        return $results;
    endif;

    $match = '/' . str_remove_accents($query['s']) . '/i';
    foreach ($query['post_type'] as $post_type) :
        $pt_archive_link = get_post_type_archive_link($post_type);
        $pt_obj = get_post_type_object($post_type);
        if ($pt_archive_link !== false && $pt_obj->has_archive !== false) : // Add only post type with 'has_archive'
            if (preg_match($match, str_remove_accents($pt_obj->labels->name)) > 0) :
                array_unshift($results, array(
                    'ID' => $pt_obj->has_archive,
                    'title' => trim(esc_html(strip_tags($pt_obj->labels->name))),
                    'permalink' => $pt_archive_link,
                    'info' => 'Archive',
                ));
            endif;
        endif; //end post type archive links in link_query
    endforeach;

    return $results;
}


//* Remove accents
function str_remove_accents($str, $charset = 'utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
    $str = preg_replace('#&[^;]+;#', '', $str);
    return $str;
}


add_filter('wp_link_query', 'cab_wp_link_query_term_linking', 99, 2);
/**
 * Add Term links to WordPress search link query
 * Modified from: https://gist.github.com/emzo/6f86f50199c09d2f4ce6863401a307fb
 * Ref: https://codex.wordpress.org/Function_Reference/get_taxonomies
 *      https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
 *      https://developer.wordpress.org/reference/functions/get_terms/
 *      http://php.net/manual/en/function.array-diff.php
 */
function cab_wp_link_query_term_linking($results, $query)
{

    //* Query taxonomy terms.
    $taxonomies = get_taxonomies(array(
        'show_in_nav_menus' => true
    ), 'names');

    //* Add to the array any taxonomies you do not want 
    $exclude = array(
        'media_category',
        'tag',
    );

    $taxonomies = array_diff($taxonomies, $exclude);

    //* Get the terms of the taxonomies
    $terms = get_terms($taxonomies, array(
        'name__like' => $query['s'],
        'number'     => 20,
        'hide_empty' => true,
    ));

    //* Terms
    if (!empty($terms) && !is_wp_error($terms)) :
        foreach ($terms as $term) :
            $results[] = array(
                'ID'        => 'term-' . $term->term_id,
                'title'     => html_entity_decode($term->name, ENT_QUOTES, get_bloginfo('charset')),
                'permalink' => get_term_link(intval($term->term_id), $term->taxonomy),
                'info'      => get_taxonomy($term->taxonomy)->labels->singular_name,
            );
        endforeach;
    endif;

    return $results;
}
