<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$post_type = get_queried_object()->post_type;

get_header();

if('press' === $post_type) {
	get_template_part( 'template-parts/header/page-header_press' );
} else {
	get_template_part( 'template-parts/header/page-header' );
}
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();
			if('press' === $post_type) {
				get_template_part( 'template-parts/content/entry_content-press' );
			} else {
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
		}
		?>
	</main>
<?php
// get_sidebar('Offcanvas Sidebar');
get_footer();
