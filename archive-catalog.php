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

$current_post_type = get_post_type();

wp_rig()->print_styles( 'wp-rig-catalog-categories' );

$main_class = 'site-main site-main__catalog';
get_template_part( 'template-parts/header/page-header_catalog' );
?>
	<main id="primary" class="<?php echo esc_html( $main_class ); ?>">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry_archive_catalog' );
			}
			wp_rig()->print_styles( 'wp-rig-pagination-archive' );
			wp_rig()->display_pagination_archive( $obj_slug );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_footer();
