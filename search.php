<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

if ( is_post_type_archive() ) {
	$queried_object    = get_queried_object();
	$category_slug     = $queried_object->slug;
}

$current_post_type = get_post_type();
$post_class        = ' archive-main archive__' . $current_post_type;
get_template_part( 'template-parts/content/page_header' ); // ? PAGE HEADER
?>
	<main id="search-results" class="site-main<?php echo esc_html( $post_class ); ?>">
		<?php
		if ( have_posts() ) :
			wp_rig()->print_styles( 'wp-rig-post-grid' );
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/entry', get_post_type() );
			endwhile;
			wp_rig()->print_styles( 'wp-rig-pagination' );                         // Pagination for subcategories.
			wp_rig()->display_pagination_archive( $category_slug );
		else :
			get_template_part( 'template-parts/content/error' );
		endif;
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
