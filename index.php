<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

$current_post_type = get_post_type();

if ( is_post_type_archive() ) {
	$current_post_type = get_post_type();
	$post_class        = ' archive-main archive__' . $current_post_type;
} else {
	$post_class = '';
}
// printVar( $current_post_type );
get_template_part( 'template-parts/content/page_header' ); // ? PAGE HEADER

?>
	<main id="primary" class="site-main<?php echo esc_html( $post_class ); ?>">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			if ( ! is_singular() ) {
				wp_rig()->print_styles( 'wp-rig-pagination' );
				get_template_part( 'template-parts/content/pagination' );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
