<?php
/**
 * Template Name: Products
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-page-products' );
get_template_part( 'template-parts/header/page_header' );

?>
	<main id="primary" class="site-main site-main__products">
		<?php

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content/entry_products' );
		}
		?>
	</main>
<?php
get_footer();
