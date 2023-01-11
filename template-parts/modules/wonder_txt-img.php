<?php
/**
 * Template part for displaying a text and an image.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $count;
$bk_color      = get_post_meta( get_the_ID(), 'layouts_' . $count . '_bk_color', true );
$border        = get_post_meta( get_the_ID(), 'layouts_' . $count . '_border', true );
$flip          = get_post_meta( get_the_ID(), 'layouts_' . $count . '_flip', true );
$txt           = get_post_meta( get_the_ID(), 'layouts_' . $count . '_txt', true );
$img           = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img', true );
$img_large     = wp_get_attachment_image( $img, 'medium_large', array( 'class' => 'grid-item__img' ) );
$img_full      = wp_get_attachment_image( $img, 'full', array( 'class' => 'grid-item__img' ) );
$img_fill      = get_post_meta( get_the_ID(), 'layouts_' . $count . '_fill_img', true );
$img_width     = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img_width', true );
$modal_or_link = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_or_link', true );
$section_id    = get_post_meta( get_the_ID(), 'layouts_' . $count . '_section_id', true);
if ( $modal_or_link ) {
	$modal_txt     = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_txt', true );
	$modal_txt_url = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_txt_url', true );
	$modal_img_url = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_img_url', true );
} else {
	$img_url         = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img_url', true );
	$img_caption     = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img_caption', true );
	$img_caption_url = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img_caption_url', true );
	$modal_txt       = '';
	$modal_img_url   = '';
	$modal_txt_url   = '';
}
$btn       = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn', true );
$btn_txt   = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_txt', true );
$btn_url   = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_url', true );
$btn_color = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_color', true );
if ( ! empty( $bk_color ) ) {
	$bk_color            = 'background-color:' . $bk_color . ';';
	$bk_link_color_class = ' link-light';
} else {
	$bk_color            = '';
	$bk_link_color_class = '';
}
if ( $border ) {
	$border = 'border-bottom:10px solid ' . $border . ';';
} else {
	$border = '';
}
if ( $img_fill ) {
	$img_fill      = ' img-fill';
	$img_fill_wrap = ' img-fill__wrap';
} else {
	$img_fill      = '';
	$img_fill_wrap = '';
}
if ( $flip ) {
	$flip = ' flip';
} else {
	$flip = '';
}
if ( ! empty( $btn_color ) ) {
	$btn_color = ' style="background-color:' . $btn_color . ';"';
}

if ( $img_width && '' === $flip ) {
	$img_width = ' ' . $img_width;
} elseif ( $img_width && ' flip' === $flip ) {
	$img_width = ' ' . $img_width . '-flip';
} else {
	$img_width = ' grid__half';
}

// section id
if ( !empty( $section_id ) ) {
	$section_id = 'id=' . $section_id . ' ';
}
?>
<section <?php echo esc_html( $section_id ); ?> class="wonder-section txt-img"
<?php
if ( ! empty( $bk_color ) || ! empty( $border ) ) {
	?>
style="<?php echo esc_html( $bk_color ); ?><?php echo esc_html( $border ); ?>"<?php }; ?>>
<div class="wrap grid<?php echo esc_html( $img_width ); ?><?php echo esc_html( $img_fill_wrap ); ?>">
	<div class="col<?php echo esc_html( $flip ); ?>">
		<?php echo wp_kses( apply_filters( 'the_content', $txt ), 'post' ); ?>
		<?php if ( $btn ) : ?>
			<a class="button" href="<?php echo esc_url( $btn_url ); ?>"
			<?php
			if ( ! empty( $btn_color ) ) {
				echo wp_kses( $btn_color, 'post' );
			}
			?>
			>
				<?php echo esc_html( $btn_txt ); ?>
			</a>
		<?php endif; ?>
	</div>
	<?php if ( $img ) : ?>
		<div class="col<?php echo esc_html( $img_fill ); ?>">
			<?php if ( $modal_or_link ) : ?>
				<a href="#open-modal-<?php echo esc_html( $count ); ?>">
					<figure class="img-wrap">
						<?php echo wp_kses( $img_large, 'post' ); ?>
					</figure>
				</a>
			<?php else : ?>
				<figure class="img-wrap">
					<?php if ( $img_url ) : ?>
						<a href="<?php echo wp_kses( $img_url, 'post' ); ?>">
							<?php echo wp_kses( $img_large, 'post' ); ?>
						</a>
					<?php else : ?>
						<?php echo wp_kses( $img_large, 'post' ); ?>
					<?php endif; ?>
					<?php if ( ! $img_fill_wrap ) : ?>
					<figcaption>
						<?php if ( $img_caption_url ) : ?>
						<a href="<?php echo esc_html( $img_caption_url ); ?>">
							<?php echo esc_html( $img_caption ); ?>
						</a>
						<?php else : ?>
							<?php echo esc_html( $img_caption ); ?>
						<?php endif; ?>
					</figcaption>
				<?php endif; ?>
				</figure>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
<?php if ( $modal_or_link ) : ?>
	<div id="open-modal-<?php echo esc_html( $count ); ?>" class="modal-window modal-window_large">
		<div>
			<a href="#!" title="Close" class="modal-close"><?php echo load_inline_svg( 'icon-close.svg' ); ?></a>
			<figure>
			<?php if ( $modal_img_url ) : ?>
				<a href="<?php echo wp_kses( $modal_img_url, 'post' ); ?>">
					<?php echo wp_kses( $img_large, 'post' ); ?>
				</a>
			<?php else : ?>
				<?php echo wp_kses( $img_large, 'post' ); ?>
			<?php endif; ?>
				<?php if ( $modal_txt_url ) : ?>
					<a href="<?php echo wp_kses( $modal_txt_url, 'post' ); ?>" title="<?php echo wp_kses( $modal_txt, 'post' ); ?>">
						<figcaption><?php echo wp_kses( $modal_txt, 'post' ); ?></figcaption>
					</a>
				<?php else : ?>
					<figcaption><?php echo wp_kses( $modal_txt, 'post' ); ?></figcaption>
				<?php endif; ?>
			</figure>
		</div>
	</div>
<?php endif; ?>
</section>
