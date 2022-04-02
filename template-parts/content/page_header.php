<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $searchandfilter;
$current_post_type = get_post_type( $post->ID, false );
$the_post_type     = get_post_type_object( get_post_type() );
$post_type_title = $the_post_type->labels->singular_name;

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
	$sf_current_query = $searchandfilter->get( 46515 )->current_query();
	get_template_part( 'template-parts/modules/page_header-search' );
} elseif ( is_archive() ) {
	if ( 'catalog' === $current_post_type ) {
		get_template_part( 'template-parts/modules/page_header-search' );
	} else {
		?>
		<div class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
		<?php
	}
} elseif ( is_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_single() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php echo wp_kses( $post_type_title, 'post' ); ?>
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
}
