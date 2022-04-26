<?php
/**
 * Template part for displaying a text and an image.
 *
 * @package wp_rig
 */
// TODO: finish Wonder page layout.
namespace WP_Rig\WP_Rig;

global $count;
$bk_color       = get_post_meta( get_the_ID(), 'layouts_' . $count . '_bk_color', true );
$border         = get_post_meta( get_the_ID(), 'layouts_' . $count . '_border', true );
$flip            = get_post_meta( get_the_ID(), 'layouts_' . $count . '_flip', true );
$txt            = get_post_meta( get_the_ID(), 'layouts_' . $count . '_txt', true );
$img            = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img', true );
$img_large      = wp_get_attachment_image( $img, 'large', array( 'class' => 'grid-item__img' ) );
$img_full       = wp_get_attachment_image( $img, 'full', array( 'class' => 'grid-item__img' ) );
$img_fill        = get_post_meta( get_the_ID(), 'layouts_' . $count . '_fill_img', true );
$img_width      = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img_width', true );
$img_link       = get_post_meta( get_the_ID(), 'layouts_' . $count . '_img_link', true );
$modal_link     = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_link', true );
$modal_img_link = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_img_link', true );
$modal_img_link = $modal_img_link['url'];
$modal_link_txt = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_link_txt', true );
$modal_link_url = get_post_meta( get_the_ID(), 'layouts_' . $count . '_modal_link_url', true );
$modal_link_url = $modal_link_url['url'];
$btn            = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn', true );
$btn_txt        = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_txt', true );
$btn_url        = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_url', true );
$btn_color      = get_post_meta( get_the_ID(), 'layouts_' . $count . '_btn_color', true );
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
} else {
	$img_fill      = '';
}
if ( $flip ) {
	$flip = ' flip';
} else {
	$flip = '';
}
if ( ! empty( $btn_color ) ) {
	$btn_color = ' style="background-color:' . $btn_color . ';"';
}
if ( $img_width ) {
	$img_width = ' ' . $img_width;
} else {
	$img_width = 'medium-6';
}
?>
<section class="wonder-section txt-img"
<?php
if ( ! empty( $bk_color ) || ! empty( $border ) ) {
	?>
style="<?php echo esc_html( $bk_color ); ?><?php echo esc_html( $border ); ?>"<?php }; ?>>
<div class="wrap grid grid__half">
	<div class="col<?php echo esc_html( $flip ); ?>">
		<?php echo wp_kses( apply_filters( 'the_content', $txt ), 'post' ); ?>
		<?php if ( $btn ) : ?>
			<a class="button" href="<?php echo esc_url( $btn_url['url'] ); ?>"
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
	<?php
	if ( $img ) :
		?>
	<div class="col<?php echo esc_html( $img_fill ); ?>">
		<a href="#open-modal-<?php echo esc_html( $count ); ?>">
			<figure class="img-wrap">
				<?php echo wp_kses( $img_large, 'post' ); ?>
			</figure>
		</a>

	</div>
	<?php endif; ?>
</div>
<div id="open-modal-<?php echo esc_html( $count ); ?>" class="modal-window modal-window_large">
	<div>
		<a href="#!" title="Close" class="modal-close">Close</a>
		<figure>
			<a href="<?php echo esc_url( $modal_img_link ); ?>">
				<?php echo wp_kses( $img_large, 'post' ); ?>
			</a>
		</figure>
		<a href="<?php echo esc_html( $modal_link_url ); ?>" title="<?php echo esc_html( $modal_link_txt ); ?>">
			<figcaption><?php echo esc_html( $modal_link_txt ); ?></figcaption>
		</a>
	</div>
</div>
</section>
