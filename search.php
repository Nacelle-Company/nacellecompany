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
global $searchandfilter;
global $queried_object;
global $current_post_type;
global $category_slug;

$post_class        = ' archive-main archive__' . $current_post_type;
get_template_part( 'template-parts/content/page_header' ); // ? PAGE HEADER
?>
	<main id="search-results" class="site-main<?php echo esc_html( $post_class ); ?>">
		<?php
		if ( have_posts() ) :
			wp_rig()->print_styles( 'wp-rig-post-grid' );
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" class="grid-item archive-grid__item">
				<a href="<?php echo the_permalink(); ?>" class="link-absolute" aria-label="visit" title="<?php the_title(); ?>"></a>
						<?php
						get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
						get_template_part( 'template-parts/content/entry_title', get_post_type() );
						get_template_part( 'template-parts/content/entry_summary', get_post_type() );
						get_template_part( 'template-parts/content/entry_go-corner', get_post_type() );
						?>
				</article>
				<?php
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

// might need:

if ( ! is_singular() ) :
	wp_rig()->print_styles( 'wp-rig-pagination' );
	get_template_part( 'template-parts/content/pagination' );
		// if ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) {
		// the_post_navigation(
		// array(
		// 'prev_text' => '<div class="post-navigation-sub"><span class="dashicons dashicons-arrow-left"></span><span>' . esc_html__( 'Previous:', 'wp-rig' ) . '</span></div>%title',
		// 'next_text' => '<div class="post-navigation-sub"></span><span>' . esc_html__( 'Next:', 'wp-rig' ) . '</span><span class="dashicons dashicons-arrow-right"></div>%title',
		// )
		// );
		// }
endif;
