<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $queried_obj;
global $obj_slug;

get_header();

wp_rig()->print_styles( 'wp-rig-archive' );

$current_post_type = get_post_type();
if ( 'news' === $current_post_type || 'press_release' === $current_post_type || 'press' === $current_post_type ) {
	$main_class = 'site-main archive-main';
} else {
	$main_class = 'site-main';
}

get_template_part( 'template-parts/content/page_header' );

?>
	<main id="primary" class="<?php echo esc_html( $main_class ); ?>">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			wp_rig()->print_styles( 'wp-rig-pagination-archive' );
			wp_rig()->display_pagination_archive( $obj_slug );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_sidebar();
get_footer();
