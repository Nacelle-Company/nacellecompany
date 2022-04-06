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
		// START testing.
		// ? The catalog-search form id= 46515.
		// ? The search-form-only form id= 32392.
		global $searchandfilter;
		// Access the Active Query Object.
		$sf_current_query = $searchandfilter->get( 46515 )->current_query();
		// Get a Single Field by Field Name.
		echo $sf_current_query->get_field_string( '_sft_category' );
		// Get labels for Multiple Fields by Field Name.
		$args = array(
			'str'                   => '%2$s',
			'delim'                 => array( ', ', ' - ' ),
			'field_delim'               => ', ',
			'show_all_if_empty'         => false,
		);

		echo $sf_current_query->get_fields_html(
			array( '_sft_sfdc_genre', 'search' ),
			$args
		);
		printVar( $sf_current_query );

		// END testing.
		// && $searchandfilter->get( 46515 )
		if ( have_posts() ) {
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
