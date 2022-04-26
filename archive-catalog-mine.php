<?php
/**
 * The template for displaying the catalog archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $obj_slug;
$base_catalog_query = new \WP_Query( array( 'post_type' => 'catalog' ) );
$num_posts          = $base_catalog_query->found_posts;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

?>
<!-- #archive-catalog.php -->
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) {

			get_template_part( 'template-parts/content/page_header' );
			get_template_part( 'template-parts/catalog/catalog-cards' );
			wp_rig()->print_styles( 'wp-rig-pagination' );                         // Pagination for subcategories.
			wp_rig()->display_pagination_archive( $obj_slug );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_footer();
