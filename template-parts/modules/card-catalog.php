<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$the_title  = get_the_title();
$permalink  = get_permalink();
$content_wp = get_the_content();
$content_ex = get_the_excerpt();

$content_acf = get_post_meta( $post->ID, 'synopsis', true );
$synopsis    = '';
$trim_length = 17; // ? Trimming the synopsis. desired length of text to display.
$value_more  = ' . . . '; // ? What to add at the end of the trimmed text.
$image       = '';
$queried_id  = get_queried_object();
$obj_slug    = $queried_id->slug;



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
global $count_cat;
if ( $count_cat <= 9 ) {
	$no_lazy_class  = ' no-lazy';
	$fetch_priority = 'high';
} else {
	$no_lazy_class  = '';
	$fetch_priority = 'low';
}

// // // // //
// IMAGE WORK
// // // // //

if ( 'special-production' === $obj_slug || 'series-production' === $obj_slug || 'production' === $obj_slug || 'podcasts' === $obj_slug ) {
	$img    = get_post_meta( $post->ID, 'horizontal_image', true );
	$width  = '320';
	$height = '182';
} elseif ( $obj_slug || get_search_query() ) {
	$img    = get_post_meta( $post->ID, 'square_image', true );
	$width  = '768';
	$height = '768';
} else {
	$img    = get_field( 'horizontal_image' );
	$width  = '320';
	$height = '182';
}
if ( ! empty( $img ) ) {
	?>
	<div class="gi">
		<a href="<?php echo esc_attr( $permalink ); ?>" class="link-absolute" aria-label="visit" title="<?php the_title(); ?>"></a>
	<?php
		// ACF Variables.
		// https://pixelsandthings.co.uk/srcset-images-in-wordpress-using-advanced-custom-fields/.

		$img_src      = wp_get_attachment_image_src( $img, 'medium' );
		$img_srcset   = wp_get_attachment_image_srcset( $img, 'medium' );
		$img_alt_text = get_post_meta( $img, '_wp_attachment_image_alt', true );
	?>

	<?php if ( $img_src ) { ?>
				<img class="catalog-card__img<?php echo esc_html( $no_lazy_class ); ?>"
					loading="lazy"
					width="<?php echo esc_html( $width ); ?>"
					height="<?php echo esc_html( $height ); ?>"
					src="<?php echo esc_url( $img_src[0] ); ?>"
					title="<?php the_title(); ?>"
					srcset="<?php echo esc_attr( $img_srcset ); ?>"
					sizes="(min-width: 2980px) calc(10vw - 27px), (min-width: 2700px) 10vw, (min-width: 2440px) 11.25vw, (min-width: 2160px) 12.69vw, (min-width: 1900px) 14.58vw, (min-width: 1620px) 16.54vw, (min-width: 1360px) 20vw, (min-width: 1080px) 25vw, (min-width: 960px) 33vw, (min-width: 780px) 50vw, 100vw"
					alt="<?php echo esc_html( $img_alt_text ); ?>"
					fetchpriority="<?php echo esc_html( $fetch_priority ); ?>"
				/>
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
