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

$tax_current = $wp_query->get_queried_object();
$tax_name    = $tax_current->taxonomy;
$tax_slug    = $tax_current->slug;
$tax_args    = array(
	'post_type'     => 'catalog',
	'tax_query'     => array(
		array(
			'taxonomy' => $tax_name,
			'field'    => 'slug',
			'terms'    => $tax_slug,
		),
	),
	'orderby'       => 'title',
	'order'         => 'ASC',
	'paged'         => get_query_var( 'paged' ),
);
$tax_query = new \WP_Query( $tax_args );
$num_posts = $tax_query->found_posts;
?>
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
