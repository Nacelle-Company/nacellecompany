<?php
/**
 * The template for displaying catalog search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

			get_template_part( 'template-parts/header/page-header_catalog' );

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry_archive_catalog' );
			}

			get_template_part( 'template-parts/nav/pagination' );
		} else {
			get_template_part( 'template-parts/header/page-header_catalog' );
			get_template_part( 'template-parts/content/error', 'catalog' );
		}
		?>
	</main>
<?php
get_footer();
