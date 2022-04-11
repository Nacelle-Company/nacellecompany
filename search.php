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
global $sf_current_query;

// if ( is_post_type_archive() ) {
	$current_post_type = get_post_type();
	$post_class        = ' archive-main archive__' . $current_post_type;
// } else {
	// $post_class = '';
// }
	// echo get_post_type();


get_template_part( 'template-parts/content/page_header' ); // ? PAGE HEADER

?>
	<main id="primary" class="site-main<?php echo esc_html( $post_class ); ?>">
		<?php
		if ( have_posts() ) {
			wp_rig()->print_styles( 'wp-rig-post-grid' );
			while ( have_posts() ) {
				the_post();
				?>
					<article id="post-<?php the_ID(); ?>" class="grid-item archive-grid__item">
						<?php
						get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
						get_template_part( 'template-parts/content/entry_title', get_post_type() );
						get_template_part( 'template-parts/content/entry_summary', get_post_type() );
						get_template_part( 'template-parts/content/entry_footer', get_post_type() );
						get_template_part( 'template-parts/content/entry_go-corner', get_post_type() );
						?>
					</article>
					<?php
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
