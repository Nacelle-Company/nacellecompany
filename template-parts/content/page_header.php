<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $obj_slug;
global $searchandfilter;

$sf_current_query         = $searchandfilter->get( 46579 )->current_query();
$queried_obj              = get_queried_object();
$search_filter_or_catalog = false;
$category_name;
// Header icon.
// var_dump($queried_obj);
if ( str_contains( $queried_obj->name, 'catalog' ) ) {
	$category_name = 'series';
} elseif ( str_contains( $queried_obj->name, 'press' ) ) {
	$category_name = 'press';
} elseif ( str_contains( $queried_obj->slug, 'series' ) ) {
	$category_name = 'series';
} elseif ( str_contains( $queried_obj->slug, 'special' ) || str_contains( $queried_obj->slug, 'production' ) ) {
	$category_name = 'special';
} elseif ( str_contains( $queried_obj->slug, 'album' ) || str_contains( $queried_obj->slug, 'distribution' ) ) {
	$category_name = 'album';
} elseif ( str_contains( $queried_obj->slug, 'film' ) ) {
	$category_name = 'film';
} else {
	$category_name = 'filter';
}

if ( $sf_current_query->is_filtered() || is_search() || is_post_type( 'catalog' ) ) {
	$search_filter_or_catalog = true;
}

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-rig' ); ?>
		</h1>
	</header>
	<?php
} elseif ( $search_filter_or_catalog ) { // Search filter and catalog category header.
	wp_rig()->print_styles( 'wp-rig-offcanvas' );
	?>
	<header class="page-header page-header__filters">
		<div class="filters-wrap">
			<div class="page-title__wrap">
				<h1 class="page-title">
					<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' ) ?>
					<?php
					if ( $sf_current_query->is_filtered() ) {
						echo 'Filter by: ' . $sf_current_query->get_fields_html(
							array( '_sft_category' )
						);
					} elseif ( single_term_title() ) {
						echo single_term_title();
					} elseif ( $queried_obj->name = 'catalog' ) {
						echo $queried_obj->label;
					} else {
						echo single_term_title();
					}
					?>
				</h1>
			</div>
			<div class="page-header__offcanvas">
				<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
			</div>
		</div>
	</header>
	<?php
} elseif ( is_home() && ! have_posts() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Nothing Found', 'wp-rig' ); ?>
		</h1>
	</header>
	<?php
} elseif ( is_home() && ! is_front_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header>
	<?php
} elseif ( is_page() ) {
	?>
	<header class="page-header <?php echo esc_html( get_post_meta( get_the_ID(), 'hide_title', true ) ); ?>">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header>
	<?php
} elseif ( is_archive() && is_post_type( 'catalog' ) && ! $sf_current_query->is_filtered() ) {
	wp_rig()->print_styles( 'wp-rig-offcanvas' );
	?>
	<header class="page-header page-header__filters">
		<div class="filters-wrap">
			<h1 class="page-title">
				<?php
				if ( is_singular() ) {
					$the_post_type = get_post_type_object( get_post_type( $post ) );
					echo esc_html( $the_post_type->label );
				} elseif ( is_search() ) {
					echo 'is search';
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
	</header>
	<?php
} elseif ( is_archive() ) { // Press archive header.
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );
			$the_post_type = get_queried_object();
			echo esc_html( $the_post_type->labels->singular_name );
			echo single_term_title();
			?>
		</h1>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
} elseif ( is_singular() ) {
	?>
	<header class="page-header">
		<h2 class="page-title h1">
			<?php
			$the_post      = get_queried_object();
			$the_post_type = get_post_type_object( get_post_type( $the_post ) );
			if ( $the_post_type ) {
				echo esc_html( $the_post_type->labels->singular_name );
			}
			?>
		</h2>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
} elseif ( is_search() ) {
	?>
	<header class="page-header">
		<h2>is_search!!!</h2>
		<h1 class="page-title h2">
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Search Results for: %s', 'wp-rig' ),
				'<span>' . get_search_query() . '</span>'
			);
			?>
		</h1>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
} else {
	?>
	<header class="page-header">
		<h2 class="page-title h1">
			<?php single_post_title(); ?>
		</h2>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
}
