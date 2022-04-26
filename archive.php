<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

$current_post_type = get_post_type();
if ( 'news' === $current_post_type || 'press_release' === $current_post_type ) {
	$main_class = 'site-main archive-main';
} else {
	$main_class = 'site-main';
}
$queried_obj = get_queried_object();
$queried_id  = get_queried_object_id();
$obj_slug    = $queried_obj->name;

get_template_part( 'template-parts/content/page_header' );

?>
	<main id="primary" class="<?php echo esc_html( $main_class ); ?>">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry', get_post_type() );
			}

			get_template_part( 'template-parts/content/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
