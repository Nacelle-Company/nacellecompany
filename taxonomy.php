<?php
/**
 * The taxonomy template file
 *
 * For talent, producers, directors, writers ext.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

?>
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) {
			get_template_part( 'template-parts/content/page_header' );
			get_template_part( 'template-parts/catalog/catalog-cards' );
			wp_rig()->print_styles( 'wp-rig-pagination' );                         // Pagination for subcategories.
			wp_rig()->display_pagination_archive( $category_slug );
			if ( ! is_singular() ) {
				get_template_part( 'template-parts/content/pagination' );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_footer();
