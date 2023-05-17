<?php
/**
 * Template name: Wonder
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();
wp_rig()->print_styles( 'wp-rig-wonder' );
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$feat_img_bk_edge = get_post_meta( get_the_ID(), 'feat_img_bk_edge', true );
$feat_img_row_h   = get_post_meta( get_the_ID(), 'feat_img_row_h', true );

if ( $featured_img_url ) {
	$featured_img_url = 'background-image:url(' . $featured_img_url . ');';
}

if ( $featured_img_url ) {
	if ( 'lt' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:left top;';
	} elseif ( 'lc' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:left center;';
	} elseif ( 'lb' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:left bottom;';
	} elseif ( 'rt' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:right top;';
	} elseif ( 'rc' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:right center;';
	} elseif ( 'rb' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:right bottom;';
	} elseif ( 'ct' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:center top;';
	} elseif ( 'cc' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:center center;';
	} elseif ( 'lb' === $feat_img_bk_edge ) {
		$feat_img_bk_edge = 'background-position:center bottom;';
	}
}
if ( $feat_img_row_h ) {
	if ( 'tall' === $feat_img_row_h ) {
		$feat_img_row_h = 'height:100vh;';
	} elseif ( 'large' === $feat_img_row_h ) {
		$feat_img_row_h = 'height:80vh;';
	} elseif ( 'medium' === $feat_img_row_h ) {
		$feat_img_row_h = 'height:60vh;';
	} elseif ( 'small' === $feat_img_row_h ) {
		$feat_img_row_h = 'height:50vh;';
	} elseif ( 'none' === $feat_img_row_h ) {
		$feat_img_row_h = '';
	}
}
?>
<style>@media screen and (min-width: 60em) {.banner__feat-img_wrap {<?php echo wp_kses( $feat_img_row_h, 'post' ); ?>}}</style>
<main id="primary" class="site-main">
<section class="wonder-section banner__feat" style="<?php echo wp_kses( $feat_img_bk_edge, 'post' ); ?>">
	<div class="banner__feat-img_wrap">
	<?php
	the_post_thumbnail(
		'full',
		array(
			'class' => 'banner__feat-img no-lazy',
			'title' => 'Feature image',
		)
	);
	?>
	</div>
</section>
	<?php
	/**
	 * How to speed up ACF queries.
	 * Link: https://www.brianshim.com/webtricks/speed-up-wordpress-advanced-custom-fields-queries/
	 * Link: https://www.billerickson.net/advanced-custom-fields-frontend-dependency/
	 */
	$rows = get_post_meta( get_the_ID(), 'layouts', true );
	foreach ( (array) $rows as $count => $row ) {
		switch ( $row ) {
			// ? Image with Text layout.
			case 'img_txt':
				get_template_part( 'template-parts/modules/wonder_txt-img' );
				break;
			// Quote with Text layout !
			case 'txt_quote':
				get_template_part( 'template-parts/modules/wonder_txt-quote' );
				break;
			// Banner layout !
			case 'banner':
				get_template_part( 'template-parts/modules/wonder_banner' );
				break;
		}
	}
	edit_post_link( __( '(Edit)', 'wp-rig' ), '<span class="edit-link">', '</span>' );
	?>
</main><!-- #primary -->
<?php
get_footer();
