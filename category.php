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

wp_rig()->print_styles( 'wp-rig-content' );

// Globals
$queried_obj = get_queried_object();
$obj_slug    = $queried_obj->slug;

?>
<!-- #category.php -->
	<main id="primary" class="site-main site-main__catalog">
		<?php
		if ( have_posts() ) {

			get_template_part( 'template-parts/content/page_header' );

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
wp_rig()->print_styles( 'wp-rig-pagination' );                         // Pagination for subcategories.
get_template_part( 'template-parts/content/pagination' );
get_footer();
