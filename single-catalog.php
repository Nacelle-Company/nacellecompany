<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-single-catalog', 'wp-rig-accordion' );

?>
<main id="primary" class="site-main">
	<?php

	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/catalog/catalog_entry-new', get_post_type() );

	}
	?>
</main><!-- #primary -->
<?php
get_footer();
