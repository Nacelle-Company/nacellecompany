<?php
/**
 * Template part for displaying a catalog post additional content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$video_embedd = get_post_meta( get_the_ID(), 'video_embedd', true );
wp_rig()->print_styles( 'wp-rig-entry_catalog_additional_content' );

if ( ! empty( $video_embedd ) ) :
	$video_class = ' video';
else :
	$video_class = '';
endif;
?>
<div id="additional-content" class="catalog-additional-content__wrapper<?php echo esc_html( $video_class ); ?>">
	<div class="catalog-additional-content">
		<?php
		while ( have_rows( 'additional_content' ) ) :
			the_row();

			if ( get_row_layout() === 'editor' ) :
				$editor_content = get_sub_field( 'editor_content' );
				echo wp_kses( $editor_content, 'post' );

			elseif ( get_row_layout() === 'quote' ) :
				$quote_content    = get_sub_field( 'quote_content' );
				$quote_source     = get_sub_field( 'quote_source' );
				$quote_source_url = get_sub_field( 'quote_source_url' );
				?>
				<blockquote class="wp-block-quote">
					<p><?php echo wp_kses( $quote_content, 'post' ); ?></p>
					<a href="<?php echo wp_kses( $quote_source_url, 'post' ); ?>">
						<cite><?php echo wp_kses( $quote_source, 'post' ); ?></cite>
					</a>
				</blockquote>
				<?php
			endif;
		endwhile;
		?>
	</div>
</div>
