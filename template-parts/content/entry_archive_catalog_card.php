<?php
/**
 * Template part for displaying a catalog post's card on the archive page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

global $count_cat;

require('logic/logic_entry_archive_catalog_card.php');

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
				<img class="catalog-card__img"
					loading="<?php echo esc_html( $lazy_load ); ?>"
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
			<h2 class="title font-size-small"><?php echo esc_attr( $the_title ); ?></h2>
			<p class="font-size-small"><?php echo esc_html( $synopsis ); ?></p>
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
