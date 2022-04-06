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

?>
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) {
			get_template_part( 'template-parts/content/page_header' );
			?>
			<div class="subcategory-wrapper">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php get_template_part( 'template-parts/category/subcategory' ); ?>
						<?php endwhile; ?>
			</div>
					<?php
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
// get_sidebar();
get_footer();
