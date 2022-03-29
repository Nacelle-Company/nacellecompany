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
wp_rig()->print_styles( 'wp-rig-subcategory', 'wp-rig-offcanvas' );
?>
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) {
			 $current_post = get_queried_object();

			// Check if the current post belongs to the advert post type, if not, bail
			if ( $current_post->post_type !== 'catalog' ) {
				get_template_part( 'template-parts/content/page_header' );
			}
			echo '<div class="subcategory-wrapper">';
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/category/subcategory' );
			}
			echo '</div>';
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		get_template_part( 'template-parts/content/pagination' );
		?>
	</main><!-- #primary -->
<?php
get_footer();
