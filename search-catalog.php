<?php
/**
 * The template for displaying catalog search results pages
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
		if ( have_posts() ) {
			wp_rig()->print_styles( 'wp-rig-subcategory', 'wp-rig-offcanvas' );
			get_template_part( 'template-parts/content/page_header' );
			?>
			<div class="subcategory-wrapper">
				<?php get_template_part( 'template-parts/category/subcategory-search' ); ?>
			</div>
			<?php
			get_template_part( 'template-parts/content/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_footer();
