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

?>
	<main id="primary" class="site-main site-main__catalog">
		<?php
		if ( have_posts() ) {

			get_template_part( 'template-parts/header/page_header' );

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			wp_rig()->print_styles( 'wp-rig-pagination-archive' );
			wp_rig()->display_pagination_archive( $obj_slug );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_footer();
