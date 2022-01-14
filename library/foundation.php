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
 **/
if (!function_exists('Nacelle_custom_colors')) : function Nacelle_custom_colors()
    {
        ob_start();
        // custom color variables
        $primary_color = get_theme_mod('primary_color', '');
        $secondary_color = get_theme_mod('secondary_color', '');
        $bk_color = get_theme_mod('bk_color', '');
        $secondary_bk_color = get_theme_mod('secondary_bk_color', '');
        $txt_color = get_theme_mod('txt_color', '');
        $secondary_txt_color = get_theme_mod('secondary_txt_color', '');
        $nav_bk_color = get_theme_mod('nav_bk_color', '');
        $nav_bk_secondary_color = get_theme_mod('nav_bk_secondary_color', '');
        $nav_txt_color = get_theme_mod('nav_txt_color', '');
        $nav_txt_secondary_color = get_theme_mod('nav_txt_secondary_color', '');
        $white_color = get_theme_mod('white_color', '');
        echo ':root {';
        if (!empty($primary_color)) {
            echo '--primary-color:' . $primary_color . ';';
        }
        if (!empty($secondary_color)) {
            echo '--secondary-color:' . $secondary_color . ';';
        }
        if (!empty($bk_color)) {
            echo '--bk-color:' . $bk_color . ';';
        }
        if (!empty($secondary_bk_color)) {
            echo '--secondary-bk-color:' . $secondary_bk_color . ';';
        }
        if (!empty($txt_color)) {
            echo '--txt-color:' . $txt_color . ';';
        }
        if (!empty($secondary_txt_color)) {
            echo '--secondary-txt-color:' . $secondary_txt_color . ';';
        }
        if (!empty($nav_bk_color)) {
            echo '--nav-bk-color:' . $nav_bk_color . ';';
        }
        if (!empty($nav_bk_secondary_color)) {
            echo '--nav-bk-secondary-color:' . $nav_bk_secondary_color . ';';
        }
        if (!empty($nav_txt_secondary_color)) {
            echo '--nav-txt-color:' . $nav_txt_color . ';';
        }
        if (!empty($nav_txt_secondary_color)) {
            echo '--nav-txt-secondary-color:' . $nav_txt_secondary_color . ';';
        }
        if (!empty($white_color)) {
            echo '--white-color:' . $white_color . ';';
        }
        echo '}'; // :root close 
?>
        .accordion-content .title{color:var(--primary-color)}.breadcrumbs a{color:var(--primary-color)}.button.hollow{color:var(--primary-color)}.catalog-crew .title{color:var(--primary-color)}.entry-content .social a.nav-link{color:var(--primary-color)}.flickity-button.top-meta .title{color:var(--primary-color)}.footer-grid p{color:var(--primary-color)}.h1{color:var(--primary-color)}.h2{color:var(--primary-color)}.h3{color:var(--primary-color)}.h4{color:var(--primary-color)}.h5{color:var(--primary-color)}.h6{color:var(--primary-color)}.mobile-app-toggle .button{color:var(--primary-color)}.primary-color{color:var(--primary-color)}.primary-title .entry-title{color:var(--primary-color)}.search-results .entry-title.subheader{color:var(--primary-color)}.subheader{color:var(--primary-color)}a{color:var(--primary-color)}footer .social .button{color:var(--primary-color)}h1{color:var(--primary-color)}h2{color:var(--primary-color)}h3{color:var(--primary-color)}h4{color:var(--primary-color)}h5{color:var(--primary-color)}h6{color:var(--primary-color)}main a:not(.alt):not(.button){color:var(--primary-color)}.lead{color:var(--primary-color)}.accordion-content{background-color:var(--primary-color)}.archive .featured-hero{background-color:var(--primary-color)}.button.primary{background-color:var(--primary-color)}.button:not(.hollow,.clear){background-color:var(--primary-color)}.callout-footer{background-color:var(--primary-color)}.carousel-full--press figcaption{background-color:var(--primary-color)}.carousel-press figcaption{background-color:var(--primary-color)}.details-container .info{background-color:var(--primary-color)}.details-container details[open] .info{background-color:var(--primary-color)}.flickity-page-dots .dot{background-color:var(--primary-color)}.instagram-tab{background-color:var(--primary-color)}.press-row:hover .press-row-content{background-color:var(--primary-color)}.primary{background-color:var(--primary-color)}.searchandfilter input[type=submit]{background-color:var(--primary-color)}.tabs-products .tabs-title.is-active{background-color:var(--primary-color)}.tabs-title>a:focus{background-color:var(--primary-color)}.tabs-title>a[aria-selected=true]{background-color:var(--primary-color)}.to-top{background-color:var(--primary-color)}.wp-block-button .primary.wp-block-button__link{background-color:var(--primary-color)}body.page-template-featured-page{background-color:var(--primary-color)}input[type=submit]{background-color:var(--primary-color)}.team-info{background-color:var(--primary-color)}.button.hollow{border-color:var(--primary-color)}.category-intro{border-color:var(--primary-color)}.details-container p{border-color:var(--primary-color)}.instagram-tab{border-color:var(--primary-color)}.off-canvas-content{border-color:var(--primary-color)}.page-template-featured-page .off-canvas-content{border-color:var(--primary-color)}.press_release .intro{border-color:var(--primary-color)}.press_release .press{border-color:var(--primary-color)}.primary-title{border-color:var(--primary-color)}.search-results .entry-title.subheader{border-color:var(--primary-color)}.fas{fill:var(--primary-color)}.flickity-button-icon{fill:var(--primary-color)}.press-row svg.icon.alt{fill:var(--primary-color)}svg.footer-logo .color{fill:var(--primary-color)}svg.icon{fill:var(--primary-color)}.tabs-products{border-bottom-color:var(--primary-color)}.accordion-title{color:var(--secondary-color)}.button.clear.success{color:var(--secondary-color)}.button.hollow:hover{color:var(--secondary-color)}.close-button{color:var(--secondary-color)}.current-menu-item>a{color:var(--secondary-color)}.current-menu-parent>a{color:var(--secondary-color)}.details-container .info a{color:var(--secondary-color)}.details-container summary{color:var(--secondary-color)}.menu>li:hover>a{color:var(--secondary-color)}.press_release .intro{color:var(--secondary-color)}.secondary-color{color:var(--secondary-color)}blockquote:before{color:var(--secondary-color)}time{color:var(--secondary-color)}.dropdown.menu .is-active>a{color:var(--secondary-color)!important}.is-submenu-item:hover>a{color:var(--secondary-color)!important}.button.hollow.success{color:var(--secondary-color)!important}.button.hollow:hover{color:var(--secondary-color)!important}.carousel .flickity-page-dots .dot{color:var(--secondary-color)!important}.details-container details[open] .info{color:var(--secondary-color)!important}.featured-page .feat-content .dk-border{color:var(--secondary-color)!important}.feed-container{color:var(--secondary-color)!important}.post-navigation{color:var(--secondary-color)!important}.reveal header{color:var(--secondary-color)!important}blockquote{color:var(--secondary-color)!important}hr{color:var(--secondary-color)!important}.accordion-line{background-color:var(--secondary-color)}.button.success:not(.clear){background-color:var(--secondary-color)}.button:hover{background-color:var(--secondary-color)}.field-wrap input[type=button]{background-color:var(--secondary-color)}.flickity-page-dots .dot.is-selected{background-color:var(--secondary-color)}.off-canvas-content .searchandfilter input[type=submit]{background-color:var(--secondary-color)}.secondary-bkgnd{background-color:var(--secondary-color)}.wp-block-button .success.wp-block-button__link{background-color:var(--secondary-color)}.field-wrap input[type=button]:hover{background-color:var(--secondary-color);filter:saturate(1.5)}.off-canvas-content .searchandfilter input[type=submit]:hover{background-color:var(--secondary-color);filter:saturate(1.5)}.icon.down-angle{fill:var(--secondary-color)}.pag-img-wrapper:hover{background:0 0;outline:1px solid var(--secondary-color)}.accordion{background-color:var(--bk-color)}.accordion-title:focus{background-color:var(--bk-color)}.accordion-title:hover{background-color:var(--bk-color)}.accordion-title:visited{background-color:var(--bk-color)}.featured-page .feat-content{background-color:var(--bk-color)}.page-template-front-grid .home-overlay.bottom{background-color:var(--bk-color)}.reveal{background-color:var(--bk-color)}.sidebar{background-color:var(--bk-color)}body{background-color:var(--bk-color)}.accordion-content p{color:var(--bk-color)}.archive .featured-hero h1:not(.entry-title){color:var(--bk-color)}.button.hollow.success{color:var(--bk-color)}.button.success:hover{color:var(--bk-color)}.button:not(.clear):not(.hollow){color:var(--bk-color)}.carousel-press figcaption h3{color:var(--bk-color)}.contact.tabs-title>a[aria-selected=true]>h3{color:var(--bk-color)}.details-container details .on-sale{color:var(--bk-color)}.details-container details[open] .info p{color:var(--bk-color)}.field-wrap input[type=button]:hover{color:var(--bk-color)}.macro-cat-cards .callout-footer{color:var(--bk-color)}.macro-cat-cards .callout-footer *{color:var(--bk-color)}.off-canvas-content .searchandfilter input[type=submit]:hover{color:var(--bk-color)}.press-row:hover .press-row-content-header{color:var(--bk-color)}.press-row:hover .press-row-content-time{color:var(--bk-color)}.synopsis.reveal blockquote p{color:var(--bk-color)}.tabs-title>a:focus>h3{color:var(--bk-color)}.wp-block-button .success.wp-block-button__link{color:var(--bk-color)}.bk-txt-color *{color:var(--bk-color)!important}.callout-synopsis a{color:var(--bk-color)!important}.contact h1{color:var(--bk-color)!important}.press-row:hover svg.icon.alt{fill:var(--bk-color)}svg.icon.alt{fill:var(--bk-color)}.gallery{background-color:var(--secondary-bk-color)}.carousel-full--news h3{color:var(--txt-color)}.carousel-full--news p{color:var(--txt-color)}.carousel-full--press h3{color:var(--txt-color)}.carousel-full--press p{color:var(--txt-color)}.instagram-title h3{color:var(--txt-color)}blockquote{color:var(--txt-color)}blockquote p{color:var(--txt-color)}body{color:var(--txt-color)}p{color:var(--txt-color)}@media screen and (max-width:39.9375em){.full-hero-video--content .media-object p{color:var(--txt-color)}}.accordion-content .sm-title{color:var(--secondary-txt-color)}@media print,screen and (min-width:40em){.full-hero-video--content .media-object p{color:var(--secondary-txt-color)}}.menu .is-active>a,.related{background:var(--nav-bk-color)}.off-canvas{background:var(--nav-bk-color)}.pag-img-wrapper{background:var(--nav-bk-color)}.search-container:hover{background:var(--nav-bk-color)}.site-header:not(.transparent-header){background:var(--nav-bk-color)}.submenu>.menu-item{background:var(--nav-bk-color)}.title-bar{background:var(--nav-bk-color)}.top-bar{background:var(--nav-bk-color)}footer.footer{background:var(--nav-bk-color)}title-bar{background:var(--nav-bk-color)}.pagination a{color:var(--nav-txt-color)}.pagination h4{color:var(--nav-txt-color)}.pagination svg.icon{color:var(--nav-txt-color)}.site-header:not(.transparent-header) .menu>.menu-item a{color:var(--nav-txt-color)}footer.pagination svg.icon{fill:var(--nav-txt-color)}.transparent-header .menu-item a{color:var(--nav-txt-secondary-color)}.menu-icon-c::after{box-shadow:0 7px 0 var(--secondary-color),0 14px 0 var(--secondary-color);background-color:var(--secondary-color)}.carousel-full--overlay h3{color:var(--white-color)}.carousel-full--overlay p{color:var(--white-color)}.mobile-app-toggle .button:hover{color:var(--white-color)}label{color:var(--white-color)}.mobile-app-toggle .button:hover .icon{fill:var(--white-color)}
<?php
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
