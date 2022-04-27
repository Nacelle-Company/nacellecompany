<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$queried_obj = get_queried_object();
$obj_slug    = $queried_obj->post_type;
$the_post_type = get_post_type_object( get_post_type( $queried_obj ) );
$post_type_name = $the_post_type->labels->singular_name;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );
get_template_part( 'template-parts/content/page_header' );
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content/entry', get_post_type() );
		}
		?>
		<a class="button button-return" href="<?php echo get_post_type_archive_link( $obj_slug ); ?>">
			<svg class="icon" width="7" height="11" xmlns="http://www.w3.org/2000/svg">
				<path d="M6.01.972v8.652c0 .599-.725.899-1.148.475L.535 5.773a.673.673 0 010-.95L4.862.495A.672.672 0 016.01.972z" fill="#000" fill-rule="nonzero" />
			</svg>
			Return to <?php echo esc_html( $post_type_name ); ?> Archive
		</a>
	</main>
<?php
get_sidebar();
get_footer();
