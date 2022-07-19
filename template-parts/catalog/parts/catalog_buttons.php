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
	<?php
	// REMOVE BELOW after individual link add option is removed.
	$you_tube_v      = get_post_meta( get_the_ID(), 'youtube_video', true );
	$itunes_v        = get_post_meta( get_the_ID(), 'itunes_video', true );
	$google_play_v   = get_post_meta( get_the_ID(), 'google_play_video', true );
	$amazon_v        = get_post_meta( get_the_ID(), 'amazon_video', true );
	$steam_v         = get_post_meta( get_the_ID(), 'steam_video', true );
	$microsoft_v     = get_post_meta( get_the_ID(), 'microsoft_video', true );
	$vudu_v          = get_post_meta( get_the_ID(), 'vudu_video', true );
	$vimeo_v         = get_post_meta( get_the_ID(), 'vimeo_video', true );
	$netflix_v        = get_post_meta( get_the_ID(), 'netflix_video', true );
	$animal_nation_v = get_post_meta( get_the_ID(), 'animal_nation_video', true );
	$hoopla_v        = get_post_meta( get_the_ID(), 'hoopla_video', true );
	$tubi_v          = get_post_meta( get_the_ID(), 'tubi_video', true );
	$breaker_v       = get_post_meta( get_the_ID(), 'breaker_video', true );
	$hulu_v          = get_post_meta( get_the_ID(), 'hulu_video', true );
	$epix_v          = get_post_meta( get_the_ID(), 'epix_video', true );
	$comcast_v       = get_post_meta( get_the_ID(), 'comcast', true );
	$redbox_v        = get_post_meta( get_the_ID(), 'redbox', true );
	$walmart_v       = get_post_meta( get_the_ID(), 'walmart', true );
	$target_v        = get_post_meta( get_the_ID(), 'target', true );
	$fandango_v      = get_post_meta( get_the_ID(), 'fandango', true );
	$mtv2_v          = get_post_meta( get_the_ID(), 'mtv2_video', true );
	// REMOVE ABOVE after individual link add option is removed.
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
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php
	// REMOVE BELOW.
	// REMOVE BELOW.
	// REMOVE BELOW.
	// REMOVE BELOW.
	?>
	<?php if ( $you_tube_v ) : ?>

			<a href="<?php echo esc_attr( $you_tube_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_attr( $you_tube_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
				<?php esc_html_e( 'YouTube', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>

	<?php if ( $google_play_v ) : ?>

			<a href="<?php echo esc_attr( $google_play_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_attr( $google_play_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Google Play', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $amazon_v ) : ?>

			<a href="<?php echo esc_html( $amazon_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_attr( $amazon_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Amazon', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $steam_v ) : ?>

			<a href="<?php echo esc_html( $steam_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $steam_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
					<?php esc_html_e( 'Steam', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $microsoft_v ) : ?>

			<a href="<?php echo esc_html( $microsoft_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $microsoft_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Microsoft', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $vudu_v ) : ?>

			<a href="<?php echo esc_html( $vudu_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $vudu_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Vudu', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $vimeo_v ) : ?>

			<a href="<?php echo esc_html( $vimeo_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $vimeo_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Vimeo', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $netflix_v ) : ?>

			<a href="<?php echo esc_html( $netflix_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $netflix_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Netflix', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $animal_nation_v ) : ?>

			<a href="<?php echo esc_html( $animal_nation_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $animal_nation_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Animal Nation', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $breaker_v ) : ?>

			<a href="<?php echo esc_html( $breaker_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $breaker_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Roku', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>

	<?php if ( $hulu_v ) : ?>

			<a href="<?php echo esc_html( $hulu_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $hulu_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'HULU', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $epix_v ) : ?>

			<a href="<?php echo esc_html( $epix_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $epix_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'EPIX', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $comcast_v ) : ?>

			<a href="<?php echo esc_html( $comcast_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $comcast_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Comcast', 'wp-rig' ); ?>
				</strong>
			</a>

	<?php endif; ?>
	<?php if ( $redbox_v ) : ?>

			<a href="<?php echo esc_html( $redbox_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $redbox_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Redbox', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>

	<?php if ( $walmart_v ) : ?>

			<a href="<?php echo esc_html( $walmart_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $walmart_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Walmart', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $target_v ) : ?>

			<a href="<?php echo esc_html( $target_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $target_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Target', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $fandango_v ) : ?>

			<a href="<?php echo esc_html( $fandango_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $fandango_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Fandango', 'wp-rig' ); ?>
				</strong>
			</a>

	<?php endif; ?>
	<?php if ( $hoopla_v ) : ?>

			<a href="<?php echo esc_html( $hoopla_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $hoopla_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Hoopla', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $mtv2_v ) : ?>

			<a href="<?php echo esc_html( $mtv2_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $mtv2_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'MTV2', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php if ( $tubi_v ) : ?>

			<a href="<?php echo esc_html( $tubi_v ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $tubi_v ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Tubi', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>

	<?php endif; ?>
	<?php
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	?>
	<?php if ( have_rows( 'new_large_link' ) ) : ?>
		<?php
		while ( have_rows( 'new_large_link' ) ) :
			the_row();
			$video_title = get_sub_field( 'link_title' );
			$video_link  = get_sub_field( 'link_url' );
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
<?php endif; ?>
<?php
if ( get_post_meta( get_the_ID(), 'show_audio_links', true ) ) :
	$google_play_a  = get_post_meta( get_the_ID(), 'google_play_audio', true );
	$you_tube_a     = get_post_meta( get_the_ID(), 'you_tube_audio', true );
	$amazon_a       = get_post_meta( get_the_ID(), 'amazon_audio', true );
	$spotify_a      = get_post_meta( get_the_ID(), 'spotify_audio', true );
	$pandora_a      = get_post_meta( get_the_ID(), 'pandora_audio', true );
	$walmart_a      = get_post_meta( get_the_ID(), 'walmart_audio', true );
	$target_a       = get_post_meta( get_the_ID(), 'target_audio', true );
	$fandango_a     = get_post_meta( get_the_ID(), 'fandango_audio', true );
	$custom_a       = get_post_meta( get_the_ID(), 'custom_audio', true );
	$custom_a_title = get_post_meta( get_the_ID(), 'custom_audio_title', true );
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
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php
	// REMOVE BELOW.
	// REMOVE BELOW.
	// REMOVE BELOW.
	// REMOVE BELOW.
	?>
	<?php if ( $google_play_a ) : ?>
			<a href="<?php echo esc_html( $google_play_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $google_play_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Google Play', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $you_tube_a ) : ?>
			<a href="<?php echo esc_html( $you_tube_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $you_tube_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'YouTube Music', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $amazon_a ) : ?>
			<a href="<?php echo esc_html( $amazon_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $amazon_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Amazon', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $spotify_a ) : ?>
			<a href="<?php echo esc_html( $spotify_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $spotify_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Spotify', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $pandora_a ) : ?>
			<a href="<?php echo esc_html( $pandora_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $pandora_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Pandora', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $walmart_a ) : ?>
			<a href="<?php echo esc_html( $walmart_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $walmart_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Walmart', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $target_a ) : ?>
			<a href="<?php echo esc_html( $target_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $target_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Target', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php if ( $fandango_a ) : ?>
			<a href="<?php echo esc_html( $fandango_a ); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html( $fandango_a ); ?>" target="_blank" rel="noreferrer">
				<strong>
		<?php esc_html_e( 'Fandango', 'wp-rig' ); ?>
				</strong>
				<svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
				</svg>
			</a>
	<?php endif; ?>
	<?php
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	// REMOVE ABOVE.
	?>
	<?php if ( have_rows( 'audio_new_large_link' ) ) : ?>
		<?php
		while ( have_rows( 'audio_new_large_link' ) ) :
			the_row();
			$audio_title = get_sub_field( 'audio_link_title' );
			$audio_link  = get_sub_field( 'audio_link_url' );
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
<?php endif; ?>
