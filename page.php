<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-page' );
get_template_part( 'template-parts/header/page-header' );
$page_width = get_post_meta( get_the_ID(), 'page_width', true );

?>
	<main id="primary" class="site-main page_php <?php echo esc_html( $page_width ); ?>">
		<?php

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/entry', 'page' );
		}
		?>
	</main>
<?php
get_footer();
