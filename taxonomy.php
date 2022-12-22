<?php
/**
 * The template for displaying category taxonomies.
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

wp_rig()->print_styles( 'wp-rig-catalog-taxonomies' );
get_template_part( 'template-parts/header/page', 'header_taxonomy' );
?>
	<main id="primary" class="site-main site-main__tax">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}

			get_template_part( 'template-parts/nav/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_footer();
