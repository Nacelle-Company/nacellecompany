<?php
/**
 * Template part for displaying a banner section
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $count;

$bk_img  = get_post_meta( get_the_ID(), 'layouts_' . $count . '_bk_img', true );
$txt     = get_post_meta( get_the_ID(), 'layouts_' . $count . '_txt', true );
$btn     = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn', true );
$bk_edge = get_post_meta( get_the_ID(), 'layouts_' . $count . '_bk_edge', true );
$row_h   = get_post_meta( get_the_ID(), 'layouts_' . $count . '_row_h', true );
$width   = get_post_meta( get_the_ID(), 'layouts_' . $count . '_width', true );
$overlay = get_post_meta( get_the_ID(), 'layouts_' . $count . '_bk_img_ov', true );
if ( $bk_img ) {
	$bk_img = 'background-image:url(' . wp_get_attachment_image_url( $bk_img, '' ) . ');';
}
// if ( $bk_img ) {
// $bk_img = wp_get_attachment_image( $bk_img, 'large', false, array( 'class' => 'banner__img' ) ); // ? https://jasonyingling.me/using-wordpress-responsive-images-advanced-custom-fields/
// }
if ( $bk_edge ) {
	if ( 'lt' === $bk_edge ) {
		$bk_edge = 'background-position:left top;';
	} elseif ( 'lc' === $bk_edge ) {
		$bk_edge = 'background-position:left center;';
	} elseif ( 'lb' === $bk_edge ) {
		$bk_edge = 'background-position:left bottom;';
	} elseif ( 'rt' === $bk_edge ) {
		$bk_edge = 'background-position:right top;';
	} elseif ( 'rc' === $bk_edge ) {
		$bk_edge = 'background-position:right center;';
	} elseif ( 'rb' === $bk_edge ) {
		$bk_edge = 'background-position:right bottom;';
	} elseif ( 'ct' === $bk_edge ) {
		$bk_edge = 'background-position:center top;';
	} elseif ( 'cc' === $bk_edge ) {
		$bk_edge = 'background-position:center center;';
	} elseif ( 'lb' === $bk_edge ) {
		$bk_edge = 'background-position:center bottom;';
	}
}
if ( $row_h ) {
	if ( 'tall' === $row_h ) {
		$row_h = ' h-full';
	} elseif ( 'large' === $row_h ) {
		$row_h = ' h-80';
	} elseif ( 'medium' === $row_h ) {
		$row_h = ' h-60';
	} elseif ( 'small' === $row_h ) {
		$row_h = ' h-50';
	} elseif ( 'none' === $row_h ) {
		$row_h = '';
	}
}
if ( $btn ) {
	$btn_txt   = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_txt', true );
	$btn_url   = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_url', true );
	$btn_color = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_color', true );
}
?>
<section class="wonder-section banner z-1" style="<?php echo wp_kses( $bk_img, 'post' ); ?><?php echo esc_html( $bk_edge ); ?>">
	<div class="wrap grid grid__full<?php echo wp_kses( $row_h, 'post' ); ?>">
		<div class="col">
			<div class="z-9">
				<?php echo wp_kses( apply_filters( 'the_content', $txt ), 'post' ); ?>
				<?php
				if ( $btn ) {
					?>
				<a href="<?php echo esc_url( $btn_url['url'] ); ?>" class="button"
					<?php
					if ( $btn_color ) {
						$btn_color = 'style="background:' . $btn_color . '";';
						echo wp_kses( $btn_color, 'post' );
					}
					?>
				>
					<?php echo wp_kses( $btn_txt, 'post' ); ?>
				</a>
				<?php } ?>
			</div>
			<div class="overlay wonder-banner z--1" style="opacity:0.<?php echo esc_html( $overlay ); ?>"></div>
		</div>
	</div>
</section>
