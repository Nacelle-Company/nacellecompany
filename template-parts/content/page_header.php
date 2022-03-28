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
} elseif ( is_archive() ) {
	$archive_title = single_term_title( '', false );
	?>
	<header class="page-header archive" id="pageHeader">
		<h1 class="title">
			<?php
			// Might need this: post_type_archive_title(); ?
			echo wp_kses( $archive_title, 'post' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</h1>
		<?php
		/**
		 * Offcanvas filters.
		 *
		 * @link https://www.w3schools.com/howto/howto_js_off-canvas.asp
		 **/
		?>
		<span onclick="openNav()" style="cursor:pointer" class="filter-toggle">&#9776; <span class="filter-toggle_title"><?php echo esc_html__( 'Sort & Filter', 'wp-rig' ); ?></span></span>
	</header><!-- .page-header -->
	<?php
}
