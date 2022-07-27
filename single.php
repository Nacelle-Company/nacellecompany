<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$queried_obj    = get_queried_object();
$obj_slug       = $queried_obj->post_type;
$the_post_type  = get_post_type_object( get_post_type( $queried_obj ) );
$post_type_name = $the_post_type->labels->singular_name;

get_header();

get_template_part( 'template-parts/content/page_header' );
?>
    <main id="primary" class="site-main">
        <?php
        while ( have_posts() ) {
            the_post();

            get_template_part( 'template-parts/content/entry', get_post_type() );
        }
        ?>
    </main>
<?php
get_sidebar();
get_footer();
