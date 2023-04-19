<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 * TODO: archive page's top two images need to NOT be lazy loaded (remove the loading="lazy" attribute)
 */

namespace WP_Rig\WP_Rig;

get_header();
wp_rig()->print_styles( 'wp-rig-archive_press' );

define('SITE', "$_SERVER[HTTP_HOST]");
$nacelle_class = "";
if(SITE === 'www.nacellecompany.com') {
	$nacelle_class = ' nacelle-site';
}
$queried_obj    = get_queried_object()->name;
$main_class = 'site-main archive-main' . $nacelle_class;
get_template_part( 'template-parts/header/page-header_press' );
?>
	<main id="primary" class="<?php echo esc_html( $main_class ); ?>">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
				// PRESS: /template-parts/content/entry.php
			}
			wp_rig()->print_styles( 'wp-rig-pagination-archive' );
			wp_rig()->display_pagination_archive( $queried_obj );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main>
<?php
get_sidebar();
get_footer();
