<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			404!!!!!
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! have_posts() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			is_home() && ! have_posts()!!!!!!
			<?php esc_html_e( 'Nothing Found', 'wp-rig' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! is_front_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			is_home() && ! is_front_page()!!!!!!
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_search() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			is_search()!!!!!!!!
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
} elseif ( is_archive() ) {
	?>
	<div id="offcanvasOverlay" class="offcanvas overlay" href="javascript:void(0)" onclick="closeNav()"></div>
	<header class="page-header page-header__filters">
		<!-- <pre>is_archive()!!!!!!!</pre> -->
		<h1 class="page-title">
			<?php

			echo post_type_archive_title( '', false ); // Gets "ARCHIVE" title ( not category title ).
			echo single_term_title();
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</h1>
		<div class="page-header__offcanvas">
			<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
		</div>
	</header><!-- .page-header -->
	<?php
}
