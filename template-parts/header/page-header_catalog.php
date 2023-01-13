<?php
/**
 * Template part for displaying the page header on the
 * catalog archive &
 * catalog filter & search pages
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

require('logic/logic_page-header_catalog.php');

?>

<header class="page-header page-header__filters">
	<div class="page-title__wrap">
		<?php if ( is_page() ) :
			$category_icon = the_post_thumbnail('', ['class' => 'icon']);
			?>
			<h1 class="page-title">
				<?php the_title($category_icon, '', true); ?>
			</h1>
		<?php else: ?>
			<h1 class="page-title">
				<?php echo $category_icon . esc_html( $category_name ); ?>
			</h1>
		<?php endif; ?>
		<?php if( $sf_filter_on === true || get_search_query() ) : ?>
			<div class="page-title_meta">
				<?php if( get_search_query() ) : // SEARCH QUERY ?>
					<sub>
						<span class="page-title_meta-title">Search Term - </span>
						<em>"<?php echo $search_query; ?>"</em>
					</sub>&nbsp;
				<?php endif; ?>
				<?php if( $filter_query !== '') : // FILTERS ?>
					<sub>
						<span class="page-title_meta-title">Filterd by - </span><?php echo $filter_query; ?>
					</sub>&nbsp;
				<?php endif; ?>
				<?php if( $sorting_on === true ) : ?>
					<sub>
						<span class="page-title_meta-title">Sorted by – </span>
						<?php echo $sorting_by; ?>
					</sub>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if( ! is_page('products') && $offcanvas ) : // if not the products page, show the filter hamburger icon ?>
			<div class="page-title__offcanvas">
				<?php get_template_part( 'template-parts/modules/offcanvas-menu' ); ?>
			</div>
		<?php endif; ?>
	</div>

</header>
