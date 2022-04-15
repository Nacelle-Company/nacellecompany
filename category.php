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

?>
<main id="primary" class="site-main">
	<?php get_template_part( 'template-parts/content/page_header' ); ?>
	<div class="subcategory-wrapper">
		<?php
		if ( have_posts() ) :
			$category_name = get_queried_object();
			$category_name = $category_name->slug;
			$query = new \WP_Query(
				array(
					'post_type'     => 'catalog',
					'category_name' => $category_name,
					'orderby'       => 'title',
					'order'         => 'ASC',
				)
			);
			printVar( $category_name );
			if ( 'distribution' === $category_name ) {
				wp_rig()->print_styles( 'wp-rig-category' );
				get_template_part( 'template-parts/category/distribution' );
				wp_rig()->print_styles( 'wp-rig-extra_content' );
				wp_rig()->display_extra_content();
			} elseif ( 'production' === $category_name ) {
				wp_rig()->print_styles( 'wp-rig-category' );
				get_template_part( 'template-parts/category/production' );
				wp_rig()->print_styles( 'wp-rig-extra_content' );
				wp_rig()->display_extra_content();
			} elseif ( is_category( $category_name ) ) {
				wp_rig()->print_styles( 'wp-rig-subcategory', 'wp-rig-offcanvas' );
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/category/subcategory' );
				endwhile;
				wp_reset_postdata();
			} elseif ( is_post_type_archive() ) {
				get_template_part( 'template-parts/content/page_header' );
				get_template_part( 'template-parts/content/entry', get_post_type() );
				get_template_part( 'template-parts/content/pagination' );
			} else {
				echo 'poop';
				get_template_part( 'template-parts/content/error' );
			}
		endif;
						wp_rig()->print_styles( 'wp-rig-pagination' );
				get_template_part( 'template-parts/content/pagination' );
		?>
	</div>
</main><!-- #primary -->
<?php
get_footer();
