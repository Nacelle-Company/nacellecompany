<?php
/**
 * Template Name: Front Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();
// Use grid layout if blog index is displayed.
if ( is_home() ) {
	wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-front-page' );
} else {
	wp_rig()->print_styles( 'wp-rig-content' );
}
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/hero/hero_flickity', get_post_type() );
			get_template_part( 'template-parts/content/entry', get_post_type() );
			wp_rig()->print_styles( 'wp-rig-post-grid' );
			wp_rig()->using_archive_excerpts()
			?>
			<div class="archive-main post-grid">
				<h2 class="entry-title">Latest Independent Comedy News</h2>
				<?php wp_rig()->display_post_grid( 'news', '' ); ?>
			</div>
			<?php
		}
		// get_template_part( 'template-parts/content/pagination' );
		?>
		<div>


	</main><!-- #primary -->
<?php
get_footer();
