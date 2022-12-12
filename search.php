<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

$sf_current_query = $searchandfilter->get( 46579 )->current_query();

// wp_rig()->print_styles( 'wp-rig-archive' );
wp_rig()->print_styles( 'wp-rig-catalog-categories' );
if(get_search_query()) :

	get_template_part( 'template-parts/header/page-header_catalog' );
else :
	get_template_part( 'template-parts/header/page-header' );
endif;

?>
	<main id="primary" class="site-main site-main__catalog">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry_archive_catalog' );
				// get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			wp_rig()->print_styles( 'wp-rig-pagination-archive' );
			get_template_part( 'template-parts/nav/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
// get_sidebar();
wp_rig()->display_secondary_sidebar();
get_footer();
