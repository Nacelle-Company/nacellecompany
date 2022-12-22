<?php
/**
 * The template for displaying category archives.
 *
 * When active, applies to all category archives.
 * To target a specific category, rename file to category-{slug/id}.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

require('template-parts/logic/logic_search-and-filter-plugin.php');

get_header();

wp_rig()->print_styles( 'wp-rig-catalog-categories' );

?>
	<main id="primary" class="site-main site-main__catalog">

		<?php
		if ( have_posts() ) {
			$count_cat = 0;
			get_template_part( 'template-parts/header/page-header_catalog');

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry_archive_catalog' );
				$count_cat++;

			}
		} else {
			get_template_part( 'template-parts/content/error' );

		}
		wp_rig()->print_styles( 'wp-rig-pagination-archive' );
		wp_rig()->display_pagination_archive( $obj_slug );
		?>
	</main>
<?php
get_footer();
