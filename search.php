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

wp_rig()->print_styles( 'wp-rig-archive' );
get_template_part( 'template-parts/content/page_header' );

?>
	<main id="primary" class="site-main archive-main">
		<?php
		if ( have_posts() ) {


			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry' );
			}
			wp_rig()->print_styles( 'wp-rig-pagination-archive' );
			get_template_part( 'template-parts/content/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_sidebar();
get_footer();
