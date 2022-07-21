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

get_header();


// Globals.
$queried_obj = get_queried_object();
$obj_slug    = $queried_obj->slug;
$sf_current_query = $searchandfilter->get( 46681 )->current_query();
?>
	<main id="primary" class="site-main site-main__catalog">
		<?php
		if ( have_posts() ) {
			get_template_part( 'template-parts/content/page_header' );
			$count_cat = 0;
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry', get_post_type() );
				$count_cat++;
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		// Pagination.
		wp_rig()->print_styles( 'wp-rig-pagination-archive' );
		get_template_part( 'template-parts/content/pagination' );
		?>
	</main>
<?php
get_footer();
