<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $num_posts; // Find these args in taxonomy.php.

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<!-- 404!!!!! -->
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! have_posts() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<!-- is_home() && ! have_posts()!!!!!! -->
			<?php esc_html_e( 'Nothing Found', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! is_front_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<!-- is_home() && ! is_front_page()!!!!!! -->
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title center-text">
			<!-- is_home() && ! is_front_page()!!!!!! -->
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_archive() || is_search() || is_singular() ) {
	?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header page-header__filters">
		<h1 class="page-title">
			<?php
			if ( is_singular() ) {
				$post_type = get_post_type_object( get_post_type( $post ) );
				echo esc_html( $post_type->label );
			} elseif ( is_tax() ) {
				$tax_current = $wp_query->get_queried_object();
				$tax_name    = $tax_current->taxonomy . ': ';
				echo esc_html( ucfirst( $tax_name ) );
			} elseif ( is_search() ) {
				printf(
				/* translators: %s: search query */
					esc_html__( 'Search Results for: %s', 'wp-rig' ),
					'<span>' . get_search_query() . '</span>'
				);
			}
			echo post_type_archive_title( '', false ); // Gets "ARCHIVE" title ( not category title ).
			echo single_term_title();
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
			<span class="num_posts">(<?php echo esc_html( $num_posts ); ?> items)</span>
		</h1>
		<div class="page-header__offcanvas">
			<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
		</div>
	</header><!-- .page-header -->
	<?php
}
