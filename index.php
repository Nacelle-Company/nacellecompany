<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

// Globals.
$current_post_type = get_post_type();
$queried_obj       = get_queried_object();
$queried_id        = get_queried_object_id();
$obj_slug          = $queried_obj->name;

get_template_part( 'template-parts/content/page_header' ); // ? PAGE HEADER

?>
	<main id="primary" class="site-main<?php echo esc_html( $post_class ); ?>">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			if ( ! is_singular() ) {
				wp_rig()->print_styles( 'wp-rig-pagination-archive' );                         // Pagination for subcategories.
				wp_rig()->display_pagination_archive( $obj_slug );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_sidebar();
get_footer();
