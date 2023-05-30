<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$prod_args    = array(
	'post_type'      => 'catalog',
	'posts_per_page' => '30',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'tax_query'      => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'category',
			'terms'    => array(
				'production',
				'distribution',
			),
			'field'    => 'slug',
		),
		array(
			'taxonomy' => 'category',
			'terms'    => 'podcast',
			'field'    => 'slug',
			'operator' => 'NOT IN',
		),
	),
);
$podcast_args = array(
	'post_type'      => 'catalog',
	'posts_per_page' => '30',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'tax_query'      => array(
		array(
			'taxonomy' => 'category',
			'terms'    => 'podcast',
			'field'    => 'slug',
		),
	),
);
$books_args   = array(
	'post_type'      => 'catalog',
	'posts_per_page' => '30',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'tax_query'      => array(
		array(
			'taxonomy' => 'category',
			'terms'    => 'books',
			'field'    => 'slug',
		),
	),
);
?>

	<div class="product-tabs__wrap">
		<ul class="product-tabs" id="product_tabs" role="list">
			 <li>
				<a class="tabs-title is-active" href="#productions" onclick="openTab(event, 'productions')">
					<h3>
					<?php echo get_post_meta( get_the_ID(), 'first_tab', true ); ?>
					</h3>
				</a>
			</li>
			<li>
				<a class="tabs-title" href="#podcasts" onclick="openTab(event, 'podcasts')">
					<h3>
					<?php echo get_post_meta( get_the_ID(), 'second_tab', true ); ?>
					</h3>
				</a>
			</li>
			<li>
				<a class="tabs-title" href="#books" onclick="openTab(event, 'books')">
					<h3>
					<?php echo get_post_meta( get_the_ID(), 'third_tab', true ); ?>
					</h3>
				</a>
			</li>
		</ul>
	</div>
	<div class="product-tabs__content">
		<div class="tabs-panel animate-opacity site-main__catalog" id="productions" style="display:none">
			<?php
			$production_query = new \WP_Query( $prod_args );
			if ( $production_query->have_posts() ) :
				while ( $production_query->have_posts() ) :
					$production_query->the_post();
					$the_taxonomy = 'category';
					$post_terms   = wp_get_object_terms( $post->ID, $the_taxonomy, array( 'fields' => 'ids' ) );
					$separator    = '/ ';
					if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
						get_template_part( 'template-parts/content/entry_archive_catalog' );
					}
				endwhile;
			endif;
			wp_reset_postdata(); ?>
		</div>
		<div class="tabs-panel animate-opacity site-main__catalog" id="podcasts" style="display:none">
			<?php
			$podcast_query = new \WP_Query( $podcast_args );
			if ( $podcast_query->have_posts() ) :
				while ( $podcast_query->have_posts() ) :
					$podcast_query->the_post();
					$the_taxonomy = 'category';
					$post_terms   = wp_get_object_terms( $post->ID, $the_taxonomy, array( 'fields' => 'ids' ) );
					if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
						get_template_part( 'template-parts/content/entry_archive_catalog' );
					}
				endwhile;
			endif;
			wp_reset_postdata(); ?>
		</div>
		<div class="tabs-panel animate-opacity site-main__catalog" id="books" style="display:none">
			<?php
			$books_query = new \WP_Query( $books_args );
			$count = 0;
			if ( $books_query->have_posts() ) :
				while ( $books_query->have_posts() ) :
					$books_query->the_post();
					$the_taxonomy = 'category';
					$post_terms   = wp_get_object_terms( $post->ID, $the_taxonomy, array( 'fields' => 'ids' ) );
					if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
						get_template_part( 'template-parts/content/entry_archive_catalog' );
					}
					$count++;
					if ($count === 1) : ?>
						<div class="form-widget__container">
							<div class="form-widget__wrap">
								<a href="#open-modal-books" class="form-widget__btn">Author?<br><span>Submit your book pitch here!</span></a>
							</div>
						</div>
						<div id="open-modal-books" class="modal-window modal-window_absolute">
							<div>
								<a href="#!" title="Close" class="modal-close">Close</a>
								<?php echo do_shortcode( '[ninja_form id=2]' ); ?>
							</div>
						</div>
					<?php endif;
				endwhile;
			endif;
			wp_reset_postdata(); ?>
		</div>
	</div>
<script>
	var firstTab = document.querySelector('.product-tabs__content .tabs-panel:first-child')
	var booksTab = document.getElementById('books');
	var podcastsTab = document.getElementById('podcasts');
	var booksLink = document.querySelector('[href="/products/#books"]');
	if (window.location.href.indexOf("#books") > -1 ) {
		booksTab.style.display = "grid";
	} else if(window.location.href.indexOf("#podcasts") > -1) {
		podcastsTab.style.display = "grid";
	} else {
		firstTab.style.display = 'grid';
	}
	function openTab(evt, tabName) {
		var i, x, tablinks;

		x = document.getElementsByClassName("tabs-panel");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tabs-title");
		for (i = 0; i < x.length; i++) {
			tablinks[i].className = tablinks[i].className.replace("is-active", "");
		}
		document.getElementById(tabName).style.display = "grid";
		evt.currentTarget.className += " is-active";
	}

</script>
