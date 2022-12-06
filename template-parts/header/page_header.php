<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $obj_slug;
global $searchandfilter;

$sf_catalog_query	= $searchandfilter->get( 46579 )->current_query();
$sf_press_query		= $searchandfilter->get( 47395 )->current_query();
$queried_obj		= get_queried_object();
$post_name = $queried_obj->labels->singular_name;
$search_filter_or_catalog 	= false;
$cat_name					= $queried_obj->name;


$args = array(
	"str" 				=> '%1$s: %2$s',
	"delim" 			=> array(", ", " - "),
	"field_delim"		=> ' / ',
	"show_all_if_empty"	=> false
);
$name_only_args = array(
	"str" 				=> '%2$s',
	"delim" 			=> array(", ", " - "),
	"field_delim"		=> ' / ',
	"show_all_if_empty"	=> false
);
$category_name = 'series';


	if ($sf_catalog_query->is_filtered()) :
		echo 'is_filtered = TRUE';
		if (is_category()) :
			echo 'poop<pre>';
			var_dump( get_post_taxonomies('category') );
			echo '</pre>';
		endif;
	endif;

if ( str_contains( $cat_name, 'catalog' ) ) {
	$category_name = 'series';
} elseif ( str_contains( $cat_name, 'press' ) ) {
	$category_name = 'press';
} elseif ( str_contains( $queried_obj->slug, 'series' ) ) {
	$category_name = 'series';
} elseif ( str_contains( $queried_obj->slug, 'special' ) || str_contains( $queried_obj->slug, 'production' ) ) {
	$category_name = 'special';
} elseif ( str_contains( $queried_obj->slug, 'album' ) || str_contains( $queried_obj->slug, 'distribution' ) ) {
	$category_name = 'album';
} elseif ( str_contains( $queried_obj->slug, 'film' ) ) {
	$category_name = 'film';
} elseif ($sf_catalog_query->get_fields_html(array( '_sft_category' ), $args)) {
	$sf_catalog_title = $sf_catalog_query->get_fields_html(array( '_sft_category' ), $name_only_args);
	if ( ! str_contains( $sf_catalog_title, 'Series' ) ) {
		$category_name = substr(strtolower($sf_catalog_title), 0, -1);
	} else {
		$category_name = strtolower($sf_catalog_title);
	}
	$icon_filter = file_get_contents( get_template_directory() . '/assets/images/icon-filter.svg' );
} else {
	$category_name = 'series';
}

// Header icon.
$title_icon = file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );

if ( $sf_catalog_query->is_filtered() || is_search() || is_post_type( 'catalog' ) ) {
	$search_filter_or_catalog = true;
}

if ( is_404() ) :
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-rig' ); ?>
		</h1>
	</header>
	<?php
elseif ($sf_press_query->is_filtered()) : // Press filter title ?>
	<header class="page-header">
		<div class="page-title">
			<h1 class="page-title">
				<?php echo $title_icon . esc_html($post_name); ?>
			</h1>
			<em style="text-transform: none;padding-left: 2em;">
				<?php // Search & Filter Pro Accessing the Search Data: https://searchandfilter.com/documentation/accessing-search-data/
					$press_args = array(
						"str" 				=> '%1$s: %2$s',
						"delim" 			=> array(", ", " - "),
						"field_delim"		=> ' / ',
						"show_all_if_empty"	=> true
					);

					$array_data = $sf_press_query->get_array();
					$typeOfSearch = $array_data['_sf_sort_order']['active_terms'][0]['value'];
					echo '<span style="color:var(--color-theme-primary);">Filter – </span>' . $typeOfSearch ;
				?>
			</em>
		</div>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
elseif ( $sf_catalog_query->is_filtered() || is_post_type( 'catalog' ) ) : // Search filter and catalog category header.
	wp_rig()->print_styles( 'wp-rig-offcanvas' );
	?>
	<header class="page-header page-header__filters">
		<div class="filters-wrap">
			<div class="page-title__wrap" style="display:flex;align-items:baseline;">
				<?php if ( $sf_catalog_query->is_filtered() ) : // Catalog filter title
					?>
					<h1 class="page-title">
						<?php
						$current_category = $sf_catalog_query->get_fields_html(
												array( '_sft_category' ),
												$name_only_args
											);
						if ( $current_category ) {
							echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );
							echo $current_category;
						} else {
							echo file_get_contents( get_template_directory() . '/assets/images/icon-series.svg' );
							echo 'Catalog';
						}
						?>
					</h1>
					<em style="padding-left: 1em">
						<?php // Search & Filter Pro Accessing the Search Data: https://searchandfilter.com/documentation/accessing-search-data/
							echo '<span style="color:var(--color-theme-primary);">Filter – </span>' . $sf_catalog_query->get_fields_html(
								array( '_sft_genre', '_sft_main_talent', '_sft_producers', '_sft_directors', '_sft_writers' ),
								$args
							);
						?>
					</em>
				<?php else : // Not search or filter ?>
					<h1 class="page-title TESTING">
						<?php
							echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );
							if ($post_name) {
								echo $post_name . ' ' . ucfirst($cat_name);
							} elseif ($queried_obj) {
								echo ucfirst($queried_obj->name);
							} else {
								echo 'Comedy Catalog';
							}
						?>
					</h1>
				<?php endif; ?>
			</div>
			<div class="page-header__offcanvas">
				<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
			</div>
		</div>
	</header>
	<?php
elseif ( is_home() && ! have_posts() ) :
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Nothing Found', 'wp-rig' ); ?>
		</h1>
	</header>
	<?php
elseif ( is_home() && ! is_front_page() ) :
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header>
	<?php
elseif ( is_page() ) :
	?>
	<header class="page-header <?php echo esc_html( get_post_meta( get_the_ID(), 'hide_title', true ) ); ?>">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header>
	<?php
elseif ( is_archive() ) : // Press archive header.
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $category_name . '.svg' );
			echo esc_html( $queried_obj->labels->singular_name );
			echo single_term_title();
			?>
		</h1>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
elseif ( is_singular() ) : // Press single header.
	$the_post      = get_queried_object();
	$queried_obj = get_post_type_object( get_post_type( $the_post ) );
	?>
	<header class="page-header">
		<h2 class="page-title h1">
			<a href="/<?php echo esc_html( strtolower($queried_obj->labels->singular_name) ); ?>">
			<?php
			echo file_get_contents( get_template_directory() . '/assets/images/icon-' . $queried_obj->name . '.svg' );
			if ( $queried_obj ) {
				echo esc_html( $queried_obj->labels->singular_name );
			}
			?>
			</a>
		</h2>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
elseif ( is_search() ) :
	?>
	<header class="page-header">
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
else :
	?>
	<header class="page-header">
		<h2 class="page-title h1">
			<?php single_post_title(); ?>
		</h2>
		<span class="page-header__line"><hr></span>
	</header>
	<?php
endif;
