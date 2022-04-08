<?php
/**
 * Template part for displaying catalog more info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use DateTime;

wp_rig()->print_styles( 'wp-rig-accordion' );

$runtime   = get_post_meta( get_the_ID(), 'runtime', true );
$date      = get_post_meta( get_the_ID(), 'release_date', true );
$show_date = get_post_meta( get_the_ID(), 'show_release_date', true );
$genres    = get_the_terms( $post->ID, 'genre' );
$rating    = get_post_meta( get_the_ID(), 'rating', true );
$copyright = get_post_meta( get_the_ID(), 'copyright', true );
?>
<div class="entry-accordion tab">
	<input type="checkbox" id="more_info">
	<label class="tab-label" for="more_info"><h2><span class="screen-reader-text"><?php single_post_title(); ?></span>MORE INFO</h2><span class="dashicons dashicons-arrow-right"></span></label>
	<div class="tab-content">
		<dl class="dl-list dl-list__info">
			<?php if ( $runtime ) : ?>
				<dt><h4><?php esc_html_e( 'Runtime', 'wp-rig' ); ?></h4></dt>
				<dd><?php echo esc_html( $runtime ); ?></dd>
			<?php endif ?>

			<?php if ( $show_date ) : ?>
				<?php $date = new DateTime( $date ); ?>
				<dt><h4><?php esc_html_e( 'Premiere', 'wp-rig' ); ?></h4></dt>
				<dd><?php echo esc_html( $date->format( 'm/d/Y' ) ); ?></dd>
			<?php endif; ?>

			<?php wp_rig()->display_tax_terms( 'genre' ); ?>

			<?php if ( $rating ) : ?>
				<dt><h4><?php esc_html_e( 'Rating', 'wp-rig' ); ?></h4></dt>
				<dd><?php echo esc_html( $rating ); ?></dd>
			<?php endif ?>

			<?php if ( $copyright ) : ?>
				<dt><h4><?php esc_html_e( 'Copyright', 'wp-rig' ); ?></h4></dt>
				<dd><?php echo esc_html( $copyright ); ?></dd>
			<?php endif ?>
		</dl>
	</div>
</div>
