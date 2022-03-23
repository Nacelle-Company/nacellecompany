<?php
/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$itunes_video = get_post_meta( get_the_ID(), 'itunes_video', true );
?>

<?php if ( get_field( 'show_video_links' ) ) : ?>
	<div class="entry-buttons">
		<div class="entry-buttons__wrapper">
			<h2 class="h3">
				<?php esc_html_e( 'Watch Now', 'wp-rig' ); ?>
			</h2>
			<?php if ( $itunes_video ) : ?>
				<a href="<?php echo esc_attr( $itunes_video ); ?>" class="button apple-link" title="Watch <?php the_title_attribute(); ?> on Apple TV" target="_blank" rel="noreferrer">
					<strong>
						<?php esc_html_e( 'Apple TV', 'wp-rig' ); ?>
					</strong>
					<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
						<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
					</svg>
				</a>
			<?php endif; ?>
			<?php if ( have_rows( 'new_large_link' ) ) : ?>
				<?php
				while ( have_rows( 'new_large_link' ) ) :
					the_row();
					$video_title = get_sub_field( 'link_title' );
					$video_link = get_sub_field( 'link_url' );
					?>
					<a href="<?php echo esc_html( $video_link ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $video_title ); ?>" target="_blank" rel="noreferrer">
						<strong><?php echo esc_html( $video_title ); ?></strong>
						<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
						</svg>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="entry-buttons__wrapper">
			<h2 class="h3">
				<?php esc_html_e( 'Listen Now', 'wp-rig' ); ?>
			</h2>
			<?php if ( have_rows( 'audio_new_large_link' ) ) : ?>
				<?php
				while ( have_rows( 'audio_new_large_link' ) ) :
					the_row();
					$audio_title = get_sub_field( 'audio_link_title' );
					$audio_link = get_sub_field( 'audio_link_url' );
					?>
					<a href="<?php echo esc_html( $audio_link ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $audio_title ); ?>" target="_blank" rel="noreferrer">
						<strong><?php echo esc_html( $audio_title ); ?></strong>
						<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
						</svg>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
