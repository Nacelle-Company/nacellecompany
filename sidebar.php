<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-sidebar' );

if ( ! wp_rig()->is_primary_sidebar_active() ) {
	return;
}

?>
<aside id="secondary" class="primary-sidebar widget-area">
	<h2 class="screen-reader-text"><?php esc_attr_e( 'Asides', 'wp-rig' ); ?></h2>
	<?php
		wp_rig()->display_primary_sidebar();
		$pdf          = get_post_meta( get_the_ID(), 'pdf_download', true );
		$stills       = get_post_meta( get_the_ID(), 'stills_download', true );
		$pdf_title    = get_post_meta( get_the_ID(), 'pdf_title', true );
		$stills_title = get_post_meta( get_the_ID(), 'stills_title', true );
	?>
		<?php if ( ! empty( $stills ) || ! empty( $pdf ) ) : ?>
			<h4>Downloads</h4>
		<?php endif; ?>
		<?php if ( ! empty( $pdf ) ) : ?>
			<p>
				<a href="<?php echo esc_html( $stills ); ?>" download title="<?php echo esc_html( $stills_title ); ?>"><?php echo esc_html( $stills_title ); ?></a>
			</p>
		<?php endif; ?>
		<?php if ( ! empty( $stills ) ) : ?>
			<p>
				<a href="<?php echo esc_attr( $pdf ); ?>" download title="<?php echo esc_html( $pdf_title ); ?>"><?php echo esc_html( $pdf_title ); ?></a>
			</p>
		<?php endif; ?>
</aside>
