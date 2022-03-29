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

wp_rig()->print_styles( 'wp-rig-content' );

?>
	<main id="primary" class="site-main">
		<?php
		// ? The catalog-search form id= 46515.
		// ? The search-form-only form id= 32392.
		global $searchandfilter;
		if ( have_posts() && $searchandfilter->get( 46515 ) ) {
			wp_rig()->print_styles( 'wp-rig-subcategory', 'wp-rig-offcanvas' );
			get_template_part( 'template-parts/content/page_header' );
			echo '<div class="subcategory-wrapper">';
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/category/subcategory' );
			}
			echo '</div>';
		} elseif ( have_posts() ) {
			get_template_part( 'template-parts/content/page_header' );
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			get_template_part( 'template-parts/content/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
// get_sidebar();
get_footer();
