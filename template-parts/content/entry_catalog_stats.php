<?php
/**
 * Template part for displaying catalog more info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use DateTime;

$runtime          = get_post_meta( get_the_ID(), 'runtime', true );
$date             = get_post_meta( get_the_ID(), 'release_date', true );
$show_date        = get_post_meta( get_the_ID(), 'show_release_date', true );
$genres           = get_the_terms( $post->ID, 'genre' );
$rating           = get_post_meta( get_the_ID(), 'rating', true );
$copyright        = get_post_meta( get_the_ID(), 'copyright', true );
$book             = get_post_meta(get_the_ID(), 'book', true);
$book_cover_type 	= get_post_meta(get_the_ID(), 'book_cover_type', true );
$book_page_number = get_post_meta( get_the_ID(), 'book_page_number', true );
?>
			<?php wp_rig()->display_tax_terms( 'genre' ); ?>

			<?php if ( $runtime ) : ?>
				<dt><h4><?php esc_html_e( 'Runtime', 'wp-rig' ); ?>&nbsp:&nbsp</h4></dt>
				<dd><?php echo esc_html( $runtime ); ?></dd>
			<?php endif ?>

			<?php if ( $show_date ) : ?>
				<?php $date = new DateTime( $date ); ?>
				<dt><h4><?php esc_html_e( 'Premiere', 'wp-rig' ); ?>&nbsp:&nbsp</h4></dt>
				<dd><?php echo esc_html( $date->format( 'm/d/Y' ) ); ?></dd>
			<?php endif; ?>

			<?php if ( $rating ) : ?>
				<dt><h4><?php esc_html_e( 'Rating', 'wp-rig' ); ?>&nbsp:&nbsp</h4></dt>
				<dd><?php echo esc_html( $rating ); ?></dd>
			<?php endif ?>

			<?php if ( $copyright ) : ?>
				<dt><h4><?php esc_html_e( 'Copyright', 'wp-rig' ); ?>&nbsp:&nbsp</h4></dt>
				<dd><?php echo esc_html( $copyright ); ?></dd>
			<?php endif ?>


				<?php if ( $book ) : ?>
					<?php if ( ! empty($book_cover_type) ) : ?>
						<dt><h4><?php esc_html_e( $book_cover_type, 'wp-rig' ); ?>&nbsp:&nbsp</h4></dt>
						<?php if ( ! empty($book_page_number) ) : ?>
							<dd><?php echo esc_html_e( $book_page_number, 'wp-rig' ); ?> pages</dd>
						<?php endif ?>
					<?php endif ?>
				<?php endif ?>
