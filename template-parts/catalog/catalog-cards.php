<?php
/**
 * The template for displaying catalog cards.
 *
 * When active, applies to all category archives.
 * To target a specific category, rename file to category-{slug/id}.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-catalog-cards' );

global $searchandfilter;

$query_obj = get_queried_object();
$obj_tax   = $query_obj->taxonomy;
$obj_slug  = $query_obj->slug;

printVar( $query_obj );
if ( is_tax( $obj_tax ) ) {
	$taxonomy_name = $obj_tax;
	echo $taxonomy_name;
} elseif ( is_tax( $obj_tax ) ) {
	$taxonomy_name = 'category';
	echo $taxonomy_name;
}

$query = new \WP_Query(
	array(
		'post_type' => 'catalog',
		'orderby'  => 'title',
		'taxonomy' => $taxonomy_name,
		'order'    => 'ASC',
		'paged'    => get_query_var( 'paged' ),
	)
);
// printVar( $query );
?>
<div class="catalog-cards__wrap">
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		// Variables.
		$count       = $wp_query->current_post;
		$the_title   = get_the_title();
		$permalink   = get_permalink();
		$content_wp  = get_the_content();
		$content_ex  = get_the_excerpt();
		$content_acf = get_post_meta( $post->ID, 'synopsis', true );
		$synopsis    = '';
		$trim_length = 17; // ? Trimming the synopsis. desired length of text to display.
		$value_more  = ' . . . '; // ? What to add at the end of the trimmed text.
		$image       = '';
		$size        = 'wp-rig-square';
		/**
		 * For the first 12 posts remove the loading="lazy" attr.
		 *
		 * @param Type $count Gets the loop index number.
		 * @return attr lazy
		 * @throws conditon boolean
		 */

		if ( $count < 13 ) {
			$attr = 'no-lazy';
		} else {
			$attr = 'lazy';
		}

		// Assign content if avaliable, otherwise use the synopsis acf.
		if ( $content_acf ) {
			$content_acf = wp_trim_words( $content_acf, $trim_length, $value_more ); // Final synopsis.
			$synopsis    = $content_acf;
		} elseif ( $content_ex ) {
			$content_ex = wp_trim_words( $content_ex, $trim_length, $value_more ); // Final synopsis.
			$synopsis   = $content_ex;
		} elseif ( $content_wp ) {
			$content_wp = wp_trim_words( $content_wp, $trim_length, $value_more ); // Final synopsis.
			$synopsis   = $content_wp;
		}

		$img = get_field( 'square_image' );
		// Start card element.
		if ( ! empty( $img ) ) {
			?>
			<div class="gi">
				<a href="<?php echo esc_attr( $permalink ); ?>" class="link-absolute" aria-label="visit" title="<?php the_title(); ?>"></a>

					<?php
						// ACF Variables.
						// https://pixelsandthings.co.uk/srcset-images-in-wordpress-using-advanced-custom-fields/.

						$img_src      = wp_get_attachment_image_src( $img, 'wp-rig-square' );
						$img_srcset   = wp_get_attachment_image_srcset( $img, 'wp-rig-square' );
						$img_alt_text = get_post_meta( $img, '_wp_attachment_image_alt', true );
					?>
					<?php if ( $img_src ) { ?>
						<!-- ACF Image Start -->
						<img class="catalog-card__img <?php echo esc_html( $attr ); ?>"
							src="<?php echo esc_url( $img_src[0] ); ?>"
							title="<?php the_title(); ?>"
							srcset="<?php echo esc_attr( $img_srcset ); ?>"
							sizes="(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1100px) 62vw, 840px"
							alt="<?php echo esc_html( $img_alt_text ); ?>"
						/>
						<!-- ACF Image End -->
					<?php } ?>

				<div class="gi__content">
					<h2 class="title"><?php echo esc_attr( $the_title ); ?></h2>
					<sub><?php echo esc_html( $synopsis ); ?></sub>
				</div>
			</div>
			<?php
		} else { // If not image, just give us the permalink, title and content.
			?>
			<div class="gi gi__plain">
				<a href="<?php echo esc_attr( $permalink ); ?>" aria-label="visit">
					<div class="gi__content">
						<h2 class="title"><?php echo esc_attr( $the_title ); ?></h2>
						<sub><?php echo esc_html( $synopsis ); ?></sub>
					</div>
				</a>
			</div>
				<?php
		}
	endwhile;
	wp_reset_postdata();
	?>
</div>
