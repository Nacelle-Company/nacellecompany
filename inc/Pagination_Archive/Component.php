<?php
/**
 * WP_Rig\WP_Rig\Pagination_Archive\Pagination_Archive class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Pagination_Archive;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;

/**
 * Class for displaying archive pagination.
 *
 * Exposes template tags:
 * * `wp_rig()->the_comments( array $args = array() )`
 *
 * @link https://wordpress.org/plugins/amp/
 */
class Component implements Component_Interface, Templating_Component_Interface {

    /**
     * Gets the unique identifier for the theme component.
     *
     * @return string Component slug.
     */
    public function get_slug() : string {
        return 'pagination_archive';
    }

    /**
     * Adds the action and filter hooks to integrate with WordPress.
     */
    public function initialize() {
    }

    /**
     * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
     *
     * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
     *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
     *               adding support for further arguments in the future.
     */
    public function template_tags() : array {
        return array(
            'display_pagination_archive' => array( $this, 'display_pagination_archive' ),
        );
    }
    /**
     * Display Tax Terms
     *
     * @param obj_slug $obj_slug Get category slug.
     */
    public function display_pagination_archive( $obj_slug ) {
        global $wp_query;
        $big = 9999999; // Need an unlikely integer.
        ?>
        <nav class="navigation pagination" aria-label="Page navigation">
            <h2 class="screen-reader-text"><?php echo esc_html( $obj_slug ); ?> category navigation</h2>
            <?php
            $prev_icon = '<svg width="37" height="19" class="icon" xmlns="http://www.w3.org/2000/svg"><path d="M37 9.25a2.31 2.31 0 0 1-2.312 2.312H11.572v5.202a1.738 1.738 0 0 1-2.916 1.271L.554 10.522a1.734 1.734 0 0 1 0-2.543l8.1-7.515A1.738 1.738 0 0 1 10.53.144c.63.275 1.042.904 1.042 1.525v5.268h23.116A2.31 2.31 0 0 1 37 9.25Z" fill="#000" fill-rule="nonzero"/></svg>';
            echo wp_kses(
                paginate_links(
                    array(
                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, get_query_var( 'paged' ) ),
                        'total'     => $wp_query->max_num_pages,
                        'prev_text' => __( '&larr;', 'wp-rig' ),
                        'next_text' => __( '&rarr;', 'wp-rig' ),
                    )
                ),
                'post'
            );
            ?>
        </nav>
        <?php
    }
}
