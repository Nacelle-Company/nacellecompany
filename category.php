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

global $queried_obj;
global $obj_slug;

$category_id    = $queried_obj->term_id;
$children       = get_term_children( $category_id, 'category' );
// $obj_slug  = $queried_obj->slug;
$cat_args       = array(
	'post_type'     => 'catalog',
	'category_name' => $obj_slug,
	'orderby'       => 'title',
	'order'         => 'ASC',
	'paged'         => get_query_var( 'paged' ),
);
$cat_query      = new \WP_Query( $cat_args );
$num_posts      = $cat_query->found_posts;

?>
<!-- #category.php -->
<main id="primary" class="site-main">
	<?php
	/**
	 * Page title.
	 *
	 * @category If parent category display title only otherwise display title + offcanvas toggle.
	 */
	get_template_part( 'template-parts/content/page_header' );

	if ( have_posts() ) :
		/**
		 * Category content.
		 */
		if ( 'distribution' === $obj_slug ) {                                 // If category slug 'distribution'.
			wp_rig()->print_styles( 'wp-rig-category' );
			get_template_part( 'template-parts/category/distribution' );
			wp_rig()->print_styles( 'wp-rig-extra_content' );
			wp_rig()->display_extra_content();
		} elseif ( 'production' === $obj_slug ) {                             // If category slug 'production'.
			wp_rig()->print_styles( 'wp-rig-category' );
			get_template_part( 'template-parts/category/production' );
			wp_rig()->print_styles( 'wp-rig-extra_content' );
			wp_rig()->display_extra_content();
		} elseif ( is_category( $obj_slug ) ) {                               // If not distribution or production category.
			get_template_part( 'template-parts/catalog/catalog-cards' );
			wp_rig()->print_styles( 'wp-rig-pagination' );                         // Pagination for subcategories.
			wp_rig()->display_pagination_archive( $obj_slug );
		} elseif ( is_post_type_archive() ) {
			get_template_part( 'template-parts/content/page_header' );
			get_template_part( 'template-parts/content/entry', get_post_type() );
			get_template_part( 'template-parts/content/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		endif;
	?>

</main><!-- #primary -->
<?php
get_footer();
