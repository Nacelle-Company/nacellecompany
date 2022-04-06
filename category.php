<?php
/**
 * The template for displaying category archives.
 *
 * When active, applies to all category archives.
 * To target a specific category, rename file to category-{slug/id}.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

?>
<main id="primary" class="site-main">

	<?php
	if ( is_category( 'distribution' ) ) {

		wp_rig()->print_styles( 'wp-rig-category' );

		// get_template_part( 'template-parts/content/page_header' );

		get_template_part( 'template-parts/category/distribution' );

		get_template_part( 'template-parts/category/related-content' );

	} elseif ( is_category( 'production' ) ) {

		wp_rig()->print_styles( 'wp-rig-category' );

		// get_template_part( 'template-parts/content/page_header' );

		get_template_part( 'template-parts/category/production' );

	} elseif ( is_category( array( 'album', 'film', 'series', 'special', 'podcast', 'series-production', 'special-production' ) ) ) {

		wp_rig()->print_styles( 'wp-rig-subcategory', 'wp-rig-offcanvas' );

		get_template_part( 'template-parts/content/page_header' );
		?>
		<?php if ( have_posts() ) : ?>
			<div class="subcategory-wrapper">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/category/subcategory' ); ?>
				<?php endwhile; ?>
			</div>
			<?php
		endif;
	} elseif ( have_posts() ) {

		get_template_part( 'template-parts/content/page_header' );

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
get_footer();
