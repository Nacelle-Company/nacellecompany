<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $obj_slug;

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
			<?php esc_html_e( 'Nothing Found', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! is_front_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title center-text">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_archive() && is_post_type('catalog') ) {

	?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header page-header__filters">
		<div class="filters-wrap">
			<h1 class="page-title">
				<?php
				if ( is_singular() ) {
					$the_post_type = get_post_type_object( get_post_type( $post ) );
					echo esc_html( $the_post_type->label );
				} elseif ( is_tax() ) {
					$tax_current = $wp_query->get_queried_object();
					$tax_name    = $tax_current->taxonomy;
					echo esc_html( ucfirst( $tax_name ) );
				} elseif ( is_search() ) {
					printf(
					/* translators: %s: search query */
						esc_html__( 'Search Results for: %s', 'wp-rig' ),
						'<span>' . get_search_query() . '</span>'
					);
				} else {
					echo post_type_archive_title( '', false ); // Gets "ARCHIVE" title ( not category title ).
					echo single_term_title();
				}

				?>
			</h1>
			<div class="page-header__offcanvas">
				<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
			</div>
		</div>
		<?php
		// Parent categories subcategories.
		$page_one = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		if ( 1 === $page_one && 'distribution' === $obj_slug ) : // Does not have a parent.
			wp_rig()->print_styles( 'wp-rig-category', 'wp-rig-extra_content' );                            // If category slug 'distribution'.
			get_template_part( 'template-parts/category/distribution' );
			?>
			<h2 class="parent-cat__subtitle">All <?php echo single_term_title(); ?></h2>
			<?php
		elseif ( 1 === $page_one && 'production' === $obj_slug ) :
			wp_rig()->print_styles( 'wp-rig-category', 'wp-rig-extra_content' );                            // If category slug 'production'.
			get_template_part( 'template-parts/category/production' );
			wp_rig()->display_extra_content();
			?>
			<h2 class="parent-cat__subtitle">All <?php echo single_term_title(); ?></h2>
			<?php
		endif;
		// END Parent categories subcategories.
		?>
	</header><!-- .page-header -->
	<?php
} elseif ( is_archive() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			$the_post_type = get_queried_object();
			echo esc_html( $the_post_type->labels->singular_name );
			echo single_term_title();
			?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_singular() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			$post = get_queried_object();
			$the_post_type = get_post_type_object( get_post_type( $post ) );
			if ( $the_post_type ) {
				echo esc_html( $the_post_type->labels->singular_name );
			}
			?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_search() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Search Results for: %s', 'wp-rig' ),
				'<span>' . get_search_query() . '</span>'
			);
			?>
		</h1>
	</header><!-- .page-header -->
	<?php
} else {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
}
