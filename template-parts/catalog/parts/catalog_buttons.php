<?php
/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-catalog_buttons' );
?>

<?php
$itunes_video     = get_post_meta( get_the_ID(), 'itunes_video', true );
$itunes_audio_url = get_post_meta( get_the_ID(), 'itunes_audio_url', true );
if ( get_post_meta( get_the_ID(), 'show_video_links', true ) ) :
	?>
	<div class="entry-buttons__wrapper">
		<h3 class="title h3">
	<?php esc_html_e( 'Watch Now', 'wp-rig' ); ?>
		</h3>
	<?php if ( $itunes_video ) : ?>
			<a href="<?php echo esc_attr( $itunes_video ); ?>" class="button apple-link" title="Watch <?php the_title_attribute(); ?> on Apple TV" target="_blank" rel="noreferrer">
				<strong>
					<?php esc_html_e( 'Apple TV', 'wp-rig' ); ?>
				</strong>
				<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-external-link.svg' ); ?>
			</a>
	<?php endif; ?>
	<?php if ( have_rows( 'new_large_link' ) ) : ?>
		<?php
		while ( have_rows( 'new_large_link' ) ) :
			the_row();
			$video_title = get_sub_field( 'link_title' );
			$video_link  = get_sub_field( 'link_url' );
			?>
				<a href="<?php echo esc_html( $video_link ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $video_title ); ?>" target="_blank" rel="noreferrer">
					<strong><?php echo esc_html( $video_title ); ?></strong>
					<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-external-link.svg' ); ?>
				</a>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
<?php endif; ?>
<?php
if ( get_post_meta( get_the_ID(), 'show_audio_links', true ) ) :
	?>
	<div class="entry-buttons__wrapper">
		<h3 class="title h3">
	<?php esc_html_e( 'Listen Now', 'wp-rig' ); ?>
		</h3>
	<?php if ( $itunes_audio_url ) : ?>
			<a href="<?php echo esc_attr( $itunes_audio_url ); ?>" class="button apple-link" title="Listen <?php the_title_attribute(); ?> on iTunes" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'iTunes', 'wp-rig' ); ?>
				</strong>
<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-external-link.svg' ); ?>
			</a>
	<?php endif; ?>
	<?php if ( have_rows( 'audio_new_large_link' ) ) : ?>
		<?php
		while ( have_rows( 'audio_new_large_link' ) ) :
			the_row();
			$audio_title = get_sub_field( 'audio_link_title' );
			$audio_link  = get_sub_field( 'audio_link_url' );
			?>
				<a href="<?php echo esc_html( $audio_link ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $audio_title ); ?>" target="_blank" rel="noreferrer">
					<strong><?php echo esc_html( $audio_title ); ?></strong>
					<?php echo file_get_contents( get_template_directory() . '/assets/images/icon-external-link.svg' ); ?>
				</a>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
<?php endif; ?>
